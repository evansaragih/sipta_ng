<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SP_TinjauRegion extends CI_Controller
{
    public function index()
    {
        $kd_hlm = 'SDG';
        $tahun = date('Y') - 1;
        $kab = 1;
        $this->load->model('m_akomodasi');
        $kabupaten = $this->m_akomodasi->get_kabupaten_query();
        $this->load->view(
            'statistik_pariwisata/tinjau_region/beranda',
            array('kd_hlm' => $kd_hlm, 'kabupaten' => $kabupaten, 'tahun' => $tahun, 'kab' => $kab)
        );
    }

    public function menurut_blok1()
    {
        $kab = 1;
        $tahun = date('Y');
        $this->load->model('m_sp_tinjau_region');
        $box1a = $this->m_sp_tinjau_region->box1a($tahun, $kab); //restoran pengunjung domestik
        $box1b = $this->m_sp_tinjau_region->box1b($tahun, $kab); //restoran pengunjung asing
        $box1aa = $this->m_sp_tinjau_region->box1a($tahun - 1, $kab);
        $box1bb = $this->m_sp_tinjau_region->box1b($tahun - 1, $kab);
        $box2a = $this->m_sp_tinjau_region->box2a($tahun, $kab); //akomodasi
        $box2aa = $this->m_sp_tinjau_region->box2a($tahun - 1, $kab);
        $box3a = $this->m_sp_tinjau_region->box3a($tahun, $kab); //bar domestik
        $box3b = $this->m_sp_tinjau_region->box3b($tahun, $kab); //bar asing
        $box3aa = $this->m_sp_tinjau_region->box3a($tahun, $kab);
        $box3bb = $this->m_sp_tinjau_region->box3b($tahun - 1, $kab);
        $box4a = $this->m_sp_tinjau_region->box4a($tahun, $kab); //objek domestik
        $box4b = $this->m_sp_tinjau_region->box4b($tahun, $kab); //objek asing
        $box4aa = $this->m_sp_tinjau_region->box4a($tahun - 1, $kab);
        $box4bb = $this->m_sp_tinjau_region->box4b($tahun - 1, $kab);
        $this->load->view('statistik_pariwisata/tinjau_region/menurut_tinjau_region', array(
            'tahun' => $tahun,
            'box1a' => $box1a, 'box1b' => $box1b, 'box2a' => $box2a, 'box3a' => $box3a,
            'box3b' => $box3b, 'box4a' => $box4a, 'box4b' => $box4b,
            'box1aa' => $box1aa, 'box1bb' => $box1bb, 'box2aa' => $box2aa, 'box3aa' => $box3aa,
            'box3bb' => $box3bb,
            'box4aa' => $box4aa, 'box4bb' => $box4bb
        ));
    }

    public function cari_region()
    {
        $kd_hlm = 'SDG';
        $tahun = $this->input->post('tahun');
        $kab = $this->input->post('kabupaten');
        $this->load->model('m_akomodasi');
        $kabupaten = $this->m_akomodasi->get_kabupaten_query();
        if ($tahun != 0) {
            $this->load->view('statistik_pariwisata/tinjau_region/beranda_pencarian', array(
                'kd_hlm' => $kd_hlm,
                'tahun' => $tahun, 'kab' => $kab, 'kabupaten' => $kabupaten,
            ));
        } else {
            redirect('SP_TinjauRegion');
        }
    }

    public function hasil_cari_blok1($tahun, $kab)
    {
        $this->load->model('m_sp_tinjau_region');
        $box1a = $this->m_sp_tinjau_region->box1a($tahun, $kab); //restoran pengunjung domestik
        $box1b = $this->m_sp_tinjau_region->box1b($tahun, $kab); //restoran pengunjung asing
        $box1aa = $this->m_sp_tinjau_region->box1a($tahun - 1, $kab);
        $box1bb = $this->m_sp_tinjau_region->box1b($tahun - 1, $kab);
        $box2a = $this->m_sp_tinjau_region->box2a($tahun, $kab); //akomodasi
        $box2aa = $this->m_sp_tinjau_region->box2a($tahun - 1, $kab);
        $box3a = $this->m_sp_tinjau_region->box3a($tahun, $kab); //bar domestik
        $box3b = $this->m_sp_tinjau_region->box3b($tahun, $kab); //bar asing
        $box3aa = $this->m_sp_tinjau_region->box3a($tahun, $kab);
        $box3bb = $this->m_sp_tinjau_region->box3b($tahun - 1, $kab);
        $box4a = $this->m_sp_tinjau_region->box4a($tahun, $kab); //objek domestik
        $box4b = $this->m_sp_tinjau_region->box4b($tahun, $kab); //objek asing
        $box4aa = $this->m_sp_tinjau_region->box4a($tahun - 1, $kab);
        $box4bb = $this->m_sp_tinjau_region->box4b($tahun - 1, $kab);
        $this->load->view('statistik_pariwisata/tinjau_region/menurut_tinjau_region', array(
            'tahun' => $tahun,
            'box1a' => $box1a, 'box1b' => $box1b, 'box2a' => $box2a, 'box3a' => $box3a,
            'box3b' => $box3b, 'box4a' => $box4a, 'box4b' => $box4b,
            'box1aa' => $box1aa, 'box1bb' => $box1bb, 'box2aa' => $box2aa, 'box3aa' => $box3aa,
            'box3bb' => $box3bb,
            'box4aa' => $box4aa, 'box4bb' => $box4bb
        ));
    }
}
