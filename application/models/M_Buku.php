<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Buku extends CI_Model
{
	// Ambil semua data buku
	public function getAllBuku()
	{
		$this->db->select('buku.*, penulis.nama as penulis');
		$this->db->join('penulis', 'buku.id_penulis = penulis.id', 'inner');

		$this->db->order_by('buku.judul', 'asc');

		return $this->db->get('buku')->result();
	}

	// Tambah data buku
	public function insertBuku($data)
	{
		return $this->db->insert('buku', $data);
	}

	// Ambil satu data buku berdasarkan ID
	public function getBukuById($id)
	{
		$this->db->select('buku.*, penulis.nama as penulis');
		$this->db->join('penulis', 'buku.id_penulis = penulis.id', 'left');

		return $this->db->get_where('buku', ['buku.id' => $id])->row();
	}

	// Update data buku
	public function updateBuku($id, $data)
	{
		// update buku set penulis where id

		$this->db->where('id', $id);
		return $this->db->update('buku', $data);
	}

	// Hapus data buku
	public function deleteBuku($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('buku');
	}
}
