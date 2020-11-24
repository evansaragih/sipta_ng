<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_admin')) {
			redirect('Auth_mitra');
		} elseif ($this->session->userdata('status')!= 'verified') {
			// redirect('JumlahPenumpang');
			echo "<script>;history.go(-1);</script>";
		}
	}

	public function index()
	{
		$kd_hlm = 'SA1';
		$id_admin = $this->session->userdata('id_admin');
		$this->load->model('m_profil');
		$data_admin = $this->m_profil->getData($id_admin);
		$this->load->view('profil/beranda', array('data_admin' => $data_admin,'kd_hlm' => $kd_hlm));
	}

	public function updateData()
	{
		$nip = $_POST['nip-edit'];
		$nama = $_POST['nama-edit'];
		$jenis_kelamin = $_POST['gender-edit'];
		$username = $_POST['username-edit'];
		$id_admin = $this->session->userdata('id_admin');
		date_default_timezone_set('Asia/Singapore');
		$tanggal = date("Y-m-d H:i:s");
		$data_update = array(
			"nip" => $nip,
			"nama" => $nama,
			"jenis_kelamin" => $jenis_kelamin,
			"username" => $username,
			"updated_at" => $tanggal
		);
		$this->load->model('m_profil');
		$cek_data = $this->m_profil->cekData($id_admin);
		if ($cek_data == 0) {
			$this->session->set_flashdata('failed', 'Gagal Menghapus Data');
		} else {
			$this->db->where('id_admin', $id_admin);
			$res = $this->db->update('tb_admin', $data_update);
			if ($res > 0) {
				$this->session->set_flashdata('success_profil', 'Data Berhasil Di Update');
			} else {
				$this->session->set_flashdata('error_msg', 'Gagal Mengupdate Data');
			}
		}
		redirect(base_url('Profil'));
	}

	public function updatePass()
	{
		$password = md5($_POST['password-add']);
		$password_new = md5($_POST['password_new-add']);
		$id_admin = $this->session->userdata('id_admin');
		date_default_timezone_set('Asia/Singapore');
		$tanggal = date("Y-m-d H:i:s");
		$data_update = array(
			"password" => $password_new,
			"updated_at" => $tanggal
		);
		$this->load->model('m_profil');
		$cek_data = $this->m_profil->cekPass($password, $id_admin);
		if ($cek_data == 0) {
			$this->session->set_flashdata('failed', 'Gagal Menghapus Data');
		} else {
			$this->db->where('id_admin', $id_admin);
			$res = $this->db->update('tb_admin', $data_update);
			if ($res > 0) {
				$this->session->set_flashdata('success_password', 'Data Berhasil Di Update');
			} else {
				$this->session->set_flashdata('error_msg', 'Gagal Mengupdate Data');
			}
		}
		redirect(base_url('Profil'));
	}

	public function updatePhoto()
	{
		$config['upload_path']          = 'assets/upload';
		$config['allowed_types']        = 'gif|jpg|png';
		$this->load->library('upload', $config);
		$id_admin = $this->session->userdata('id_admin');
		date_default_timezone_set('Asia/Singapore');
		$tanggal = date("Y-m-d H:i:s");

		if (!$this->upload->do_upload('file')) //jika gagal upload
		{
			$error = $this->upload->display_errors();
			echo "<script>alert('$error');history.go(-1);</script>";
		} else {
			$upload_data = $this->upload->data();
			$image = $upload_data['file_name'];
			$data_update = array(
				"foto_profil" => $this->input->post('file'),
				"foto_profil" => $image,
				"updated_at" => $tanggal
			);
		}

		$this->db->where('id_admin', $id_admin);
		$res = $this->db->update('tb_admin', $data_update);
		if ($res > 0) {
			$this->session->set_flashdata('success_photo', 'Data Berhasil Di Update');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal Mengupdate Data');
		}
		redirect(base_url('Profil'));
	}
}
