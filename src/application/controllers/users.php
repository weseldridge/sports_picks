<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
    }

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

    public function user_login()
    {
    	if($_SERVER['RESQUEST_METHOD'] == 'POST') {
	    		
	        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
	        $this->form_validation->set_rules('username', 'Username', 'required');

	        if($this->form_validation->run() !== false ) {

	        	$this->load->model('Users_model');
	        	// Check to see if user is valid
	        	// Returns false or a user
	        	$user = $this->Users_model->verify_user($this->input->post('username'),
	        											$this->input->post('password'));

	        	// If valid user set session information.
	        	if($user){
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
}