<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AkomodasiNG extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id_admin')) {
            redirect('Auth_admin');
        } elseif ($this->session->userData('status') != 'verified') {
            // redirect('JumlahPenumpang');
            echo "<script>;history.go(-1);</script>";
        }
    }

    public function index()
    {
        $kd_hlm = 'SC3';
        $tahun = date('Y');
        $this->load->model('m_akomodasi');
        $kategori = $this->m_akomodasi->get_kategori_query();
        $kabupaten = $this->m_akomodasi->get_kabupaten_query();
        $this->load->view('data_pariwisata/akomodasi/beranda', array('kabupaten' => $kabupaten, 'kategori' => $kategori, 'kd_hlm' => $kd_hlm, 'tahun' => $tahun));
    }

    function data_akomodasi_ajax($tahun)
    {
        $this->load->model('m_akomodasi');
        $data = $this->m_akomodasi->data_akomodasi_ajax($tahun);
        echo json_encode($data);
    }

    public function col_data($tahun)
    {
        $this->load->model('m_akomodasi');
        // $data_akomodasi = $this->m_akomodasi->getData($tahun);
        $this->load->view('data_pariwisata/akomodasi/data_akomodasi', array('tahun' => $tahun));
    }

    public function cari_data()
    {
        $kd_hlm = 'SC3';
        $tahun = $this->input->post('tahun');
        $this->load->model('m_akomodasi');
        $kategori = $this->m_akomodasi->get_kategori_query();
        $kabupaten = $this->m_akomodasi->get_kabupaten_query();
        if ($tahun != 0 || $tahun == "semua") {
            $this->load->view(
                'data_pariwisata/akomodasi/beranda',
                array('kd_hlm' => $kd_hlm, 'tahun' => $tahun, 'kabupaten' => $kabupaten, 'kategori' => $kategori)
            );
        } else {
            redirect('AkomodasiNG');
        }
    }

    // public function col_data_pencarian($tahun)
    // {
    //     $this->load->model('m_akomodasi');
    //     $data_akomodasi = $this->m_akomodasi->getData($tahun);
    //     $this->load->view('data_pariwisata/akomodasi/data_akomodasi', array('data_akomodasi' => $data_akomodasi, 'tahun' => $tahun));
    // }

    public function col_tambahData()
    {
        $this->load->model('m_akomodasi');
        $kabupaten = $this->m_akomodasi->get_kabupaten_query();
        $kategori = $this->m_akomodasi->get_kategori_query();
        $this->load->view('data_pariwisata/akomodasi/tambah_data', array('kabupaten' => $kabupaten, 'kategori' => $kategori));
    }

    public function col_tambahDataExcel()
    {
        $this->load->model('m_akomodasi');
        $format_excel = $this->m_akomodasi->get_format_file();
        $this->load->view('data_pariwisata/akomodasi/tambah_data_excel', array('format_excel' => $format_excel));
    }

    public function insertData()
    { //insert data jumlah penumpang berdasarkan pintu masuk
        $id_akomodasi = $_POST['id_akomodasi-add'];
        $kat_akomodasi = $_POST['kategori-add'];
        $jlh_kamar = $_POST['jlh_kamar-add'];
        $jlh_tamu = $_POST['jlh_tamu-add'];
        $tahun = $_POST['tahun-add'];
        $data_insert = array(
            'id_akomodasi' => $id_akomodasi,
            'kategori' => $kat_akomodasi,
            'jumlah_kamar' => $jlh_kamar,
            'jumlah_tamu' => $jlh_tamu,
            'tahun' => $tahun,
        );
        $this->load->model('m_akomodasi');
        $cek_data = $this->m_akomodasi->cekDataHotel($id_akomodasi, $kat_akomodasi, $tahun);
        if ($cek_data > 0) {
            $this->session->set_flashdata('duplicate', 'duplicate');
        } else {
            $result = $this->m_insert->insertData('load_akomodasi', $data_insert);
            if ($result > 0) {
                $this->session->set_flashdata('success', 'sucess');
            } else {
                $this->session->set_flashdata('failed', 'failed');
            }
        }
        redirect(base_url('AkomodasiNG'));
    }

    public function updateData()
    {
        $id_akomodasi = $_POST['id_akomodasi-edit'];
        $data_update = array(
            'jumlah_kamar' => $this->input->post('jlh_kamar-edit'),
            'jumlah_tamu' => $this->input->post('jlh_tamu-edit'),
        );
        $this->db->where('id', $id_akomodasi);
        $res = $this->db->update('fact_akomodasi', $data_update);
        if ($res > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Update');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal Mengupdate Data');
        }
        redirect(base_url('AkomodasiNG'));
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
        redirect(base_url('AkomodasiNG'));
    }

    public function deleteData2() //Memindahkan data ke backup agar data yg sudah pakai 
    // id hotel tidak masalah Pada detail data
    {
        $user_ids = $this->input->post('user_ids');

        $this->load->model('m_akomodasi');
        $this->m_akomodasi->deleteData2($user_ids);

        redirect(base_url('AkomodasiNG'));
    }

    public function insertData_Paste() //mengedit data keseluruhan seperti kabupaten, kategori
    {
        $id = $this->session->userdata('id_admin');
        $user_ids = $_POST['id_akomodasi-paste'];
        $id_kabupaten = $_POST['id_kabupaten-paste'];
        $id_kat_akomodasi = $_POST['id_kategori-paste'];
        $kelas_bintang = $_POST['id_kelas_bintang-paste'];
        $nama_hotel = $_POST['nama_ako-paste'];
        $nama_perusahaan = $_POST['nama_perusahaan-paste'];
        $pemilik = $_POST['owner-paste'];
        $alamat = $_POST['alamat-paste'];
        $email = $_POST['email-paste'];
        $website = $_POST['website-paste'];
        $telp_hp = $_POST['no_telp-paste'];
        $tahun = $_POST['tahun-paste'];
        $jlh_kamar = $_POST['jlh_kamar-paste'];
        $fax = $_POST['fax-paste'];
        $keterangan = $_POST['ket-paste'];
        $data_update = array(
            'id_kabupaten' => $id_kabupaten,
            'id_kat_akomodasi' => $id_kat_akomodasi,
            'kelas_bintang' => $kelas_bintang,
            'nama_hotel' => $nama_hotel,
            'nama_perusahaan' => $nama_perusahaan,
            'nama_pimpinan' => $pemilik,
            'alamat' => $alamat,
            'email' => $email,
            'website' => $website,
            'telp' => $telp_hp,
            'jumlah_kamar' => $jlh_kamar,
            'tahun' => $tahun,
            'fax' => $fax,
            'keterangan' => $keterangan,
            'created_by' => $id,
            'updated_by' => $id
        );
        $this->load->model('m_akomodasi');
        $cek_data = $this->m_akomodasi->cekDataHotel($id_kabupaten, $nama_hotel, $id_kat_akomodasi, $tahun);
        if ($cek_data > 0) {
            $this->session->set_flashdata('duplicate', 'duplicate');
        } else {
            $this->db->where('id_akomodasi', $user_ids);
            $res = $this->db->update('tb_akomodasi_2', $data_update);
            if ($res > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil Di Update');
            } else {
                $this->session->set_flashdata('error_msg', 'Gagal Mengupdate Data');
            }
        }
        redirect(base_url('AkomodasiNG'));
    }
}
