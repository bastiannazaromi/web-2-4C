<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Buku', 'buku');
	}

	public function index()
	{
		$buku = $this->buku->getAllBuku();

		$data = [
			'title' => 'Data Buku',
			'buku'  => $buku
		];

		$this->load->view('v_buku', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Tambah Buku'
		];

		$this->load->view('v_addBuku', $data);
	}

	public function postAdd()
	{
		$data = [
			'judul'          => $this->input->post('judul'),
			'penulis'        => $this->input->post('penulis'),
			'penerbit'       => $this->input->post('penerbit'),
			'tahun'          => $this->input->post('tahun'),
			'jumlah_halaman' => $this->input->post('jumlah_halaman'),
		];

		// proses untuk insert ke tabel
		$this->buku->insertBuku($data);

		redirect('buku');
	}

	public function edit($id)
	{
		$buku = $this->buku->getBukuById($id);
		if (!$buku) {
			show_404();
		}

		$data = [
			'title' => 'Edit Buku',
			'buku'  => $buku
		];

		$this->load->view('v_editBuku', $data);
	}

	public function update()
	{
		$id   = $this->input->post('id');
		$data = [
			'judul'          => $this->input->post('judul'),
			'penulis'        => $this->input->post('penulis'),
			'penerbit'       => $this->input->post('penerbit'),
			'tahun'          => $this->input->post('tahun'),
			'jumlah_halaman' => $this->input->post('jumlah_halaman'),
		];

		// proses update
		$this->buku->updateBuku($id, $data);

		redirect('buku');
	}

	public function delete($id)
	{
		$this->buku->deleteBuku($id);

		redirect('buku');
	}
}
