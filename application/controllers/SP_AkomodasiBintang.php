<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SP_AkomodasiBintang extends CI_Controller
{
    public function index()
    {
        $kd_hlm = 'SDC2';
        $this->load->view('statistik_pariwisata/akomodasi_bintang/beranda', array('kd_hlm' => $kd_hlm));
    }

    public function menurut_kategori()
    {
        $kab = 1;
        $tahun = 2018;
        $this->load->model('m_akomodasi');
        $kabupaten = $this->m_akomodasi->get_kabupaten_query();
        $this->load->model('m_sp_akomodasi_bintang');
        $data_akomodasi = $this->m_sp_akomodasi_bintang->get_menurut_kategori($kab, $tahun);
        $nama_kabupaten = $this->m_sp_akomodasi_bintang->get_nama_kabupaten($kab);
        $this->load->view('statistik_pariwisata/akomodasi_bintang/menurut_kategori', array(
            'kabupaten' => $kabupaten,
            'data_akomodasi' => $data_akomodasi,
            'nama_kabupaten' => $nama_kabupaten, 'tahun' => $tahun, 'kab' => $kab
        ));
    }

    public function cari_kategori()
    {
        $kd_hlm = 'SDC2';
        $kab = $this->input->post('id_kabupaten');
        $tahun = $this->input->post('tahun');
        if ($kab != 0 && $tahun != 0) {
            $this->load->view('statistik_pariwisata/akomodasi_bintang/beranda_kategori', array('kd_hlm' => $kd_hlm, 'kab' => $kab, 'tahun' => $tahun));
        } else {
            redirect('SP_AkomodasiBintang');
        }
    }

    public function hasil_cari_kategori($kab, $tahun)
    {
        $this->load->model('m_akomodasi');
        $kabupaten = $this->m_akomodasi->get_kabupaten_query();
        $this->load->model('m_sp_akomodasi_bintang');
        $data_akomodasi = $this->m_sp_akomodasi_bintang->get_menurut_kategori($kab, $tahun);
        $nama_kabupaten = $this->m_sp_akomodasi_bintang->get_nama_kabupaten($kab);
        $this->load->view('statistik_pariwisata/akomodasi_bintang/menurut_kategori', array(
            'kabupaten' => $kabupaten,
            'data_akomodasi' => $data_akomodasi,
            'nama_kabupaten' => $nama_kabupaten, 'tahun' => $tahun, 'kab' => $kab
        ));
    }

    public function menurut_wilayah()
    {
        $kat = 1;
        $tahun = 2018;
        $this->load->model('m_sp_akomodasi_bintang');
        // $id_kategori = $this->m_sp_akomodasi_bintang->get_kategori_query();
        $data_akomodasi = $this->m_sp_akomodasi_bintang->get_menurut_wilayah($kat, $tahun);
        // $kat_akomodasi = $this->m_sp_akomodasi_bintang->get_kat_akomodasi($kat);
        $kab_denpasar = $this->m_sp_akomodasi_bintang->get_kab_denpasar($tahun, $kat);
        $kab_badung = $this->m_sp_akomodasi_bintang->get_kab_badung($tahun, $kat);
        $kab_bangli = $this->m_sp_akomodasi_bintang->get_kab_bangli($tahun, $kat);
        $kab_buleleng = $this->m_sp_akomodasi_bintang->get_kab_buleleng($tahun, $kat);
        $kab_gianyar = $this->m_sp_akomodasi_bintang->get_kab_gianyar($tahun, $kat);
        $kab_jembrana = $this->m_sp_akomodasi_bintang->get_kab_jembrana($tahun, $kat);
        $kab_klungkung = $this->m_sp_akomodasi_bintang->get_kab_klungkung($tahun, $kat);
        $kab_karangasem = $this->m_sp_akomodasi_bintang->get_kab_karangasem($tahun, $kat);
        $kab_tabanan = $this->m_sp_akomodasi_bintang->get_kab_tabanan($tahun, $kat);
        $nilai_max = $this->m_sp_akomodasi_bintang->get_max($kat, $tahun);
        $nilai_min = $this->m_sp_akomodasi_bintang->get_min($kat, $tahun);
        $this->load->view('statistik_pariwisata/akomodasi_bintang/menurut_wilayah', array(
            'data_akomodasi' => $data_akomodasi,
            'kat' => $kat, 'tahun' => $tahun,
            'kab_denpasar' => $kab_denpasar, 'kab_badung' => $kab_badung, 'kab_bangli' => $kab_bangli,
            'kab_buleleng' => $kab_buleleng, 'kab_gianyar' => $kab_gianyar, 'kab_jembrana' => $kab_jembrana,
            'kab_klungkung' => $kab_klungkung, 'kab_karangasem' => $kab_karangasem, 'kab_tabanan' => $kab_tabanan,
            'nilai_max' => $nilai_max, 'nilai_min' => $nilai_min
        ));
    }

    public function cari_wilayah()
    {
        $kd_hlm = 'SDC2';
        $kat = $this->input->post('id_kategori');
        $tahun = $this->input->post('tahun');
        if ($kat != 0 && $tahun != 0) {
            $this->load->view('statistik_pariwisata/akomodasi_bintang/beranda_wilayah', array('kd_hlm' => $kd_hlm, 'kat' => $kat, 'tahun' => $tahun));
        } else {
            redirect('SP_AkomodasiBintang');
        }
    }

    public function hasil_cari_wilayah($kat, $tahun)
    {
        $this->load->model('m_sp_akomodasi_bintang');
        $data_akomodasi = $this->m_sp_akomodasi_bintang->get_menurut_wilayah($kat, $tahun);
        $kab_denpasar = $this->m_sp_akomodasi_bintang->get_kab_denpasar($tahun, $kat);
        $kab_badung = $this->m_sp_akomodasi_bintang->get_kab_badung($tahun, $kat);
        $kab_bangli = $this->m_sp_akomodasi_bintang->get_kab_bangli($tahun, $kat);
        $kab_buleleng = $this->m_sp_akomodasi_bintang->get_kab_buleleng($tahun, $kat);
        $kab_gianyar = $this->m_sp_akomodasi_bintang->get_kab_gianyar($tahun, $kat);
        $kab_jembrana = $this->m_sp_akomodasi_bintang->get_kab_jembrana($tahun, $kat);
        $kab_klungkung = $this->m_sp_akomodasi_bintang->get_kab_klungkung($tahun, $kat);
        $kab_karangasem = $this->m_sp_akomodasi_bintang->get_kab_karangasem($tahun, $kat);
        $kab_tabanan = $this->m_sp_akomodasi_bintang->get_kab_tabanan($tahun, $kat);
        $nilai_max = $this->m_sp_akomodasi_bintang->get_max($kat, $tahun);
        $nilai_min = $this->m_sp_akomodasi_bintang->get_min($kat, $tahun);
        $this->load->view('statistik_pariwisata/akomodasi_bintang/menurut_wilayah', array(
            'data_akomodasi' => $data_akomodasi,
            'kat' => $kat, 'tahun' => $tahun,
            'kab_denpasar' => $kab_denpasar, 'kab_badung' => $kab_badung, 'kab_bangli' => $kab_bangli,
            'kab_buleleng' => $kab_buleleng, 'kab_gianyar' => $kab_gianyar, 'kab_jembrana' => $kab_jembrana,
            'kab_klungkung' => $kab_klungkung, 'kab_karangasem' => $kab_karangasem, 'kab_tabanan' => $kab_tabanan,
            'nilai_max' => $nilai_max, 'nilai_min' => $nilai_min
        ));
    }

    public function menurut_waktu()
    {
        $kat = 1;
        $kab = 1;
        $this->load->model('m_akomodasi');
        $kabupaten = $this->m_akomodasi->get_kabupaten_query();
        $this->load->model('m_sp_akomodasi_bintang');
        $data_akomodasi = $this->m_sp_akomodasi_bintang->get_menurut_waktu($kat, $kab);
        $nama_kabupaten = $this->m_sp_akomodasi_bintang->get_nama_kabupaten($kab);
        $this->load->view('statistik_pariwisata/akomodasi_bintang/menurut_waktu', array(
            'kabupaten'
            => $kabupaten, 'data_akomodasi' => $data_akomodasi, 'kat' => $kat,
            'kab' => $kab, 'nama_kabupaten' => $nama_kabupaten
        ));
    }

    public function cari_waktu()
    {
        $kd_hlm = 'SDC2';
        $kat = $this->input->post('id_kategori');
        $kab = $this->input->post('id_kabupaten');
        if ($kat != 0 && $kab != 0) {
            $this->load->view('statistik_pariwisata/akomodasi_bintang/beranda_waktu', array('kd_hlm' => $kd_hlm, 'kat' => $kat, 'kab' => $kab));
        } else {
            redirect('SP_AkomodasiBintang');
        }
    }

    public function hasil_cari_waktu($kat, $kab)
    {
        $this->load->model('m_akomodasi');
        $kabupaten = $this->m_akomodasi->get_kabupaten_query();
        $this->load->model('m_sp_akomodasi_bintang');
        $data_akomodasi = $this->m_sp_akomodasi_bintang->get_menurut_waktu($kat, $kab);
        $nama_kabupaten = $this->m_sp_akomodasi_bintang->get_nama_kabupaten($kab);
        $this->load->view('statistik_pariwisata/akomodasi_bintang/menurut_waktu', array(
            'kabupaten'
            => $kabupaten, 'data_akomodasi' => $data_akomodasi, 'kat' => $kat,
            'kab' => $kab, 'nama_kabupaten' => $nama_kabupaten
        ));
    }
}
