<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		// Jika sudah login dan bukan sedang logout, redirect ke halaman 'buku'
		if (!empty($this->session->userdata('user_login'))) {
			if ($this->uri->segment(2) != 'logout') {
				$this->session->set_flashdata('error', 'Anda sudah login');
				redirect('buku', 'resfresh'); // (Typo: 'resfresh' harusnya 'refresh')
			}
		}

		// Load model M_Login dan beri alias 'login'
		$this->load->model('M_Login', 'login');
	}

	public function index()
	{
		// Menampilkan halaman login
		$data = [
			'title' => 'Halaman Login'
		];

		$this->load->view('login', $data);
	}

	public function proses()
	{
		// Validasi input username
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]', [
			'required'   => 'Username tidak boleh kosong !',
			'min_length' => 'Username kurang dari 5'
		]);

		// Validasi input password
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
			'required'   => 'Password harap di isi !',
			'min_length' => 'Password kurang dari 8'
		]);

		// Jika validasi gagal, tampilkan error dan redirect ke login
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('login', 'refresh');
		} else {
			// Ambil input dari form
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			// Cek login via model
			$cek = $this->login->cekLogin($username, $password);

			// Jika sukses, redirect ke halaman 'buku'
			if ($cek == 'sukses') {
				$this->session->set_flashdata('success', 'Login sukses');
				redirect('buku', 'refresh');
			} else {
				// Jika gagal, tampilkan error dan kembali ke login
				$this->session->set_flashdata('error', $cek);
				redirect('login', 'refresh');
			}
		}
	}

	public function logout()
	{
		// Hapus semua session dan redirect ke login
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}
}

/* End of file Login.php */
