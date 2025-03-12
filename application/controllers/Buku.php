<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
	public function index()
	{
		$this->load->model('M_Buku', 'buku');

		$buku = $this->buku->getAllBuku();

		echo json_encode($buku);
	}
}
