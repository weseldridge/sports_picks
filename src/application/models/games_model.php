<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Games_model extends CI_Model
{

	/* -----------------------------------------------------------------
    *
    *                     CRUD Opporations
    *
    * ----------------------------------------------------------------- */

	public function add($team_1, $team_2, $network, $play_date){

		$data = array(
			'team_1' => $team_1,
			'team_2' => $team_2,
			'network' => $network,
			'play_date' => $play_date
			);

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

	public function update($id, $team_1, $team_2, $network, $play_date, $team_1_won)
	{
		$data = array(
			'team_1' => $team_1,
			'team_2' => $team_2,
			'network' => $network,
			'play_date' => $play_date,
			'team_1_won' => $team_1_won
			);
		$this->db->where('id',$id)
				->update('games', $data);
	}

	public function delete($id)
	{

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