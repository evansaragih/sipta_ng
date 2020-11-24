<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prediksi_RL_Akomodasi extends CI_Controller
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
        $kd_hlm = 'SEAC1';
        //prediksi perkategori perbulan dalam 1 tahun
        $this->load->view('prediksi/regresi_linear/akomodasi/beranda', array('kd_hlm' => $kd_hlm));
    }

    public function menurut_blok1()
    {
        $tahun = 2018;
        $id_pintu = 1; //kategori akomodasi
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_akomodasi');
        $data = $this->m_prediksi_akomodasi->get_data($id_pintu, $tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $data_MAPE = $this->m_prediksi_akomodasi->get_data($id_pintu, $tahun);
        $this->load->model('m_akomodasi');
        $pintu_masuk = $this->m_akomodasi->get_kategori_query();
        $nama_pintu_masuk = $this->m_akomodasi->get_nama_kategori($id_pintu);
        $this->load->view(
            'prediksi/regresi_linear/akomodasi/menurut_kategori',
            array(
                'data' => $data, 'tahun' =>$tahun,
                'data_MAPE' => $data_MAPE, 'pintu_masuk' => $pintu_masuk, 
                'nama_pintu_masuk' => $nama_pintu_masuk, 'id_pintu' => $id_pintu
            )
        );
    }

    public function cari_blok1()
    {
        $kd_hlm = 'SEAC1';
        $id_pintu = $this->input->post('id_pintu');
        $tahun = $this->input->post('tahun');
        if ($id_pintu != 0 && $tahun != 0) {
            $this->load->view('prediksi/regresi_linear/akomodasi/beranda_kategori', 
            array('kd_hlm' => $kd_hlm, 'id_pintu' => $id_pintu, 'tahun' => $tahun));
        } else {
            redirect('Prediksi_Akomodasi');
        }
    }

    public function hasil_cari_blok1($id_pintu, $tahun)
    {
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_akomodasi');
        $data = $this->m_prediksi_akomodasi->get_data($id_pintu, $tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $data_MAPE = $this->m_prediksi_akomodasi->get_data($id_pintu, $tahun);
        $this->load->model('m_akomodasi');
        $pintu_masuk = $this->m_akomodasi->get_kategori_query();
        $nama_pintu_masuk = $this->m_akomodasi->get_nama_kategori($id_pintu);
        $this->load->view(
            'prediksi/regresi_linear/akomodasi/menurut_kategori',
            array(
                'data' => $data, 'tahun' =>$tahun,
                'data_MAPE' => $data_MAPE, 'pintu_masuk' => $pintu_masuk, 
                'nama_pintu_masuk' => $nama_pintu_masuk, 'id_pintu' => $id_pintu
            )
        );
    }
    
    public function menurut_blok2()
    {
        $tahun = 2018;
        $id_pintu = 1; //id_kategori
        $kab = 1; //kabupaten
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_akomodasi');
        $data = $this->m_prediksi_akomodasi->get_data_wilayah($id_pintu, $tahun_prediksi, $kab); //prediksi perkategori perbulan dalam 1 tahun
        $data_MAPE = $this->m_prediksi_akomodasi->get_data_wilayah($id_pintu, $tahun, $kab);
        $this->load->model('m_akomodasi');
        $pintu_masuk = $this->m_akomodasi->get_kategori_query();
        $nama_pintu_masuk = $this->m_akomodasi->get_nama_kategori($id_pintu);
        $kabupaten = $this->m_akomodasi->get_kabupaten_query();
        $nama_kab = $this->m_akomodasi->get_nama_kabupaten($kab);
        $this->load->view(
            'prediksi/regresi_linear/akomodasi/menurut_wilayah',
            array(
                'data' => $data, 'tahun' =>$tahun,
                'data_MAPE' => $data_MAPE, 'pintu_masuk' => $pintu_masuk, 'kab' => $kab, 'nama_kab' => $nama_kab,
                'nama_pintu_masuk' => $nama_pintu_masuk, 'id_pintu' => $id_pintu, 'kabupaten' => $kabupaten
            )
        );
    }

    public function cari_blok2()
    {
        $kd_hlm = 'SEAC1';
        $id_pintu = $this->input->post('id_pintu');
        $tahun = $this->input->post('tahun');
        $kab = $this->input->post('id_kabupaten');
        if ($id_pintu != 0 && $tahun != 0) {
            $this->load->view('prediksi/regresi_linear/akomodasi/beranda_wilayah', 
            array('kd_hlm' => $kd_hlm, 'id_pintu' => $id_pintu, 'tahun' => $tahun, 'kab' => $kab));
        } else {
            redirect('Prediksi_Akomodasi');
        }
    }

    public function hasil_cari_blok2($id_pintu, $tahun, $kab)
    {
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_akomodasi');
        $data = $this->m_prediksi_akomodasi->get_data_wilayah($id_pintu, $tahun_prediksi, $kab); //prediksi perkategori perbulan dalam 1 tahun
        $data_MAPE = $this->m_prediksi_akomodasi->get_data_wilayah($id_pintu, $tahun, $kab);
        $this->load->model('m_akomodasi');
        $pintu_masuk = $this->m_akomodasi->get_kategori_query();
        $nama_pintu_masuk = $this->m_akomodasi->get_nama_kategori($id_pintu);
        $kabupaten = $this->m_akomodasi->get_kabupaten_query();
        $nama_kab = $this->m_akomodasi->get_nama_kabupaten($kab);
        $this->load->view(
            'prediksi/regresi_linear/akomodasi/menurut_wilayah',
            array(
                'data' => $data, 'tahun' =>$tahun,
                'data_MAPE' => $data_MAPE, 'pintu_masuk' => $pintu_masuk, 'kab' => $kab, 'nama_kab' => $nama_kab,
                'nama_pintu_masuk' => $nama_pintu_masuk, 'id_pintu' => $id_pintu, 'kabupaten' => $kabupaten
            )
        );
    }

    public function menurut_blok3()
    {
        $tahun = 2018;
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_akomodasi');
        $data = $this->m_prediksi_akomodasi->get_data_provinsi($tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $data_MAPE = $this->m_prediksi_akomodasi->get_data_provinsi($tahun);
        $this->load->view(
            'prediksi/regresi_linear/akomodasi/menurut_provinsi',
            array(
                'data' => $data, 'tahun' =>$tahun,
                'data_MAPE' => $data_MAPE
            )
        );
    }

    public function cari_blok3()
    {
        $kd_hlm = 'SEAC1';
        $tahun = $this->input->post('tahun');
        if ($tahun != 0) {
            $this->load->view('prediksi/regresi_linear/akomodasi/beranda_provinsi', 
            array('kd_hlm' => $kd_hlm, 'tahun' => $tahun));
        } else {
            redirect('Prediksi_Akomodasi');
        }
    }

    public function hasil_cari_blok3($tahun)
    {
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_akomodasi');
        $data = $this->m_prediksi_akomodasi->get_data_provinsi($tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $data_MAPE = $this->m_prediksi_akomodasi->get_data_provinsi($tahun);
        $this->load->view(
            'prediksi/regresi_linear/akomodasi/menurut_provinsi',
            array(
                'data' => $data, 'tahun' =>$tahun,
                'data_MAPE' => $data_MAPE
            )
        );
    }
}
