<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leagues extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function add()
    {
		$this->load->view('template/header');
    	$this->load->view('leagues/add');
    	$this->load->view('template/footer');
    }

    public function update($id)
    {
    	$this->load->model('Leagues_model');
    	$data['league'] = $this->Leagues_model->get($id);

		$this->load->view('template/header');
    	$this->load->view('leagues/update',$data);
    	$this->load->view('template/footer');
    }

    public function add_this_league()
    {
    	if($_SERVER['REQUEST_METHOD'] == 'POST'){

    		$this->form_validation->set_rules('title', 'Title', 'required');
	        $this->form_validation->set_rules('description', 'Description', 'required');


	        if($this->form_validation->run() !== false ) {
	        	$this->load->model('Leagues_model');
	        	$this->Leagues_model->add($this->input->post('title'),
	        							$this->input->post('description'));

	        	redirect('leagues/add');

	        } else {
	     		redirect('leagues/add');
	        }
    	}
    }

    public function update_this_league($id)
    {
    	if($_SERVER['REQUEST_METHOD'] == 'POST'){

    		$this->form_validation->set_rules('title', 'Title', 'required');
	        $this->form_validation->set_rules('description', 'Description', 'required');


	        if($this->form_validation->run() !== false ) {
	        	$this->load->model('Leagues_model');
	        	$this->Leagues_model->update($id,
	        							$this->input->post('title'),
	        							$this->input->post('description'));
	        	
	        	redirect('leagues/add');

	        } else {
	     		redirect('leagues/add');
	        }
    	}
    }
}