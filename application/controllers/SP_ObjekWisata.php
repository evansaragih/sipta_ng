<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SP_ObjekWisata extends CI_Controller
{
    public function index()
    {
        $kd_hlm = 'SDF';
        $this->load->view('statistik_pariwisata/objek_wisata/beranda', array('kd_hlm' => $kd_hlm));
    }

    public function menurut_objek_wisata()
    {
        $id_kab = 1;
        $tahun = date('Y');
        $id_jenis = 1;
        $this->load->model('m_sp_objek_wisata');
        $kabupaten = $this->m_sp_objek_wisata->get_kabupaten();
        $nama_kabupaten = $this->m_sp_objek_wisata->get_nama_kabupaten($id_kab);
        $jenis_wisatawan = $this->m_sp_objek_wisata->get_nama_jenis_wisatawan($id_jenis);
        $jenis_wisman = $this->m_sp_objek_wisata->get_jenis_wisatawan();
        $data_objek_wisata = $this->m_sp_objek_wisata->menurut_objek_wisata($id_kab, $tahun, $id_jenis);
        $this->load->view('statistik_pariwisata/objek_wisata/menurut_objek_wisata', array(
            'kabupaten' => $kabupaten, 'jenis_wisman' => $jenis_wisman,
            'data_objek_wisata' => $data_objek_wisata, 'id_kab' => $id_kab, 'id_jenis' => $id_jenis,
            'tahun' => $tahun, 'nama_kabupaten' => $nama_kabupaten,
            'jenis_wisatawan' => $jenis_wisatawan
        ));
    }

    public function cari_objek_wisata()
    {
        $kd_hlm = 'SDF';
        $id_jenis = $this->input->post('id_jenis_wisatawan');
        $id_kab = $this->input->post('id_kabupaten');
        $tahun = $this->input->post('tahun');
        if ($id_jenis != 0 && $id_kab != 0 && $tahun != 0) {
            $this->load->view(
                'statistik_pariwisata/objek_wisata/beranda_objek_wisata',
                array(
                    'kd_hlm' => $kd_hlm, 'id_jenis' => $id_jenis, 'id_kab' => $id_kab,
                    'tahun' => $tahun
                )
            );
        } else {
            redirect('SP_ObjekWisata');
        }
    }

    public function hasil_cari_objek_wisata($id_jenis, $id_kab, $tahun)
    {
        $this->load->model('m_sp_objek_wisata');
        $kabupaten = $this->m_sp_objek_wisata->get_kabupaten();
        $nama_kabupaten = $this->m_sp_objek_wisata->get_nama_kabupaten($id_kab);
        $jenis_wisatawan = $this->m_sp_objek_wisata->get_nama_jenis_wisatawan($id_jenis);
        $jenis_wisman = $this->m_sp_objek_wisata->get_jenis_wisatawan();
        $data_objek_wisata = $this->m_sp_objek_wisata->menurut_objek_wisata($id_kab, $tahun, $id_jenis);
        $this->load->view('statistik_pariwisata/objek_wisata/menurut_objek_wisata', array(
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
        $this->load->model('m_sp_objek_wisata');
        $jenis_wisman = $this->m_sp_objek_wisata->get_jenis_wisatawan();
        $jenis_wisatawan = $this->m_sp_objek_wisata->get_nama_jenis_wisatawan($id_jenis);
        $data_objek_wisata = $this->m_sp_objek_wisata->menurut_kabupaten($tahun, $id_jenis);
        $nilai_max = $this->m_sp_objek_wisata->get_max($tahun, $id_jenis);
        $kab_denpasar = $this->m_sp_objek_wisata->get_kab_denpasar($tahun, $id_jenis);
        $kab_badung = $this->m_sp_objek_wisata->get_kab_badung($tahun, $id_jenis);
        $kab_bangli = $this->m_sp_objek_wisata->get_kab_bangli($tahun, $id_jenis);
        $kab_buleleng = $this->m_sp_objek_wisata->get_kab_buleleng($tahun, $id_jenis);
        $kab_gianyar = $this->m_sp_objek_wisata->get_kab_gianyar($tahun, $id_jenis);
        $kab_jembrana = $this->m_sp_objek_wisata->get_kab_jembrana($tahun, $id_jenis);
        $kab_klungkung = $this->m_sp_objek_wisata->get_kab_klungkung($tahun, $id_jenis);
        $kab_karangasem = $this->m_sp_objek_wisata->get_kab_karangasem($tahun, $id_jenis);
        $kab_tabanan = $this->m_sp_objek_wisata->get_kab_tabanan($tahun, $id_jenis);
        $this->load->view('statistik_pariwisata/objek_wisata/menurut_wilayah', array(
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
        $kd_hlm = 'SDF';
        $tahun = $this->input->post('tahun');
        $id_jenis = $this->input->post('id_jenis_wisatawan');
        if ($id_jenis != 0 && $tahun != 0) {
            $this->load->view(
                'statistik_pariwisata/objek_wisata/beranda_wilayah',
                array('kd_hlm' => $kd_hlm, 'id_jenis' => $id_jenis, 'tahun' => $tahun)
            );
        } else {
            redirect('SP_ObjekWisata');
        }
    }

    public function hasil_cari_wilayah($id_jenis, $tahun)
    {
        $this->load->model('m_sp_objek_wisata');
        $jenis_wisman = $this->m_sp_objek_wisata->get_jenis_wisatawan();
        $jenis_wisatawan = $this->m_sp_objek_wisata->get_nama_jenis_wisatawan($id_jenis);
        $data_objek_wisata = $this->m_sp_objek_wisata->menurut_kabupaten($tahun, $id_jenis);
        $nilai_max = $this->m_sp_objek_wisata->get_max($tahun, $id_jenis);
        $kab_denpasar = $this->m_sp_objek_wisata->get_kab_denpasar($tahun, $id_jenis);
        $kab_badung = $this->m_sp_objek_wisata->get_kab_badung($tahun, $id_jenis);
        $kab_bangli = $this->m_sp_objek_wisata->get_kab_bangli($tahun, $id_jenis);
        $kab_buleleng = $this->m_sp_objek_wisata->get_kab_buleleng($tahun, $id_jenis);
        $kab_gianyar = $this->m_sp_objek_wisata->get_kab_gianyar($tahun, $id_jenis);
        $kab_jembrana = $this->m_sp_objek_wisata->get_kab_jembrana($tahun, $id_jenis);
        $kab_klungkung = $this->m_sp_objek_wisata->get_kab_klungkung($tahun, $id_jenis);
        $kab_karangasem = $this->m_sp_objek_wisata->get_kab_karangasem($tahun, $id_jenis);
        $kab_tabanan = $this->m_sp_objek_wisata->get_kab_tabanan($tahun, $id_jenis);
        $this->load->view('statistik_pariwisata/objek_wisata/menurut_wilayah', array(
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
        $this->load->model('m_sp_objek_wisata');
        $kabupaten = $this->m_sp_objek_wisata->get_kabupaten();
        $jenis_wisman = $this->m_sp_objek_wisata->get_jenis_wisatawan();
        $nama_kabupaten = $this->m_sp_objek_wisata->get_nama_kabupaten($id_kab);
        $jenis_wisatawan = $this->m_sp_objek_wisata->get_nama_jenis_wisatawan($id_jenis);
        $data_objek_wisata = $this->m_sp_objek_wisata->menurut_waktu($id_kab, $id_jenis);
        $this->load->view('statistik_pariwisata/objek_wisata/menurut_waktu', array(
            'kabupaten' => $kabupaten, 'jenis_wisman' => $jenis_wisman,
            'data_objek_wisata' => $data_objek_wisata, 'id_kab' => $id_kab,
            'id_jenis' => $id_jenis, 'nama_kabupaten' => $nama_kabupaten,
            'jenis_wisatawan' => $jenis_wisatawan
        ));
    }

    public function cari_waktu()
    {
        $kd_hlm = 'SDF';
        $id_jenis = $this->input->post('id_jenis_wisatawan');
        $id_kab = $this->input->post('id_kabupaten');
        if ($id_jenis != 0 && $id_kab != 0) {
            $this->load->view(
                'statistik_pariwisata/objek_wisata/beranda_waktu',
                array('kd_hlm' => $kd_hlm, 'id_jenis' => $id_jenis, 'id_kab' => $id_kab)
            );
        } else {
            redirect('SP_ObjekWisata');
        }
    }

    public function hasil_cari_waktu($id_jenis, $id_kab)
    {
        $this->load->model('m_sp_objek_wisata');
        $kabupaten = $this->m_sp_objek_wisata->get_kabupaten();
        $jenis_wisman = $this->m_sp_objek_wisata->get_jenis_wisatawan();
        $nama_kabupaten = $this->m_sp_objek_wisata->get_nama_kabupaten($id_kab);
        $jenis_wisatawan = $this->m_sp_objek_wisata->get_nama_jenis_wisatawan($id_jenis);
        $data_objek_wisata = $this->m_sp_objek_wisata->menurut_waktu($id_kab, $id_jenis);
        $this->load->view('statistik_pariwisata/objek_wisata/menurut_waktu', array(
            'kabupaten' => $kabupaten, 'jenis_wisman' => $jenis_wisman,
            'data_objek_wisata' => $data_objek_wisata, 'id_kab' => $id_kab,
            'id_jenis' => $id_jenis, 'nama_kabupaten' => $nama_kabupaten,
            'jenis_wisatawan' => $jenis_wisatawan
        ));
    }
}
