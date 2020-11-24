<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SP_Restoran extends CI_Controller
{
    public function index()
    {
        $kd_hlm = 'SDD';
        $this->load->view('statistik_pariwisata/restoran/beranda', array('kd_hlm' => $kd_hlm));
    }

    public function menurut_restoran()
    {
        $id_kab = 1;
        $tahun = date('Y');
        $id_jenis = 1;
        $this->load->model('m_sp_restoran');
        $kabupaten = $this->m_sp_restoran->get_kabupaten();
        $nama_kabupaten = $this->m_sp_restoran->get_nama_kabupaten($id_kab);
        $jenis_wisatawan = $this->m_sp_restoran->get_nama_jenis_wisatawan($id_jenis);
        $jenis_wisman = $this->m_sp_restoran->get_jenis_wisatawan();
        $data_objek_wisata = $this->m_sp_restoran->menurut_restoran($id_kab, $tahun, $id_jenis);
        $this->load->view('statistik_pariwisata/restoran/menurut_restoran', array(
            'kabupaten' => $kabupaten, 'jenis_wisman' => $jenis_wisman,
            'data_objek_wisata' => $data_objek_wisata, 'id_kab' => $id_kab, 'id_jenis' => $id_jenis,
            'tahun' => $tahun, 'nama_kabupaten' => $nama_kabupaten,
            'jenis_wisatawan' => $jenis_wisatawan
        ));
    }

    public function cari_restoran()
    {
        $kd_hlm = 'SDD';
        $id_jenis = $this->input->post('id_jenis_wisatawan');
        $id_kab = $this->input->post('id_kabupaten');
        $tahun = $this->input->post('tahun');
        if ($id_jenis != 0 && $id_kab != 0 && $tahun != 0) {
            $this->load->view(
                'statistik_pariwisata/restoran/beranda_restoran',
                array(
                    'kd_hlm' => $kd_hlm, 'id_jenis' => $id_jenis, 'id_kab' => $id_kab,
                    'tahun' => $tahun
                )
            );
        } else {
            redirect('SP_ObjekWisata');
        }
    }

    public function hasil_cari_restoran($id_jenis, $id_kab, $tahun)
    {
        $this->load->model('m_sp_restoran');
        $kabupaten = $this->m_sp_restoran->get_kabupaten();
        $nama_kabupaten = $this->m_sp_restoran->get_nama_kabupaten($id_kab);
        $jenis_wisatawan = $this->m_sp_restoran->get_nama_jenis_wisatawan($id_jenis);
        $jenis_wisman = $this->m_sp_restoran->get_jenis_wisatawan();
        $data_objek_wisata = $this->m_sp_restoran->menurut_restoran($id_kab, $tahun, $id_jenis);
        $this->load->view('statistik_pariwisata/restoran/menurut_restoran', array(
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
        $this->load->model('m_sp_restoran');
        $jenis_wisman = $this->m_sp_restoran->get_jenis_wisatawan();
        $jenis_wisatawan = $this->m_sp_restoran->get_nama_jenis_wisatawan($id_jenis);
        $data_objek_wisata = $this->m_sp_restoran->menurut_kabupaten($tahun, $id_jenis);
        $nilai_max = $this->m_sp_restoran->get_max($tahun, $id_jenis);
        $kab_denpasar = $this->m_sp_restoran->get_kab_denpasar($tahun, $id_jenis);
        $kab_badung = $this->m_sp_restoran->get_kab_badung($tahun, $id_jenis);
        $kab_bangli = $this->m_sp_restoran->get_kab_bangli($tahun, $id_jenis);
        $kab_buleleng = $this->m_sp_restoran->get_kab_buleleng($tahun, $id_jenis);
        $kab_gianyar = $this->m_sp_restoran->get_kab_gianyar($tahun, $id_jenis);
        $kab_jembrana = $this->m_sp_restoran->get_kab_jembrana($tahun, $id_jenis);
        $kab_klungkung = $this->m_sp_restoran->get_kab_klungkung($tahun, $id_jenis);
        $kab_karangasem = $this->m_sp_restoran->get_kab_karangasem($tahun, $id_jenis);
        $kab_tabanan = $this->m_sp_restoran->get_kab_tabanan($tahun, $id_jenis);
        $this->load->view('statistik_pariwisata/restoran/menurut_wilayah', array(
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
        $kd_hlm = 'SDD';
        $tahun = $this->input->post('tahun');
        $id_jenis = $this->input->post('id_jenis_wisatawan');
        if ($id_jenis != 0 && $tahun != 0) {
            $this->load->view(
                'statistik_pariwisata/restoran/beranda_wilayah',
                array('kd_hlm' => $kd_hlm, 'id_jenis' => $id_jenis, 'tahun' => $tahun)
            );
        } else {
            redirect('SP_ObjekWisata');
        }
    }

    public function hasil_cari_wilayah($id_jenis, $tahun)
    {
        $this->load->model('m_sp_restoran');
        $jenis_wisman = $this->m_sp_restoran->get_jenis_wisatawan();
        $jenis_wisatawan = $this->m_sp_restoran->get_nama_jenis_wisatawan($id_jenis);
        $data_objek_wisata = $this->m_sp_restoran->menurut_kabupaten($tahun, $id_jenis);
        $nilai_max = $this->m_sp_restoran->get_max($tahun, $id_jenis);
        $kab_denpasar = $this->m_sp_restoran->get_kab_denpasar($tahun, $id_jenis);
        $kab_badung = $this->m_sp_restoran->get_kab_badung($tahun, $id_jenis);
        $kab_bangli = $this->m_sp_restoran->get_kab_bangli($tahun, $id_jenis);
        $kab_buleleng = $this->m_sp_restoran->get_kab_buleleng($tahun, $id_jenis);
        $kab_gianyar = $this->m_sp_restoran->get_kab_gianyar($tahun, $id_jenis);
        $kab_jembrana = $this->m_sp_restoran->get_kab_jembrana($tahun, $id_jenis);
        $kab_klungkung = $this->m_sp_restoran->get_kab_klungkung($tahun, $id_jenis);
        $kab_karangasem = $this->m_sp_restoran->get_kab_karangasem($tahun, $id_jenis);
        $kab_tabanan = $this->m_sp_restoran->get_kab_tabanan($tahun, $id_jenis);
        $this->load->view('statistik_pariwisata/restoran/menurut_wilayah', array(
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
        $this->load->model('m_sp_restoran');
        $kabupaten = $this->m_sp_restoran->get_kabupaten();
        $jenis_wisman = $this->m_sp_restoran->get_jenis_wisatawan();
        $nama_kabupaten = $this->m_sp_restoran->get_nama_kabupaten($id_kab);
        $jenis_wisatawan = $this->m_sp_restoran->get_nama_jenis_wisatawan($id_jenis);
        $data_objek_wisata = $this->m_sp_restoran->menurut_waktu($id_kab, $id_jenis);
        $this->load->view('statistik_pariwisata/restoran/menurut_waktu', array(
            'kabupaten' => $kabupaten, 'jenis_wisman' => $jenis_wisman,
            'data_objek_wisata' => $data_objek_wisata, 'id_kab' => $id_kab,
            'id_jenis' => $id_jenis, 'nama_kabupaten' => $nama_kabupaten,
            'jenis_wisatawan' => $jenis_wisatawan
        ));
    }

    public function cari_waktu()
    {
        $kd_hlm = 'SDD';
        $id_jenis = $this->input->post('id_jenis_wisatawan');
        $id_kab = $this->input->post('id_kabupaten');
        if ($id_jenis != 0 && $id_kab != 0) {
            $this->load->view(
                'statistik_pariwisata/restoran/beranda_waktu',
                array('kd_hlm' => $kd_hlm, 'id_jenis' => $id_jenis, 'id_kab' => $id_kab)
            );
        } else {
            redirect('SP_ObjekWisata');
        }
    }

    public function hasil_cari_waktu($id_jenis, $id_kab)
    {
        $this->load->model('m_sp_restoran');
        $kabupaten = $this->m_sp_restoran->get_kabupaten();
        $jenis_wisman = $this->m_sp_restoran->get_jenis_wisatawan();
        $nama_kabupaten = $this->m_sp_restoran->get_nama_kabupaten($id_kab);
        $jenis_wisatawan = $this->m_sp_restoran->get_nama_jenis_wisatawan($id_jenis);
        $data_objek_wisata = $this->m_sp_restoran->menurut_waktu($id_kab, $id_jenis);
        $this->load->view('statistik_pariwisata/restoran/menurut_waktu', array(
            'kabupaten' => $kabupaten, 'jenis_wisman' => $jenis_wisman,
            'data_objek_wisata' => $data_objek_wisata, 'id_kab' => $id_kab,
            'id_jenis' => $id_jenis, 'nama_kabupaten' => $nama_kabupaten,
            'jenis_wisatawan' => $jenis_wisatawan
        ));
    }
}
