<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prediksi_Restoran extends CI_Controller
{
    public function index()
    {
        $kd_hlm = 'SFD';
        //prediksi perkategori perbulan dalam 1 tahun
        $this->load->view('prediksi/dashboard/restoran/beranda', array('kd_hlm' => $kd_hlm));
    }

    public function menurut_blok1()
    {
        $tahun = 2020;
        $id_pintu = 1; //kabupaten
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_restoran');
        $data = $this->m_prediksi_restoran->get_data($id_pintu, $tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $data_MAPE = $this->m_prediksi_restoran->get_data($id_pintu, $tahun);
        $this->load->model('m_akomodasi');
        $kabupaten = $this->m_akomodasi->get_kabupaten_query();
        $nama_kab = $this->m_akomodasi->get_nama_kabupaten($id_pintu);
        $this->load->view(
            'prediksi/dashboard/restoran/menurut_wilayah',
            array(
                'data' => $data, 'tahun' => $tahun,
                'data_MAPE' => $data_MAPE, 'kabupaten' => $kabupaten,
                'nama_kab' => $nama_kab, 'id_pintu' => $id_pintu
            )
        );
    }

    public function cari_blok1()
    {
        $kd_hlm = 'SFD';
        $id_pintu = $this->input->post('id_kabupaten');
        $tahun = $this->input->post('tahun');
        if ($id_pintu != 0 && $tahun != 0) {
            $this->load->view(
                'prediksi/dashboard/restoran/beranda_wilayah',
                array('kd_hlm' => $kd_hlm, 'id_pintu' => $id_pintu, 'tahun' => $tahun)
            );
        } else {
            redirect('Prediksi_Restoran');
        }
    }

    public function hasil_cari_blok1($id_pintu, $tahun)
    {
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_restoran');
        $data = $this->m_prediksi_restoran->get_data($id_pintu, $tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $data_MAPE = $this->m_prediksi_restoran->get_data($id_pintu, $tahun);
        $this->load->model('m_akomodasi');
        $kabupaten = $this->m_akomodasi->get_kabupaten_query();
        $nama_kab = $this->m_akomodasi->get_nama_kabupaten($id_pintu);
        $this->load->view(
            'prediksi/dashboard/restoran/menurut_wilayah',
            array(
                'data' => $data, 'tahun' => $tahun,
                'data_MAPE' => $data_MAPE, 'kabupaten' => $kabupaten,
                'nama_kab' => $nama_kab, 'id_pintu' => $id_pintu
            )
        );
    }

    public function menurut_blok2()
    {
        $tahun = 2020;
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_restoran');
        $data = $this->m_prediksi_restoran->get_data_provinsi($tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $data_MAPE = $this->m_prediksi_restoran->get_data_provinsi($tahun);
        $this->load->view(
            'prediksi/dashboard/restoran/menurut_provinsi',
            array(
                'data' => $data, 'tahun' => $tahun,
                'data_MAPE' => $data_MAPE
            )
        );
    }

    public function cari_blok2()
    {
        $kd_hlm = 'SFD';
        $tahun = $this->input->post('tahun');
        if ($tahun != 0) {
            $this->load->view(
                'prediksi/dashboard/restoran/beranda_provinsi',
                array('kd_hlm' => $kd_hlm, 'tahun' => $tahun)
            );
        } else {
            redirect('Prediksi_Restoran');
        }
    }

    public function hasil_cari_blok2($tahun)
    {
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_restoran');
        $data = $this->m_prediksi_restoran->get_data_provinsi($tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $data_MAPE = $this->m_prediksi_restoran->get_data_provinsi($tahun);
        $this->load->view(
            'prediksi/dashboard/restoran/menurut_provinsi',
            array(
                'data' => $data, 'tahun' => $tahun,
                'data_MAPE' => $data_MAPE
            )
        );
    }
}