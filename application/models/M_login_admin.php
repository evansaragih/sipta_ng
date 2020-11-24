<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_login_admin extends CI_Model
{

	public function cek_db_admin($username, $user_pass)
	{
		$this->db->where('username', $username);
		$this->db->where('password', md5($user_pass));
		$cek = $this->db->get('admin');
		if ($cek->num_rows() > 0) {
			foreach ($cek->result() as $row) {
				$sess = array(
					'id_admin' => $row->id,
					'nama' => $row->nama,
					'nip' => $row->nip,
					'jenis_kelamin' => $row->jenis_kelamin,
					'type' => $row->type,
					'status' => $row->status,
					'foto_profil' => $row->foto_profil,
					'username'	=> $row->username,
					'password' => $row->password
				);
				$this->session->set_userdata($sess);
			}
			$this->session->get_userdata($sess);
			if ($this->session->userdata('status') != 'verified') {
				redirect('Auth_admin'); //kembali ke halaman login
			} elseif ($this->session->userdata('status') == 'verified') {
				redirect('Home'); //masuk ke halaman beranda admin
			}
		} else {
			$this->session->set_flashdata('info', 'Maaf Username atau Password Salah');
			redirect('Auth_admin'); //halaman login mitra
		}
	}
}
