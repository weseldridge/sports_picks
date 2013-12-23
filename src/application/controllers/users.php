<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    /* -----------------------------------------------------------------
    *
    *                       View Controllers
    *
    *  ----------------------------------------------------------------- */

    public function login()
    {
    	/*if(isset($_SESSION['username']))
        {
            redirect('league');
        }*/
    	$this->load->view('template/header');
    	$this->load->view('user/login');
    	$this->load->view('template/footer');
    }

    public function add()
    {
        $this->load->view('template/header');
        $this->load->view('user/add');
        $this->load->view('template/footer');
    }

    public function register()
    {
        $this->load->view('template/header');
        $this->load->view('user/register');
        $this->load->view('template/footer');
    }

    public function logout()
    {
        unset($_SESSION['username']);
        redirect('users/login');
    }

    public function settings()
    {
        $this->load->view('template/header');
        $this->load->view('user/settings');
        $this->load->view('template/footer');
    }

    /* -----------------------------------------------------------------
    *
    *                     CRUD Helper Methods
    *
    * ----------------------------------------------------------------- */

    public function add_this_user()
    {
        if($_SERVER['RESQUEST_METHOD'] == 'POST')
        {
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|matches[cpassword]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('username', 'User Name', 'required|min_length[6]|is_unique[users.username]');

            if($this->form_validation->run() !== false ) 
            {
                $data = array(
                    'username'=> $this->input->post('username'),
                    'first_name'=> $this->input->post('first_name'),
                    'last_name'=> $this->input->post('last_name'),
                    'email'=> $this->input->post('email'),
                    'password'=> sha1($this->input->post('password'))
                    );

                $this->load->model('Users_model');
                $this->Users_model->add($data);
            }
        }
    }

    public function register_this_user()
    {
        if($_SERVER['RESQUEST_METHOD'] == 'POST')
        {
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|matches[cpassword]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('username', 'User Name', 'required|min_length[6]|is_unique[users.username]');

            if($this->form_validation->run() !== false ) 
            {
                $data = array(
                    'username'=> $this->input->post('username'),
                    'email'=> $this->input->post('email'),
                    'password'=> sha1($this->input->post('password'))
                    );

                $this->load->model('Users_model');
                $this->Users_model->add($data);

                //[TODO] Email New Users [/TODO]
                $this->email_new_user($data);
            }
        }
    }

    /* -----------------------------------------------------------------
    *
    *                     Helper Methods
    *
    * ----------------------------------------------------------------- */
    public function user_login()
    {
    	if($_SERVER['RESQUEST_METHOD'] == 'POST') 
        {
	    		
	        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
	        $this->form_validation->set_rules('username', 'Username', 'required');

	        if($this->form_validation->run() !== false ) 
            {

	        	$this->load->model('Users_model');
	        	// Check to see if user is valid
	        	// Returns false or a user
	        	$user = $this->Users_model->verify_user($this->input->post('username'),
	        											$this->input->post('password'));

	        	// If valid user set session information.
	        	if($user)
                {
        			$_SESSION['username'] = $user['username'];
        			$_SESSION['user_id'] = $user['id'];
        			$_SESSION['user_level'] = $user['user_level'];

        			redirect('league');
	        	} else {
	        		$this->load->view('template/header');
	    			$this->load->view('user/login');
	    			$this->load->view('template/footer');
	        	}
	        } else {
	        	$this->load->view('template/header');
    			$this->load->view('user/login');
    			$this->load->view('template/footer');
	        }

    	} else {
    		redirect('user/login');
    	}
    }

    // [TODO] ... [/TODO]
    private function email_new_user($data)
    {

    }

}