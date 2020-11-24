<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JumlahWisman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id_admin')) {
            redirect('Auth_admin');
        } elseif ($this->session->userdata('status') != 'verified') {
            // redirect('JumlahPenumpang');
            echo "<script>;history.go(-1);</script>";
        }
    }

    public function index()
    {
        $kd_hlm = 'SC2';
        $tahun = date('Y');
        $this->load->view('data_pariwisata/jumlah_wisman/beranda', array('kd_hlm' => $kd_hlm, 'tahun' => $tahun));
    }

    function data_wisman_ajax($tahun)
    {
        $this->load->model('m_jlh_wisman');
        $data = $this->m_jlh_wisman->data_wisman_ajax($tahun);
        echo json_encode($data);
    }

    public function col_data($tahun)
    {
        $this->load->model('m_jlh_wisman');
        // $data_penumpang = $this->m_jlh_wisman->getData($tahun);//gadipake
        $this->load->view('data_pariwisata/jumlah_wisman/data_wisman', array('tahun' => $tahun));
    }

    public function cari_data()
    {
        $kd_hlm = 'SC2';
        $tahun = $this->input->post('tahun');
        if ($tahun != 0 || $tahun == "semua") {
            $this->load->view(
                'data_pariwisata/jumlah_wisman/beranda',
                array('tahun' => $tahun, 'kd_hlm' => $kd_hlm)
            );
        } else {
            redirect('JumlahWisman');
        }
    }

    public function col_tambahData()
    {
        $this->load->model('m_jlh_wisman');
        $kebangsaan = $this->m_jlh_wisman->get_kebangsaan_query();
        $this->load->view('data_pariwisata/jumlah_wisman/tambah_data', array('kebangsaan' => $kebangsaan));
    }

    public function col_tambahDataExcel()
    {
        $this->load->model('m_jlh_wisman');
        $format_excel = $this->m_jlh_wisman->get_format_file();
        $this->load->view('data_pariwisata/jumlah_wisman/tambah_data_excel', array('format_excel' => $format_excel));
    }

    public function insertData()
    { //insert data jumlah penumpang berdasarkan pintu masuk
        $nationality = $_POST['kebangsaan-add'];
        $bulan = $_POST['bulan-add'];
        $tahun = $_POST['tahun-add'];
        $jumlah = $_POST['jumlah-add'];
        $data_insert = array(
            'kebangsaan' => $nationality,
            'jumlah' => $jumlah,
            'tahun' => $tahun,
            'bulan' => $bulan,
        );
        $this->load->model('m_jlh_wisman');
        $cek_data = $this->m_jlh_wisman->cekData($nationality, $bulan, $tahun);
        if ($cek_data > 0) {
            $this->session->set_flashdata('duplicate', 'Gagal Menghapus Data');
        } else {
            $res = $this->m_insert->insertData('load_wisman', $data_insert);
            if ($res > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            } else {
                $this->session->set_flashdata('warning', 'Gagal Menghapus Data');
            }
        }
        redirect(base_url('JumlahWisman'));
    }

    public function updateData()
    {
        $id_jlh_wisman = $_POST['id_jlh_wisman-edit'];
        $data_update = array(
            "jumlah" => $this->input->post('jumlah-edit')
        );
        $this->db->where('id', $id_jlh_wisman);
        $res = $this->db->update('fact_wisman', $data_update);
        if ($res > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Update');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal Mengupdate Data');
        }
        redirect(base_url('JumlahWisman'));
    }

    public function deleteData()
    {
        // POST values
        $user_ids = $this->input->post('user_ids');

        // Delete records
        $this->load->model('m_jlh_wisman');
        $result = $this->m_jlh_wisman->deleteData($user_ids);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('warning', 'Gagal Menghapus Data');
        }
        redirect(base_url('JumlahWisman'));
    }
}
