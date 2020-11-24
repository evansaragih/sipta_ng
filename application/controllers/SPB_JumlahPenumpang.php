<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SPB_JumlahPenumpang extends CI_Controller
{
    public function index()
    {
        $kd_hlm = 'SDA1';
        $this->load->view(
            'statistik_pariwisata/jumlah_penumpang/bulanan/beranda',
            array('kd_hlm' => $kd_hlm)
        );
    }

    public function menurut_blok1()
    {
        $tahun = date('Y');
        $jenis = 1;
        $this->load->model('m_spb_jlh_penumpang');
        $option_penumpang = $this->m_spb_jlh_penumpang->get_jenis_penumpang();
        $data_januari = $this->m_spb_jlh_penumpang->menurut_kategori_januari($tahun, $jenis);
        $data_februari = $this->m_spb_jlh_penumpang->menurut_kategori_februari($tahun, $jenis);
        $data_maret = $this->m_spb_jlh_penumpang->menurut_kategori_maret($tahun, $jenis);
        $data_april = $this->m_spb_jlh_penumpang->menurut_kategori_april($tahun, $jenis);
        $data_mei = $this->m_spb_jlh_penumpang->menurut_kategori_mei($tahun, $jenis);
        $data_juni = $this->m_spb_jlh_penumpang->menurut_kategori_juni($tahun, $jenis);
        $data_juli = $this->m_spb_jlh_penumpang->menurut_kategori_juli($tahun, $jenis);
        $data_agustus = $this->m_spb_jlh_penumpang->menurut_kategori_agustus($tahun, $jenis);
        $data_september = $this->m_spb_jlh_penumpang->menurut_kategori_september($tahun, $jenis);
        $data_oktober = $this->m_spb_jlh_penumpang->menurut_kategori_oktober($tahun, $jenis);
        $data_november = $this->m_spb_jlh_penumpang->menurut_kategori_november($tahun, $jenis);
        $data_desember = $this->m_spb_jlh_penumpang->menurut_kategori_desember($tahun, $jenis);
        $sum_kategori = $this->m_spb_jlh_penumpang->menurut_kategori_jumlah($tahun, $jenis);
        $this->load->view(
            'statistik_pariwisata/jumlah_penumpang/bulanan/menurut_pintu_masuk',
            array(
                'tahun' => $tahun, 'option_penumpang' => $option_penumpang, 'jenis' => $jenis,
                'data_januari' => $data_januari, 'data_februari' => $data_februari,
                'data_maret' => $data_maret, 'data_april' => $data_april, 'data_mei' => $data_mei,
                'data_juni' => $data_juni, 'data_juli' => $data_juli, 'data_agustus' => $data_agustus,
                'data_september' => $data_september, 'data_oktober' => $data_oktober,
                'data_november' => $data_november, 'data_desember' => $data_desember,
                'sum_kategori' => $sum_kategori
            )
        );
    }

    public function cari_blok1()
    {
        $kd_hlm = 'SDA1';
        $jenis = $this->input->post('id_jenis_penumpang');
        $tahun = $this->input->post('tahun');
        if ($tahun != 0 && $jenis != 0) {
            $this->load->view('statistik_pariwisata/jumlah_penumpang/bulanan/beranda_pintu_masuk', array('kd_hlm' => $kd_hlm, 'tahun' => $tahun, 'jenis' => $jenis));
        } else {
            redirect('SPB_JumlahPenumpang');
        }
    }

    public function hasil_cari_blok1($tahun, $jenis)
    {
        $this->load->model('m_spb_jlh_penumpang');
        $option_penumpang = $this->m_spb_jlh_penumpang->get_jenis_penumpang();
        $data_januari = $this->m_spb_jlh_penumpang->menurut_kategori_januari($tahun, $jenis);
        $data_februari = $this->m_spb_jlh_penumpang->menurut_kategori_februari($tahun, $jenis);
        $data_maret = $this->m_spb_jlh_penumpang->menurut_kategori_maret($tahun, $jenis);
        $data_april = $this->m_spb_jlh_penumpang->menurut_kategori_april($tahun, $jenis);
        $data_mei = $this->m_spb_jlh_penumpang->menurut_kategori_mei($tahun, $jenis);
        $data_juni = $this->m_spb_jlh_penumpang->menurut_kategori_juni($tahun, $jenis);
        $data_juli = $this->m_spb_jlh_penumpang->menurut_kategori_juli($tahun, $jenis);
        $data_agustus = $this->m_spb_jlh_penumpang->menurut_kategori_agustus($tahun, $jenis);
        $data_september = $this->m_spb_jlh_penumpang->menurut_kategori_september($tahun, $jenis);
        $data_oktober = $this->m_spb_jlh_penumpang->menurut_kategori_oktober($tahun, $jenis);
        $data_november = $this->m_spb_jlh_penumpang->menurut_kategori_november($tahun, $jenis);
        $data_desember = $this->m_spb_jlh_penumpang->menurut_kategori_desember($tahun, $jenis);
        $sum_kategori = $this->m_spb_jlh_penumpang->menurut_kategori_jumlah($tahun, $jenis);
        $this->load->view(
            'statistik_pariwisata/jumlah_penumpang/bulanan/menurut_pintu_masuk',
            array(
                'tahun' => $tahun, 'option_penumpang' => $option_penumpang, 'jenis' => $jenis,
                'data_januari' => $data_januari, 'data_februari' => $data_februari,
                'data_maret' => $data_maret, 'data_april' => $data_april, 'data_mei' => $data_mei,
                'data_juni' => $data_juni, 'data_juli' => $data_juli, 'data_agustus' => $data_agustus,
                'data_september' => $data_september, 'data_oktober' => $data_oktober,
                'data_november' => $data_november, 'data_desember' => $data_desember,
                'sum_kategori' => $sum_kategori
            )
        );
    }

    public function menurut_blok2()
    {
        $tahun = 2020;
        $id_pintu_masuk = 1;
        $bulan = "Januari";
        $this->load->model('m_spb_jlh_penumpang');
        $option_pintu = $this->m_spb_jlh_penumpang->get_pintu_masuk();
        $option_bulan = $this->m_spb_jlh_penumpang->get_bulan();
        $data_tahun1 = $this->m_spb_jlh_penumpang->menurut_waktu_tahun1($tahun, $id_pintu_masuk, $bulan);
        $data_tahun2 = $this->m_spb_jlh_penumpang->menurut_waktu_tahun2($tahun, $id_pintu_masuk, $bulan);
        $data_tahun3 = $this->m_spb_jlh_penumpang->menurut_waktu_tahun3($tahun, $id_pintu_masuk, $bulan);
        $data_tahun4 = $this->m_spb_jlh_penumpang->menurut_waktu_tahun4($tahun, $id_pintu_masuk, $bulan);
        $data_tahun5 = $this->m_spb_jlh_penumpang->menurut_waktu_tahun5($tahun, $id_pintu_masuk, $bulan);
        $this->load->view(
            'statistik_pariwisata/jumlah_penumpang/bulanan/menurut_waktu',
            array(
                'tahun' => $tahun, 'id_pintu_masuk' => $id_pintu_masuk, 'bulan' => $bulan,
                'option_pintu' => $option_pintu, 'option_bulan' => $option_bulan,
                'id_pintu_masuk' => $id_pintu_masuk, 'bulan' => $bulan,
                'data_tahun1' => $data_tahun1, 'data_tahun2' => $data_tahun2,
                'data_tahun3' => $data_tahun3, 'data_tahun4' => $data_tahun4,
                'data_tahun5' => $data_tahun5
            )
        );
    }

    public function cari_blok2()
    {
        $kd_hlm = 'SDA1';
        $id_pintu_masuk = $this->input->post('id_pintu_masuk');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        if ($id_pintu_masuk != 0 && $tahun != 0 && $bulan != '') {
            $this->load->view('statistik_pariwisata/jumlah_penumpang/bulanan/beranda_waktu', array(
                'kd_hlm' => $kd_hlm,
                'id_pintu_masuk' => $id_pintu_masuk, 'tahun' => $tahun, 'bulan' => $bulan
            ));
        } else {
            redirect('SPB_JumlahPenumpang');
        }
    }

    public function hasil_cari_blok2($id_pintu_masuk, $tahun, $bulan)
    {
        $this->load->model('m_spb_jlh_penumpang');
        $option_pintu = $this->m_spb_jlh_penumpang->get_pintu_masuk();
        $option_bulan = $this->m_spb_jlh_penumpang->get_bulan();
        $data_tahun1 = $this->m_spb_jlh_penumpang->menurut_waktu_tahun1($tahun, $id_pintu_masuk, $bulan);
        $data_tahun2 = $this->m_spb_jlh_penumpang->menurut_waktu_tahun2($tahun, $id_pintu_masuk, $bulan);
        $data_tahun3 = $this->m_spb_jlh_penumpang->menurut_waktu_tahun3($tahun, $id_pintu_masuk, $bulan);
        $data_tahun4 = $this->m_spb_jlh_penumpang->menurut_waktu_tahun4($tahun, $id_pintu_masuk, $bulan);
        $data_tahun5 = $this->m_spb_jlh_penumpang->menurut_waktu_tahun5($tahun, $id_pintu_masuk, $bulan);
        $this->load->view(
            'statistik_pariwisata/jumlah_penumpang/bulanan/menurut_waktu',
            array(
                'tahun' => $tahun, 'id_pintu_masuk' => $id_pintu_masuk, 'bulan' => $bulan,
                'option_pintu' => $option_pintu, 'option_bulan' => $option_bulan,
                'id_pintu_masuk' => $id_pintu_masuk, 'bulan' => $bulan,
                'data_tahun1' => $data_tahun1, 'data_tahun2' => $data_tahun2,
                'data_tahun3' => $data_tahun3, 'data_tahun4' => $data_tahun4,
                'data_tahun5' => $data_tahun5
            )
        );
    }

    public function menurut_blok3()
    {
        $tahun = 2020;
        $id_pintu_masuk = 1;
        $this->load->model('m_spb_jlh_penumpang');
        $option_pintu = $this->m_spb_jlh_penumpang->get_pintu_masuk();
        $data_januari = $this->m_spb_jlh_penumpang->menurut_pintu_bulan1($tahun, $id_pintu_masuk);
        $data_februari = $this->m_spb_jlh_penumpang->menurut_pintu_bulan2($tahun, $id_pintu_masuk);
        $data_maret = $this->m_spb_jlh_penumpang->menurut_pintu_bulan3($tahun, $id_pintu_masuk);
        $data_april = $this->m_spb_jlh_penumpang->menurut_pintu_bulan4($tahun, $id_pintu_masuk);
        $data_mei = $this->m_spb_jlh_penumpang->menurut_pintu_bulan5($tahun, $id_pintu_masuk);
        $data_juni = $this->m_spb_jlh_penumpang->menurut_pintu_bulan6($tahun, $id_pintu_masuk);
        $data_juli = $this->m_spb_jlh_penumpang->menurut_pintu_bulan7($tahun, $id_pintu_masuk);
        $data_agustus = $this->m_spb_jlh_penumpang->menurut_pintu_bulan8($tahun, $id_pintu_masuk);
        $data_september = $this->m_spb_jlh_penumpang->menurut_pintu_bulan9($tahun, $id_pintu_masuk);
        $data_oktober = $this->m_spb_jlh_penumpang->menurut_pintu_bulan10($tahun, $id_pintu_masuk);
        $data_november = $this->m_spb_jlh_penumpang->menurut_pintu_bulan11($tahun, $id_pintu_masuk);
        $data_desember = $this->m_spb_jlh_penumpang->menurut_pintu_bulan12($tahun, $id_pintu_masuk);
        $sum_pintu = $this->m_spb_jlh_penumpang->menurut_pintu_jumlah($tahun, $id_pintu_masuk);
        $this->load->view(
            'statistik_pariwisata/jumlah_penumpang/bulanan/menurut_growth',
            array(
                'tahun' => $tahun, 'id_pintu_masuk' => $id_pintu_masuk, 'option_pintu' => $option_pintu,
                'data_januari' => $data_januari, 'data_februari' => $data_februari,
                'data_maret' => $data_maret, 'data_april' => $data_april, 'data_mei' => $data_mei,
                'data_juni' => $data_juni, 'data_juli' => $data_juli, 'data_agustus' => $data_agustus,
                'data_september' => $data_september, 'data_oktober' => $data_oktober,
                'data_november' => $data_november, 'data_desember' => $data_desember,
                'sum_pintu' => $sum_pintu
            )
        );
    }

    public function cari_blok3()
    {
        $kd_hlm = 'SDA1';
        $id_pintu_masuk = $this->input->post('id_pintu_masuk');
        $tahun = $this->input->post('tahun');
        if ($id_pintu_masuk != 0 && $tahun != 0) {
            $this->load->view('statistik_pariwisata/jumlah_penumpang/bulanan/beranda_growth', array('kd_hlm' => $kd_hlm, 'id_pintu_masuk' => $id_pintu_masuk, 'tahun' => $tahun));
        } else {
            redirect('SPB_JumlahPenumpang');
        }
    }

    public function hasil_cari_blok3($id_pintu_masuk, $tahun)
    {
        $this->load->model('m_spb_jlh_penumpang');
        $option_pintu = $this->m_spb_jlh_penumpang->get_pintu_masuk();
        $data_januari = $this->m_spb_jlh_penumpang->menurut_pintu_bulan1($tahun, $id_pintu_masuk);
        $data_februari = $this->m_spb_jlh_penumpang->menurut_pintu_bulan2($tahun, $id_pintu_masuk);
        $data_maret = $this->m_spb_jlh_penumpang->menurut_pintu_bulan3($tahun, $id_pintu_masuk);
        $data_april = $this->m_spb_jlh_penumpang->menurut_pintu_bulan4($tahun, $id_pintu_masuk);
        $data_mei = $this->m_spb_jlh_penumpang->menurut_pintu_bulan5($tahun, $id_pintu_masuk);
        $data_juni = $this->m_spb_jlh_penumpang->menurut_pintu_bulan6($tahun, $id_pintu_masuk);
        $data_juli = $this->m_spb_jlh_penumpang->menurut_pintu_bulan7($tahun, $id_pintu_masuk);
        $data_agustus = $this->m_spb_jlh_penumpang->menurut_pintu_bulan8($tahun, $id_pintu_masuk);
        $data_september = $this->m_spb_jlh_penumpang->menurut_pintu_bulan9($tahun, $id_pintu_masuk);
        $data_oktober = $this->m_spb_jlh_penumpang->menurut_pintu_bulan10($tahun, $id_pintu_masuk);
        $data_november = $this->m_spb_jlh_penumpang->menurut_pintu_bulan11($tahun, $id_pintu_masuk);
        $data_desember = $this->m_spb_jlh_penumpang->menurut_pintu_bulan12($tahun, $id_pintu_masuk);
        $sum_pintu = $this->m_spb_jlh_penumpang->menurut_pintu_jumlah($tahun, $id_pintu_masuk);
        $this->load->view(
            'statistik_pariwisata/jumlah_penumpang/bulanan/menurut_growth',
            array(
                'tahun' => $tahun, 'id_pintu_masuk' => $id_pintu_masuk, 'option_pintu' => $option_pintu,
                'data_januari' => $data_januari, 'data_februari' => $data_februari,
                'data_maret' => $data_maret, 'data_april' => $data_april, 'data_mei' => $data_mei,
                'data_juni' => $data_juni, 'data_juli' => $data_juli, 'data_agustus' => $data_agustus,
                'data_september' => $data_september, 'data_oktober' => $data_oktober,
                'data_november' => $data_november, 'data_desember' => $data_desember,
                'sum_pintu' => $sum_pintu
            )
        );
    }
}
