<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SPT_JumlahPenumpang extends CI_Controller
{
    public function index()
    {
        $kd_hlm = 'SDA2';
        $this->load->view('statistik_pariwisata/jumlah_penumpang/tahunan/beranda', array('kd_hlm' => $kd_hlm));
    }

    public function menurut_blok1()
    {
        $jenis = 1;
        $this->load->model('m_spb_jlh_penumpang');
        $option_penumpang = $this->m_spb_jlh_penumpang->get_jenis_penumpang();
        $this->load->model('m_spt_jlh_penumpang');
        $data_kategori = $this->m_spt_jlh_penumpang->menurut_kategori($jenis);
        $this->load->view(
            'statistik_pariwisata/jumlah_penumpang/tahunan/menurut_kategori',
            array(
                'jenis' => $jenis, 'data_kategori' => $data_kategori,
                'option_penumpang' => $option_penumpang
            )
        );
    }

    public function cari_blok1()
    {
        $kd_hlm = 'SDA2';
        $jenis = $this->input->post('id_jenis_penumpang');
        if ($jenis != 0) {
            $this->load->view('statistik_pariwisata/jumlah_penumpang/tahunan/beranda_kategori', array(
                'kd_hlm' => $kd_hlm, 'jenis' => $jenis
            ));
        } else {
            redirect('SPT_JumlahPenumpang');
        }
    }

    public function hasil_cari_blok1($jenis)
    {
        $this->load->model('m_spb_jlh_penumpang');
        $option_penumpang = $this->m_spb_jlh_penumpang->get_jenis_penumpang();
        $this->load->model('m_spt_jlh_penumpang');
        $data_kategori = $this->m_spt_jlh_penumpang->menurut_kategori($jenis);
        $this->load->view(
            'statistik_pariwisata/jumlah_penumpang/tahunan/menurut_kategori',
            array(
                'jenis' => $jenis, 'data_kategori' => $data_kategori,
                'option_penumpang' => $option_penumpang
            )
        );
    }

    public function menurut_blok2()
    {
        $tahun = 2020;
        $id_pintu_masuk = 1;
        $this->load->model('m_spb_jlh_penumpang');
        $option_pintu = $this->m_spb_jlh_penumpang->get_pintu_masuk();
        $this->load->model('m_spt_jlh_penumpang');
        $data_tahun1 = $this->m_spt_jlh_penumpang->menurut_pintu_1($tahun, $id_pintu_masuk);
        $data_tahun2 = $this->m_spt_jlh_penumpang->menurut_pintu_2($tahun, $id_pintu_masuk);
        $data_tahun3 = $this->m_spt_jlh_penumpang->menurut_pintu_3($tahun, $id_pintu_masuk);
        $data_tahun4 = $this->m_spt_jlh_penumpang->menurut_pintu_4($tahun, $id_pintu_masuk);
        $data_tahun5 = $this->m_spt_jlh_penumpang->menurut_pintu_5($tahun, $id_pintu_masuk);
        $this->load->view(
            'statistik_pariwisata/jumlah_penumpang/tahunan/menurut_pintu_masuk',
            array(
                'tahun' => $tahun, 'id_pintu_masuk' => $id_pintu_masuk, 'option_pintu' => $option_pintu,
                'data_tahun1' => $data_tahun1, 'data_tahun2' => $data_tahun2,
                'data_tahun3' => $data_tahun3, 'data_tahun4' => $data_tahun4, 'data_tahun5' => $data_tahun5
            )
        );
    }

    public function cari_blok2()
    {
        $kd_hlm = 'SDA2';
        $id_pintu_masuk = $this->input->post('id_pintu_masuk');
        $tahun = $this->input->post('tahun');
        if ($id_pintu_masuk != 0 && $tahun != 0) {
            $this->load->view('statistik_pariwisata/jumlah_penumpang/tahunan/beranda_pintu_masuk', array('kd_hlm' => $kd_hlm, 'id_pintu_masuk' => $id_pintu_masuk, 'tahun' => $tahun));
        } else {
            redirect('SPT_JumlahPenumpang');
        }
    }

    public function hasil_cari_blok2($id_pintu_masuk, $tahun)
    {
        $this->load->model('m_spb_jlh_penumpang');
        $option_pintu = $this->m_spb_jlh_penumpang->get_pintu_masuk();
        $this->load->model('m_spt_jlh_penumpang');
        $data_tahun1 = $this->m_spt_jlh_penumpang->menurut_pintu_1($tahun, $id_pintu_masuk);
        $data_tahun2 = $this->m_spt_jlh_penumpang->menurut_pintu_2($tahun, $id_pintu_masuk);
        $data_tahun3 = $this->m_spt_jlh_penumpang->menurut_pintu_3($tahun, $id_pintu_masuk);
        $data_tahun4 = $this->m_spt_jlh_penumpang->menurut_pintu_4($tahun, $id_pintu_masuk);
        $data_tahun5 = $this->m_spt_jlh_penumpang->menurut_pintu_5($tahun, $id_pintu_masuk);
        $this->load->view(
            'statistik_pariwisata/jumlah_penumpang/tahunan/menurut_pintu_masuk',
            array(
                'tahun' => $tahun, 'id_pintu_masuk' => $id_pintu_masuk, 'option_pintu' => $option_pintu,
                'data_tahun1' => $data_tahun1, 'data_tahun2' => $data_tahun2,
                'data_tahun3' => $data_tahun3, 'data_tahun4' => $data_tahun4, 'data_tahun5' => $data_tahun5
            )
        );
    }

    public function menurut_blok3()
    {
        $tahun = 2020;
        $this->load->model('m_spt_jlh_penumpang');
        $data_penumpang = $this->m_spt_jlh_penumpang->menurut_total_penumpang($tahun);
        $this->load->view(
            'statistik_pariwisata/jumlah_penumpang/tahunan/menurut_total_penumpang',
            array(
                'tahun' => $tahun, 'data_penumpang' => $data_penumpang
            )
        );
    }

    public function cari_blok3()
    {
        $kd_hlm = 'SDA2';
        $tahun = $this->input->post('tahun');
        if ($tahun != 0) {
            $this->load->view('statistik_pariwisata/jumlah_penumpang/tahunan/beranda_total_penumpang', array('kd_hlm' => $kd_hlm, 'tahun' => $tahun));
        } else {
            redirect('SPT_JumlahPenumpang');
        }
    }

    public function hasil_cari_blok3($tahun)
    {
        $this->load->model('m_spt_jlh_penumpang');
        $data_penumpang = $this->m_spt_jlh_penumpang->menurut_total_penumpang($tahun);
        $this->load->view(
            'statistik_pariwisata/jumlah_penumpang/tahunan/menurut_total_penumpang',
            array(
                'tahun' => $tahun, 'data_penumpang' => $data_penumpang
            )
        );
    }
}
