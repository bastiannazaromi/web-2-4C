<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{
	public function getAllUser()
	{
		$this->db->order_by('nama', 'asc');

		return $this->db->get('user')->result();
	}

	public function insertUser($data)
	{
		return $this->db->insert('user', $data);
	}

	public function getUserById($id)
	{
		return $this->db->get_where('user', ['id' => $id])->row();
	}

	public function updateUser($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('user', $data);
	}

	public function deleteUser($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('user');
	}
}

/* End of file M_User.php */
