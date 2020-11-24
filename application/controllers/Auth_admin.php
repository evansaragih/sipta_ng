<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_admin extends CI_Controller {
	public function index(){
		$this->load->view('login');
	}

	public function cek_login(){
		$username = $this->input->post('val_username',true);
		$user_pass = $this->input->post('val_password',true);
		$this->load->model('m_login_admin');
		$cek = $this->m_login_admin->cek_db_admin($username,$user_pass);
	}

	public function logOut(){
		$this->session->sess_destroy();
		redirect('Auth_admin');
	}
}
?>