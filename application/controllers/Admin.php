<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (empty($this->session->userdata('user_login'))) {
			$this->session->set_flashdata('error', 'Anda belum login');

			redirect('login', 'refresh');
		}
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'page'  => 'admin/dashboard'
		];

		$this->load->view('layout/index', $data);
	}
}
