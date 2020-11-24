<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id_admin')) {
            redirect('Auth_admin');
        } elseif ($this->session->userData('type') != 'admin') {
            // redirect('JumlahPenumpang');
            echo "<script>;history.go(-1);</script>";
        }
    }

    public function index()
    {
        $kd_hlm = 'SCA1';
        $this->load->view('data_admin/beranda', array('kd_hlm' => $kd_hlm));
    }

    public function col_data()
    {
        $this->load->model('m_admin');
        $data_admin = $this->m_admin->getData();
        $this->load->view('data_admin/data_tampil', array('data' => $data_admin));
    }

    public function col_tambahData()
    {
        $this->load->model('m_kebangsaan');
        $kabupaten = $this->m_kebangsaan->get_kabupaten_query();
        $kategori = $this->m_kebangsaan->get_kategori_query();
        $this->load->view('data_admin/beranda', array('kabupaten' => $kabupaten, 'kategori' => $kategori));
    }

    public function insertData()
    { //insert data jumlah penumpang berdasarkan pintu masuk
        $id = $this->session->userdata('id_admin');
        $nip = $_POST['nip-add'];
        $nama = $_POST['nama-add'];
        $username = $_POST['username-add'];
        $jenis_kelamin = $_POST['jenis_kelamin-add'];
        $password = md5('visitbali');
        $data_insert = array(
            'nip' => $nip,
            'nama' => $nama,
            'username' => str_replace(' ', '', strtolower($username)),
            'jenis_kelamin' => $jenis_kelamin,
            'password' => $password,
            'created_by' => $id,
            'updated_by' => $id
        );
        $this->load->model('m_admin');
        $cek_data = $this->m_admin->cekData($username);
        if ($cek_data > 0) {
            $this->session->set_flashdata('duplicate', 'Data Duplikat');
        } else {
            $res = $this->m_insert->insertData('tb_admin', $data_insert);
            if ($res > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            } else {
                $this->session->set_flashdata('failed', 'Gagal Menyimpan Data');
            }
        }
        redirect(base_url('Admin'));
    }

    public function updateData()
    {
        $id = $this->session->userdata('id_admin');
        $id_admin = $_POST['id_admin-edit'];
        date_default_timezone_set('Asia/Singapore');
        $tanggal = date("Y-m-d H:i:s");
        $data_update = array(
            'type' => $this->input->post('type-edit'),
            'status' => $this->input->post('status-edit'),
            'tipe_status_updated_at' => $tanggal,
            'updated_by' => $id
        );
        $this->db->where('id_admin', $id_admin);
        $res = $this->db->update('tb_admin', $data_update);
        if ($res > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Update');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal Mengupdate Data');
        }
        redirect(base_url('Admin'));
    }

    // public function deleteData() //dinonaktifkan
    // {
    //     // POST values
    //     $user_ids = $this->input->post('user_ids');

    //     // Delete records
    //     $this->load->model('m_kebangsaan');
    //     $result = $this->m_kebangsaan->deleteDataGrup($user_ids);
    //     if ($result > 0) {
    //         $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
    //     } else {
    //         $this->session->set_flashdata('warning', 'Gagal Menghapus Data');
    //     }
    //     redirect(base_url('Admin'));
    // }

    // public function deleteData2() //Memindahkan data ke backup agar data yg sudah pakai 
    // // id hotel tidak masalah Pada DETAIL data
    // {
    //     $user_ids = $this->input->post('user_ids');

    //     $this->load->model('m_kebangsaan');
    //     $cek_data = $this->m_kebangsaan->cekDatabeforeDelGrup($user_ids);
    //     if ($cek_data > 0) {
    //         $this->session->set_flashdata('undeleted', 'Data Tidak Bisa dihapus');
    //     } else {
    //         $this->m_kebangsaan->deleteDataGrup2($user_ids);
    //     }
    //     redirect(base_url('Admin'));
    // }
}
