<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prediksi_DES_Bar extends CI_Controller
{
    public function __construct(){
		parent::__construct();
		if(! $this->session->userdata('id_admin')){
			redirect('Auth_admin');
		}elseif($this->session->userData('status')!= 'verified'){
            // redirect('JumlahPenumpang');
            echo "<script>;history.go(-1);</script>";
		}
    }
    
    public function index()
    {
        $kd_hlm = 'SECE';
        //prediksi perkategori perbulan dalam 1 tahun
        $this->load->view('prediksi/de_smoothing/bar/beranda', array('kd_hlm' => $kd_hlm));
    }

    public function menurut_blok1()
    {
        $tahun = 2019;
        $id_pintu = 1; //kabupaten
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_bar');
        $data = $this->m_prediksi_bar->get_data($id_pintu, $tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $data_MAPE = $this->m_prediksi_bar->get_data($id_pintu, $tahun);
        $this->load->model('m_akomodasi');
        $kabupaten = $this->m_akomodasi->get_kabupaten_query();
        $nama_kab = $this->m_akomodasi->get_nama_kabupaten($id_pintu);
        $this->load->view(
            'prediksi/de_smoothing/bar/menurut_wilayah',
            array(
                'data' => $data, 'tahun' =>$tahun,
                'data_MAPE' => $data_MAPE, 'kabupaten' => $kabupaten, 
                'nama_kab' => $nama_kab, 'id_pintu' => $id_pintu
            )
        );
    }

    public function cari_blok1()
    {
        $kd_hlm = 'SECE';
        $id_pintu = $this->input->post('id_kabupaten');
        $tahun = $this->input->post('tahun');
        if ($id_pintu != 0 && $tahun != 0) {
            $this->load->view('prediksi/de_smoothing/bar/beranda_wilayah', 
            array('kd_hlm' => $kd_hlm, 'id_pintu' => $id_pintu, 'tahun' => $tahun));
        } else {
            redirect('Prediksi_DES_Bar');
        }
    }

    public function hasil_cari_blok1($id_pintu, $tahun)
    {
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_bar');
        $data = $this->m_prediksi_bar->get_data($id_pintu, $tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $data_MAPE = $this->m_prediksi_bar->get_data($id_pintu, $tahun);
        $this->load->model('m_akomodasi');
        $kabupaten = $this->m_akomodasi->get_kabupaten_query();
        $nama_kab = $this->m_akomodasi->get_nama_kabupaten($id_pintu);
        $this->load->view(
            'prediksi/de_smoothing/bar/menurut_wilayah',
            array(
                'data' => $data, 'tahun' =>$tahun,
                'data_MAPE' => $data_MAPE, 'kabupaten' => $kabupaten, 
                'nama_kab' => $nama_kab, 'id_pintu' => $id_pintu
            )
        );
    }
    
    public function menurut_blok2()
    {
        $tahun = 2019;
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_bar');
        $data = $this->m_prediksi_bar->get_data_provinsi($tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $data_MAPE = $this->m_prediksi_bar->get_data_provinsi($tahun);
        $this->load->view(
            'prediksi/de_smoothing/bar/menurut_provinsi',
            array(
                'data' => $data, 'tahun' =>$tahun,
                'data_MAPE' => $data_MAPE
            )
        );
    }

    public function cari_blok2()
    {
        $kd_hlm = 'SECE';
        $tahun = $this->input->post('tahun');
        if ($tahun != 0) {
            $this->load->view('prediksi/de_smoothing/bar/beranda_provinsi', 
            array('kd_hlm' => $kd_hlm, 'tahun' => $tahun));
        } else {
            redirect('Prediksi_DES_Bar');
        }
    }

    public function hasil_cari_blok2($tahun)
    {
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_bar');
        $data = $this->m_prediksi_bar->get_data_provinsi($tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $data_MAPE = $this->m_prediksi_bar->get_data_provinsi($tahun);
        $this->load->view(
            'prediksi/de_smoothing/bar/menurut_provinsi',
            array(
                'data' => $data, 'tahun' =>$tahun,
                'data_MAPE' => $data_MAPE
            )
        );
    }
}
