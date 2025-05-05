<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (empty($this->session->userdata('user_login'))) {
			$this->session->set_flashdata('error', 'Anda belum login');

			redirect('login', 'refresh');
		}

		$this->load->model('M_User', 'user');
	}

	public function index()
	{
		$data = [
			'title'   => 'List User',
			'page'    => 'user/v_user',
			'user' => $this->user->getAllUser()
		];

		$this->load->view('layout/index', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Tambah User',
			'page'  => 'user/v_addUser'
		];

		$this->load->view('layout/index', $data);
	}

	public function postAdd()
	{
		$this->form_validation->set_rules('nama', 'Nama User', 'required', [
			'required' => 'Nama user harus diisi!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]', [
			'required'    => 'Email harus diisi!',
			'valid_email' => 'Email tidak valid!',
			'is_unique'   => 'Email sudah terdaftar!'
		]);
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]', [
			'required' => 'Username harus diisi!',
			'is_unique' => 'Username sudah terdaftar!'
		]);
		$this->form_validation->set_rules('tahun', 'Tahun Lahir', 'required|numeric|exact_length[4]', [
			'required'     => 'Tanggal lahir harus diisi!',
			'numeric'      => 'Tanggal lahir harus berupa angka!',
			'exact_length' => 'Tanggal lahir harus terdiri dari 4 angka!'
		]);
		$this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required|numeric|min_length[10]|max_length[13]', [
			'required'     => 'Nomor handphone harus diisi!',
			'numeric'      => 'Nomor handphone harus berupa angka!',
			'min_length'   => 'Nomor handphone minimal terdiri dari 10 angka!',
			'max_length'   => 'Nomor handphone maksimal terdiri dari 13 angka!'
		]);
		$this->form_validation->set_rules('role', 'Role User', 'required|numeric', [
			'required' => 'Role user harus dipilih!',
			'numeric'  => 'Role user harus berupa angka!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$data = [
				'nama'     => $this->input->post('nama'),
				'email'    => $this->input->post('email'),
				'username' => str_replace(' ', '', $this->input->post('username')),
				'password' => password_hash('12345678', PASSWORD_BCRYPT),
				'tahun'    => $this->input->post('tahun'),
				'no_hp'    => $this->input->post('no_hp'),
				'role'     => $this->input->post('role')
			];

			// proses untuk insert ke tabel
			$insert = $this->user->insertUser($data);

			if ($insert) {
				$this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
			} else {
				$this->session->set_flashdata('error', 'Data gagal ditambahkan!');
			}

			redirect('user', 'refresh');
		}
	}

	public function edit($id)
	{
		$user = $this->user->getUserById($id);
		if (!$user) {
			show_404();
		}

		$data = [
			'title' => 'Edit User',
			'page'  => 'user/v_editUser',
			'user'  => $user
		];

		$this->load->view('layout/index', $data);
	}

	public function update()
	{
		$this->form_validation->set_rules('nama', 'Nama User', 'required', [
			'required' => 'Nama user harus diisi!'
		]);

		$id  = $this->input->post('id');
		$old = $this->user->getUserById($id);

		if ($this->input->post('email') != $old->email) {
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]', [
				'required'    => 'Email harus diisi!',
				'valid_email' => 'Email tidak valid!',
				'is_unique'   => 'Email sudah terdaftar!'
			]);
		} else {
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email', [
				'required'    => 'Email harus diisi!',
				'valid_email' => 'Email tidak valid!'
			]);
		}

		if ($this->input->post('username') != $old->username) {
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]', [
				'required'  => 'Username harus diisi!',
				'is_unique' => 'Username sudah terdaftar!'
			]);
		} else {
			$this->form_validation->set_rules('username', 'Username', 'required', [
				'required' => 'Username harus diisi!'
			]);
		}
		$this->form_validation->set_rules('tahun', 'Tahun Lahir', 'required|numeric|exact_length[4]', [
			'required'     => 'Tanggal lahir harus diisi!',
			'numeric'      => 'Tanggal lahir harus berupa angka!',
			'exact_length' => 'Tanggal lahir harus terdiri dari 4 angka!'
		]);
		$this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required|numeric|min_length[10]|max_length[13]', [
			'required'     => 'Nomor handphone harus diisi!',
			'numeric'      => 'Nomor handphone harus berupa angka!',
			'min_length'   => 'Nomor handphone minimal terdiri dari 10 angka!',
			'max_length'   => 'Nomor handphone maksimal terdiri dari 13 angka!'
		]);
		$this->form_validation->set_rules('role', 'Role User', 'required|numeric', [
			'required' => 'Role user harus dipilih!',
			'numeric'  => 'Role user harus berupa angka!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = [
				'nama'     => $this->input->post('nama'),
				'email'    => $this->input->post('email'),
				'username' => str_replace(' ', '', $this->input->post('username')),
				'tahun'    => $this->input->post('tahun'),
				'no_hp'    => $this->input->post('no_hp'),
				'role'     => $this->input->post('role')
			];

			// proses update
			$update = $this->user->updateUser($id, $data);

			if ($update) {
				$this->session->set_flashdata('success', 'Data berhasil diubah!');
			} else {
				$this->session->set_flashdata('error', 'Data gagal diubah!');
			}

			redirect('user');
		}
	}

	public function delete($id)
	{
		$delete = $this->user->deleteUser($id);

		if ($delete) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus!');
		} else {
			$this->session->set_flashdata('error', 'Data gagal dihapus!');
		}

		redirect('user');
	}
}
