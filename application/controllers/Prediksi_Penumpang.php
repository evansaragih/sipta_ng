<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prediksi_Penumpang extends CI_Controller
{
    public function index()
    {
        $kd_hlm = 'SFA1';
        //prediksi perkategori perbulan dalam 1 tahun
        $this->load->view('prediksi/dashboard/jumlah_penumpang/beranda', array('kd_hlm' => $kd_hlm));
    }

    public function menurut_blok1()
    {
        $tahun = 2018;
        $id_pintu = 1; //pintu_masuk
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_penumpang');
        $data = $this->m_prediksi_penumpang->get_data2($id_pintu, $tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $data_MAPE = $this->m_prediksi_penumpang->get_data2($id_pintu, $tahun);
        $this->load->model('m_pintu');
        $pintu_masuk = $this->m_pintu->get_pintu_query();
        $nama_pintu_masuk = $this->m_pintu->get_nama_pintu($id_pintu);
        $this->load->view(
            'prediksi/dashboard/jumlah_penumpang/menurut_kategori',
            array(
                'data' => $data, 'tahun' =>$tahun,
                'data_MAPE' => $data_MAPE, 'pintu_masuk' => $pintu_masuk, 
                'nama_pintu_masuk' => $nama_pintu_masuk, 'id_pintu' => $id_pintu
            )
        );
    }

    public function cari_blok1()
    {
        $kd_hlm = 'SFA1';
        $id_pintu = $this->input->post('id_pintu');
        $tahun = $this->input->post('tahun');
        if ($id_pintu != 0 && $tahun != 0) {
            $this->load->view('prediksi/dashboard/jumlah_penumpang/beranda_kategori', 
            array('kd_hlm' => $kd_hlm, 'id_pintu' => $id_pintu, 'tahun' => $tahun));
        } else {
            redirect('Prediksi_Penumpang');
        }
    }

    public function hasil_cari_blok1($id_pintu, $tahun)
    {
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_penumpang');
        $data = $this->m_prediksi_penumpang->get_data2($id_pintu, $tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $data_MAPE = $this->m_prediksi_penumpang->get_data2($id_pintu, $tahun);
        $this->load->model('m_pintu');
        $pintu_masuk = $this->m_pintu->get_pintu_query();
        $nama_pintu_masuk = $this->m_pintu->get_nama_pintu($id_pintu);
        $this->load->view(
            'prediksi/dashboard/jumlah_penumpang/menurut_kategori',
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
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_penumpang');
        $data = $this->m_prediksi_penumpang->get_data_tahun2($tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $data_MAPE = $this->m_prediksi_penumpang->get_data_tahun2($tahun);
        $this->load->view(
            'prediksi/dashboard/jumlah_penumpang/menurut_provinsi',
            array(
                'data' => $data, 'tahun' =>$tahun,
                'data_MAPE' => $data_MAPE
            )
        );
    }

    public function cari_blok2()
    {
        $kd_hlm = 'SFA1';
        $tahun = $this->input->post('tahun');
        if ($tahun != 0) {
            $this->load->view('prediksi/dashboard/jumlah_penumpang/beranda_provinsi', 
            array('kd_hlm' => $kd_hlm, 'tahun' => $tahun));
        } else {
            redirect('Prediksi_Penumpang');
        }
    }

    public function hasil_cari_blok2($tahun)
    {
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_penumpang');
        $data = $this->m_prediksi_penumpang->get_data_tahun2($tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $data_MAPE = $this->m_prediksi_penumpang->get_data_tahun2($tahun);
        $this->load->view(
            'prediksi/dashboard/jumlah_penumpang/menurut_provinsi',
            array(
                'data' => $data, 'tahun' =>$tahun,
                'data_MAPE' => $data_MAPE
            )
        );
    }
}