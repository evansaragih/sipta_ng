<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ObjekWisata extends CI_Controller
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
        $kd_hlm = 'SC6';
        $tahun = date('Y');
        $this->load->view('data_pariwisata/objek_wisata/beranda', array('kd_hlm' => $kd_hlm, 'tahun' => $tahun));
    }

    function data_objek_wisata_ajax($tahun)
    {
        $this->load->model('m_objek_wisata');
        $data = $this->m_objek_wisata->data_objek_wisata_ajax($tahun);
        echo json_encode($data);
    }

    public function col_data($tahun)
    {
        $this->load->view('data_pariwisata/objek_wisata/data_objek_wisata', array('tahun' => $tahun));
    }

    public function cari_data()
    {
        $kd_hlm = 'SC6';
        $tahun = $this->input->post('tahun');
        if ($tahun != 0 || $tahun == "semua") {
            $this->load->view(
                'data_pariwisata/objek_wisata/beranda',
                array('kd_hlm' => $kd_hlm, 'tahun' => $tahun)
            );
        } else {
            redirect('ObjekWisata');
        }
    }

    // public function col_data_pencarian($tahun)
    // {
    //     $this->load->model('m_objek_wisata');
    //     $data_akomodasi = $this->m_objek_wisata->getData($tahun);
    //     $this->load->view('data_pariwisata/objek_wisata/data_objek_wisata', array('data_akomodasi' => $data_akomodasi, 'tahun' => $tahun));
    // }

    public function col_tambahData()
    {
        $this->load->model('m_restoran');
        $kabupaten = $this->m_restoran->get_kabupaten_query();
        $this->load->view('data_pariwisata/objek_wisata/tambah_data', array('kabupaten' => $kabupaten));
    }

    public function col_tambahDataExcel()
    {
        $this->load->model('m_objek_wisata');
        $format_excel = $this->m_objek_wisata->get_format_file();
        $this->load->view('data_pariwisata/objek_wisata/tambah_data_excel', array('format_excel' => $format_excel));
    }

    public function insertData()
    { //insert data jumlah penumpang berdasarkan pintu masuk
        $id = $this->session->userdata('id_admin');
        $id_kabupaten = $_POST['id_kabupaten-add'];
        $nama_objek_wisata = $_POST['akomodasi-add'];
        $tahun = $_POST['tahun-add'];
        $kursi = $_POST['jlh_room-add'];
        $keterangan = $_POST['ket-add'];
        $data_insert = array(
            'id_kabupaten' => $id_kabupaten,
            'nama_objek_wisata' => $nama_objek_wisata,
            'tahun' => $tahun,
            'jumlah' => $kursi,
            'keterangan' => $keterangan,
            'created_by' => $id,
            'updated_by' => $id
        );
        $this->load->model('m_objek_wisata');
        $cek_data = $this->m_objek_wisata->cekDataObjekWisata($id_kabupaten, $nama_objek_wisata);
        if ($cek_data > 0) {
            $this->session->set_flashdata('duplicate', 'duplicate');
        } else {
            $result = $this->m_insert->insertData('tb_objek_wisata', $data_insert);
            // $backup = $this->m_insert->insertData('tb_hotel_backup', $data_insert);
            if ($result > 0) {
                $this->session->set_flashdata('success', 'sucess');
            } else {
                $this->session->set_flashdata('failed', 'failed');
            }
        }
        redirect(base_url('ObjekWisata'));
    }

    public function updateData()
    {
        $id_objek_wisata = $_POST['id_objek_wisata-edit'];
        $data_update = array(
            'jumlah' => $this->input->post('jlh_pengunjung-edit')
        );
        $this->db->where('id', $id_objek_wisata);
        $res = $this->db->update('fact_pengunjung_objek', $data_update);
        if ($res > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Update');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal Mengupdate Data');
        }
        redirect(base_url('ObjekWisata'));
    }

    public function deleteData()
    {
        // POST values
        $user_ids = $this->input->post('user_ids');

        // Delete records
        $this->load->model('m_objek_wisata');
        $result = $this->m_objek_wisata->deleteData($user_ids);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('warning', 'Gagal Menghapus Data');
        }
        redirect(base_url('ObjekWisata'));
    }

    public function deleteData2() //Memindahkan data ke backup agar data yg sudah pakai 
    // id hotel tidak masalah Pada detail data
    {
        $user_ids = $this->input->post('user_ids');

        $this->load->model('m_objek_wisata');
        $this->m_objek_wisata->deleteData2($user_ids);

        redirect(base_url('ObjekWisata'));
    }
}
