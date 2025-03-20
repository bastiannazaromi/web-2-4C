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
			'page'  => 'buku/v_buku',
			'buku'  => $buku
		];

		$this->load->view('index', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Tambah Buku',
			'page'  => 'buku/v_addBuku'
		];

		$this->load->view('index', $data);
	}

	public function postAdd()
	{
		$this->form_validation->set_rules('judul', 'Judul', 'required', [
			'required' => 'Judul harus diisi!'
		]);
		$this->form_validation->set_rules('penulis', 'Penulis', 'required', [
			'required' => 'Penulis harus diisi!'
		]);
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required', [
			'required' => 'Penerbit harus diisi!'
		]);
		$this->form_validation->set_rules('tahun', 'Tahun', 'required|numeric|exact_length[4]', [
			'required'     => 'Tahun harus diisi!',
			'numeric'      => 'Tahun harus berupa angka!',
			'exact_length' => 'Tahun harus terdiri dari 4 angka!'
		]);
		$this->form_validation->set_rules('jumlah_halaman', 'Jumlah Halaman', 'required|numeric|max_length[3]', [
			'required'   => 'Jumlah halaman harus diisi!',
			'numeric'    => 'Jumlah halaman harus berupa angka!',
			'max_length' => 'Jumlah halaman maksimal 3 angka!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$data = [
				'judul'          => $this->input->post('judul'),
				'penulis'        => $this->input->post('penulis'),
				'penerbit'       => $this->input->post('penerbit'),
				'tahun'          => $this->input->post('tahun'),
				'jumlah_halaman' => $this->input->post('jumlah_halaman'),
			];

			// proses untuk insert ke tabel
			$insert = $this->buku->insertBuku($data);

			if ($insert) {
				$this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
			} else {
				$this->session->set_flashdata('error', 'Data gagal ditambahkan!');
			}

			redirect('buku');
		}
	}

	public function edit($id)
	{
		$buku = $this->buku->getBukuById($id);
		if (!$buku) {
			show_404();
		}

		$data = [
			'title' => 'Edit Buku',
			'page'  => 'buku/v_editBuku',
			'buku'  => $buku
		];

		$this->load->view('index', $data);
	}

	public function update()
	{
		$this->form_validation->set_rules('judul', 'Judul', 'required', [
			'required' => 'Judul harus diisi!'
		]);
		$this->form_validation->set_rules('penulis', 'Penulis', 'required', [
			'required' => 'Penulis harus diisi!'
		]);
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required', [
			'required' => 'Penerbit harus diisi!'
		]);
		$this->form_validation->set_rules('tahun', 'Tahun', 'required|numeric|exact_length[4]', [
			'required'     => 'Tahun harus diisi!',
			'numeric'      => 'Tahun harus berupa angka!',
			'exact_length' => 'Tahun harus terdiri dari 4 angka!'
		]);
		$this->form_validation->set_rules('jumlah_halaman', 'Jumlah Halaman', 'required|numeric|max_length[3]', [
			'required'   => 'Jumlah halaman harus diisi!',
			'numeric'    => 'Jumlah halaman harus berupa angka!',
			'max_length' => 'Jumlah halaman maksimal 3 angka!'
		]);

		$id = $this->input->post('id');

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = [
				'judul'          => $this->input->post('judul'),
				'penulis'        => $this->input->post('penulis'),
				'penerbit'       => $this->input->post('penerbit'),
				'tahun'          => $this->input->post('tahun'),
				'jumlah_halaman' => $this->input->post('jumlah_halaman'),
			];

			// proses update
			$update = $this->buku->updateBuku($id, $data);

			if ($update) {
				$this->session->set_flashdata('success', 'Data berhasil diubah!');
			} else {
				$this->session->set_flashdata('error', 'Data gagal diubah!');
			}

			redirect('buku');
		}
	}

	public function delete($id)
	{
		$delete = $this->buku->deleteBuku($id);

		if ($delete) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus!');
		} else {
			$this->session->set_flashdata('error', 'Data gagal dihapus!');
		}

		redirect('buku');
	}
}
