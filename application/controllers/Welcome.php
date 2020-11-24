<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$this->load->model('m_akomodasi');
        $data_akomodasi = $this->m_akomodasi->getData();
        $this->load->view('statistik_pariwisata/akomodasi/beranda', array('data_akomodasi' => $data_akomodasi));
	}
	public function test()
	{
		$this->load->view('jumlah_penumpang/data');
	}
	public function test2()
	{
		$this->load->view('login');
	}
	// public function login()
	// {
	// 	//validasi_form
	// 	$this->form_validation->set_rules('username','','required');
	// 	$this->form_validation->set_rules('password','','required');

	// 	$recaptcha = $this->input->post('g-recaptcha-response');
	// 	$response = $this->recaptcha->verifyResponse($recaptcha);

	// 	if($this->form_validation->run()==FALSE || !isset($response['success']) || $response['success']<>true){
	// 		$this->index();
	// 	}else{
	// 		redirect('data');
	// 	}
	// }
	public function checkLogin(){
		$username = $this->input->post('val_username',true);
		$user_pass = $this->input->post('val_password',true);
		$this->load->model('m_login');
		$this->m_login->cek_user($username,$user_pass); //cek email,pass user dan admin
	}
}
