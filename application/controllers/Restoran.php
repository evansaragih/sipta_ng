<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Restoran extends CI_Controller
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
        $kd_hlm = 'SC4';
        $tahun = date('Y');
        $this->load->view('data_pariwisata/restoran/beranda', array('kd_hlm' => $kd_hlm, 'tahun' => $tahun));
    }

    function data_restoran_ajax($tahun)
    {
        $this->load->model('m_restoran');
        $data = $this->m_restoran->data_restoran_ajax($tahun);
        echo json_encode($data);
    }

    public function col_data($tahun)
    {
        $this->load->view('data_pariwisata/restoran/data_restoran', array('tahun' => $tahun));
    }

    public function cari_data()
    {
        $kd_hlm = 'SC4';
        $tahun = $this->input->post('tahun');
        if ($tahun != 0 || $tahun == "semua") {
            $this->load->view(
                'data_pariwisata/restoran/beranda',
                array('kd_hlm' => $kd_hlm, 'tahun' => $tahun)
            );
        } else {
            redirect('Restoran');
        }
    }

    public function col_tambahData()
    {
        $this->load->model('m_restoran');
        $kabupaten = $this->m_restoran->get_kabupaten_query();
        $this->load->view('data_pariwisata/restoran/tambah_data', array('kabupaten' => $kabupaten));
    }

    public function col_tambahDataExcel()
    {
        $this->load->model('m_restoran');
        $format_excel = $this->m_restoran->get_format_file();
        $this->load->view('data_pariwisata/restoran/tambah_data_excel', array('format_excel' => $format_excel));
    }

    public function insertData()
    { //insert data jumlah penumpang berdasarkan pintu masuk
        $id = $this->session->userdata('id_admin');
        $id_kabupaten = $_POST['id_kabupaten-add'];
        $nama_restoran = $_POST['akomodasi-add'];
        $alamat = $_POST['alamat-add'];
        $telp_hp = $_POST['telp_hp-add'];
        $fax = $_POST['fax-add'];
        $tahun = $_POST['tahun-add'];
        $kursi = $_POST['jlh_room-add'];
        $keterangan = $_POST['ket-add'];
        $data_insert = array(
            'id_kabupaten' => $id_kabupaten,
            'nama_restoran' => $nama_restoran,
            'alamat' => $alamat,
            'telp_hp' => $telp_hp,
            'fax' => $fax,
            'tahun' => $tahun,
            'jumlah_kursi' => $kursi,
            'keterangan' => $keterangan,
            'created_by' => $id,
            'updated_by' => $id
        );
        $this->load->model('m_restoran');
        $cek_data = $this->m_restoran->cekDataRestoran($id_kabupaten, $nama_restoran, $alamat);
        if ($cek_data > 0) {
            $this->session->set_flashdata('duplicate', 'duplicate');
        } else {
            $result = $this->m_insert->insertData('tb_restoran', $data_insert);
            // $backup = $this->m_insert->insertData('tb_hotel_backup', $data_insert);
            if ($result > 0) {
                $this->session->set_flashdata('success', 'sucess');
            } else {
                $this->session->set_flashdata('failed', 'failed');
            }
        }
        redirect(base_url('Restoran'));
    }

    public function updateData()
    {
        $id_restoran = $_POST['id_restoran-edit'];
        $data_update = array(
            'jumlah' => $this->input->post('jlh_pengunjung-edit')
        );
        $this->db->where('id', $id_restoran);
        $res = $this->db->update('fact_pengunjung_objek', $data_update);
        if ($res > 0) {
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

    public function deleteData2() //Memindahkan data ke backup agar data yg sudah pakai 
    // id hotel tidak masalah Pada detail data
    {
        $user_ids = $this->input->post('user_ids');

        $this->load->model('m_restoran');
        $this->m_restoran->deleteData2($user_ids);

        redirect(base_url('Restoran'));
    }
}
