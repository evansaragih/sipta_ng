<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StatistikPariwisata extends CI_Controller
{
    public function index()
    {
        $this->load->model('m_akomodasi');
        $data_akomodasi = $this->m_akomodasi->getData();
        $this->load->view('statistik_pariwisata/beranda', array('data_akomodasi' => $data_akomodasi));
    }

    public function menurut_kategori()
    {
        $this->load->model('m_akomodasi');
        $kabupaten = $this->m_akomodasi->get_kabupaten_query(); //masih ngambil dari yang lain ntar buat sendiri
        $this->load->model('m_statistik_pariwisata');
        $data_akomodasi = $this->m_statistik_pariwisata->get_akomodasi_query();
        $this->load->view('statistik_pariwisata/akomodasi_kategori', array('kabupaten' => $kabupaten, 'data_akomodasi' => $data_akomodasi));
    }

    public function cari_kategori()
    {
        $kab = $this->input->post('id_kabupaten');
        $this->load->view('statistik_pariwisata/beranda_kategori', array('kab'=>$kab));
    }

    public function hasil_cari_kategori($kab)
    {
        $this->load->model('m_akomodasi');
        $kabupaten = $this->m_akomodasi->get_kabupaten_query(); //masih ngambil dari yang lain ntar buat sendiri
        $this->load->model('m_statistik_pariwisata');
        $data_akomodasi = $this->m_statistik_pariwisata->get_akomodasi_cari($kab);
        $this->load->view('statistik_pariwisata/akomodasi_kategori_cari', array('kabupaten' => $kabupaten, 'data_akomodasi' => $data_akomodasi, 'kab'=>$kab));
    
    }

    public function menurut_wilayah()
    {
        $this->load->model('m_akomodasi');
        $kabupaten = $this->m_akomodasi->get_kabupaten_query();
        $this->load->view('statistik_pariwisata/akomodasi_wilayah', array('kabupaten' => $kabupaten));
    }

    public function menurut_waktu()
    {
        $this->load->model('m_akomodasi');
        $kabupaten = $this->m_akomodasi->get_kabupaten_query();
        $this->load->view('statistik_pariwisata/akomodasi_waktu', array('kabupaten' => $kabupaten));
    }

    public function col_tambahData()
    {
        $this->load->model('m_akomodasi');
        $kabupaten = $this->m_akomodasi->get_kabupaten_query();
        $kategori = $this->m_akomodasi->get_kategori_query();
        $this->load->view('statistik_pariwisata/tambah_data', array('kabupaten' => $kabupaten, 'kategori' => $kategori));
    }

    public function insertData()
    { //insert data jumlah penumpang berdasarkan pintu masuk

        $id_kabupaten = $_POST['id_kabupaten-add'];
        $tahun = $_POST['tahun-add'];
        $jlh_ako1 = $_POST['jlh_ako-add1'];
        $jlh_ako2 = $_POST['jlh_ako-add2'];
        $jlh_ako3 = $_POST['jlh_ako-add3'];
        $jlh_room1 = $_POST['jlh_room-add1'];
        $jlh_room2 = $_POST['jlh_room-add2'];
        $jlh_room3 = $_POST['jlh_room-add3'];
        $keterangan = $_POST['ket-add'];
        $data_insert1 = array(
            'id_kabupaten' => $id_kabupaten,
            'id_kat_akomodasi' => '1',
            'jlh_akomodasi' => $jlh_ako1,
            'jlh_kamar' => $jlh_room1,
            'tahun' => $tahun,
            'keterangan' => $keterangan
        );
        $data_insert2 = array(
            'id_kabupaten' => $id_kabupaten,
            'id_kat_akomodasi' => '2',
            'jlh_akomodasi' => $jlh_ako2,
            'jlh_kamar' => $jlh_room2,
            'tahun' => $tahun,
            'keterangan' => $keterangan
        );
        $data_insert3 = array(
            'id_kabupaten' => $id_kabupaten,
            'id_kat_akomodasi' => '3',
            'jlh_akomodasi' => $jlh_ako3,
            'jlh_kamar' => $jlh_room3,
            'tahun' => $tahun,
            'keterangan' => $keterangan
        );
        $this->load->model('m_akomodasi');
        $cek_data = $this->m_akomodasi->cekData($id_kabupaten, $tahun);
        if ($cek_data > 0) {
            $this->session->set_flashdata('duplicate', 'Gagal Menghapus Data');
        } else {
            $res1 = $this->m_insert->insertData('tb_akomodasi', $data_insert1);
            $res2 = $this->m_insert->insertData('tb_akomodasi', $data_insert2);
            $res3 = $this->m_insert->insertData('tb_akomodasi', $data_insert3);
            if ($res1 > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            } else {
                $this->session->set_flashdata('failed', 'Gagal Menghapus Data');
            }
        }
        redirect(base_url('StatistikPariwisata'));
    }

    public function updateData()
    {
        $id_akomodasi = $_POST['id_akomodasi-edit'];
        date_default_timezone_set('Asia/Singapore');
        $tanggal = date("Y-m-d H:i:s");
        $data_update = array(
            'id_kabupaten' => $this->input->post('id_kabupaten-edit'),
            'jlh_akomodasi' => $this->input->post('jlh_ako-edit'),
            'jlh_kamar' => $this->input->post('jlh_room-edit'),
            'tahun' => $this->input->post('tahun-edit2'),
            'updated_at' => $tanggal,
            'keterangan' => $this->input->post('ket-edit')
        );
        $this->db->where('id_akomodasi', $id_akomodasi);
        $res = $this->db->update('tb_akomodasi', $data_update);
        if ($res>0) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Update');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal Mengupdate Data');
        }
        redirect(base_url('statistik_pariwisata'));
    }

    public function deleteData()
    {
        // POST values
        $user_ids = $this->input->post('user_ids');

        // Delete records
        $this->load->model('m_akomodasi');
        $result = $this->m_akomodasi->deleteData($user_ids);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('warning', 'Gagal Menghapus Data');
        }
        redirect(base_url('statistik_pariwisata'));
    }
}
