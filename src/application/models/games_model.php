<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Games_model extends CI_Model
{

	/* -----------------------------------------------------------------
    *
    *                     CRUD Opporations
    *
    * ----------------------------------------------------------------- */

	public function add($data){

		$this->db->insert('games', $data);
	}

	public function get($id)
	{
		$game = $this->db->where('id', $id)
						->limit(1)
						->get('games');

		if($game->num_rows() > 0)
		{
			$game =  $game->result_array();
			return $game[0];
		} else {
			return false;
		}
	}

	public function update($data)
	{
		$this->db->where('id',$data['id'])
				->update('games', $data);
	}

	public function delete($id)
	{

	}

	public function add_comment($data)
	{
		$this->db->insert('game_comments', $data);
	}

	public function none_league_games($league_id)
	{
		$games = $this->db->select('id, team_1, team_2')
							->where('')
							->where('league_games.games_id <>', 'games.id')
							->where('final <>', '1')
							->get('games');
		if($games->num_rows() > 0)
		{
			return $games;
		} else {
			return false;
		}
	}
	/* -----------------------------------------------------------------
    *
    *                     Batch CRUD
    *
    * ----------------------------------------------------------------- */

	public function get_all()
	{
		$games = $this->db->get('games');

		if($games->num_rows() > 0)
		{
			return $games->result_array();
		} else {
			return false;
		}
	}


	/* -----------------------------------------------------------------
    *
    *                     Custom SQL Methods
    *
    * ----------------------------------------------------------------- */
}