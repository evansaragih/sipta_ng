<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prediksi_DES_Wisman extends CI_Controller
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
        $kd_hlm = 'SECB1';
        //tapi tdk bisa memprediksi karena tidak ada pola
        $this->load->view('prediksi/de_smoothing/jumlah_wisman/beranda', array('kd_hlm' => $kd_hlm));
    }

    public function menurut_blok1()
    {
        $tahun = 2019;
        $id_grup = 1;
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_wisman');
        $data = $this->m_prediksi_wisman->get_data($id_grup, $tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $data_MAPE = $this->m_prediksi_wisman->get_data($id_grup, $tahun);
        $this->load->model('m_spt_jlh_wisman');
        $data_id_group = $this->m_spt_jlh_wisman->get_id_grup_kebangsaan_blok3($id_grup);
        $grup_kebangsaan = $this->m_spt_jlh_wisman->get_group_kebangsaan();
        $this->load->view(
            'prediksi/de_smoothing/jumlah_wisman/menurut_kategori',
            array(
                'data' => $data, 'tahun' => $tahun,
                'data_MAPE' => $data_MAPE, 'data_id_group' => $data_id_group,
                'grup_kebangsaan' => $grup_kebangsaan, 'id_grup' => $id_grup
            )
        );
    }

    public function cari_blok1()
    {
        $kd_hlm = 'SECB1';
        $id_grup = $this->input->post('id_grup');
        $tahun = $this->input->post('tahun');
        if ($id_grup != 0 && $tahun != 0) {
            $this->load->view(
                'prediksi/de_smoothing/jumlah_wisman/beranda_kategori',
                array('kd_hlm' => $kd_hlm, 'id_grup' => $id_grup, 'tahun' => $tahun)
            );
        } else {
            redirect('Prediksi_DES_Wisman');
        }
    }

    public function hasil_cari_blok1($id_grup, $tahun)
    {
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_wisman');
        $data = $this->m_prediksi_wisman->get_data($id_grup, $tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $data_MAPE = $this->m_prediksi_wisman->get_data($id_grup, $tahun);
        $this->load->model('m_spt_jlh_wisman');
        $data_id_group = $this->m_spt_jlh_wisman->get_id_grup_kebangsaan_blok3($id_grup);
        $grup_kebangsaan = $this->m_spt_jlh_wisman->get_group_kebangsaan();
        $this->load->model('m_spb_jlh_wisman');
        $bulan_1 = $this->m_spb_jlh_wisman->get_bulan1_tahun($id_grup, $tahun);
        $bulan_2 = $this->m_spb_jlh_wisman->get_bulan2_tahun($id_grup, $tahun);
        $bulan_3 = $this->m_spb_jlh_wisman->get_bulan3_tahun($id_grup, $tahun);
        $bulan_4 = $this->m_spb_jlh_wisman->get_bulan4_tahun($id_grup, $tahun);
        $bulan_5 = $this->m_spb_jlh_wisman->get_bulan5_tahun($id_grup, $tahun);
        $bulan_6 = $this->m_spb_jlh_wisman->get_bulan6_tahun($id_grup, $tahun);
        $bulan_7 = $this->m_spb_jlh_wisman->get_bulan7_tahun($id_grup, $tahun);
        $bulan_8 = $this->m_spb_jlh_wisman->get_bulan8_tahun($id_grup, $tahun);
        $bulan_9 = $this->m_spb_jlh_wisman->get_bulan9_tahun($id_grup, $tahun);
        $bulan_10 = $this->m_spb_jlh_wisman->get_bulan10_tahun($id_grup, $tahun);
        $bulan_11 = $this->m_spb_jlh_wisman->get_bulan11_tahun($id_grup, $tahun);
        $bulan_12 = $this->m_spb_jlh_wisman->get_bulan12_tahun($id_grup, $tahun);
        $this->load->view(
            'prediksi/de_smoothing/jumlah_wisman/menurut_kategori',
            array(
                'data' => $data, 'bulan_1' => $bulan_1, 'bulan_2' => $bulan_2, 'bulan_3' => $bulan_3,
                'bulan_4' => $bulan_4, 'bulan_5' => $bulan_5, 'bulan_6' => $bulan_6,
                'bulan_7' => $bulan_7, 'bulan_8' => $bulan_8, 'bulan_9' => $bulan_9,
                'bulan_10' => $bulan_10, 'bulan_11' => $bulan_11, 'bulan_12' => $bulan_12, 'tahun' => $tahun,
                'data_MAPE' => $data_MAPE, 'data_id_group' => $data_id_group,
                'grup_kebangsaan' => $grup_kebangsaan, 'id_grup' => $id_grup
            )
        );
    }

    public function menurut_blok2()
    {
        $tahun = 2019;
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_wisman');
        $data = $this->m_prediksi_wisman->get_data_tahun($tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $data_MAPE = $this->m_prediksi_wisman->get_data_tahun($tahun);
        $bulan_1 = $this->m_prediksi_wisman->get_bulan1_tahun($tahun);
        $bulan_2 = $this->m_prediksi_wisman->get_bulan2_tahun($tahun);
        $bulan_3 = $this->m_prediksi_wisman->get_bulan3_tahun($tahun);
        $bulan_4 = $this->m_prediksi_wisman->get_bulan4_tahun($tahun);
        $bulan_5 = $this->m_prediksi_wisman->get_bulan5_tahun($tahun);
        $bulan_6 = $this->m_prediksi_wisman->get_bulan6_tahun($tahun);
        $bulan_7 = $this->m_prediksi_wisman->get_bulan7_tahun($tahun);
        $bulan_8 = $this->m_prediksi_wisman->get_bulan8_tahun($tahun);
        $bulan_9 = $this->m_prediksi_wisman->get_bulan9_tahun($tahun);
        $bulan_10 = $this->m_prediksi_wisman->get_bulan10_tahun($tahun);
        $bulan_11 = $this->m_prediksi_wisman->get_bulan11_tahun($tahun);
        $bulan_12 = $this->m_prediksi_wisman->get_bulan12_tahun($tahun);
        $this->load->view(
            'prediksi/de_smoothing/jumlah_wisman/menurut_provinsi',
            array(
                'data' => $data, 'bulan_1' => $bulan_1, 'bulan_2' => $bulan_2, 'bulan_3' => $bulan_3,
                'bulan_4' => $bulan_4, 'bulan_5' => $bulan_5, 'bulan_6' => $bulan_6,
                'bulan_7' => $bulan_7, 'bulan_8' => $bulan_8, 'bulan_9' => $bulan_9,
                'bulan_10' => $bulan_10, 'bulan_11' => $bulan_11, 'bulan_12' => $bulan_12, 'tahun' => $tahun,
                'data_MAPE' => $data_MAPE
            )
        );
    }

    public function cari_blok2()
    {
        $kd_hlm = 'SECB1';
        $tahun = $this->input->post('tahun');
        if ($tahun != 0) {
            $this->load->view(
                'prediksi/de_smoothing/jumlah_wisman/beranda_provinsi',
                array('kd_hlm' => $kd_hlm, 'tahun' => $tahun)
            );
        } else {
            redirect('Prediksi_DES_Wisman');
        }
    }

    public function hasil_cari_blok2($tahun)
    {
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_wisman');
        $data = $this->m_prediksi_wisman->get_data_tahun($tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $data_MAPE = $this->m_prediksi_wisman->get_data_tahun($tahun);
        $bulan_1 = $this->m_prediksi_wisman->get_bulan1_tahun($tahun);
        $bulan_2 = $this->m_prediksi_wisman->get_bulan2_tahun($tahun);
        $bulan_3 = $this->m_prediksi_wisman->get_bulan3_tahun($tahun);
        $bulan_4 = $this->m_prediksi_wisman->get_bulan4_tahun($tahun);
        $bulan_5 = $this->m_prediksi_wisman->get_bulan5_tahun($tahun);
        $bulan_6 = $this->m_prediksi_wisman->get_bulan6_tahun($tahun);
        $bulan_7 = $this->m_prediksi_wisman->get_bulan7_tahun($tahun);
        $bulan_8 = $this->m_prediksi_wisman->get_bulan8_tahun($tahun);
        $bulan_9 = $this->m_prediksi_wisman->get_bulan9_tahun($tahun);
        $bulan_10 = $this->m_prediksi_wisman->get_bulan10_tahun($tahun);
        $bulan_11 = $this->m_prediksi_wisman->get_bulan11_tahun($tahun);
        $bulan_12 = $this->m_prediksi_wisman->get_bulan12_tahun($tahun);
        $this->load->view(
            'prediksi/de_smoothing/jumlah_wisman/menurut_provinsi',
            array(
                'data' => $data, 'bulan_1' => $bulan_1, 'bulan_2' => $bulan_2, 'bulan_3' => $bulan_3,
                'bulan_4' => $bulan_4, 'bulan_5' => $bulan_5, 'bulan_6' => $bulan_6,
                'bulan_7' => $bulan_7, 'bulan_8' => $bulan_8, 'bulan_9' => $bulan_9,
                'bulan_10' => $bulan_10, 'bulan_11' => $bulan_11, 'bulan_12' => $bulan_12, 'tahun' => $tahun,
                'data_MAPE' => $data_MAPE
            )
        );
    }
}
