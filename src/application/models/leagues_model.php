<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leagues_model extends CI_Model
{
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
}