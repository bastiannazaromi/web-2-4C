<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penulis extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (empty($this->session->userdata('user_login'))) {
			$this->session->set_flashdata('error', 'Anda belum login');

			redirect('login', 'refresh');
		}

		$this->load->model('M_Penulis', 'penulis');
	}

	public function index()
	{
		$data = [
			'title'   => 'Penulis',
			'page'    => 'penulis/v_penulis',
			'penulis' => $this->penulis->getAllPenulis()
		];

		$this->load->view('layout/index', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Tambah Penulis',
			'page'  => 'penulis/v_addPenulis'
		];

		$this->load->view('layout/index', $data);
	}

	public function postAdd()
	{
		$this->form_validation->set_rules('nama', 'Nama Penulis', 'required', [
			'required' => 'Nama penulis harus diisi!'
		]);
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required', [
			'required' => 'Tanggal lahir harus diisi!'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', [
			'required' => 'Alamat harus diisi!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$data = [
				'nama'          => $this->input->post('nama'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'alamat'        => $this->input->post('alamat')
			];

			// proses untuk insert ke tabel
			$insert = $this->penulis->insertPenulis($data);

			if ($insert) {
				$this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
			} else {
				$this->session->set_flashdata('error', 'Data gagal ditambahkan!');
			}

			redirect('penulis', 'refresh');
		}
	}

	public function edit($id)
	{
		$penulis = $this->penulis->getPenulisById($id);
		if (!$penulis) {
			show_404();
		}

		$data = [
			'title'   => 'Edit Penulis',
			'page'    => 'penulis/v_editPenulis',
			'penulis' => $penulis
		];

		$this->load->view('layout/index', $data);
	}

	public function update()
	{
		$this->form_validation->set_rules('nama', 'Nama Penulis', 'required', [
			'required' => 'Nama penulis harus diisi!'
		]);
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required', [
			'required' => 'Tanggal lahir harus diisi!'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', [
			'required' => 'Alamat harus diisi!'
		]);

		$id = $this->input->post('id');

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = [
				'nama'          => $this->input->post('nama'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'alamat'        => $this->input->post('alamat')
			];

			// proses update
			$update = $this->penulis->updatePenulis($id, $data);

			if ($update) {
				$this->session->set_flashdata('success', 'Data berhasil diubah!');
			} else {
				$this->session->set_flashdata('error', 'Data gagal diubah!');
			}

			redirect('penulis');
		}
	}

	public function delete($id)
	{
		$delete = $this->penulis->deletePenulis($id);

		if ($delete) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus!');
		} else {
			$this->session->set_flashdata('error', 'Data gagal dihapus!');
		}

		redirect('penulis');
	}
}
