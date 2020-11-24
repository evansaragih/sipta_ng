<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SPT_JumlahWisman extends CI_Controller
{
    public function index()
    {
        $kd_hlm = 'SDB2';
        $this->load->view('statistik_pariwisata/jumlah_wisman/tahunan/beranda', array('kd_hlm' => $kd_hlm));
    }

    public function menurut_blok1()
    {
        $tahun = date('Y');
        $tahun1 = $tahun - 1;
        $tahun2 = $tahun - 2;
        $tahun3 = $tahun - 3;
        $tahun4 = $tahun - 4;
        $tahun5 = $tahun - 5;
        $this->load->model('m_spt_jlh_wisman');
        $total_wisman = $this->m_spt_jlh_wisman->get_total_wisman($tahun, $tahun5); //untuk jumlah pada footer tabel
        $grup_kebangsaan = $this->m_spt_jlh_wisman->get_group_kebangsaan();
        $data_tahun = $this->m_spt_jlh_wisman->get_jlh_wisman_januari($tahun);
        $data_tahun_1 = $this->m_spt_jlh_wisman->get_jlh_wisman_februari($tahun1);
        $data_tahun_2 = $this->m_spt_jlh_wisman->get_jlh_wisman_maret($tahun2);
        $data_tahun_3 = $this->m_spt_jlh_wisman->get_jlh_wisman_april($tahun3);
        $data_tahun_4 = $this->m_spt_jlh_wisman->get_jlh_wisman_mei($tahun4);
        $data_tahun_5 = $this->m_spt_jlh_wisman->get_jlh_wisman_juni($tahun5);
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/tahunan/menurut_kategori',
            array(
                'tahun' => $tahun, 'grup_kebangsaan' => $grup_kebangsaan, 'total_wisman' => $total_wisman,
                'data_tahun' => $data_tahun, 'data_tahun_1' => $data_tahun_1,
                'data_tahun_2' => $data_tahun_2, 'data_tahun_3' => $data_tahun_3,
                'data_tahun_4' => $data_tahun_4, 'data_tahun_5' => $data_tahun_5
            )
        );
    }

    public function menurut_blok1b() //perbaiki dulu modelnya
    {
        $asia = 1;
        $asean = 2;
        $africa = 3;
        $america = 4;
        $europe = 5;
        $mid_east = 6;
        $tahun = date('Y');
        $this->load->model('m_spt_jlh_wisman');
        $grup_kebangsaan = $this->m_spt_jlh_wisman->get_group_kebangsaan();
        $data_asia_tahun = $this->m_spt_jlh_wisman->get_jwisman_asia_tahun($tahun, $asia);
        $data_asean_tahun = $this->m_spt_jlh_wisman->get_jwisman_asean_tahun($tahun, $asean);
        $data_africa_tahun = $this->m_spt_jlh_wisman->get_jwisman_africa_tahun($tahun, $africa);
        $data_america_tahun = $this->m_spt_jlh_wisman->get_jwisman_america_tahun($tahun, $america);
        $data_europe_tahun = $this->m_spt_jlh_wisman->get_jwisman_europe_tahun($tahun, $europe);
        $data_mid_east_tahun = $this->m_spt_jlh_wisman->get_jwisman_mid_east_tahun($tahun, $mid_east);
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/tahunan/menurut_kategori_2',
            array(
                'tahun' => $tahun, 'grup_kebangsaan' => $grup_kebangsaan,
                'data_asia_tahun' => $data_asia_tahun,
                'data_asean_tahun' => $data_asean_tahun,
                'data_africa_tahun' => $data_africa_tahun,
                'data_america_tahun' => $data_america_tahun,
                'data_europe_tahun' => $data_europe_tahun,
                'data_mid_east_tahun' => $data_mid_east_tahun,
            )
        );
    }

    public function cari_blok1()
    {
        $kd_hlm = 'SDB2';
        $tahun = $this->input->post('tahun');
        if ($tahun != 0) {
            $this->load->view('statistik_pariwisata/jumlah_wisman/tahunan/beranda_kategori', array('kd_hlm' => $kd_hlm, 'tahun' => $tahun));
        } else {
            redirect('SPT_JumlahWisman');
        }
    }

    public function cari_blok1b()
    {
        $kd_hlm = 'SDB2';
        $tahun = $this->input->post('tahun');
        if ($tahun != 0) {
            $this->load->view('statistik_pariwisata/jumlah_wisman/tahunan/beranda_kategori_2', array('kd_hlm' => $kd_hlm, 'tahun' => $tahun));
        } else {
            redirect('SPT_JumlahWisman');
        }
    }

    public function hasil_cari_blok1($tahun)
    {
        $tahun1 = $tahun - 1;
        $tahun2 = $tahun - 2;
        $tahun3 = $tahun - 3;
        $tahun4 = $tahun - 4;
        $tahun5 = $tahun - 5;
        $this->load->model('m_spt_jlh_wisman');
        $total_wisman = $this->m_spt_jlh_wisman->get_total_wisman($tahun, $tahun5); //untuk jumlah pada footer tabel
        $grup_kebangsaan = $this->m_spt_jlh_wisman->get_group_kebangsaan();
        $data_tahun = $this->m_spt_jlh_wisman->get_jlh_wisman_januari($tahun);
        $data_tahun_1 = $this->m_spt_jlh_wisman->get_jlh_wisman_februari($tahun1);
        $data_tahun_2 = $this->m_spt_jlh_wisman->get_jlh_wisman_maret($tahun2);
        $data_tahun_3 = $this->m_spt_jlh_wisman->get_jlh_wisman_april($tahun3);
        $data_tahun_4 = $this->m_spt_jlh_wisman->get_jlh_wisman_mei($tahun4);
        $data_tahun_5 = $this->m_spt_jlh_wisman->get_jlh_wisman_juni($tahun5);
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/tahunan/menurut_kategori',
            array(
                'tahun' => $tahun, 'total_wisman' => $total_wisman, 'grup_kebangsaan' => $grup_kebangsaan,
                'data_tahun' => $data_tahun, 'data_tahun_1' => $data_tahun_1,
                'data_tahun_2' => $data_tahun_2, 'data_tahun_3' => $data_tahun_3,
                'data_tahun_4' => $data_tahun_4, 'data_tahun_5' => $data_tahun_5
            )
        );
    }

    public function hasil_cari_blok1b($tahun)
    {
        $asia = 1;
        $asean = 2;
        $africa = 3;
        $america = 4;
        $europe = 5;
        $mid_east = 6;
        $this->load->model('m_spt_jlh_wisman');
        $grup_kebangsaan = $this->m_spt_jlh_wisman->get_group_kebangsaan();
        $data_asia_tahun = $this->m_spt_jlh_wisman->get_jwisman_asia_tahun($tahun, $asia);
        $data_asean_tahun = $this->m_spt_jlh_wisman->get_jwisman_asean_tahun($tahun, $asean);
        $data_africa_tahun = $this->m_spt_jlh_wisman->get_jwisman_africa_tahun($tahun, $africa);
        $data_america_tahun = $this->m_spt_jlh_wisman->get_jwisman_america_tahun($tahun, $america);
        $data_europe_tahun = $this->m_spt_jlh_wisman->get_jwisman_europe_tahun($tahun, $europe);
        $data_mid_east_tahun = $this->m_spt_jlh_wisman->get_jwisman_mid_east_tahun($tahun, $mid_east);
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/tahunan/menurut_kategori_2',
            array(
                'tahun' => $tahun, 'grup_kebangsaan' => $grup_kebangsaan,
                'data_asia_tahun' => $data_asia_tahun,
                'data_asean_tahun' => $data_asean_tahun,
                'data_africa_tahun' => $data_africa_tahun,
                'data_america_tahun' => $data_america_tahun,
                'data_europe_tahun' => $data_europe_tahun,
                'data_mid_east_tahun' => $data_mid_east_tahun,
            )
        );
    }

    public function menurut_blok2()
    {
        $tahun = date('Y') - 1;
        $tahun_vs = date('Y');
        $this->load->model('m_spt_jlh_wisman');
        $grup_kebangsaan = $this->m_spt_jlh_wisman->get_group_kebangsaan();
        $bulan_1 = $this->m_spt_jlh_wisman->get_asia_tahun($tahun); //tahun1 grup id 1
        $bulan_2 = $this->m_spt_jlh_wisman->get_asean_tahun($tahun); //tahun1 grup id 2
        $bulan_3 = $this->m_spt_jlh_wisman->get_africa_tahun($tahun); //tahun1 grup id 3
        $bulan_4 = $this->m_spt_jlh_wisman->get_america_tahun($tahun); //tahun1 grup id 4
        $bulan_5 = $this->m_spt_jlh_wisman->get_europe_tahun($tahun); //tahun1 grup id 5
        $bulan_6 = $this->m_spt_jlh_wisman->get_mideast_tahun($tahun); //tahun1 grup id 6
        $bulan_7 = $this->m_spt_jlh_wisman->get_other_tahun($tahun); //tahun1 grup id 7
        $bulan_1_tahunvs = $this->m_spt_jlh_wisman->get_asia_tahun_vs($tahun_vs); //tahun2 grup id 1
        $bulan_2_tahunvs = $this->m_spt_jlh_wisman->get_asean_tahun_vs($tahun_vs); //tahun2 grup id 2
        $bulan_3_tahunvs = $this->m_spt_jlh_wisman->get_africa_tahun_vs($tahun_vs); //tahun2 grup id 3
        $bulan_4_tahunvs = $this->m_spt_jlh_wisman->get_america_tahun_vs($tahun_vs); //tahun2 grup id 4
        $bulan_5_tahunvs = $this->m_spt_jlh_wisman->get_europe_tahun_vs($tahun_vs); //tahun2 grup id 5
        $bulan_6_tahunvs = $this->m_spt_jlh_wisman->get_mideast_tahun_vs($tahun_vs); //tahun2 grup id 6
        $bulan_7_tahunvs = $this->m_spt_jlh_wisman->get_other_tahun_vs($tahun_vs); //tahun2 grup id 7
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/tahunan/menurut_growth',
            array(
                'bulan_1' => $bulan_1, 'bulan_2' => $bulan_2, 'bulan_3' => $bulan_3,
                'bulan_4' => $bulan_4, 'bulan_5' => $bulan_5, 'bulan_6' => $bulan_6,
                'bulan_7' => $bulan_7,
                'bulan_1_tahunvs' => $bulan_1_tahunvs, 'bulan_2_tahunvs' => $bulan_2_tahunvs,
                'bulan_3_tahunvs' => $bulan_3_tahunvs, 'bulan_4_tahunvs' => $bulan_4_tahunvs,
                'bulan_5_tahunvs' => $bulan_5_tahunvs, 'bulan_6_tahunvs' => $bulan_6_tahunvs,
                'bulan_7_tahunvs' => $bulan_7_tahunvs,
                'tahun' => $tahun, 'tahun_vs' => $tahun_vs, 'grup_kebangsaan' => $grup_kebangsaan
            )
        );
    }

    public function cari_blok2()
    {
        $kd_hlm = 'SDB2';
        $tahun = $this->input->post('tahun');
        $tahun_vs = $this->input->post('tahun_vs');
        if ($tahun_vs != 0 && $tahun != 0) {
            $this->load->view(
                'statistik_pariwisata/jumlah_wisman/tahunan/beranda_growth',
                array('kd_hlm' => $kd_hlm, 'tahun' => $tahun, 'tahun_vs' => $tahun_vs)
            );
        } else {
            redirect('SPT_JumlahWisman');
        }
    }

    public function hasil_cari_blok2($tahun, $tahun_vs)
    {
        $this->load->model('m_spt_jlh_wisman');
        $grup_kebangsaan = $this->m_spt_jlh_wisman->get_group_kebangsaan();
        $bulan_1 = $this->m_spt_jlh_wisman->get_asia_tahun($tahun); //tahun1 grup id 1
        $bulan_2 = $this->m_spt_jlh_wisman->get_asean_tahun($tahun); //tahun1 grup id 2
        $bulan_3 = $this->m_spt_jlh_wisman->get_africa_tahun($tahun); //tahun1 grup id 3
        $bulan_4 = $this->m_spt_jlh_wisman->get_america_tahun($tahun); //tahun1 grup id 4
        $bulan_5 = $this->m_spt_jlh_wisman->get_europe_tahun($tahun); //tahun1 grup id 5
        $bulan_6 = $this->m_spt_jlh_wisman->get_mideast_tahun($tahun); //tahun1 grup id 6
        $bulan_7 = $this->m_spt_jlh_wisman->get_other_tahun($tahun); //tahun1 grup id 7
        $bulan_1_tahunvs = $this->m_spt_jlh_wisman->get_asia_tahun_vs($tahun_vs); //tahun2 grup id 1
        $bulan_2_tahunvs = $this->m_spt_jlh_wisman->get_asean_tahun_vs($tahun_vs); //tahun2 grup id 2
        $bulan_3_tahunvs = $this->m_spt_jlh_wisman->get_africa_tahun_vs($tahun_vs); //tahun2 grup id 3
        $bulan_4_tahunvs = $this->m_spt_jlh_wisman->get_america_tahun_vs($tahun_vs); //tahun2 grup id 4
        $bulan_5_tahunvs = $this->m_spt_jlh_wisman->get_europe_tahun_vs($tahun_vs); //tahun2 grup id 5
        $bulan_6_tahunvs = $this->m_spt_jlh_wisman->get_mideast_tahun_vs($tahun_vs); //tahun2 grup id 6
        $bulan_7_tahunvs = $this->m_spt_jlh_wisman->get_other_tahun_vs($tahun_vs); //tahun2 grup id 7
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/tahunan/menurut_growth',
            array(
                'bulan_1' => $bulan_1, 'bulan_2' => $bulan_2, 'bulan_3' => $bulan_3,
                'bulan_4' => $bulan_4, 'bulan_5' => $bulan_5, 'bulan_6' => $bulan_6,
                'bulan_7' => $bulan_7,
                'bulan_1_tahunvs' => $bulan_1_tahunvs, 'bulan_2_tahunvs' => $bulan_2_tahunvs,
                'bulan_3_tahunvs' => $bulan_3_tahunvs, 'bulan_4_tahunvs' => $bulan_4_tahunvs,
                'bulan_5_tahunvs' => $bulan_5_tahunvs, 'bulan_6_tahunvs' => $bulan_6_tahunvs,
                'bulan_7_tahunvs' => $bulan_7_tahunvs,
                'tahun' => $tahun, 'tahun_vs' => $tahun_vs, 'grup_kebangsaan' => $grup_kebangsaan
            )
        );
    }

    public function menurut_blok3()
    {
        $id_grup = 1;
        $tahun = 2000;
        $this->load->model('m_spt_jlh_wisman');
        $grup_kebangsaan = $this->m_spt_jlh_wisman->get_group_kebangsaan();
        $data_jwisman = $this->m_spt_jlh_wisman->get_blok3($id_grup, $tahun);
        $data_id_group = $this->m_spt_jlh_wisman->get_id_grup_kebangsaan_blok3($id_grup);
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/tahunan/menurut_kebangsaan',
            array(
                'grup_kebangsaan' => $grup_kebangsaan,
                'data_jwisman' => $data_jwisman, 'data_id_group' => $data_id_group,
                'tahun' => $tahun, 'id_grup' => $id_grup
            )
        );
    }

    public function cari_blok3()
    {
        $kd_hlm = 'SDB2';
        $id_grup = $this->input->post('id_grup');
        $tahun = $this->input->post('tahun');
        if ($id_grup != 0 && $tahun != 0) {
            $this->load->view(
                'statistik_pariwisata/jumlah_wisman/tahunan/beranda_kebangsaan',
                array('kd_hlm' => $kd_hlm, 'id_grup' => $id_grup, 'tahun' => $tahun)
            );
        } else {
            redirect('SPT_JumlahWisman');
        }
    }

    public function hasil_cari_blok3($id_grup, $tahun)
    {
        $this->load->model('m_spt_jlh_wisman');
        $grup_kebangsaan = $this->m_spt_jlh_wisman->get_group_kebangsaan();
        $data_jwisman = $this->m_spt_jlh_wisman->get_blok3($id_grup, $tahun);
        $data_id_group = $this->m_spt_jlh_wisman->get_id_grup_kebangsaan_blok3($id_grup);
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/tahunan/menurut_kebangsaan',
            array(
                'grup_kebangsaan' => $grup_kebangsaan,
                'data_jwisman' => $data_jwisman, 'data_id_group' => $data_id_group,
                'tahun' => $tahun, 'id_grup' => $id_grup
            )
        );
    }

    public function menurut_blok4()
    {
        $id_nationality = 1;
        $this->load->model('m_spt_jlh_wisman');
        $grup_kebangsaan = $this->m_spt_jlh_wisman->get_group_kebangsaan();
        $data_id_kebangsaan = $this->m_spt_jlh_wisman->get_id_kebangsaan_blok4($id_nationality);
        $data_jwisman = $this->m_spt_jlh_wisman->get_blok4($id_nationality);
        $data_kebangsaan = $this->m_spt_jlh_wisman->get_kebangsaan_blok4();
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/tahunan/menurut_waktu',
            array(
                'grup_kebangsaan' => $grup_kebangsaan, 'id_nationality' => $id_nationality,
                'data_jwisman' => $data_jwisman, 'data_id_kebangsaan' => $data_id_kebangsaan,
                'data_kebangsaan' => $data_kebangsaan
            )
        );
    }

    public function cari_blok4()
    {
        $kd_hlm = 'SDB2';
        $id_nationality = $this->input->post('id_nationality');
        if ($id_nationality != 0) {
            $this->load->view(
                'statistik_pariwisata/jumlah_wisman/tahunan/beranda_waktu',
                array('kd_hlm' => $kd_hlm, 'id_nationality' => $id_nationality)
            );
        } else {
            redirect('SPT_JumlahWisman');
        }
    }

    public function hasil_cari_blok4($id_nationality)
    {
        $this->load->model('m_spt_jlh_wisman');
        $grup_kebangsaan = $this->m_spt_jlh_wisman->get_group_kebangsaan();
        $data_id_kebangsaan = $this->m_spt_jlh_wisman->get_id_kebangsaan_blok4($id_nationality);
        $data_jwisman = $this->m_spt_jlh_wisman->get_blok4($id_nationality);
        $data_kebangsaan = $this->m_spt_jlh_wisman->get_kebangsaan_blok4();
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/tahunan/menurut_waktu',
            array(
                'grup_kebangsaan' => $grup_kebangsaan, 'id_nationality' => $id_nationality,
                'data_jwisman' => $data_jwisman, 'data_id_kebangsaan' => $data_id_kebangsaan,
                'data_kebangsaan' => $data_kebangsaan
            )
        );
    }

    public function menurut_blok5()
    {
        $tahun = 2018;
        $this->load->model('m_spt_jlh_wisman');
        $rank_tahun = $this->m_spt_jlh_wisman->get_ranking_tahun($tahun);
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/tahunan/menurut_rank',
            array(
                'tahun' => $tahun, 'rank_tahun' => $rank_tahun
            )
        );
    }

    public function cari_blok5()
    {
        $kd_hlm = 'SDB2';
        $tahun = $this->input->post('tahun');
        if ($tahun != 0) {
            $this->load->view(
                'statistik_pariwisata/jumlah_wisman/tahunan/beranda_rank',
                array('kd_hlm' => $kd_hlm, 'tahun' => $tahun)
            );
        } else {
            redirect('SPT_JumlahWisman');
        }
    }

    public function hasil_cari_blok5($tahun)
    {
        $this->load->model('m_spt_jlh_wisman');
        $rank_tahun = $this->m_spt_jlh_wisman->get_ranking_tahun($tahun);
        $this->load->view(
            'statistik_pariwisata/jumlah_wisman/tahunan/menurut_rank',
            array(
                'tahun' => $tahun, 'rank_tahun' => $rank_tahun
            )
        );
    }
}
