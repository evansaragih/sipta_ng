<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bps extends CI_Controller
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
        $kd_hlm = 'SC4';
        $this->load->view('prediksi/dashboard/bps/beranda', array('kd_hlm' => $kd_hlm));
    }

    public function col_data()
    {
        $this->load->model('m_restoran');
        $tahun = date('Y');
        $data_akomodasi = $this->m_restoran->getData($tahun);
        $this->load->view('data_pariwisata/restoran/data_restoran', array('data_akomodasi' => $data_akomodasi, 'tahun' => $tahun));
    }

    public function cari_data()
    {
        $kd_hlm = 'SC4';
        $tahun = $this->input->post('tahun');
        if ($tahun != 0) {
            $this->load->view('data_pariwisata/restoran/beranda_pencarian', 
            array('kd_hlm' => $kd_hlm, 'tahun' => $tahun));
        } else {
            redirect('Bar');
        }
    }

    public function col_data_pencarian($tahun)
    {
        $this->load->model('m_restoran');
        $data_akomodasi = $this->m_restoran->getData($tahun);
        $this->load->view('data_pariwisata/restoran/data_restoran', array('data_akomodasi' => $data_akomodasi, 'tahun' => $tahun));
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
        $kabupaten = $this->m_restoran->get_kabupaten_query();
        $this->load->view('data_pariwisata/restoran/tambah_data_excel', array('kabupaten' => $kabupaten));
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
        $id_akomodasi = $_POST['id_akomodasi-edit'];
        $alamat = $_POST['alamat-edit'];
        $telp_hp = $_POST['telp_hp-edit'];
        $fax = $_POST['fax-edit'];
        $tahun = $_POST['tahun-edit'];
        date_default_timezone_set('Asia/Singapore');
        $tanggal = date("Y-m-d H:i:s");
        $data_update = array(
            'jumlah_kursi' => $this->input->post('jlh_room-edit'),
            'updated_at' => $tanggal,
            'alamat' => $alamat,
            'telp_hp' => $telp_hp,
            'tahun' => $tahun,
            'fax' => $fax,
            'keterangan' => $this->input->post('ket-edit')
        );
        $this->db->where('id_restoran', $id_akomodasi);
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

    public function deleteData2() //Memindahkan data ke backup agar data yg sudah pakai 
    // id hotel tidak masalah Pada detail data
    {
        $user_ids = $this->input->post('user_ids');

        $this->load->model('m_restoran');
        $this->m_restoran->deleteData2($user_ids);
        
        redirect(base_url('Restoran'));
    }
    
}
