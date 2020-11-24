<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $kd_hlm = 'SB1';
        $kat = 1;
        $tahun = date('Y') - 0;
        $tahun1 = $tahun - 1;
        $tahun2 = $tahun - 2;
        $tahun3 = $tahun - 3;
        $tahun4 = $tahun - 4;
        $tahun5 = $tahun - 5;
        $tahun10 = $tahun - 10;
        $kab = 1;
        $id_pintu_masuk = 3;
        $this->load->model('m_sp_akomodasi');
        $id_kategori = $this->m_sp_akomodasi->get_kategori();
        $data_akomodasi = $this->m_sp_akomodasi->get_menurut_wilayah($kat, $tahun);
        $kat_akomodasi = $this->m_sp_akomodasi->get_nama_kategori($kat);
        $kab_denpasar = $this->m_sp_akomodasi->get_kab_denpasar($tahun, $kat);
        $kab_badung = $this->m_sp_akomodasi->get_kab_badung($tahun, $kat);
        $kab_bangli = $this->m_sp_akomodasi->get_kab_bangli($tahun, $kat);
        $kab_buleleng = $this->m_sp_akomodasi->get_kab_buleleng($tahun, $kat);
        $kab_gianyar = $this->m_sp_akomodasi->get_kab_gianyar($tahun, $kat);
        $kab_jembrana = $this->m_sp_akomodasi->get_kab_jembrana($tahun, $kat);
        $kab_klungkung = $this->m_sp_akomodasi->get_kab_klungkung($tahun, $kat);
        $kab_karangasem = $this->m_sp_akomodasi->get_kab_karangasem($tahun, $kat);
        $kab_tabanan = $this->m_sp_akomodasi->get_kab_tabanan($tahun, $kat);
        $nilai_max = $this->m_sp_akomodasi->get_max($kat, $tahun);
        $nilai_min = $this->m_sp_akomodasi->get_min($kat, $tahun);
        $this->load->model('m_spt_jlh_wisman');
        $grup_kebangsaan = $this->m_spt_jlh_wisman->get_group_kebangsaan();
        $data_tahun = $this->m_spt_jlh_wisman->get_jlh_wisman_januari($tahun);
        $data_tahun_1 = $this->m_spt_jlh_wisman->get_jlh_wisman_februari($tahun1);
        $data_tahun_2 = $this->m_spt_jlh_wisman->get_jlh_wisman_maret($tahun2);
        $data_tahun_3 = $this->m_spt_jlh_wisman->get_jlh_wisman_april($tahun3);
        $data_tahun_4 = $this->m_spt_jlh_wisman->get_jlh_wisman_mei($tahun4);
        $data_tahun_5 = $this->m_spt_jlh_wisman->get_jlh_wisman_juni($tahun5);
        $this->load->model('m_pintu');
        $pintu_masuk = $this->m_pintu->get_pintu_query();
        $nama_pintu_masuk = $this->m_pintu->get_nama_pintu($id_pintu_masuk);
        $this->load->model('m_spt_jlh_penumpang');
        // $data_jpenumpang = $this->m_spt_jlh_penumpang->get_jlh_penumpang_pertahun($id_pintu_masuk, $tahun, $tahun10);
        $this->load->model('m_akomodasi');
        $kabupaten = $this->m_akomodasi->get_kabupaten_query();
        $this->load->model('m_sp_akomodasi');
        $data_akomodasi_2 = $this->m_sp_akomodasi->get_menurut_kategori($kab, $tahun);
        $nama_kabupaten = $this->m_sp_akomodasi->get_nama_kabupaten($kab);
        // $this->load->model('m_sp_restoran');
        // $data_restoran = $this->m_sp_restoran->get_menurut_wilayah($tahun);
        // $this->load->model('m_sp_bar');
        // $data_bar = $this->m_sp_bar->get_menurut_wilayah($tahun);
        // $this->load->model('m_sp_akomodasi_bintang');
        // $data_akomodasi_bintang = $this->m_sp_akomodasi_bintang->get_menurut_kategori($kab, $tahun);
        // $this->load->model('m_sp_objek_wisata');
        // $unit_objek_wisata = $this->m_sp_objek_wisata->get_menurut_wilayah($tahun);
        $this->load->model('m_dashboard');
        // $kunjungan_objek_wisata = $this->m_dashboard->kunjungan_objek_wisata($tahun);
        $box1a = $this->m_dashboard->box1a($tahun);
        $box1b = $this->m_dashboard->box1b($tahun);
        $box1aa = $this->m_dashboard->box1a($tahun - 1);
        $box1bb = $this->m_dashboard->box1b($tahun - 1);
        $box2a = $this->m_dashboard->box2a($tahun);
        $box2aa = $this->m_dashboard->box2a($tahun - 1);
        $box2b = $this->m_dashboard->box2b($tahun);
        $box3a = $this->m_dashboard->box3a($tahun);
        // $box3b = $this->m_dashboard->box3b($tahun);
        $box3aa = $this->m_dashboard->box3a($tahun - 1);
        // $box3bb = $this->m_dashboard->box3b($tahun - 1);
        $box4a = $this->m_dashboard->box4a($tahun);
        $box4b = $this->m_dashboard->box4b($tahun);
        $box4aa = $this->m_dashboard->box4a($tahun - 1);
        $box4bb = $this->m_dashboard->box4b($tahun - 1);
        $box5a = $this->m_dashboard->box5a($tahun);
        $box5b = $this->m_dashboard->box5b($tahun);
        $box5aa = $this->m_dashboard->box5a($tahun - 1);
        $box5bb = $this->m_dashboard->box5b($tahun - 1);
        $box6a = $this->m_dashboard->box6a($tahun);
        $box6b = $this->m_dashboard->box6b($tahun);
        $box6aa = $this->m_dashboard->box6a($tahun - 1);
        $box6bb = $this->m_dashboard->box6b($tahun - 1);
        $wisman_terbanyak = $this->m_dashboard->wisman_terbanyak($tahun);
        $objek_wisata_terbanyak = $this->m_dashboard->objek_wisata_terbanyak($tahun);
        $restoran_terbanyak = $this->m_dashboard->restoran_terbanyak($tahun);
        $akomodasi_terbanyak = $this->m_dashboard->akomodasi_terbanyak($tahun);
        $hotel_bintang_terbanyak = $this->m_dashboard->hotel_bintang_terbanyak($tahun);
        $bar_terbanyak = $this->m_dashboard->bar_terbanyak($tahun);
        $this->load->view('dashboard/test2', array(
            'kd_hlm' => $kd_hlm, 'id_kategori' => $id_kategori, 'data_akomodasi' => $data_akomodasi,
            'kat' => $kat, 'tahun' => $tahun, 'kat_akomodasi' => $kat_akomodasi,
            'kab_denpasar' => $kab_denpasar, 'kab_badung' => $kab_badung, 'kab_bangli' => $kab_bangli,
            'kab_buleleng' => $kab_buleleng, 'kab_gianyar' => $kab_gianyar, 'kab_jembrana' => $kab_jembrana,
            'kab_klungkung' => $kab_klungkung, 'kab_karangasem' => $kab_karangasem, 'kab_tabanan' => $kab_tabanan,
            'nilai_max' => $nilai_max, 'nilai_min' => $nilai_min,
            'grup_kebangsaan' => $grup_kebangsaan,
            'data_tahun' => $data_tahun, 'data_tahun_1' => $data_tahun_1,
            'data_tahun_2' => $data_tahun_2, 'data_tahun_3' => $data_tahun_3,
            'data_tahun_4' => $data_tahun_4, 'data_tahun_5' => $data_tahun_5, 'pintu_masuk' => $pintu_masuk,
            'nama_pintu_masuk' => $nama_pintu_masuk, 'id_pintu_masuk' => $id_pintu_masuk,
            'data_akomodasi_2' => $data_akomodasi_2, 'nama_kabupaten' => $nama_kabupaten, 'kabupaten' => $kabupaten, 'kab' => $kab,
            'box1a' => $box1a, 'box1aa' => $box1aa, 'box1b' => $box1b, 'box1bb' => $box1bb,
            'box2a' => $box2a, 'box2aa' => $box2aa, 'box3a' => $box3a, 'box3aa' => $box3aa,
            'box4a' => $box4a, 'box4aa' => $box4aa, 'box4b' => $box4b, 'box4bb' => $box4bb,
            'box5a' => $box5a, 'box5aa' => $box5aa, 'box5b' => $box5b, 'box5bb' => $box5bb,
            'box6a' => $box6a, 'box6aa' => $box6aa, 'box6b' => $box6b, 'box6bb' => $box6bb,
            'box2b' => $box2b,
            'wisman_terbanyak' => $wisman_terbanyak, 'objek_wisata_terbanyak' => $objek_wisata_terbanyak,
            'restoran_terbanyak' => $restoran_terbanyak, 'bar_terbanyak' => $bar_terbanyak,
            'akomodasi_terbanyak' => $akomodasi_terbanyak, 'hotel_bintang_terbanyak' => $hotel_bintang_terbanyak
        ));
        // $this->load->view('dashboard/test');
    }

    public function getData()
    {
        $kd_hlm = 'SB1';
        $kat = $this->input->post('id_kategori');
        $tahun = $this->input->post('tahun');
        $id_pintu_masuk = $this->input->post('id_pintu_masuk');
        $kab = $this->input->post('id_kabupaten');
        if ($tahun != 0) {
            $tahun1 = $tahun - 1;
            $tahun2 = $tahun - 2;
            $tahun3 = $tahun - 3;
            $tahun4 = $tahun - 4;
            $tahun5 = $tahun - 5;
            $tahun10 = $tahun - 10;
            $this->load->model('m_sp_akomodasi');
            $id_kategori = $this->m_sp_akomodasi->get_kategori_query();
            $data_akomodasi = $this->m_sp_akomodasi->get_menurut_wilayah($kat, $tahun);
            $kat_akomodasi = $this->m_sp_akomodasi->get_kat_akomodasi($kat);
            $kab_denpasar = $this->m_sp_akomodasi->get_kab_denpasar($tahun, $kat);
            $kab_badung = $this->m_sp_akomodasi->get_kab_badung($tahun, $kat);
            $kab_bangli = $this->m_sp_akomodasi->get_kab_bangli($tahun, $kat);
            $kab_buleleng = $this->m_sp_akomodasi->get_kab_buleleng($tahun, $kat);
            $kab_gianyar = $this->m_sp_akomodasi->get_kab_gianyar($tahun, $kat);
            $kab_jembrana = $this->m_sp_akomodasi->get_kab_jembrana($tahun, $kat);
            $kab_klungkung = $this->m_sp_akomodasi->get_kab_klungkung($tahun, $kat);
            $kab_karangasem = $this->m_sp_akomodasi->get_kab_karangasem($tahun, $kat);
            $kab_tabanan = $this->m_sp_akomodasi->get_kab_tabanan($tahun, $kat);
            $nilai_max = $this->m_sp_akomodasi->get_max($kat, $tahun);
            $nilai_min = $this->m_sp_akomodasi->get_min($kat, $tahun);
            $this->load->model('m_spt_jlh_wisman');
            $grup_kebangsaan = $this->m_spt_jlh_wisman->get_group_kebangsaan();
            $data_tahun = $this->m_spt_jlh_wisman->get_jlh_wisman_januari($tahun);
            $data_tahun_1 = $this->m_spt_jlh_wisman->get_jlh_wisman_februari($tahun1);
            $data_tahun_2 = $this->m_spt_jlh_wisman->get_jlh_wisman_maret($tahun2);
            $data_tahun_3 = $this->m_spt_jlh_wisman->get_jlh_wisman_april($tahun3);
            $data_tahun_4 = $this->m_spt_jlh_wisman->get_jlh_wisman_mei($tahun4);
            $data_tahun_5 = $this->m_spt_jlh_wisman->get_jlh_wisman_juni($tahun5);
            $this->load->model('m_pintu');
            $pintu_masuk = $this->m_pintu->get_pintu_query();
            $nama_pintu_masuk = $this->m_pintu->get_nama_pintu($id_pintu_masuk);
            $this->load->model('m_spt_jlh_penumpang');
            $data_jpenumpang = $this->m_spt_jlh_penumpang->get_jlh_penumpang_pertahun($id_pintu_masuk, $tahun, $tahun10);
            $this->load->model('m_akomodasi');
            $kabupaten = $this->m_akomodasi->get_kabupaten_query();
            $this->load->model('m_sp_akomodasi');
            $data_akomodasi_2 = $this->m_sp_akomodasi->get_menurut_kategori($kab, $tahun);
            $nama_kabupaten = $this->m_sp_akomodasi->get_nama_kabupaten($kab);
            $this->load->model('m_sp_restoran');
            $data_restoran = $this->m_sp_restoran->get_menurut_wilayah($tahun);
            $this->load->model('m_sp_bar');
            $data_bar = $this->m_sp_bar->get_menurut_wilayah($tahun);
            $this->load->model('m_sp_akomodasi_bintang');
            $data_akomodasi_bintang = $this->m_sp_akomodasi_bintang->get_menurut_kategori($kab, $tahun);
            $this->load->model('m_sp_objek_wisata');
            $unit_objek_wisata = $this->m_sp_objek_wisata->get_menurut_wilayah($tahun);
            $this->load->model('m_dashboard');
            $kunjungan_objek_wisata = $this->m_dashboard->kunjungan_objek_wisata($tahun);
            $box1a = $this->m_dashboard->box1a($tahun);
            $box1b = $this->m_dashboard->box1b($tahun);
            $box1aa = $this->m_dashboard->box1a($tahun - 1);
            $box1bb = $this->m_dashboard->box1b($tahun - 1);
            $box2a = $this->m_dashboard->box2a($tahun);
            $box2b = $this->m_dashboard->box2b($tahun);
            $box2aa = $this->m_dashboard->box2a($tahun - 1);
            $box2bb = $this->m_dashboard->box2b($tahun - 1);
            $box3a = $this->m_dashboard->box3a($tahun);
            $box3b = $this->m_dashboard->box3b($tahun);
            $box3aa = $this->m_dashboard->box3a($tahun - 1);
            $box3bb = $this->m_dashboard->box3b($tahun - 1);
            $box4a = $this->m_dashboard->box4a($tahun);
            $box4b = $this->m_dashboard->box4b($tahun);
            $box4aa = $this->m_dashboard->box4a($tahun - 1);
            $box4bb = $this->m_dashboard->box4b($tahun - 1);
            $box5a = $this->m_dashboard->box5a($tahun);
            $box5b = $this->m_dashboard->box5b($tahun);
            $box5aa = $this->m_dashboard->box5a($tahun - 1);
            $box5bb = $this->m_dashboard->box5b($tahun - 1);
            $wisman_terbanyak = $this->m_dashboard->wisman_terbanyak($tahun);
            $objek_wisata_terbanyak = $this->m_dashboard->objek_wisata_terbanyak($tahun);
            $restoran_terbanyak = $this->m_dashboard->restoran_terbanyak($tahun);
            $akomodasi_terbanyak = $this->m_dashboard->akomodasi_terbanyak($tahun);
            $hotel_bintang_terbanyak = $this->m_dashboard->hotel_bintang_terbanyak($tahun);
            $bar_terbanyak = $this->m_dashboard->bar_terbanyak($tahun);
            $this->load->view('dashboard/test2', array(
                'kd_hlm' => $kd_hlm, 'id_kategori' => $id_kategori, 'data_akomodasi' => $data_akomodasi,
                'kat' => $kat, 'tahun' => $tahun, 'kat_akomodasi' => $kat_akomodasi,
                'kab_denpasar' => $kab_denpasar, 'kab_badung' => $kab_badung, 'kab_bangli' => $kab_bangli,
                'kab_buleleng' => $kab_buleleng, 'kab_gianyar' => $kab_gianyar, 'kab_jembrana' => $kab_jembrana,
                'kab_klungkung' => $kab_klungkung, 'kab_karangasem' => $kab_karangasem, 'kab_tabanan' => $kab_tabanan,
                'nilai_max' => $nilai_max, 'nilai_min' => $nilai_min,
                'grup_kebangsaan' => $grup_kebangsaan,
                'data_tahun' => $data_tahun, 'data_tahun_1' => $data_tahun_1,
                'data_tahun_2' => $data_tahun_2, 'data_tahun_3' => $data_tahun_3,
                'data_tahun_4' => $data_tahun_4, 'data_tahun_5' => $data_tahun_5, 'pintu_masuk' => $pintu_masuk, 'data_jpenumpang' => $data_jpenumpang,
                'nama_pintu_masuk' => $nama_pintu_masuk, 'id_pintu_masuk' => $id_pintu_masuk,
                'data_akomodasi_2' => $data_akomodasi_2, 'nama_kabupaten' => $nama_kabupaten, 'kabupaten' => $kabupaten, 'kab' => $kab,
                'unit_objek_wisata' => $unit_objek_wisata, 'kunjungan_objek_wisata' => $kunjungan_objek_wisata,
                'box1a' => $box1a, 'box1b' => $box1b, 'box2a' => $box2a, 'box2b' => $box2b, 'box3a' => $box3a,
                'box3b' => $box3b, 'box4a' => $box4a, 'box4b' => $box4b, 'box5a' => $box5a, 'box5b' => $box5b,
                'data_restoran' => $data_restoran, 'data_bar' => $data_bar, 'data_akomodasi_bintang' => $data_akomodasi_bintang,
                'box1aa' => $box1aa, 'box1bb' => $box1bb, 'box2aa' => $box2aa, 'box2bb' => $box2bb,
                'box3aa' => $box3aa, 'box3bb' => $box3bb, 'box4aa' => $box4aa, 'box4bb' => $box4bb,
                'box5aa' => $box5aa, 'box5bb' => $box5bb, 'wisman_terbanyak' => $wisman_terbanyak,
                'objek_wisata_terbanyak' => $objek_wisata_terbanyak, 'restoran_terbanyak' => $restoran_terbanyak,
                'akomodasi_terbanyak' => $akomodasi_terbanyak, 'hotel_bintang_terbanyak' => $hotel_bintang_terbanyak,
                'bar_terbanyak' => $bar_terbanyak
            ));
        } else {
            redirect('Dashboard');
        }
    }
}
