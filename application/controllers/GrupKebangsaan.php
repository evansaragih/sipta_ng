<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GrupKebangsaan extends CI_Controller
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
        $kd_hlm = 'SCA1';
        $this->load->view('kebangsaan/grup_kebangsaan/beranda', array('kd_hlm' => $kd_hlm));
    }

    public function col_data()
    {
        $this->load->model('m_kebangsaan');
        $data_akomodasi = $this->m_kebangsaan->getData();
        $this->load->view('kebangsaan/grup_kebangsaan/data_tampil', array('data_akomodasi' => $data_akomodasi));
    }

    public function col_tambahData()
    {
        $this->load->model('m_kebangsaan');
        $kabupaten = $this->m_kebangsaan->get_kabupaten_query();
        $kategori = $this->m_kebangsaan->get_kategori_query();
        $this->load->view('kebangsaan/grup_kebangsaan/tambah_data', array('kabupaten' => $kabupaten, 'kategori' => $kategori));
    }

    public function insertData()
    { //insert data jumlah penumpang berdasarkan pintu masuk
        $id = $this->session->userdata('id_admin');
        $grup_kebangsaan = $_POST['grup-search'];
        $path_map = $_POST['path_map-search'];
        $data_insert = array(
            'grup' => $grup_kebangsaan,
            'path_map' => $path_map
        );
        $this->load->model('m_kebangsaan');
        $cek_data = $this->m_kebangsaan->cekData($grup_kebangsaan);
        if ($cek_data > 0) {
            $this->session->set_flashdata('duplicate', 'Data Duplikat');
        } else {
            $res = $this->m_insert->insertData('dim_grup', $data_insert);
            if ($res > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            } else {
                $this->session->set_flashdata('failed', 'Gagal Menyimpan Data');
            }
        }
        redirect(base_url('GrupKebangsaan'));
    }

    public function updateData()
    {
        $id_grup = $_POST['id_grup-edit'];
        $grup_kebangsaan = $_POST['grup-edit'];
        $data_update = array(
            'grup' => $this->input->post('grup-edit'),
            'path_map' => $this->input->post('path_map-edit')
        );
        $this->load->model('m_kebangsaan');
        $cek_data = $this->m_kebangsaan->cekData($grup_kebangsaan);
        if ($cek_data > 0) {
            $this->session->set_flashdata('duplicate', 'Data Duplikat');
        } else {
            $this->db->where('id', $id_grup);
            $res = $this->db->update('dim_grup', $data_update);
            if ($res > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil Di Update');
            } else {
                $this->session->set_flashdata('error_msg', 'Gagal Mengupdate Data');
            }
        }
        redirect(base_url('GrupKebangsaan'));
    }

    public function deleteData() //dinonaktifkan
    {
        // POST values
        $user_ids = $this->input->post('user_ids');

        // Delete records
        $this->load->model('m_kebangsaan');
        $result = $this->m_kebangsaan->deleteDataGrup($user_ids);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('warning', 'Gagal Menghapus Data');
        }
        redirect(base_url('GrupKebangsaan'));
    }

    public function deleteData2() //Memindahkan data ke backup agar data yg sudah pakai 
    // id hotel tidak masalah Pada DETAIL data
    {
        $user_ids = $this->input->post('user_ids');

        $this->load->model('m_kebangsaan');
        $cek_data = $this->m_kebangsaan->cekDatabeforeDelGrup($user_ids);
        if ($cek_data > 0) {
            $this->session->set_flashdata('undeleted', 'Data Tidak Bisa dihapus');
        } else {
            $this->m_kebangsaan->deleteDataGrup2($user_ids);
        }
        redirect(base_url('GrupKebangsaan'));
    }
}
