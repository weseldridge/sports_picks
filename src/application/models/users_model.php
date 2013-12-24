<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model
{


	public function verify_user($username, $password)
	{
		$user = $this->db->where('username', $username)
					->where('password', sha1($password))
					->limit(1)
					->get('users');

		if($user->num_rows() > 0){
			$user = $user->result_array();
			return $user[0];
		} else {
			return false;
		}
	}

	public function add($user)
	{
		$this->db->insert('users', $user);
	}

	public function get($id)
	{
		$user = $this->db->where('id', $id)
						->limit(1)
						->get('users');

		if($user->num_rows() > 0){
			$user = $user->result_array();
			return $user[0];
		} else {
			return false;
		}
	}

	public function update($data)
	{
		echo "start update";
		$this->db->where('id', $data['id'])
					->update('users', $data);
		echo "end of update";
	}
}