<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Penulis extends CI_Model
{
	public function getAllPenulis()
	{
		$this->db->order_by('nama', 'asc');

		return $this->db->get('penulis')->result();
	}

	public function insertPenulis($data)
	{
		return $this->db->insert('penulis', $data);
	}

	public function getPenulisById($id)
	{
		return $this->db->get_where('penulis', ['id' => $id])->row();
	}

	public function updatePenulis($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('penulis', $data);
	}

	public function deletePenulis($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('penulis');
	}
}

/* End of file M_Penulis.php */
