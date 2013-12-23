<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Games extends CI_Controller {

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


    public function add()
    {
    	$this->load->view('template/header');
    	$this->load->view('games/add');
    	$this->load->view('template/footer');
    }

    public function update($id)
    {
    	$this->load->model('Games_model');

    	$data['game'] = $this->Games_model->get($id);

    	if($data['game']){
			$this->load->view('template/header');
    		$this->load->view('games/update', $data);
    		$this->load->view('template/footer');
    	} else {
    		redirect('games/update');
    	}
    }

    public function add_comment($game_id)
    {
        $data['game_id'] = $game_id;

        $this->load->view('template/header');
        $this->load->view('games/add_comment', $data);
        $this->load->view('template/footer');
    }


    /* -----------------------------------------------------------------
    *
    *                     CRUD Helper Methods
    *
    * ----------------------------------------------------------------- */


    public function add_this_comment($game_id)
    {
        if($_SERVER('REQUEST_METHOD') == 'POST')
        {
            $this->form_validation->set_rules('text', 'Comment', 'required');

            if($this->form_validation->run() !== false ) 
            {
                $this->load->model('Games_model');

                $data = array(
                    'games_id' => $game_id,
                    'users_id' => $_SESSION['user_id'],
                    'text' => $this->input->post('text')
                    );

                $this->Games_model->add_comment($data);
            }
        }
    }

    public function add_this_game()
    {
    	if($_SERVER['REQUEST_METHOD'] == 'POST'){

    		$this->form_validation->set_rules('team_1', 'Team 1', 'required');
	        $this->form_validation->set_rules('team_2', 'Team 2', 'required');
	        $this->form_validation->set_rules('network', 'Network', 'required');
	        $this->form_validation->set_rules('play_date', 'Play Date', 'required');

	        if($this->form_validation->run() !== false ) 
            {
	        	$this->load->model('Games_model');

	        	$this->Games_model->add($this->input->post('team_1'),
	        							$this->input->post('team_2'),
	        							$this->input->post('network'),
	        							$this->input->post('play_date'));
	        	redirect('games/add');

	        } else {
	     		redirect('games/add');
	        }
    	}
    }

    public function update_this_game($id)
    {
    	if($_SERVER['REQUEST_METHOD'] == 'POST')
        {

    		$this->form_validation->set_rules('team_1', 'Team 1', 'required');
	        $this->form_validation->set_rules('team_2', 'Team 2', 'required');
	        $this->form_validation->set_rules('network', 'Network', 'required');
	        $this->form_validation->set_rules('play_date', 'Play Date', 'required');
	        $this->form_validation->set_rules('team_1_won', 'Team 1 won', 'required');

	        if($this->form_validation->run() !== false ) {
	        	$this->load->model('Games_model');

	        	$this->Games_model->upate($id,
	        							$this->input->post('team_1'),
	        							$this->input->post('team_2'),
	        							$this->input->post('network'),
	        							$this->input->post('play_date'),
	        							$this->input->post('team_1_won'));
	        	redirect('games/add');

	        } else {
	     		redirect('games/add');
	        }
    	}
    }

    /* -----------------------------------------------------------------
    *
    *                     Helper Methods
    *
    * ----------------------------------------------------------------- */

}