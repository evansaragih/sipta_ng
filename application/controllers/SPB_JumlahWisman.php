<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SPB_JumlahWisman extends CI_Controller
{
    public function index()
    {
        $kd_hlm = 'SDB1';
        $this->output->delete_cache();
        $this->load->view('statistik_pariwisata/jumlah_wisman/bulanan/beranda', array('kd_hlm' => $kd_hlm));
    }

    public function menurut_blok1()
    {
        $tahun = date('Y');
        $this->load->model('m_spb_jlh_wisman');
        $total_wisman = $this->m_spb_jlh_wisman->get_total_wisman($tahun); //untuk jumlah pada footer tabel
        $grup_kebangsaan = $this->m_spb_jlh_wisman->get_group_kebangsaan();
        $data_januari = $this->m_spb_jlh_wisman->get_jlh_wisman_januari($tahun);
        $data_februari = $this->m_spb_jlh_wisman->get_jlh_wisman_februari($tahun);
        $data_maret = $this->m_spb_jlh_wisman->get_jlh_wisman_maret($tahun);
        $data_april = $this->m_spb_jlh_wisman->get_jlh_wisman_april($tahun);
        $data_mei = $this->m_spb_jlh_wisman->get_jlh_wisman_mei($tahun);
        $data_juni = $this->m_spb_jlh_wisman->get_jlh_wisman_juni($tahun);
        $data_juli = $this->m_spb_jlh_wisman->get_jlh_wisman_juli($tahun);
        $data_agustus = $this->m_spb_jlh_wisman->get_jlh_wisman_agt($tahun);
        $data_september = $this->m_spb_jlh_wisman->get_jlh_wisman_sept($tahun);
        $data_oktober = $this->m_spb_jlh_wisman->get_jlh_wisman_okt($tahun);
        $data_november = $this->m_spb_jlh_wisman->get_jlh_wisman_nov($tahun);
        $data_desember = $this->m_spb_jlh_wisman->get_jlh_wisman_des($tahun);
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/bulanan/menurut_kategori',
            array(
                'tahun' => $tahun, 'total_wisman' => $total_wisman,
                'data_januari' => $data_januari, 'data_februari' => $data_februari,
                'data_maret' => $data_maret, 'data_april' => $data_april,
                'data_mei' => $data_mei, 'data_juni' => $data_juni, 'data_juli' => $data_juli,
                'data_agustus' => $data_agustus, 'data_september' => $data_september, 'data_oktober' => $data_oktober,
                'data_november' => $data_november, 'data_desember' => $data_desember, 'grup_kebangsaan' => $grup_kebangsaan,
            )
        );
    }

    public function menurut_blok1b() //menampilkan map
    {
        $tahun = date('Y');
        $bulan = 'Januari';
        $this->load->model('m_spb_jlh_wisman');
        // $total_wisman = $this->m_spb_jlh_wisman->get_total_wisman($tahun); //untuk jumlah pada footer tabel]
        $data_bulan_blok3 = $this->m_spb_jlh_wisman->get_bulan_blok3();
        $data_id_bulan = $this->m_spb_jlh_wisman->get_id_bulan_blok3($bulan);
        $data_asean = $this->m_spb_jlh_wisman->get_asean($tahun, $bulan);
        $data_asia = $this->m_spb_jlh_wisman->get_asia($tahun, $bulan);
        $data_africa = $this->m_spb_jlh_wisman->get_africa($tahun, $bulan);
        $data_american = $this->m_spb_jlh_wisman->get_american($tahun, $bulan);
        $data_europe = $this->m_spb_jlh_wisman->get_europe($tahun, $bulan);
        $data_middle_east = $this->m_spb_jlh_wisman->get_middle_east($tahun, $bulan);
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/bulanan/menurut_kategori_2',
            array(
                'tahun' => $tahun, 'data_bulan_blok3' => $data_bulan_blok3, 'data_id_bulan' => $data_id_bulan,
                'data_asean' => $data_asean, 'bulan' => $bulan,
                'data_asia' => $data_asia,
                'data_africa' => $data_africa,
                'data_american' => $data_american,
                'data_europe' => $data_europe,
                'data_middle_east' => $data_middle_east
            )
        );
    }

    public function cari_blok1()
    {
        $kd_hlm = 'SDB1';
        $tahun = $this->input->post('tahun');
        if ($tahun != 0) {
            $this->load->view('statistik_pariwisata/jumlah_wisman/bulanan/beranda_kategori', array('kd_hlm' => $kd_hlm, 'tahun' => $tahun));
        } else {
            redirect('SPB_JumlahWisman');
        }
    }

    public function cari_blok1b()
    {
        $kd_hlm = 'SDB1';
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('id_bulan');
        if ($tahun != 0) {
            $this->load->view('statistik_pariwisata/jumlah_wisman/bulanan/beranda_kategori_2', array('kd_hlm' => $kd_hlm, 'tahun' => $tahun, 'bulan' => $bulan));
        } else {
            redirect('SPB_JumlahWisman');
        }
    }

    public function hasil_cari_blok1($tahun)
    {
        $this->load->model('m_spb_jlh_wisman');
        $total_wisman = $this->m_spb_jlh_wisman->get_total_wisman($tahun); //untuk jumlah pada footer tabel
        $grup_kebangsaan = $this->m_spb_jlh_wisman->get_group_kebangsaan();
        $data_januari = $this->m_spb_jlh_wisman->get_jlh_wisman_januari($tahun);
        $data_februari = $this->m_spb_jlh_wisman->get_jlh_wisman_februari($tahun);
        $data_maret = $this->m_spb_jlh_wisman->get_jlh_wisman_maret($tahun);
        $data_april = $this->m_spb_jlh_wisman->get_jlh_wisman_april($tahun);
        $data_mei = $this->m_spb_jlh_wisman->get_jlh_wisman_mei($tahun);
        $data_juni = $this->m_spb_jlh_wisman->get_jlh_wisman_juni($tahun);
        $data_juli = $this->m_spb_jlh_wisman->get_jlh_wisman_juli($tahun);
        $data_agustus = $this->m_spb_jlh_wisman->get_jlh_wisman_agt($tahun);
        $data_september = $this->m_spb_jlh_wisman->get_jlh_wisman_sept($tahun);
        $data_oktober = $this->m_spb_jlh_wisman->get_jlh_wisman_okt($tahun);
        $data_november = $this->m_spb_jlh_wisman->get_jlh_wisman_nov($tahun);
        $data_desember = $this->m_spb_jlh_wisman->get_jlh_wisman_des($tahun);
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/bulanan/menurut_kategori',
            array(
                'tahun' => $tahun, 'total_wisman' => $total_wisman,
                'data_januari' => $data_januari, 'data_februari' => $data_februari,
                'data_maret' => $data_maret, 'data_april' => $data_april,
                'data_mei' => $data_mei, 'data_juni' => $data_juni, 'data_juli' => $data_juli,
                'data_agustus' => $data_agustus, 'data_september' => $data_september, 'data_oktober' => $data_oktober,
                'data_november' => $data_november, 'data_desember' => $data_desember, 'grup_kebangsaan' => $grup_kebangsaan,
            )
        );
    }

    public function hasil_cari_blok1b($tahun, $bulan) //menampilkan map
    {
        $this->load->model('m_spb_jlh_wisman');
        $data_bulan_blok3 = $this->m_spb_jlh_wisman->get_bulan_blok3();
        $data_id_bulan = $this->m_spb_jlh_wisman->get_id_bulan_blok3($bulan);
        $data_asean = $this->m_spb_jlh_wisman->get_asean($tahun, $bulan);
        $data_asia = $this->m_spb_jlh_wisman->get_asia($tahun, $bulan);
        $data_africa = $this->m_spb_jlh_wisman->get_africa($tahun, $bulan);
        $data_american = $this->m_spb_jlh_wisman->get_american($tahun, $bulan);
        $data_europe = $this->m_spb_jlh_wisman->get_europe($tahun, $bulan);
        $data_middle_east = $this->m_spb_jlh_wisman->get_middle_east($tahun, $bulan);
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/bulanan/menurut_kategori_2',
            array(
                'tahun' => $tahun, 'data_bulan_blok3' => $data_bulan_blok3, 'data_id_bulan' => $data_id_bulan,
                'data_asean' => $data_asean, 'bulan' => $bulan,
                'data_asia' => $data_asia,
                'data_africa' => $data_africa,
                'data_american' => $data_american,
                'data_europe' => $data_europe,
                'data_middle_east' => $data_middle_east
            )
        );
    }

    public function menurut_blok2()
    {
        $id_grup = 1;
        $tahun = date('Y') - 1;
        $tahun_vs = date('Y');
        $this->load->model('m_spb_jlh_wisman');
        $grup_kebangsaan = $this->m_spb_jlh_wisman->get_group_kebangsaan();
        $jenis_kebangsaan = $this->m_spb_jlh_wisman->get_jenis_kebangsaan($id_grup);
        $bulan_1 = $this->m_spb_jlh_wisman->get_bulan1_tahun($id_grup, $tahun);
        $bulan_2 = $this->m_spb_jlh_wisman->get_bulan2_tahun($id_grup, $tahun);
        $bulan_3 = $this->m_spb_jlh_wisman->get_bulan3_tahun($id_grup, $tahun);
        $bulan_4 = $this->m_spb_jlh_wisman->get_bulan4_tahun($id_grup, $tahun);
        $bulan_5 = $this->m_spb_jlh_wisman->get_bulan5_tahun($id_grup, $tahun);
        $bulan_6 = $this->m_spb_jlh_wisman->get_bulan6_tahun($id_grup, $tahun);
        $bulan_7 = $this->m_spb_jlh_wisman->get_bulan7_tahun($id_grup, $tahun);
        $bulan_8 = $this->m_spb_jlh_wisman->get_bulan8_tahun($id_grup, $tahun);
        $bulan_9 = $this->m_spb_jlh_wisman->get_bulan9_tahun($id_grup, $tahun);
        $bulan_10 = $this->m_spb_jlh_wisman->get_bulan10_tahun($id_grup, $tahun);
        $bulan_11 = $this->m_spb_jlh_wisman->get_bulan11_tahun($id_grup, $tahun);
        $bulan_12 = $this->m_spb_jlh_wisman->get_bulan12_tahun($id_grup, $tahun);
        $bulan_1_tahunvs = $this->m_spb_jlh_wisman->get_bulan1_tahun_vs($id_grup, $tahun_vs);
        $bulan_2_tahunvs = $this->m_spb_jlh_wisman->get_bulan2_tahun_vs($id_grup, $tahun_vs);
        $bulan_3_tahunvs = $this->m_spb_jlh_wisman->get_bulan3_tahun_vs($id_grup, $tahun_vs);
        $bulan_4_tahunvs = $this->m_spb_jlh_wisman->get_bulan4_tahun_vs($id_grup, $tahun_vs);
        $bulan_5_tahunvs = $this->m_spb_jlh_wisman->get_bulan5_tahun_vs($id_grup, $tahun_vs);
        $bulan_6_tahunvs = $this->m_spb_jlh_wisman->get_bulan6_tahun_vs($id_grup, $tahun_vs);
        $bulan_7_tahunvs = $this->m_spb_jlh_wisman->get_bulan7_tahun_vs($id_grup, $tahun_vs);
        $bulan_8_tahunvs = $this->m_spb_jlh_wisman->get_bulan8_tahun_vs($id_grup, $tahun_vs);
        $bulan_9_tahunvs = $this->m_spb_jlh_wisman->get_bulan9_tahun_vs($id_grup, $tahun_vs);
        $bulan_10_tahunvs = $this->m_spb_jlh_wisman->get_bulan10_tahun_vs($id_grup, $tahun_vs);
        $bulan_11_tahunvs = $this->m_spb_jlh_wisman->get_bulan11_tahun_vs($id_grup, $tahun_vs);
        $bulan_12_tahunvs = $this->m_spb_jlh_wisman->get_bulan12_tahun_vs($id_grup, $tahun_vs);
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/bulanan/menurut_growth',
            array(
                'bulan_1' => $bulan_1, 'bulan_2' => $bulan_2, 'bulan_3' => $bulan_3,
                'bulan_4' => $bulan_4, 'bulan_5' => $bulan_5, 'bulan_6' => $bulan_6,
                'bulan_7' => $bulan_7, 'bulan_8' => $bulan_8, 'bulan_9' => $bulan_9,
                'bulan_10' => $bulan_10, 'bulan_11' => $bulan_11, 'bulan_12' => $bulan_12,
                'bulan_1_tahunvs' => $bulan_1_tahunvs, 'bulan_2_tahunvs' => $bulan_2_tahunvs,
                'bulan_3_tahunvs' => $bulan_3_tahunvs, 'bulan_4_tahunvs' => $bulan_4_tahunvs,
                'bulan_5_tahunvs' => $bulan_5_tahunvs, 'bulan_6_tahunvs' => $bulan_6_tahunvs,
                'bulan_7_tahunvs' => $bulan_7_tahunvs, 'bulan_8_tahunvs' => $bulan_8_tahunvs,
                'bulan_9_tahunvs' => $bulan_9_tahunvs, 'bulan_10_tahunvs' => $bulan_10_tahunvs,
                'bulan_11_tahunvs' => $bulan_11_tahunvs, 'bulan_12_tahunvs' => $bulan_12_tahunvs,
                'tahun' => $tahun, 'tahun_vs' => $tahun_vs, 'grup_kebangsaan' => $grup_kebangsaan,
                'id_grup' => $id_grup, 'jenis_kebangsaan' => $jenis_kebangsaan
            )
        );
    }

    public function cari_blok2()
    {
        $kd_hlm = 'SDB1';
        $id_grup = $this->input->post('id_grup_kebangsaan');
        $tahun = $this->input->post('tahun');
        $tahun_vs = $this->input->post('tahun_vs');
        if ($id_grup != 0 && $tahun != 0) {
            $this->load->view(
                'statistik_pariwisata/jumlah_wisman/bulanan/beranda_growth',
                array('kd_hlm' => $kd_hlm, 'id_grup' => $id_grup, 'tahun' => $tahun, 'tahun_vs' => $tahun_vs)
            );
        } else {
            redirect('SPB_JumlahWisman');
        }
    }

    public function hasil_cari_blok2($id_grup, $tahun, $tahun_vs)
    {
        $this->load->model('m_spb_jlh_wisman');
        $grup_kebangsaan = $this->m_spb_jlh_wisman->get_group_kebangsaan();
        $jenis_kebangsaan = $this->m_spb_jlh_wisman->get_jenis_kebangsaan($id_grup);
        $bulan_1 = $this->m_spb_jlh_wisman->get_bulan1_tahun($id_grup, $tahun);
        $bulan_2 = $this->m_spb_jlh_wisman->get_bulan2_tahun($id_grup, $tahun);
        $bulan_3 = $this->m_spb_jlh_wisman->get_bulan3_tahun($id_grup, $tahun);
        $bulan_4 = $this->m_spb_jlh_wisman->get_bulan4_tahun($id_grup, $tahun);
        $bulan_5 = $this->m_spb_jlh_wisman->get_bulan5_tahun($id_grup, $tahun);
        $bulan_6 = $this->m_spb_jlh_wisman->get_bulan6_tahun($id_grup, $tahun);
        $bulan_7 = $this->m_spb_jlh_wisman->get_bulan7_tahun($id_grup, $tahun);
        $bulan_8 = $this->m_spb_jlh_wisman->get_bulan8_tahun($id_grup, $tahun);
        $bulan_9 = $this->m_spb_jlh_wisman->get_bulan9_tahun($id_grup, $tahun);
        $bulan_10 = $this->m_spb_jlh_wisman->get_bulan10_tahun($id_grup, $tahun);
        $bulan_11 = $this->m_spb_jlh_wisman->get_bulan11_tahun($id_grup, $tahun);
        $bulan_12 = $this->m_spb_jlh_wisman->get_bulan12_tahun($id_grup, $tahun);
        $bulan_1_tahunvs = $this->m_spb_jlh_wisman->get_bulan1_tahun_vs($id_grup, $tahun_vs);
        $bulan_2_tahunvs = $this->m_spb_jlh_wisman->get_bulan2_tahun_vs($id_grup, $tahun_vs);
        $bulan_3_tahunvs = $this->m_spb_jlh_wisman->get_bulan3_tahun_vs($id_grup, $tahun_vs);
        $bulan_4_tahunvs = $this->m_spb_jlh_wisman->get_bulan4_tahun_vs($id_grup, $tahun_vs);
        $bulan_5_tahunvs = $this->m_spb_jlh_wisman->get_bulan5_tahun_vs($id_grup, $tahun_vs);
        $bulan_6_tahunvs = $this->m_spb_jlh_wisman->get_bulan6_tahun_vs($id_grup, $tahun_vs);
        $bulan_7_tahunvs = $this->m_spb_jlh_wisman->get_bulan7_tahun_vs($id_grup, $tahun_vs);
        $bulan_8_tahunvs = $this->m_spb_jlh_wisman->get_bulan8_tahun_vs($id_grup, $tahun_vs);
        $bulan_9_tahunvs = $this->m_spb_jlh_wisman->get_bulan9_tahun_vs($id_grup, $tahun_vs);
        $bulan_10_tahunvs = $this->m_spb_jlh_wisman->get_bulan10_tahun_vs($id_grup, $tahun_vs);
        $bulan_11_tahunvs = $this->m_spb_jlh_wisman->get_bulan11_tahun_vs($id_grup, $tahun_vs);
        $bulan_12_tahunvs = $this->m_spb_jlh_wisman->get_bulan12_tahun_vs($id_grup, $tahun_vs);
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/bulanan/menurut_growth',
            array(
                'bulan_1' => $bulan_1, 'bulan_2' => $bulan_2, 'bulan_3' => $bulan_3,
                'bulan_4' => $bulan_4, 'bulan_5' => $bulan_5, 'bulan_6' => $bulan_6,
                'bulan_7' => $bulan_7, 'bulan_8' => $bulan_8, 'bulan_9' => $bulan_9,
                'bulan_10' => $bulan_10, 'bulan_11' => $bulan_11, 'bulan_12' => $bulan_12,
                'bulan_1_tahunvs' => $bulan_1_tahunvs, 'bulan_2_tahunvs' => $bulan_2_tahunvs,
                'bulan_3_tahunvs' => $bulan_3_tahunvs, 'bulan_4_tahunvs' => $bulan_4_tahunvs,
                'bulan_5_tahunvs' => $bulan_5_tahunvs, 'bulan_6_tahunvs' => $bulan_6_tahunvs,
                'bulan_7_tahunvs' => $bulan_7_tahunvs, 'bulan_8_tahunvs' => $bulan_8_tahunvs,
                'bulan_9_tahunvs' => $bulan_9_tahunvs, 'bulan_10_tahunvs' => $bulan_10_tahunvs,
                'bulan_11_tahunvs' => $bulan_11_tahunvs, 'bulan_12_tahunvs' => $bulan_12_tahunvs,
                'tahun' => $tahun, 'tahun_vs' => $tahun_vs, 'grup_kebangsaan' => $grup_kebangsaan,
                'id_grup' => $id_grup, 'jenis_kebangsaan' => $jenis_kebangsaan
            )
        );
    }

    public function menurut_blok3()
    {
        $id_grup = 1;
        $tahun = date('Y');
        $bulan = 'Januari';
        $this->load->model('m_spb_jlh_wisman');
        $grup_kebangsaan = $this->m_spb_jlh_wisman->get_group_kebangsaan();
        $data_jwisman = $this->m_spb_jlh_wisman->get_blok3($id_grup, $bulan, $tahun);
        $data_bulan_blok3 = $this->m_spb_jlh_wisman->get_bulan_blok3();
        $data_id_bulan = $this->m_spb_jlh_wisman->get_id_bulan_blok3($bulan);
        $data_id_group = $this->m_spb_jlh_wisman->get_jenis_kebangsaan($id_grup);
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/bulanan/menurut_kebangsaan',
            array(
                'grup_kebangsaan' => $grup_kebangsaan, 'data_id_bulan' => $data_id_bulan,
                'data_jwisman' => $data_jwisman, 'bulan' => $bulan, 'data_id_group' => $data_id_group,
                'tahun' => $tahun, 'id_grup' => $id_grup, 'data_bulan_blok3' => $data_bulan_blok3
            )
        );
    }

    public function cari_blok3()
    {
        $kd_hlm = 'SDB1';
        $id_grup = $this->input->post('id_grup');
        $bulan = $this->input->post('id_bulan');
        $tahun = $this->input->post('tahun');
        if ($id_grup != 0 && $tahun != 0) {
            $this->load->view(
                'statistik_pariwisata/jumlah_wisman/bulanan/beranda_kebangsaan',
                array('kd_hlm' => $kd_hlm, 'id_grup' => $id_grup, 'bulan' => $bulan, 'tahun' => $tahun)
            );
        } else {
            redirect('SPB_JumlahWisman');
        }
    }

    public function hasil_cari_blok3($id_grup, $bulan, $tahun)
    {
        $this->load->model('m_spb_jlh_wisman');
        $grup_kebangsaan = $this->m_spb_jlh_wisman->get_group_kebangsaan();
        $data_jwisman = $this->m_spb_jlh_wisman->get_blok3($id_grup, $bulan, $tahun);
        $data_bulan_blok3 = $this->m_spb_jlh_wisman->get_bulan_blok3();
        $data_id_bulan = $this->m_spb_jlh_wisman->get_id_bulan_blok3($bulan);
        $data_id_group = $this->m_spb_jlh_wisman->get_jenis_kebangsaan($id_grup);
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/bulanan/menurut_kebangsaan',
            array(
                'grup_kebangsaan' => $grup_kebangsaan, 'data_id_bulan' => $data_id_bulan,
                'data_jwisman' => $data_jwisman, 'bulan' => $bulan, 'data_id_group' => $data_id_group,
                'tahun' => $tahun, 'id_grup' => $id_grup, 'data_bulan_blok3' => $data_bulan_blok3
            )
        );
    }

    public function menurut_blok4()
    {
        $tahun = date('Y');
        $id_nationality = 1;
        $this->load->model('m_spb_jlh_wisman');
        $grup_kebangsaan = $this->m_spb_jlh_wisman->get_group_kebangsaan();
        $data_id_kebangsaan = $this->m_spb_jlh_wisman->get_id_kebangsaan_blok4($id_nationality);
        $data_jwisman = $this->m_spb_jlh_wisman->get_blok4($id_nationality, $tahun);
        $data_kebangsaan = $this->m_spb_jlh_wisman->get_kebangsaan_blok4();
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/bulanan/menurut_waktu',
            array(
                'grup_kebangsaan' => $grup_kebangsaan, 'id_nationality' => $id_nationality,
                'data_jwisman' => $data_jwisman, 'data_id_kebangsaan' => $data_id_kebangsaan,
                'tahun' => $tahun, 'data_kebangsaan' => $data_kebangsaan
            )
        );
    }

    public function cari_blok4()
    {
        $kd_hlm = 'SDB1';
        $id_nationality = $this->input->post('id_nationality');
        $tahun = $this->input->post('tahun');
        if ($id_nationality != 0 && $tahun != 0) {
            $this->load->view(
                'statistik_pariwisata/jumlah_wisman/bulanan/beranda_waktu',
                array('kd_hlm' => $kd_hlm, 'id_nationality' => $id_nationality, 'tahun' => $tahun)
            );
        } else {
            redirect('SPB_JumlahWisman');
        }
    }

    public function hasil_cari_blok4($id_nationality, $tahun)
    {
        $this->load->model('m_spb_jlh_wisman');
        $grup_kebangsaan = $this->m_spb_jlh_wisman->get_group_kebangsaan();
        $data_id_kebangsaan = $this->m_spb_jlh_wisman->get_id_kebangsaan_blok4($id_nationality);
        $data_jwisman = $this->m_spb_jlh_wisman->get_blok4($id_nationality, $tahun);
        $data_kebangsaan = $this->m_spb_jlh_wisman->get_kebangsaan_blok4();
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/bulanan/menurut_waktu',
            array(
                'grup_kebangsaan' => $grup_kebangsaan, 'id_nationality' => $id_nationality,
                'data_jwisman' => $data_jwisman, 'data_id_kebangsaan' => $data_id_kebangsaan,
                'tahun' => $tahun, 'data_kebangsaan' => $data_kebangsaan
            )
        );
    }

    public function menurut_blok5()
    {
        $tahun = date('Y');
        $bulan = 'Januari';
        $this->load->model('m_spb_jlh_wisman');
        $rank_tahun = $this->m_spb_jlh_wisman->get_ranking_bulan($tahun, $bulan);
        $data_bulan_blok5 = $this->m_spb_jlh_wisman->get_bulan_blok3();
        $data_id_bulan = $this->m_spb_jlh_wisman->get_id_bulan_blok3($bulan);
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/bulanan/menurut_rank',
            array(
                'tahun' => $tahun, 'rank_tahun' => $rank_tahun, 'data_bulan_blok5' => $data_bulan_blok5,
                'data_id_bulan' => $data_id_bulan, 'bulan' => $bulan
            )
        );
    }

    public function cari_blok5()
    {
        $kd_hlm = 'SDB1';
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('id_bulan');
        if ($tahun != 0) {
            $this->load->view(
                'statistik_pariwisata/jumlah_wisman/bulanan/beranda_rank',
                array('kd_hlm' => $kd_hlm, 'tahun' => $tahun, 'bulan' => $bulan)
            );
        } else {
            redirect('SPB_JumlahWisman');
        }
    }

    public function hasil_cari_blok5($tahun, $bulan)
    {
        $this->load->model('m_spb_jlh_wisman');
        $rank_tahun = $this->m_spb_jlh_wisman->get_ranking_bulan($tahun, $bulan);
        $data_bulan_blok5 = $this->m_spb_jlh_wisman->get_bulan_blok3();
        $data_id_bulan = $this->m_spb_jlh_wisman->get_id_bulan_blok3($bulan);
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/bulanan/menurut_rank',
            array(
                'tahun' => $tahun, 'rank_tahun' => $rank_tahun, 'data_bulan_blok5' => $data_bulan_blok5,
                'data_id_bulan' => $data_id_bulan, 'bulan' => $bulan
            )
        );
    }
}
