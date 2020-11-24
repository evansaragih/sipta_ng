<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prediksi_SES_Wisman extends CI_Controller
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
        $kd_hlm = 'SEBB';
        //tapi tdk bisa memprediksi karena tidak ada pola
        $this->load->view('prediksi/se_smoothing/jumlah_wisman/beranda', array('kd_hlm' => $kd_hlm));
    }

    public function menurut_blok1()
    {
        $tahun = 2019;
        $id_grup = 1;
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_wisman');
        $data = $this->m_prediksi_wisman->get_data_tahun2($id_grup, $tahun_prediksi); //prediksi dalam 1 tahun
        $this->load->model('m_spt_jlh_wisman');
        $data_id_group = $this->m_spt_jlh_wisman->get_id_grup_kebangsaan_blok3($id_grup);
        $grup_kebangsaan = $this->m_spt_jlh_wisman->get_group_kebangsaan();
        $this->load->view(
            'prediksi/se_smoothing/jumlah_wisman/menurut_kategori',
            array(
                'data' => $data, 'tahun' =>$tahun, 'data_id_group' => $data_id_group, 
                'grup_kebangsaan' => $grup_kebangsaan, 'id_grup' => $id_grup
            )
        );
    }

    public function cari_blok1()
    {
        $kd_hlm = 'SEBB';
        $id_grup = $this->input->post('id_grup');
        $tahun = $this->input->post('tahun');
        if ($id_grup != 0 && $tahun != 0) {
            $this->load->view('prediksi/se_smoothing/jumlah_wisman/beranda_kategori', 
            array('kd_hlm' => $kd_hlm, 'id_grup' => $id_grup, 'tahun' => $tahun));
        } else {
            redirect('Prediksi_SES_Wisman');
        }
    }

    public function hasil_cari_blok1($id_grup, $tahun)
    {
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_wisman');
        $data = $this->m_prediksi_wisman->get_data_tahun2($id_grup, $tahun_prediksi); //prediksi dalam 1 tahun
        $this->load->model('m_spt_jlh_wisman');
        $data_id_group = $this->m_spt_jlh_wisman->get_id_grup_kebangsaan_blok3($id_grup);
        $grup_kebangsaan = $this->m_spt_jlh_wisman->get_group_kebangsaan();
        $this->load->view(
            'prediksi/se_smoothing/jumlah_wisman/menurut_kategori',
            array(
                'data' => $data, 'tahun' =>$tahun, 'data_id_group' => $data_id_group, 
                'grup_kebangsaan' => $grup_kebangsaan, 'id_grup' => $id_grup
            )
        );
    }
    
    public function menurut_blok2()
    {
        $tahun = 2019;
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_wisman');
        $data = $this->m_prediksi_wisman->get_data_tahun3($tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $this->load->view(
            'prediksi/se_smoothing/jumlah_wisman/menurut_provinsi',
            array(
                'data' => $data, 'tahun' =>$tahun,
            )
        );
    }

    public function cari_blok2()
    {
        $kd_hlm = 'SEBB';
        $tahun = $this->input->post('tahun');
        if ($tahun != 0) {
            $this->load->view('prediksi/se_smoothing/jumlah_wisman/beranda_provinsi', 
            array('kd_hlm' => $kd_hlm, 'tahun' => $tahun));
        } else {
            redirect('Prediksi_SES_Wisman');
        }
    }

    public function hasil_cari_blok2($tahun)
    {
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_wisman');
        $data = $this->m_prediksi_wisman->get_data_tahun3($tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $this->load->view(
            'prediksi/se_smoothing/jumlah_wisman/menurut_provinsi',
            array(
                'data' => $data, 'tahun' =>$tahun,
            )
        );
    }
}
