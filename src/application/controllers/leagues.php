<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leagues extends CI_Controller {

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

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('leagues/_index');
        $this->load->view('template/footer');
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

    public function add_game_to_league()
    {
        $data['games'] = $this->get_games();

        $this->load->view('template/header');
        $this->load->view('leagues/add_game', $data);
        $this->load->view('template/footer');
    }
    /*
    public function add_user_to_league()
    {
        $this->load->view('template/header');
        $this->load->view('leagues/add_user');
        $this->load->view('template/footer');
    }

    public function form()
    {
        $this->load->view('template/header');
        $this->load->view('leagues/form');
        $this->load->view('template/footer');
    }

    public function form_comment()
    {
        $this->load->view('template/header');
        $this->load->view('leagues/form_comment');
        $this->load->view('template/footer');
    }

    public function form_admin()
    {
        $this->load->view('template/header');
        $this->load->view('leagues/form_admin');
        $this->load->view('template/footer');
    }

    public function form_add_admin()
    {
        $this->load->view('template/header');
        $this->load->view('leagues/form_add_admin');
        $this->load->view('template/footer');
    }   */


    /* -----------------------------------------------------------------
    *
    *                     CRUD Helper Methods
    *
    * ----------------------------------------------------------------- */

    public function add_this_league()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');


            if($this->form_validation->run() !== false ) 
            {
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
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');


            if($this->form_validation->run() !== false ) 
            {
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

    // [TODO] Input for users league [/TODO]
    public function add_this_game_to_league()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $league_id = 1;
            $games = $this->input->post('games');
            $this->load->model('Leagues_model');
            
            foreach($games as $game)
            {
                $this->Leagues_model->add_game($league_id, $game);
            }
        }
    }

    public function add_this_user_to_league()
    {

    }
    /* -----------------------------------------------------------------
    *
    *                     Helper Methods
    *
    * ----------------------------------------------------------------- */

    private function get_multiselect_data()
    {
        $games = $this->get_games();
        $data = array();
        foreach ($games as $game) {
            $data[$game['id']] = $game['team_1'] . ' vs ' . $game['team_2'];
        }

        return $data;
    }


    private function get_games()
    {
        $this->load->model('Games_model');

        return $this->Games_model->get_all();
    }


}