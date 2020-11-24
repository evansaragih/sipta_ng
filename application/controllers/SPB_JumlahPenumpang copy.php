<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SPB_JumlahPenumpang extends CI_Controller
{
    public function index()
    {
        $kd_hlm = 'SDA1';
        $this->load->view('statistik_pariwisata/jumlah_penumpang/bulanan/beranda'
        , array('kd_hlm' => $kd_hlm));
    }

    public function menurut_blok1()
    {
        $tahun = 2018;
        $this->load->model('m_spb_jlh_penumpang');
        // $jumlah = $this->m_spb_jlh_penumpang->get_jumlah_kategori1($tahun);
        $data_jlh_penumpang = $this->m_spb_jlh_penumpang->get_jpenumpang_kategori($tahun);
        $data_januari = $this->m_spb_jlh_penumpang->get_jpenumpang_januari($tahun);
        $data_februari = $this->m_spb_jlh_penumpang->get_jpenumpang_februari($tahun);
        $data_maret = $this->m_spb_jlh_penumpang->get_jpenumpang_maret($tahun);
        $data_april = $this->m_spb_jlh_penumpang->get_jpenumpang_april($tahun);
        $data_mei = $this->m_spb_jlh_penumpang->get_jpenumpang_mei($tahun);
        $data_juni = $this->m_spb_jlh_penumpang->get_jpenumpang_juni($tahun);
        $data_juli = $this->m_spb_jlh_penumpang->get_jpenumpang_juli($tahun);
        $data_agustus = $this->m_spb_jlh_penumpang->get_jpenumpang_agustus($tahun);
        $data_september = $this->m_spb_jlh_penumpang->get_jpenumpang_september($tahun);
        $data_oktober = $this->m_spb_jlh_penumpang->get_jpenumpang_oktober($tahun);
        $data_november = $this->m_spb_jlh_penumpang->get_jpenumpang_november($tahun);
        $data_desember = $this->m_spb_jlh_penumpang->get_jpenumpang_desember($tahun);
        $bandara_int = array();//untuk data grafik
        $bandara_dom = array();
        $bandara_total = array();  //cara buat https://blog.didanurwanda.com/2013/04/codeigniter-membuat-chart-dengan.html
        foreach ($this->m_spb_jlh_penumpang->get_bandara_kategori($tahun)->result_array() as $row) {
            $bandara_dom[] = $row['jlh_domestik'];
            $bandara_int[] = $row['jlh_internasional'];
            $bandara_total[] = $row['total'];
        }
        $pelKG_int = array();
        $pelKG_dom = array();
        $pelKG_total = array();
        foreach ($this->m_spb_jlh_penumpang->get_pelKG_kategori($tahun)->result_array() as $row) {
            $pelKG_int[] = $row['jlh_internasional'];
            $pelKG_dom[] = $row['jlh_domestik'];
            $pelKG_total[] = $row['total'];
        }
        $pelLP_int = array();
        $pelLP_dom = array();
        $pelLP_total = array();
        foreach ($this->m_spb_jlh_penumpang->get_pelLP_kategori($tahun)->result_array() as $row) {
            $pelLP_int[] = $row['jlh_internasional'];
            $pelLP_dom[] = $row['jlh_domestik'];
            $pelLP_total[] = $row['total'];
        }
        $this->load->view(
            'statistik_pariwisata/jumlah_penumpang/bulanan/menurut_pintu_masuk',
            array(
                'data_jlh_penumpang' => $data_jlh_penumpang,
                'data_januari' => $data_januari, 'data_februari' => $data_februari,
                'data_maret' => $data_maret, 'data_april' => $data_april, 'data_mei' => $data_mei, 'data_juni' => $data_juni,
                'data_juli' => $data_juli, 'data_agustus' => $data_agustus, 'data_september' => $data_september,
                'data_oktober' => $data_oktober, 'data_november' => $data_november, 'data_desember' => $data_desember,
                'bandara_int' => $bandara_int, 'bandara_dom' => $bandara_dom, 'pelKG_int' => $pelKG_int,
                'pelKG_dom' => $pelKG_dom, 'pelLP_int' => $pelLP_int, 'pelLP_dom' => $pelLP_dom, 'bandara_total' => $bandara_total,
                'pelKG_total' => $pelKG_total, 'pelLP_total' => $pelLP_total, 'tahun'=>$tahun
            )
        );
    }

    public function cari_blok1()
    {
        $kd_hlm = 'SDA1';    
        $tahun = $this->input->post('tahun');
        if ($tahun != 0) {
            $this->load->view('statistik_pariwisata/jumlah_penumpang/bulanan/beranda_pintu_masuk', array('kd_hlm' => $kd_hlm, 'tahun' => $tahun));
        } else {
            redirect('SPB_JumlahPenumpang');
        }
    }

    public function hasil_cari_blok1($tahun)
    {
        $this->load->model('m_spb_jlh_penumpang');
        // $jumlah = $this->m_spb_jlh_penumpang->get_jumlah_kategori1($tahun);
        $data_jlh_penumpang = $this->m_spb_jlh_penumpang->get_jpenumpang_kategori($tahun);
        $data_januari = $this->m_spb_jlh_penumpang->get_jpenumpang_januari($tahun);
        $data_februari = $this->m_spb_jlh_penumpang->get_jpenumpang_februari($tahun);
        $data_maret = $this->m_spb_jlh_penumpang->get_jpenumpang_maret($tahun);
        $data_april = $this->m_spb_jlh_penumpang->get_jpenumpang_april($tahun);
        $data_mei = $this->m_spb_jlh_penumpang->get_jpenumpang_mei($tahun);
        $data_juni = $this->m_spb_jlh_penumpang->get_jpenumpang_juni($tahun);
        $data_juli = $this->m_spb_jlh_penumpang->get_jpenumpang_juli($tahun);
        $data_agustus = $this->m_spb_jlh_penumpang->get_jpenumpang_agustus($tahun);
        $data_september = $this->m_spb_jlh_penumpang->get_jpenumpang_september($tahun);
        $data_oktober = $this->m_spb_jlh_penumpang->get_jpenumpang_oktober($tahun);
        $data_november = $this->m_spb_jlh_penumpang->get_jpenumpang_november($tahun);
        $data_desember = $this->m_spb_jlh_penumpang->get_jpenumpang_desember($tahun);
        $bandara_int = array();
        $bandara_dom = array();
        $bandara_total = array();  //cara buat https://blog.didanurwanda.com/2013/04/codeigniter-membuat-chart-dengan.html
        foreach ($this->m_spb_jlh_penumpang->get_bandara_kategori($tahun)->result_array() as $row) {
            $bandara_dom[] = $row['jlh_domestik'];
            $bandara_int[] = $row['jlh_internasional'];
            $bandara_total[] = $row['total'];
        }
        $pelKG_int = array();
        $pelKG_dom = array();
        $pelKG_total = array();
        foreach ($this->m_spb_jlh_penumpang->get_pelKG_kategori($tahun)->result_array() as $row) {
            $pelKG_int[] = $row['jlh_internasional'];
            $pelKG_dom[] = $row['jlh_domestik'];
            $pelKG_total[] = $row['total'];
        }
        $pelLP_int = array();
        $pelLP_dom = array();
        $pelLP_total = array();
        foreach ($this->m_spb_jlh_penumpang->get_pelLP_kategori($tahun)->result_array() as $row) {
            $pelLP_int[] = $row['jlh_internasional'];
            $pelLP_dom[] = $row['jlh_domestik'];
            $pelLP_total[] = $row['total'];
        }
        $this->load->view(
            'statistik_pariwisata/jumlah_penumpang/bulanan/menurut_pintu_masuk',
            array(
                'data_jlh_penumpang' => $data_jlh_penumpang,
                'data_januari' => $data_januari, 'data_februari' => $data_februari,
                'data_maret' => $data_maret, 'data_april' => $data_april, 'data_mei' => $data_mei, 'data_juni' => $data_juni,
                'data_juli' => $data_juli, 'data_agustus' => $data_agustus, 'data_september' => $data_september,
                'data_oktober' => $data_oktober, 'data_november' => $data_november, 'data_desember' => $data_desember,
                'bandara_int' => $bandara_int, 'bandara_dom' => $bandara_dom, 'pelKG_int' => $pelKG_int,
                'pelKG_dom' => $pelKG_dom, 'pelLP_int' => $pelLP_int, 'pelLP_dom' => $pelLP_dom, 'bandara_total' => $bandara_total,
                'pelKG_total' => $pelKG_total, 'pelLP_total' => $pelLP_total, 'tahun'=>$tahun
            )
        );
    }

    public function menurut_blok2()
    {
        $id_pintu_masuk = 3;
        $tahun = 2018;
        $this->load->model('m_pintu');
        $pintu_masuk = $this->m_pintu->get_pintu_query();
        $nama_pintu_masuk = $this->m_pintu->get_nama_pintu($id_pintu_masuk);
        $this->load->model('m_spb_jlh_penumpang');
        $data_jpenumpang = $this->m_spb_jlh_penumpang->get_jlh_penumpang_perbulan($id_pintu_masuk, $tahun);
        $bulan_1 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan1($id_pintu_masuk, $tahun);
        $bulan_2 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan2($id_pintu_masuk, $tahun);
        $bulan_3 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan3($id_pintu_masuk, $tahun);
        $bulan_4 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan4($id_pintu_masuk, $tahun);
        $bulan_5 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan5($id_pintu_masuk, $tahun);
        $bulan_6 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan6($id_pintu_masuk, $tahun);
        $bulan_7 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan7($id_pintu_masuk, $tahun);
        $bulan_8 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan8($id_pintu_masuk, $tahun);
        $bulan_9 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan9($id_pintu_masuk, $tahun);
        $bulan_10 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan10($id_pintu_masuk, $tahun);
        $bulan_11 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan11($id_pintu_masuk, $tahun);
        $bulan_12 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan12($id_pintu_masuk, $tahun);
        $this->load->view(
            'statistik_pariwisata/jumlah_penumpang/bulanan/menurut_waktu',
            array(
                'pintu_masuk' => $pintu_masuk, 'data_jpenumpang' => $data_jpenumpang,
                'bulan_1' => $bulan_1, 'bulan_2' => $bulan_2, 
                'bulan_3' => $bulan_3, 'bulan_4' => $bulan_4,'bulan_5' => $bulan_5, 
                'bulan_6' => $bulan_6, 'bulan_7' => $bulan_7, 'bulan_8' => $bulan_8,
                'bulan_9' => $bulan_9, 'bulan_10' => $bulan_10, 'bulan_11' => $bulan_11, 
                'bulan_12' => $bulan_12, 'tahun' =>$tahun, 'nama_pintu_masuk' => $nama_pintu_masuk, 
                'id_pintu_masuk' => $id_pintu_masuk
            )
        );
    }

    public function cari_blok2()
    {
        $kd_hlm = 'SDA1';
        $id_pintu_masuk = $this->input->post('id_pintu_masuk');
        $tahun = $this->input->post('tahun');
        if ($id_pintu_masuk != 0 && $tahun != 0) {
            $this->load->view('statistik_pariwisata/jumlah_penumpang/bulanan/beranda_waktu', array('kd_hlm' => $kd_hlm, 'id_pintu_masuk' => $id_pintu_masuk, 'tahun' => $tahun));
        } else {
            redirect('SPB_JumlahPenumpang');
        }
    }

    public function hasil_cari_blok2($id_pintu_masuk, $tahun)
    {
        $this->load->model('m_pintu');
        $pintu_masuk = $this->m_pintu->get_pintu_query();
        $nama_pintu_masuk = $this->m_pintu->get_nama_pintu($id_pintu_masuk);
        $this->load->model('m_sp_akomodasi');
        $kategori = $this->m_sp_akomodasi->get_kategori_query();
        $this->load->model('m_spb_jlh_penumpang');
        $data_jpenumpang = $this->m_spb_jlh_penumpang->get_jlh_penumpang_perbulan($id_pintu_masuk, $tahun);
        $jumlah = $this->m_spb_jlh_penumpang->get_jumlah_perbulan1($id_pintu_masuk, $tahun);
        $bulan_1 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan1($id_pintu_masuk, $tahun);
        $bulan_2 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan2($id_pintu_masuk, $tahun);
        $bulan_3 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan3($id_pintu_masuk, $tahun);
        $bulan_4 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan4($id_pintu_masuk, $tahun);
        $bulan_5 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan5($id_pintu_masuk, $tahun);
        $bulan_6 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan6($id_pintu_masuk, $tahun);
        $bulan_7 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan7($id_pintu_masuk, $tahun);
        $bulan_8 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan8($id_pintu_masuk, $tahun);
        $bulan_9 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan9($id_pintu_masuk, $tahun);
        $bulan_10 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan10($id_pintu_masuk, $tahun);
        $bulan_11 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan11($id_pintu_masuk, $tahun);
        $bulan_12 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan12($id_pintu_masuk, $tahun);
        $this->load->view(
            'statistik_pariwisata/jumlah_penumpang/bulanan/menurut_waktu',
            array(
                'pintu_masuk' => $pintu_masuk, 'kategori' => $kategori, 'data_jpenumpang' => $data_jpenumpang, 
                'jumlah' => $jumlah, 'bulan_1' => $bulan_1, 'bulan_2' => $bulan_2, 
                'bulan_3' => $bulan_3, 'bulan_4' => $bulan_4,'bulan_5' => $bulan_5, 
                'bulan_6' => $bulan_6, 'bulan_7' => $bulan_7, 'bulan_8' => $bulan_8,
                'bulan_9' => $bulan_9, 'bulan_10' => $bulan_10, 'bulan_11' => $bulan_11, 
                'bulan_12' => $bulan_12, 'tahun' =>$tahun, 'nama_pintu_masuk' => $nama_pintu_masuk, 
                'id_pintu_masuk' => $id_pintu_masuk
            )
        );
    }

    public function menurut_blok3()
    {
        $id_pintu_masuk = 3;
        $tahun = 2017;
        $tahun_vs = 2018;
        $this->load->model('m_pintu');
        $pintu_masuk = $this->m_pintu->get_pintu_query();
        $this->load->model('m_spb_jlh_penumpang');
        $bulan_1 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan1($id_pintu_masuk, $tahun);
        $bulan_2 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan2($id_pintu_masuk, $tahun);
        $bulan_3 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan3($id_pintu_masuk, $tahun);
        $bulan_4 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan4($id_pintu_masuk, $tahun);
        $bulan_5 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan5($id_pintu_masuk, $tahun);
        $bulan_6 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan6($id_pintu_masuk, $tahun);
        $bulan_7 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan7($id_pintu_masuk, $tahun);
        $bulan_8 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan8($id_pintu_masuk, $tahun);
        $bulan_9 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan9($id_pintu_masuk, $tahun);
        $bulan_10 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan10($id_pintu_masuk, $tahun);
        $bulan_11 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan11($id_pintu_masuk, $tahun);
        $bulan_12 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan12($id_pintu_masuk, $tahun);
        $bulan_1_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan1_tahunvs($id_pintu_masuk, $tahun_vs);
        $bulan_2_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan2_tahunvs($id_pintu_masuk, $tahun_vs);
        $bulan_3_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan3_tahunvs($id_pintu_masuk, $tahun_vs);
        $bulan_4_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan4_tahunvs($id_pintu_masuk, $tahun_vs);
        $bulan_5_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan5_tahunvs($id_pintu_masuk, $tahun_vs);
        $bulan_6_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan6_tahunvs($id_pintu_masuk, $tahun_vs);
        $bulan_7_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan7_tahunvs($id_pintu_masuk, $tahun_vs);
        $bulan_8_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan8_tahunvs($id_pintu_masuk, $tahun_vs);
        $bulan_9_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan9_tahunvs($id_pintu_masuk, $tahun_vs);
        $bulan_10_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan10_tahunvs($id_pintu_masuk, $tahun_vs);
        $bulan_11_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan11_tahunvs($id_pintu_masuk, $tahun_vs);
        $bulan_12_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan12_tahunvs($id_pintu_masuk, $tahun_vs);
        $this->load->view(
            'statistik_pariwisata/jumlah_penumpang/bulanan/menurut_growth',
            array(
                'pintu_masuk' => $pintu_masuk,
                'bulan_1' => $bulan_1, 'bulan_2' => $bulan_2, 
                'bulan_3' => $bulan_3, 'bulan_4' => $bulan_4,'bulan_5' => $bulan_5, 
                'bulan_6' => $bulan_6, 'bulan_7' => $bulan_7, 'bulan_8' => $bulan_8,
                'bulan_9' => $bulan_9, 'bulan_10' => $bulan_10, 'bulan_11' => $bulan_11, 
                'bulan_12' => $bulan_12,'bulan_1_tahunvs' => $bulan_1_tahunvs, 'bulan_2_tahunvs' => $bulan_2_tahunvs, 
                'bulan_3_tahunvs' => $bulan_3_tahunvs, 'bulan_4_tahunvs' => $bulan_4_tahunvs,'bulan_5_tahunvs' => $bulan_5_tahunvs, 
                'bulan_6_tahunvs' => $bulan_6_tahunvs, 'bulan_7_tahunvs' => $bulan_7_tahunvs, 'bulan_8_tahunvs' => $bulan_8_tahunvs,
                'bulan_9_tahunvs' => $bulan_9_tahunvs, 'bulan_10_tahunvs' => $bulan_10_tahunvs, 'bulan_11_tahunvs' => $bulan_11_tahunvs, 
                'bulan_12_tahunvs' => $bulan_12_tahunvs, 'tahun' =>$tahun,'tahun_vs' =>$tahun_vs, 
                'id_pintu_masuk' => $id_pintu_masuk
            )
        );
    }

    public function cari_blok3()
    {
        $kd_hlm = 'SDA1';
        $id_pintu_masuk = $this->input->post('id_pintu_masuk');
        $tahun = $this->input->post('tahun');
        $tahun_vs = $this->input->post('tahun_vs');
        if ($id_pintu_masuk != 0 && $tahun != 0) {
            $this->load->view('statistik_pariwisata/jumlah_penumpang/bulanan/beranda_growth', array('kd_hlm' => $kd_hlm, 'id_pintu_masuk' => $id_pintu_masuk, 'tahun' => $tahun, 'tahun_vs'=> $tahun_vs));
        } else {
            redirect('SPB_JumlahPenumpang');
        }
    }

    public function hasil_cari_blok3($id_pintu_masuk, $tahun, $tahun_vs)
    {
        $this->load->model('m_pintu');
        $pintu_masuk = $this->m_pintu->get_pintu_query();
        $this->load->model('m_spb_jlh_penumpang');
        $bulan_1 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan1($id_pintu_masuk, $tahun);
        $bulan_2 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan2($id_pintu_masuk, $tahun);
        $bulan_3 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan3($id_pintu_masuk, $tahun);
        $bulan_4 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan4($id_pintu_masuk, $tahun);
        $bulan_5 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan5($id_pintu_masuk, $tahun);
        $bulan_6 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan6($id_pintu_masuk, $tahun);
        $bulan_7 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan7($id_pintu_masuk, $tahun);
        $bulan_8 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan8($id_pintu_masuk, $tahun);
        $bulan_9 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan9($id_pintu_masuk, $tahun);
        $bulan_10 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan10($id_pintu_masuk, $tahun);
        $bulan_11 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan11($id_pintu_masuk, $tahun);
        $bulan_12 = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan12($id_pintu_masuk, $tahun);
        $bulan_1_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan1_tahunvs($id_pintu_masuk, $tahun_vs);
        $bulan_2_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan2_tahunvs($id_pintu_masuk, $tahun_vs);
        $bulan_3_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan3_tahunvs($id_pintu_masuk, $tahun_vs);
        $bulan_4_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan4_tahunvs($id_pintu_masuk, $tahun_vs);
        $bulan_5_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan5_tahunvs($id_pintu_masuk, $tahun_vs);
        $bulan_6_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan6_tahunvs($id_pintu_masuk, $tahun_vs);
        $bulan_7_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan7_tahunvs($id_pintu_masuk, $tahun_vs);
        $bulan_8_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan8_tahunvs($id_pintu_masuk, $tahun_vs);
        $bulan_9_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan9_tahunvs($id_pintu_masuk, $tahun_vs);
        $bulan_10_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan10_tahunvs($id_pintu_masuk, $tahun_vs);
        $bulan_11_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan11_tahunvs($id_pintu_masuk, $tahun_vs);
        $bulan_12_tahunvs = $this->m_spb_jlh_penumpang->get_jpenumpang_bulan12_tahunvs($id_pintu_masuk, $tahun_vs);
        $this->load->view(
            'statistik_pariwisata/jumlah_penumpang/bulanan/menurut_growth',
            array(
                'pintu_masuk' => $pintu_masuk,
                'bulan_1' => $bulan_1, 'bulan_2' => $bulan_2, 
                'bulan_3' => $bulan_3, 'bulan_4' => $bulan_4,'bulan_5' => $bulan_5, 
                'bulan_6' => $bulan_6, 'bulan_7' => $bulan_7, 'bulan_8' => $bulan_8,
                'bulan_9' => $bulan_9, 'bulan_10' => $bulan_10, 'bulan_11' => $bulan_11, 
                'bulan_12' => $bulan_12,'bulan_1_tahunvs' => $bulan_1_tahunvs, 'bulan_2_tahunvs' => $bulan_2_tahunvs, 
                'bulan_3_tahunvs' => $bulan_3_tahunvs, 'bulan_4_tahunvs' => $bulan_4_tahunvs,'bulan_5_tahunvs' => $bulan_5_tahunvs, 
                'bulan_6_tahunvs' => $bulan_6_tahunvs, 'bulan_7_tahunvs' => $bulan_7_tahunvs, 'bulan_8_tahunvs' => $bulan_8_tahunvs,
                'bulan_9_tahunvs' => $bulan_9_tahunvs, 'bulan_10_tahunvs' => $bulan_10_tahunvs, 'bulan_11_tahunvs' => $bulan_11_tahunvs, 
                'bulan_12_tahunvs' => $bulan_12_tahunvs, 'tahun' =>$tahun,'tahun_vs' =>$tahun_vs, 
                'id_pintu_masuk' => $id_pintu_masuk
            )
        );
    }
}
