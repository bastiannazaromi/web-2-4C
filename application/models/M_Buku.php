<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Buku extends CI_Model
{
	public function getAllBuku()
	{
		$this->db->select('id, judul, penulis, penerbit, tahun, jumlah_halaman');

		$this->db->where('tahun <=', 2025);

		$this->db->order_by('judul', 'asc');
		// $this->db->limit(1);

		return $this->db->get('buku')->result();
	}
}

/* End of file M_Buku.php */
