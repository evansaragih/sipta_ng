<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kebangsaan extends CI_Controller
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
        $kd_hlm = 'SCA2';
        $this->load->model('m_kebangsaan');
        $kabupaten = $this->m_kebangsaan->get_kategori_query();
        $this->load->view('kebangsaan/data_kebangsaan/beranda', array('kd_hlm' => $kd_hlm, 'kabupaten' => $kabupaten));
    }

    public function col_data()
    {
        $this->load->model('m_kebangsaan');
        $data_akomodasi = $this->m_kebangsaan->getDataRestoran();
        $this->load->view('kebangsaan/data_kebangsaan/data_tampil', array('data_akomodasi' => $data_akomodasi));
    }

    public function col_tambahData()
    {
        $this->load->model('m_kebangsaan');
        $kabupaten = $this->m_kebangsaan->get_kabupaten_query();
        $kategori = $this->m_kebangsaan->get_kategori_query();
        $this->load->view('kebangsaan/data_kebangsaan/tambah_data', array('kabupaten' => $kabupaten, 'kategori' => $kategori));
    }

    public function insertData()
    { //insert data jumlah penumpang berdasarkan pintu masuk
        $id_group = $_POST['id_kabupaten-search'];
        $nationality = $_POST['nama_ako-search'];
        $data_insert = array(
            'id_grup' => $id_group,
            'kebangsaan' => $nationality
        );
        $this->load->model('m_kebangsaan');
        $cek_data = $this->m_kebangsaan->cekData_kebangsaan($nationality);
        if ($cek_data > 0) {
            $this->session->set_flashdata('duplicate', 'Data Duplikat');
        } else {
            $res = $this->m_insert->insertData('dim_kebangsaan', $data_insert);
            if ($res > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            } else {
                $this->session->set_flashdata('failed', 'Gagal Menyimpan Data');
            }
        }
        redirect(base_url('Kebangsaan'));
    }

    public function updateData()
    {
        $id_kebangsaan = $_POST['id_kebangsaan-edit'];
        $data_update = array(
            'kebangsaan' => $this->input->post('kebangsaan-edit'),
            'id_grup' => $this->input->post('id_grup-edit'),
        );
        $this->db->where('id', $id_kebangsaan);
        $res = $this->db->update('dim_kebangsaan', $data_update);
        if ($res > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Update');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal Mengupdate Data');
        }
        redirect(base_url('Kebangsaan'));
    }

    public function deleteData()
    {
        // POST values
        $user_ids = $this->input->post('user_ids');

        // Delete records
        $this->load->model('m_kebangsaan');
        $result = $this->m_kebangsaan->deleteData($user_ids);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('warning', 'Gagal Menghapus Data');
        }
        redirect(base_url('Kebangsaan'));
    }

    public function deleteData2() //Memindahkan data ke backup agar data yg sudah pakai 
    // id hotel tidak masalah Pada DETAIL data
    {
        $user_ids = $this->input->post('user_ids');

        $this->load->model('m_kebangsaan');
        $cek_data = $this->m_kebangsaan->cekDatabeforeDelKebangsaan($user_ids);
        if ($cek_data > 0) {
            $this->session->set_flashdata('undeleted', 'Data Tidak Bisa dihapus');
        } else {
            $this->m_kebangsaan->deleteData2($user_ids);
        }
        redirect(base_url('Kebangsaan'));
    }
}
