<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SP_Akomodasi extends CI_Controller
{
    public function index()
    {
        $kd_hlm = 'SDC1';
        $this->load->view('statistik_pariwisata/akomodasi/beranda', array('kd_hlm' => $kd_hlm));
    }

    public function menurut_kategori()
    {
        $id_kab = 1;
        $tahun = date('Y');
        $this->load->model('m_sp_akomodasi');
        $kabupaten = $this->m_sp_akomodasi->get_kabupaten();
        $nama_kabupaten = $this->m_sp_akomodasi->get_nama_kabupaten($id_kab);
        $data_akomodasi = $this->m_sp_akomodasi->get_menurut_kategori($id_kab, $tahun);
        $this->load->view('statistik_pariwisata/akomodasi/menurut_kategori', array(
            'kabupaten' => $kabupaten,
            'data_akomodasi' => $data_akomodasi,
            'nama_kabupaten' => $nama_kabupaten, 'tahun' => $tahun, 'id_kab' => $id_kab
        ));
    }

    public function cari_kategori()
    {
        $kd_hlm = 'SDC1';
        $id_kab = $this->input->post('id_kabupaten');
        $tahun = $this->input->post('tahun');
        if ($id_kab != 0 && $tahun != 0) {
            $this->load->view('statistik_pariwisata/akomodasi/beranda_kategori', array('kd_hlm' => $kd_hlm, 'id_kab' => $id_kab, 'tahun' => $tahun));
        } else {
            redirect('SP_Akomodasi');
        }
    }

    public function hasil_cari_kategori($id_kab, $tahun)
    {
        $this->load->model('m_sp_akomodasi');
        $kabupaten = $this->m_sp_akomodasi->get_kabupaten();
        $nama_kabupaten = $this->m_sp_akomodasi->get_nama_kabupaten($id_kab);
        $data_akomodasi = $this->m_sp_akomodasi->get_menurut_kategori($id_kab, $tahun);
        $this->load->view('statistik_pariwisata/akomodasi/menurut_kategori', array(
            'kabupaten' => $kabupaten,
            'data_akomodasi' => $data_akomodasi,
            'nama_kabupaten' => $nama_kabupaten, 'tahun' => $tahun, 'id_kab' => $id_kab
        ));
    }

    public function menurut_wilayah()
    {
        $id_kat = 1;
        $tahun = date('Y');
        $this->load->model('m_sp_akomodasi');
        $kategori = $this->m_sp_akomodasi->get_kategori();
        $nama_kategori = $this->m_sp_akomodasi->get_nama_kategori($id_kat);
        $data_akomodasi = $this->m_sp_akomodasi->get_menurut_wilayah($id_kat, $tahun);
        $kab_denpasar = $this->m_sp_akomodasi->get_kab_denpasar($id_kat, $tahun);
        $kab_badung = $this->m_sp_akomodasi->get_kab_badung($id_kat, $tahun);
        $kab_bangli = $this->m_sp_akomodasi->get_kab_bangli($id_kat, $tahun);
        $kab_buleleng = $this->m_sp_akomodasi->get_kab_buleleng($id_kat, $tahun);
        $kab_gianyar = $this->m_sp_akomodasi->get_kab_gianyar($id_kat, $tahun);
        $kab_jembrana = $this->m_sp_akomodasi->get_kab_jembrana($id_kat, $tahun);
        $kab_klungkung = $this->m_sp_akomodasi->get_kab_klungkung($id_kat, $tahun);
        $kab_karangasem = $this->m_sp_akomodasi->get_kab_karangasem($id_kat, $tahun);
        $kab_tabanan = $this->m_sp_akomodasi->get_kab_tabanan($id_kat, $tahun);
        $nilai_max = $this->m_sp_akomodasi->get_max($id_kat, $tahun);
        $this->load->view('statistik_pariwisata/akomodasi/menurut_wilayah', array(
            'kategori' => $kategori, 'data_akomodasi' => $data_akomodasi, 'nama_kategori' => $nama_kategori,
            'id_kat' => $id_kat, 'tahun' => $tahun,
            'kab_denpasar' => $kab_denpasar, 'kab_badung' => $kab_badung, 'kab_bangli' => $kab_bangli,
            'kab_buleleng' => $kab_buleleng, 'kab_gianyar' => $kab_gianyar, 'kab_jembrana' => $kab_jembrana,
            'kab_klungkung' => $kab_klungkung, 'kab_karangasem' => $kab_karangasem, 'kab_tabanan' => $kab_tabanan,
            'nilai_max' => $nilai_max
        ));
    }

    public function cari_wilayah() //belum
    {
        $kd_hlm = 'SDC1';
        $id_kat = $this->input->post('id_kategori');
        $tahun = $this->input->post('tahun');
        if ($id_kat != 0 && $tahun != 0) {
            $this->load->view('statistik_pariwisata/akomodasi/beranda_wilayah', array('kd_hlm' => $kd_hlm, 'id_kat' => $id_kat, 'tahun' => $tahun));
        } else {
            redirect('SP_Akomodasi');
        }
    }

    public function hasil_cari_wilayah($id_kat, $tahun)
    {
        $this->load->model('m_sp_akomodasi');
        $kategori = $this->m_sp_akomodasi->get_kategori();
        $nama_kategori = $this->m_sp_akomodasi->get_nama_kategori($id_kat);
        $data_akomodasi = $this->m_sp_akomodasi->get_menurut_wilayah($id_kat, $tahun);
        $kab_denpasar = $this->m_sp_akomodasi->get_kab_denpasar($id_kat, $tahun);
        $kab_badung = $this->m_sp_akomodasi->get_kab_badung($id_kat, $tahun);
        $kab_bangli = $this->m_sp_akomodasi->get_kab_bangli($id_kat, $tahun);
        $kab_buleleng = $this->m_sp_akomodasi->get_kab_buleleng($id_kat, $tahun);
        $kab_gianyar = $this->m_sp_akomodasi->get_kab_gianyar($id_kat, $tahun);
        $kab_jembrana = $this->m_sp_akomodasi->get_kab_jembrana($id_kat, $tahun);
        $kab_klungkung = $this->m_sp_akomodasi->get_kab_klungkung($id_kat, $tahun);
        $kab_karangasem = $this->m_sp_akomodasi->get_kab_karangasem($id_kat, $tahun);
        $kab_tabanan = $this->m_sp_akomodasi->get_kab_tabanan($id_kat, $tahun);
        $nilai_max = $this->m_sp_akomodasi->get_max($id_kat, $tahun);
        $this->load->view('statistik_pariwisata/akomodasi/menurut_wilayah', array(
            'kategori' => $kategori, 'data_akomodasi' => $data_akomodasi, 'nama_kategori' => $nama_kategori,
            'id_kat' => $id_kat, 'tahun' => $tahun,
            'kab_denpasar' => $kab_denpasar, 'kab_badung' => $kab_badung, 'kab_bangli' => $kab_bangli,
            'kab_buleleng' => $kab_buleleng, 'kab_gianyar' => $kab_gianyar, 'kab_jembrana' => $kab_jembrana,
            'kab_klungkung' => $kab_klungkung, 'kab_karangasem' => $kab_karangasem, 'kab_tabanan' => $kab_tabanan,
            'nilai_max' => $nilai_max
        ));
    }

    public function menurut_waktu()
    {
        $id_kat = 1;
        $id_kab = 1;
        $this->load->model('m_sp_akomodasi');
        $kabupaten = $this->m_sp_akomodasi->get_kabupaten();
        $nama_kabupaten = $this->m_sp_akomodasi->get_nama_kabupaten($id_kab);
        $kategori = $this->m_sp_akomodasi->get_kategori();
        $nama_kategori = $this->m_sp_akomodasi->get_nama_kategori($id_kat);
        $data_akomodasi = $this->m_sp_akomodasi->get_menurut_waktu($id_kat, $id_kab);
        $this->load->view('statistik_pariwisata/akomodasi/menurut_waktu', array(
            'kabupaten'
            => $kabupaten, 'kategori' => $kategori, 'data_akomodasi' => $data_akomodasi, 'id_kat' => $id_kat,
            'id_kab' => $id_kab, 'kabupaten' => $kabupaten, 'kategori' => $kategori,
            'nama_kabupaten' => $nama_kabupaten, 'nama_kategori' => $nama_kategori
        ));
    }

    public function cari_waktu()
    {
        $kd_hlm = 'SDC1';
        $id_kat = $this->input->post('id_kategori');
        $id_kab = $this->input->post('id_kabupaten');
        if ($id_kat != 0 && $id_kab != 0) {
            $this->load->view('statistik_pariwisata/akomodasi/beranda_waktu', array('kd_hlm' => $kd_hlm, 'id_kat' => $id_kat, 'id_kab' => $id_kab));
        } else {
            redirect('SP_Akomodasi');
        }
    }

    public function hasil_cari_waktu($id_kat, $id_kab)
    {
        $this->load->model('m_sp_akomodasi');
        $kabupaten = $this->m_sp_akomodasi->get_kabupaten();
        $nama_kabupaten = $this->m_sp_akomodasi->get_nama_kabupaten($id_kab);
        $kategori = $this->m_sp_akomodasi->get_kategori();
        $nama_kategori = $this->m_sp_akomodasi->get_nama_kategori($id_kat);
        $data_akomodasi = $this->m_sp_akomodasi->get_menurut_waktu($id_kat, $id_kab);
        $this->load->view('statistik_pariwisata/akomodasi/menurut_waktu', array(
            'kabupaten'
            => $kabupaten, 'kategori' => $kategori, 'data_akomodasi' => $data_akomodasi, 'id_kat' => $id_kat,
            'id_kab' => $id_kab, 'kabupaten' => $kabupaten, 'kategori' => $kategori,
            'nama_kabupaten' => $nama_kabupaten, 'nama_kategori' => $nama_kategori
        ));
    }
}
