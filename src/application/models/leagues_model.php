<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leagues_model extends CI_Model
{

	/* -----------------------------------------------------------------
    *
    *                     CRUD Opporations
    *
    * ----------------------------------------------------------------- */
	public function get($id)
	{
		$league = $this->db->where('id', $id)
							->limit(1)
							->get('leagues');

		if($league->num_rows() > 0)
		{
			$league = $league->result_array();
			return $league[0];
		} else {
			return flase;
		}
	}

	public function add($title, $description)
	{
		$data = array(
			'title' => $title,
			'description' => $description
			);

		$this->db->insert('leagues', $data);
	}

	public function update($id, $title, $description)
	{
		$data = array(
			'title' => $title,
			'description' => $description
			);

		$this->db->where('id', $id)
					->update('leagues', $data);
	}
	
	public function delete($id)
	{

	}

	public function add_game($league_id, $game_id)
	{
		$data = array(
			'leagues_id' => $league_id,
			'games_id' => $game_id
			);
		$this->db->insert('league_games', $data);
	}

	/* -----------------------------------------------------------------
    *
    *                     Batch CRUD
    *
    * ----------------------------------------------------------------- */


    /* -----------------------------------------------------------------
    *
    *                     Custom SQL Methods
    *
    * ----------------------------------------------------------------- */
}