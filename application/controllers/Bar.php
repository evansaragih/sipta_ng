<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bar extends CI_Controller
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
        $kd_hlm = 'SC5';
        $tahun = date('Y');
        $this->load->view('data_pariwisata/bar/beranda', array('kd_hlm' => $kd_hlm, 'tahun' => $tahun));
    }

    function data_bar_ajax($tahun)
    {
        $this->load->model('m_bar');
        $data = $this->m_bar->data_bar_ajax($tahun);
        echo json_encode($data);
    }

    public function col_data($tahun)
    {
        $this->load->model('m_bar');
        // $data_akomodasi = $this->m_bar->getData($tahun); //gadipake
        $this->load->view('data_pariwisata/bar/data_bar', array('tahun' => $tahun));
    }

    public function cari_data()
    {
        $kd_hlm = 'SC5';
        $tahun = $this->input->post('tahun');
        if ($tahun != 0 || $tahun == "semua") {
            $this->load->view(
                'data_pariwisata/bar/beranda',
                array('kd_hlm' => $kd_hlm, 'tahun' => $tahun)
            );
        } else {
            redirect('Bar');
        }
    }

    // public function col_data_pencarian($tahun)
    // {
    //     $this->load->model('m_bar');
    //     $data_akomodasi = $this->m_bar->getData($tahun);
    //     $this->load->view('data_pariwisata/bar/data_bar', array('data_akomodasi' => $data_akomodasi, 'tahun' => $tahun));
    // }

    public function col_tambahData()
    {
        $this->load->model('m_bar');
        $kabupaten = $this->m_bar->get_kabupaten_query();
        $this->load->view('data_pariwisata/bar/tambah_data', array('kabupaten' => $kabupaten));
    }

    public function col_tambahDataExcel()
    {
        $this->load->model('m_bar');
        $format_excel = $this->m_bar->get_format_file();
        $this->load->view('data_pariwisata/bar/tambah_data_excel', array('format_excel' => $format_excel));
    }

    public function insertData()
    { //insert data jumlah penumpang berdasarkan pintu masuk
        $id = $this->session->userdata('id_admin');
        $id_kabupaten = $_POST['id_kabupaten-add'];
        $nama_bar = $_POST['akomodasi-add'];
        $alamat = $_POST['alamat-add'];
        $telp_hp = $_POST['telp_hp-add'];
        $fax = $_POST['fax-add'];
        $tahun = $_POST['tahun-add'];
        $keterangan = $_POST['ket-add'];
        $data_insert = array(
            'id_kabupaten' => $id_kabupaten,
            'nama_bar' => $nama_bar,
            'alamat' => $alamat,
            'telp_hp' => $telp_hp,
            'fax' => $fax,
            'tahun' => $tahun,
            'keterangan' => $keterangan,
            'created_by' => $id,
            'updated_by' => $id
        );
        $this->load->model('m_bar');
        $cek_data = $this->m_bar->cekData($nama_bar, $tahun);
        if ($cek_data > 0) {
            $this->session->set_flashdata('duplicate', 'Data Duplikat');
        } else {
            $res = $this->m_insert->insertData('tb_bar', $data_insert);
            if ($res > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            } else {
                $this->session->set_flashdata('failed', 'Gagal Menyimpan Data');
            }
        }
        redirect(base_url('Bar'));
    }

    public function updateData()
    {
        $id_bar = $_POST['id_bar-edit'];
        $data_update = array(
            'jumlah' => $this->input->post('jlh_pengunjung-edit')
        );
        $this->db->where('id', $id_bar);
        $res = $this->db->update('fact_pengunjung_objek', $data_update);
        if ($res > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Update');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal Mengupdate Data');
        }
        redirect(base_url('Bar'));
    }

    public function deleteData()
    {
        // POST values
        $user_ids = $this->input->post('user_ids');

        // Delete records
        $this->load->model('m_bar');
        $result = $this->m_bar->deleteData($user_ids);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('warning', 'Gagal Menghapus Data');
        }
        redirect(base_url('Bar'));
    }

    public function deleteData2() //Memindahkan data ke backup agar data yg sudah pakai 
    // id hotel tidak masalah Pada DETAIL data
    {
        $user_ids = $this->input->post('user_ids');

        $this->load->model('m_bar');
        $this->m_bar->deleteData2($user_ids);

        redirect(base_url('Bar'));
    }
}
