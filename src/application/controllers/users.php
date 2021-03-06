<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
    /* -----------------------------------------------------------------
    *
    *                       View Controllers
    *
    *  ----------------------------------------------------------------- */

    public function login()
    {
    	if(isset($_SESSION['username']))
        {
            redirect('leagues');
        }
    	$this->load->view('template/header');
    	$this->load->view('user/login');
    	$this->load->view('template/footer');
    }

    public function add()
    {
        if(!isset($_SESSION['username']))
        {
            redirect('users/login');
        }
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
        if(!isset($_SESSION['username']))
        {
            redirect('users/login');
        }
        $data['user'] = $this->get_user($_SESSION['user_id']);
        $this->load->view('template/header');
        $this->load->view('user/settings', $data);
        $this->load->view('template/footer');
    }

    public function detail($id)
    {
        $data['user'] = $this->get_user($id);
        $this->load->view('template/header');
        $this->load->view('user/detail', $data);
        $this->load->view('template/footer');
    }

    /* -----------------------------------------------------------------
    *
    *                     CRUD Helper Methods
    *
    * ----------------------------------------------------------------- */

    public function add_this_user()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
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
        if($_SERVER['REQUEST_METHOD'] == 'POST')
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

    public function update_this_user($id)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            echo "is a post";
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            echo "set rules";
            if($this->form_validation->run() !== false ) 
            {
                echo "validatoin passed";
                $data = array(
                    'id' => $id,
                    'email'=> $this->input->post('email'),
                    'name' => $this->input->post('name'),
                    'twitter' => $this->input->post('twitter'),
                    'facebook' => $this->input->post('facebook'),
                    'google' => $this->input->post('google')
                    );

                $this->load->model('Users_model');
                $this->Users_model->update($data);
                echo "redirect";
                redirect('users/settings');
            }
        } else {
            redirect('users/settings');
        }
    }

    public function get_user($id)
    {
        $this->load->model('Users_model');
        return $this->Users_model->get($id);
    }

    /* -----------------------------------------------------------------
    *
    *                     Helper Methods
    *
    * ----------------------------------------------------------------- */
    public function user_login()
    {
    	if($_SERVER['REQUEST_METHOD'] == 'POST') 
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
                    echo "there is a user";
        			$_SESSION['username'] = $user['username'];
        			$_SESSION['user_id'] = $user['id'];
        			$_SESSION['user_level'] = $user['user_level'];

        			redirect('leagues');
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
    		redirect('users/login');
    	}
    }

    // [TODO] ... [/TODO]
    private function email_new_user($data)
    {

    }


    private function get_user_test()
    {
        return array(
            'id' => '1',
            'username' => 'weseldridge',
            'email' => 'wes@rebelliouslabs.com',
            'name' => 'Wes Eldridge',
            'twitter' => 'weseldridge',
            'facebook' => 'wleldridge',
            'google' => '+wesleyeldridge',
            'use_gravatar' => '1',
            'gravatar' => 'weseldridge@gmail.com',
            'pic_url' => 'test_image.jpg',
            'description' => 'I am the creator and the all knowing. Use this product wisely or face the rath of my hand!',
            );
    }

}