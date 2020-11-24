<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Restoran extends CI_Controller
{
    public function __construct(){
		parent::__construct();
		if(! $this->session->userdata('id_admin')){
			redirect('Auth_mitra');
		}elseif($this->session->userData('type')!= 'admin'){
            // redirect('JumlahPenumpang');
            echo "<script>;history.go(-1);</script>";
		}
	}

    public function index()
    {
        $this->load->model('m_restoran');
        $data_restoran = $this->m_restoran->getData();
        $this->load->view('restoran/beranda', array('data_restoran' => $data_restoran));
    }

    public function col_data()
    {
        $this->load->model('m_restoran');
        $data_restoran = $this->m_restoran->getData();
        $this->load->view('restoran/data_restoran', array('data_restoran' => $data_restoran));
    }

    public function col_tambahData()
    {
        $this->load->model('m_restoran');
        $kabupaten = $this->m_restoran->get_kabupaten_query();
        $this->load->view('restoran/tambah_data', array('kabupaten' => $kabupaten));
    }

    public function insertData()
    { //insert data jumlah penumpang berdasarkan pintu masuk
        $id= $this->session->userdata('id_admin');
        $id_kabupaten = $_POST['kabupaten-add'];
        $tahun = $_POST['tahun-add'];
        $jlh_restoran = $_POST['jlh_restoran-add'];
        $jlh_seat = $_POST['jlh_seat-add'];
        $ket = $_POST['ket-add'];
        $data_insert = array(
            'id_kabupaten' => $id_kabupaten,
            'jlh_restoran' => $jlh_restoran,
            'jlh_seat' => $jlh_seat,
            'tahun' => $tahun,
            'keterangan' => $ket,
            'created_by' => $id
        );
        $this->load->model('m_restoran');
        $cek_data = $this->m_restoran->cekData($id_kabupaten, $tahun);
        if ($cek_data > 0) {
            $this->session->set_flashdata('duplicate', 'Data Duplikat');
        } else {
            $res = $this->m_insert->insertData('tb_restoran', $data_insert);
            if ($res > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            } else {
                $this->session->set_flashdata('warning', 'Gagal Menyimpan Data');
            }
        }
        redirect(base_url('Restoran'));
    }

    public function updateData()
    {
        $id= $this->session->userdata('id_admin');
        $id_restoran = $_POST['id_restoran-edit'];
        date_default_timezone_set('Asia/Singapore');
        $tanggal = date("Y-m-d H:i:s");
        $data_update = array(
            "id_kabupaten" => $this->input->post('id_kabupaten-edit'),
            "jlh_restoran" => $this->input->post('jlh_restoran-edit'),
            "jlh_seat" => $this->input->post('jlh_seat-edit'),
            "tahun" => $this->input->post('tahun-edit2'),
            "keterangan" => $this->input->post('ket-edit'),
            "updated_at" => $tanggal,
            "updated_by" => $id
        );
        $this->db->where('id_restoran', $id_restoran);
        $res = $this->db->update('tb_restoran', $data_update);
        if ($res>0) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Update');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal Mengupdate Data');
        }
        redirect(base_url('Restoran'));
    }

    public function deleteData()
    {
        // POST values
        $user_ids = $this->input->post('user_ids');

        // Delete records
        $this->load->model('m_restoran');
        $result = $this->m_restoran->deleteData($user_ids);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('warning', 'Gagal Menghapus Data');
        }
        redirect(base_url('Restoran'));
    }
}
