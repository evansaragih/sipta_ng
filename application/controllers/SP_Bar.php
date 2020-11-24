<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SP_Bar extends CI_Controller
{
    public function index()
    {
        $kd_hlm = 'SDE';
        $this->load->view('statistik_pariwisata/bar/beranda', array('kd_hlm' => $kd_hlm));
    }

    public function menurut_bar()
    {
        $id_kab = 1;
        $tahun = date('Y');
        $id_jenis = 1;
        $this->load->model('m_sp_bar');
        $kabupaten = $this->m_sp_bar->get_kabupaten();
        $nama_kabupaten = $this->m_sp_bar->get_nama_kabupaten($id_kab);
        $jenis_wisatawan = $this->m_sp_bar->get_nama_jenis_wisatawan($id_jenis);
        $jenis_wisman = $this->m_sp_bar->get_jenis_wisatawan();
        $data_objek_wisata = $this->m_sp_bar->menurut_bar($id_kab, $tahun, $id_jenis);
        $this->load->view('statistik_pariwisata/bar/menurut_bar', array(
            'kabupaten' => $kabupaten, 'jenis_wisman' => $jenis_wisman,
            'data_objek_wisata' => $data_objek_wisata, 'id_kab' => $id_kab, 'id_jenis' => $id_jenis,
            'tahun' => $tahun, 'nama_kabupaten' => $nama_kabupaten,
            'jenis_wisatawan' => $jenis_wisatawan
        ));
    }

    public function cari_bar()
    {
        $kd_hlm = 'SDE';
        $id_jenis = $this->input->post('id_jenis_wisatawan');
        $id_kab = $this->input->post('id_kabupaten');
        $tahun = $this->input->post('tahun');
        if ($id_jenis != 0 && $id_kab != 0 && $tahun != 0) {
            $this->load->view(
                'statistik_pariwisata/bar/beranda_bar',
                array(
                    'kd_hlm' => $kd_hlm, 'id_jenis' => $id_jenis, 'id_kab' => $id_kab,
                    'tahun' => $tahun
                )
            );
        } else {
            redirect('SP_Bar');
        }
    }

    public function hasil_cari_bar($id_jenis, $id_kab, $tahun)
    {
        $this->load->model('m_sp_bar');
        $kabupaten = $this->m_sp_bar->get_kabupaten();
        $nama_kabupaten = $this->m_sp_bar->get_nama_kabupaten($id_kab);
        $jenis_wisatawan = $this->m_sp_bar->get_nama_jenis_wisatawan($id_jenis);
        $jenis_wisman = $this->m_sp_bar->get_jenis_wisatawan();
        $data_objek_wisata = $this->m_sp_bar->menurut_bar($id_kab, $tahun, $id_jenis);
        $this->load->view('statistik_pariwisata/bar/menurut_bar', array(
            'kabupaten' => $kabupaten, 'jenis_wisman' => $jenis_wisman,
            'data_objek_wisata' => $data_objek_wisata, 'id_kab' => $id_kab, 'id_jenis' => $id_jenis,
            'tahun' => $tahun, 'nama_kabupaten' => $nama_kabupaten,
            'jenis_wisatawan' => $jenis_wisatawan
        ));
    }

    public function menurut_wilayah()
    {
        $tahun = date('Y');
        $id_jenis = 1;
        $this->load->model('m_sp_bar');
        $jenis_wisman = $this->m_sp_bar->get_jenis_wisatawan();
        $jenis_wisatawan = $this->m_sp_bar->get_nama_jenis_wisatawan($id_jenis);
        $data_objek_wisata = $this->m_sp_bar->menurut_kabupaten($tahun, $id_jenis);
        $nilai_max = $this->m_sp_bar->get_max($tahun, $id_jenis);
        $kab_denpasar = $this->m_sp_bar->get_kab_denpasar($tahun, $id_jenis);
        $kab_badung = $this->m_sp_bar->get_kab_badung($tahun, $id_jenis);
        $kab_bangli = $this->m_sp_bar->get_kab_bangli($tahun, $id_jenis);
        $kab_buleleng = $this->m_sp_bar->get_kab_buleleng($tahun, $id_jenis);
        $kab_gianyar = $this->m_sp_bar->get_kab_gianyar($tahun, $id_jenis);
        $kab_jembrana = $this->m_sp_bar->get_kab_jembrana($tahun, $id_jenis);
        $kab_klungkung = $this->m_sp_bar->get_kab_klungkung($tahun, $id_jenis);
        $kab_karangasem = $this->m_sp_bar->get_kab_karangasem($tahun, $id_jenis);
        $kab_tabanan = $this->m_sp_bar->get_kab_tabanan($tahun, $id_jenis);
        $this->load->view('statistik_pariwisata/bar/menurut_wilayah', array(
            'jenis_wisman' => $jenis_wisman, 'data_objek_wisata' => $data_objek_wisata,
            'id_jenis' => $id_jenis, 'tahun' => $tahun, 'kab_denpasar' => $kab_denpasar,
            'kab_badung' => $kab_badung, 'kab_bangli' => $kab_bangli,
            'kab_buleleng' => $kab_buleleng, 'kab_gianyar' => $kab_gianyar,
            'kab_jembrana' => $kab_jembrana, 'kab_klungkung' => $kab_klungkung,
            'kab_karangasem' => $kab_karangasem, 'kab_tabanan' => $kab_tabanan,
            'nilai_max' => $nilai_max, 'jenis_wisatawan' => $jenis_wisatawan
        ));
    }

    public function cari_wilayah()
    {
        $kd_hlm = 'SDE';
        $tahun = $this->input->post('tahun');
        $id_jenis = $this->input->post('id_jenis_wisatawan');
        if ($id_jenis != 0 && $tahun != 0) {
            $this->load->view(
                'statistik_pariwisata/bar/beranda_wilayah',
                array('kd_hlm' => $kd_hlm, 'id_jenis' => $id_jenis, 'tahun' => $tahun)
            );
        } else {
            redirect('SP_Bar');
        }
    }

    public function hasil_cari_wilayah($id_jenis, $tahun)
    {
        $this->load->model('m_sp_bar');
        $jenis_wisman = $this->m_sp_bar->get_jenis_wisatawan();
        $jenis_wisatawan = $this->m_sp_bar->get_nama_jenis_wisatawan($id_jenis);
        $data_objek_wisata = $this->m_sp_bar->menurut_kabupaten($tahun, $id_jenis);
        $nilai_max = $this->m_sp_bar->get_max($tahun, $id_jenis);
        $kab_denpasar = $this->m_sp_bar->get_kab_denpasar($tahun, $id_jenis);
        $kab_badung = $this->m_sp_bar->get_kab_badung($tahun, $id_jenis);
        $kab_bangli = $this->m_sp_bar->get_kab_bangli($tahun, $id_jenis);
        $kab_buleleng = $this->m_sp_bar->get_kab_buleleng($tahun, $id_jenis);
        $kab_gianyar = $this->m_sp_bar->get_kab_gianyar($tahun, $id_jenis);
        $kab_jembrana = $this->m_sp_bar->get_kab_jembrana($tahun, $id_jenis);
        $kab_klungkung = $this->m_sp_bar->get_kab_klungkung($tahun, $id_jenis);
        $kab_karangasem = $this->m_sp_bar->get_kab_karangasem($tahun, $id_jenis);
        $kab_tabanan = $this->m_sp_bar->get_kab_tabanan($tahun, $id_jenis);
        $this->load->view('statistik_pariwisata/bar/menurut_wilayah', array(
            'jenis_wisman' => $jenis_wisman, 'data_objek_wisata' => $data_objek_wisata,
            'id_jenis' => $id_jenis, 'tahun' => $tahun, 'kab_denpasar' => $kab_denpasar,
            'kab_badung' => $kab_badung, 'kab_bangli' => $kab_bangli,
            'kab_buleleng' => $kab_buleleng, 'kab_gianyar' => $kab_gianyar,
            'kab_jembrana' => $kab_jembrana, 'kab_klungkung' => $kab_klungkung,
            'kab_karangasem' => $kab_karangasem, 'kab_tabanan' => $kab_tabanan,
            'nilai_max' => $nilai_max, 'jenis_wisatawan' => $jenis_wisatawan
        ));
    }

    public function menurut_waktu()
    {
        $id_kab = 1;
        $id_jenis = 1;
        $this->load->model('m_sp_bar');
        $kabupaten = $this->m_sp_bar->get_kabupaten();
        $jenis_wisman = $this->m_sp_bar->get_jenis_wisatawan();
        $nama_kabupaten = $this->m_sp_bar->get_nama_kabupaten($id_kab);
        $jenis_wisatawan = $this->m_sp_bar->get_nama_jenis_wisatawan($id_jenis);
        $data_objek_wisata = $this->m_sp_bar->menurut_waktu($id_kab, $id_jenis);
        $this->load->view('statistik_pariwisata/bar/menurut_waktu', array(
            'kabupaten' => $kabupaten, 'jenis_wisman' => $jenis_wisman,
            'data_objek_wisata' => $data_objek_wisata, 'id_kab' => $id_kab,
            'id_jenis' => $id_jenis, 'nama_kabupaten' => $nama_kabupaten,
            'jenis_wisatawan' => $jenis_wisatawan
        ));
    }

    public function cari_waktu()
    {
        $kd_hlm = 'SDE';
        $id_jenis = $this->input->post('id_jenis_wisatawan');
        $id_kab = $this->input->post('id_kabupaten');
        if ($id_jenis != 0 && $id_kab != 0) {
            $this->load->view(
                'statistik_pariwisata/bar/beranda_waktu',
                array('kd_hlm' => $kd_hlm, 'id_jenis' => $id_jenis, 'id_kab' => $id_kab)
            );
        } else {
            redirect('SP_Bar');
        }
    }

    public function hasil_cari_waktu($id_jenis, $id_kab)
    {
        $this->load->model('m_sp_bar');
        $kabupaten = $this->m_sp_bar->get_kabupaten();
        $jenis_wisman = $this->m_sp_bar->get_jenis_wisatawan();
        $nama_kabupaten = $this->m_sp_bar->get_nama_kabupaten($id_kab);
        $jenis_wisatawan = $this->m_sp_bar->get_nama_jenis_wisatawan($id_jenis);
        $data_objek_wisata = $this->m_sp_bar->menurut_waktu($id_kab, $id_jenis);
        $this->load->view('statistik_pariwisata/bar/menurut_waktu', array(
            'kabupaten' => $kabupaten, 'jenis_wisman' => $jenis_wisman,
            'data_objek_wisata' => $data_objek_wisata, 'id_kab' => $id_kab,
            'id_jenis' => $id_jenis, 'nama_kabupaten' => $nama_kabupaten,
            'jenis_wisatawan' => $jenis_wisatawan
        ));
    }
}
