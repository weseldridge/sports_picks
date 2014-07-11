<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leagues extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
        if(!isset($_SESSION['username']))
        {
            redirect('users/login');
        }
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

    public function join()
    {
        $data['leagues'] = $this->get_leagues();
        $this->load->view('template/header');
        $this->load->view('leagues/join', $data);
        $this->load->view('template/footer');
    }

    public function my()
    {
        $data['leagues'] = $this->get_my_leagues();
        $this->load->view('template/header');
        $this->load->view('leagues/my', $data);
        $this->load->view('template/footer');
    }

    public function detail($league_id)
    {
        $data['league'] = $this->get($league_id);
        $data['players'] = $this->get_players($league_id);
        $this->load->view('template/header');
        $this->load->view('leagues/details', $data);
        $this->load->view('template/footer');
    }

    public function add_game($league_id)
    {
        $data['games'] = $this->get_games_not_in_league($league_id);
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
                                          $this->input->post('description'),
                                          $_SESSION['user_id']);


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
    public function add_this_game_to_league($league_id)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
        }
    }

    public function add_this_user_to_league()
    {

    }

    private function get_leagues()
    {
        $this->load->model('Leagues_model');
        return $this->Leagues_model->get_available_leagues($_SESSION['user_id']);
    }

    public function join_this_league($id)
    {
        $this->load->model('Leagues_model');
        $this->Leagues_model->add_user_league($_SESSION['user_id'],$id);

        redirect('leagues');
    }

    private function get_my_leagues()
    {
        $this->load->model('Leagues_model');
        return $this->Leagues_model->get_user_league($_SESSION['user_id']);
    }

    private function get($id)
    {
        $this->load->model('Leagues_model');
        return $this->Leagues_model->get($id);
    }
    
    private function get_players($id)
    {
        $this->load->model('Leagues_model');
        return $this->Leagues_model->get_players($id);   
    }

    private function get_games_not_in_league($league_id)
    {
        $this->load->model('Games_model');
        $this->load->model('Leagues_model');
        $games = $this->Games_model->none_league_games();
        //$league_games = $this->Leagues_model->get_league_games($id);

        //$games = $this->make_game_list($games, $league_games);
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

    // Not a good way to handle this...
    // Figures our SQL request to cut down on O(n) = n^2
    private function make_game_list($all_games, $league_games)
    {
        $games = array();
        $i = 0;
        for ($i=0; $i < $all_games.count(); $i++) { 
            for ($j=0; $j < $league_games.count(); $j++) { 
                if($all_games[$i]['id'] == $league_games[$j]['games_id'])
                {
                    array_push($games, $all_games[$i]);
                }
            }
        }

        return $games;
    }


}