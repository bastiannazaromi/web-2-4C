<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Login extends CI_Model
{
	public function cekLogin($username, $password)
	{
		// Gunakan pencocokan case-sensitive untuk username
		$this->db->where('username LIKE binary', $username);

		// Ambil satu baris data user dari tabel 'user'
		$data = $this->db->get('user')->row();

		// Jika user ditemukan
		if ($data) {
			// Verifikasi password menggunakan hashing bawaan PHP
			if (password_verify($password, $data->password)) {
				// Buat array login untuk session
				$login = array(
					'is_logged_in' => true,
					'data'         => $data,
				);

				// Simpan data login ke session
				if ($login) {
					$this->session->set_userdata('user_login', $login);
					return 'sukses';
				}
			} else {
				// Jika password salah
				return 'Password Salah';
			}
		} else {
			// Jika username tidak ditemukan di database
			return 'Username tidak terdaftar';
		}
	}
}

/* End of file M_Login.php */
