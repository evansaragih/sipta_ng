<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prediksi_TinjauRegion extends CI_Controller
{
    public function index()
    {
        $kd_hlm = 'SFG';
        // $tahun = date('Y') - 1;
        $tahun = 2021;
        $kab = 1; //kabupaten
        $this->load->model('m_akomodasi');
        $kabupaten = $this->m_akomodasi->get_kabupaten_query();
        $this->load->view(
            'prediksi/tinjau_region/beranda',
            array('kd_hlm' => $kd_hlm, 'kabupaten' => $kabupaten, 'tahun' => $tahun, 'kab' => $kab)
        );
    }

    public function menurut_blok1() //restoran
    {
        $tahun = 2021;
        $kab = 1; //kategori akomodasi
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_akomodasi');
        $data = $this->m_prediksi_akomodasi->get_data($kab, $tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $this->load->model('m_akomodasi');
        $pintu_masuk = $this->m_akomodasi->get_kategori_query();
        $nama_pintu_masuk = $this->m_akomodasi->get_nama_kategori($kab);
        $this->load->view(
            'prediksi/tinjau_region/akomodasi',
            array(
                'data' => $data, 'tahun' => $tahun, 'pintu_masuk' => $pintu_masuk,
                'nama_pintu_masuk' => $nama_pintu_masuk, 'kab' => $kab
            )
        );
    }

    public function cari_region() //restoran
    {
        $kd_hlm = 'SFG';
        $kab = $this->input->post('kabupaten');
        $tahun = $this->input->post('tahun');
        $this->load->model('m_akomodasi');
        $kabupaten = $this->m_akomodasi->get_kabupaten_query();
        $nama_kab = $this->m_akomodasi->get_nama_kabupaten($kab);
        if ($kab != 0 && $tahun != 0) {
            $this->load->view(
                'prediksi/tinjau_region/beranda_pencarian',
                array(
                    'kd_hlm' => $kd_hlm, 'kab' => $kab, 'tahun' => $tahun, 'kabupaten' => $kabupaten,
                    'nama_kab' => $nama_kab,
                )
            );
        } else {
            redirect('Prediksi_TinjauRegion');
        }
    }

    public function hasil_cari_blok1($tahun, $kab) //restoran
    {
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_akomodasi');
        $data = $this->m_prediksi_akomodasi->get_data($kab, $tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $this->load->view(
            'prediksi/tinjau_region/akomodasi',
            array(
                'data' => $data, 'tahun' => $tahun
            )
        );
    }

    public function menurut_blok2() //restoran
    {
        $kab = 1;
        $tahun = 2021;
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_restoran');
        $data = $this->m_prediksi_restoran->get_data($kab, $tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        // $data_MAPE = $this->m_prediksi_restoran->get_data($id_pintu, $tahun);
        $this->load->view(
            'prediksi/tinjau_region/restoran',
            array(
                'data' => $data, 'tahun' => $tahun, 'kab' => $kab
            )
        );
    }

    public function hasil_cari_blok2($tahun, $kab) //restoran
    {
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_restoran');
        $data = $this->m_prediksi_restoran->get_data($kab, $tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $this->load->view(
            'prediksi/tinjau_region/restoran',
            array(
                'data' => $data, 'tahun' => $tahun, 'kab' => $kab
            )
        );
    }

    public function menurut_blok3() //restoran
    {
        $tahun = 2020;
        $kab = 1; //kabupaten
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_objek_wisata');
        $data = $this->m_prediksi_objek_wisata->get_data($kab, $tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $this->load->view(
            'prediksi/tinjau_region/objek_wisata',
            array(
                'data' => $data, 'tahun' => $tahun, 'kab' => $kab
            )
        );
    }

    public function hasil_cari_blok3($tahun, $kab) //restoran
    {
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_objek_wisata');
        $data = $this->m_prediksi_objek_wisata->get_data($kab, $tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $this->load->view(
            'prediksi/tinjau_region/objek_wisata',
            array(
                'data' => $data, 'tahun' => $tahun, 'kab' => $kab
            )
        );
    }

    public function menurut_blok4() //bar
    {
        $tahun = 2021;
        $kab = 1; //kabupaten
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_bar');
        $data = $this->m_prediksi_bar->get_data($kab, $tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $this->load->view(
            'prediksi/tinjau_region/bar',
            array(
                'data' => $data, 'tahun' => $tahun, 'kab' => $kab
            )
        );
    }

    public function hasil_cari_blok4($tahun, $kab) //bar
    {
        $tahun_prediksi = $tahun - 1;
        $this->load->model('m_prediksi_bar');
        $data = $this->m_prediksi_bar->get_data($kab, $tahun_prediksi); //prediksi perkategori perbulan dalam 1 tahun
        $this->load->view(
            'prediksi/tinjau_region/bar',
            array(
                'data' => $data, 'tahun' => $tahun, 'kab' => $kab
            )
        );
    }
}
