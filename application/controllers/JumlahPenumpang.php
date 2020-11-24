<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JumlahPenumpang extends CI_Controller
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
        $kd_hlm = 'SC1';
        $tahun = date('Y');
        $this->load->view('data_pariwisata/jumlah_penumpang/beranda', array('kd_hlm' => $kd_hlm, 'tahun' => $tahun));
    }

    function data_penumpang_ajax($tahun)
    {
        $this->load->model('m_jlh_penumpang');
        $data = $this->m_jlh_penumpang->data_penumpang_ajax($tahun);
        echo json_encode($data);
    }

    public function col_data($tahun)
    {
        // $this->load->model('m_jlh_penumpang');
        // $data_penumpang = $this->m_jlh_penumpang->getData($tahun); //gadipake
        $this->load->view('data_pariwisata/jumlah_penumpang/data_penumpang', array('tahun' => $tahun));
    }

    public function cari_data()
    {
        $kd_hlm = 'SC1';
        $tahun = $this->input->post('tahun');
        if ($tahun != 0 || $tahun == "semua") {
            $this->load->view(
                'data_pariwisata/jumlah_penumpang/beranda',
                array('tahun' => $tahun, 'kd_hlm' => $kd_hlm)
            );
        } else {
            redirect('JumlahPenumpang');
        }
    }

    public function col_tambahData()
    {
        $this->load->model('m_jlh_penumpang');
        $pintu_masuk = $this->m_jlh_penumpang->get_pintu_masuk_query();
        $jenis_penumpang = $this->m_jlh_penumpang->get_jenis_penumpang();
        $this->load->view(
            'data_pariwisata/jumlah_penumpang/tambah_data',
            array('pintu_masuk' => $pintu_masuk, 'jenis_penumpang' => $jenis_penumpang)
        );
    }

    public function col_tambahDataExcel()
    {
        $this->load->model('m_jlh_penumpang');
        $format_excel = $this->m_jlh_penumpang->get_format_file();
        $this->load->view('data_pariwisata/jumlah_penumpang/tambah_data_excel', array('format_excel' => $format_excel));
    }

    public function insertData()
    { //insert data jumlah penumpang berdasarkan pintu masuk
        $pintu_masuk = $_POST['pintu_masuk-add'];
        $bulan = $_POST['bulan-add'];
        $tahun = $_POST['tahun-add'];
        $jumlah_penumpang = $_POST['jumlah_penumpang-add'];
        $jenis_penumpang = $_POST['jenis_penumpang-add'];
        $data_insert = array(
            'pintu_masuk' => $pintu_masuk,
            'jumlah' => $jumlah_penumpang,
            'jenis_penumpang' => $jenis_penumpang,
            'tahun' => $tahun,
            'bulan' => $bulan
        );
        $this->load->model('m_jlh_penumpang');
        $cek_data = $this->m_jlh_penumpang->cekData($pintu_masuk, $bulan, $tahun, $jenis_penumpang);
        if ($cek_data > 0) {
            $this->session->set_flashdata('duplicate', 'Gagal Menghapus Data');
        } else {
            $res = $this->m_insert->insertData('load_penumpang', $data_insert);
            if ($res > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            } else {
                $this->session->set_flashdata('warning', 'Gagal Menghapus Data');
            }
        }
        redirect(base_url('JumlahPenumpang'));
    }

    public function updateData()
    {
        $id_jlh_penumpang = $_POST['id_jlh_penumpang-edit'];
        $data_update = array(
            'jumlah' => $this->input->post('jumlah_penumpang-edit')
        );
        $this->db->where('id', $id_jlh_penumpang);
        $res = $this->db->update('fact_penumpang', $data_update);
        if ($res > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Update');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal Mengupdate Data');
        }
        redirect(base_url('JumlahPenumpang'));
    }

    public function deleteData()
    {
        // POST values
        $user_ids = $this->input->post('user_ids');

        // Delete records
        $this->load->model('m_jlh_penumpang');
        $result = $this->m_jlh_penumpang->deleteData($user_ids);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('warning', 'Gagal Menghapus Data');
        }
        redirect(base_url('JumlahPenumpang'));
    }
}
