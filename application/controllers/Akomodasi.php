<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akomodasi extends CI_Controller
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
        $this->load->model('m_akomodasi');
        $data_akomodasi = $this->m_akomodasi->getDataAko();
        $kabupaten = $this->m_akomodasi->get_kabupaten_query();
        $this->load->view('akomodasi/data_jumlah/beranda', array('kabupaten' => $kabupaten,'data_akomodasi' => $data_akomodasi));
    }

    public function col_data()
    {
        $this->load->model('m_akomodasi');
        $data_akomodasi = $this->m_akomodasi->getDataAko();
        $this->load->view('akomodasi/data_jumlah/data_akomodasi', array('data_akomodasi' => $data_akomodasi));
    }

    public function getDataHotel_kota() //dapat data hotel dari kabupatn/kota
    {
        $id_kabupaten = $this->input->post('id_kabupaten');
		$this->load->model('m_akomodasi');
		$result = $this->m_akomodasi->getDataHotel_kota($id_kabupaten);
		if(count($result)>0){
			$pro_select_box = '';
			$pro_select_box .= '<option value="">Pilih kota/kabupaten</option>';
			foreach ($result as $hotel) {
				$pro_select_box .='<option value="'.$hotel->id_hotel.'">'.$hotel->nama_hotel.' - '.$hotel->kategori.'</option>';
			}
			echo json_encode($pro_select_box);
		}
    }

    public function getDataHotel_detail() //dapat detail data hotel dari id_hotel
    {
        $id_hotel = $this->input->post('id_hotel');
		$this->load->model('m_akomodasi');
		$result = $this->m_akomodasi->getDataHotel_detail($id_hotel);
		if(count($result)>0){
			foreach ($result as $hotel) {
                $pro_select_box2 ='Detail Data Hotel '.$hotel->nama_hotel.'<br/><table><tr><td>Kategori</td><td>:</td><td>'.$hotel->kategori.'</td></tr>
                <tr><td>Bintang</td><td>:</td><td>'.$hotel->kelas_bintang.'</td></tr>
                <tr><td>Pemilik</td><td>:</td><td>'.$hotel->pemilik.'</td></tr>
                <tr><td>Perusahaan</td><td>:</td><td>'.$hotel->nama_perusahaan.'</td></tr>
                <tr><td>Alamat</td><td>:</td><td>'.$hotel->alamat.'</td></tr>
                <tr><td>Telp/Fax</td><td>:</td><td>'.$hotel->telp_hp.'/'.$hotel->fax.'</td></tr>
                <tr><td>Status</td><td>:</td><td>'.$hotel->status.'</td></tr></table>';
            }
			echo json_encode($pro_select_box2);
		}
    }

    public function col_tambahData()
    {
        $this->load->model('m_akomodasi');
        $kabupaten = $this->m_akomodasi->get_kabupaten_query();
        $kategori = $this->m_akomodasi->get_kategori_query();
        $this->load->view('akomodasi/data_jumlah/tambah_data', array('kabupaten' => $kabupaten, 'kategori' => $kategori));
    }

    public function insertData()
    { //insert data jumlah penumpang berdasarkan pintu masuk
        $id = $this->session->userdata('id_admin');
        $id_hotel = $_POST['nama_ako-search'];
        $tahun = $_POST['tahun-search'];
        $jlh_room = $_POST['jlh_room-search'];
        $keterangan = $_POST['ket-search'];
        $data_insert = array(
            'id_hotel' => $id_hotel,
            'jlh_kamar' => $jlh_room,
            'tahun' => $tahun,
            'keterangan' => $keterangan,
            'created_by' => $id,
            'updated_by' => $id
        );
        $this->load->model('m_akomodasi');
        $cek_data = $this->m_akomodasi->cekData($id_hotel, $tahun);
        if ($cek_data > 0) {
            $this->session->set_flashdata('duplicate', 'Data Duplikat');
        } else {
            $res = $this->m_insert->insertData('tb_accommodation', $data_insert);
            if ($res > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            } else {
                $this->session->set_flashdata('failed', 'Gagal Menyimpan Data');
            }
        }
        redirect(base_url('Akomodasi'));
    }

    public function updateData()
    {
        $id_akomodasi = $_POST['id_akomodasi-edit'];
        date_default_timezone_set('Asia/Singapore');
        $tanggal = date("Y-m-d H:i:s");
        $data_update = array(
            'jlh_kamar' => $this->input->post('jlh_room-edit'),
            'updated_at' => $tanggal,
            'keterangan' => $this->input->post('ket-edit')
        );
        $this->db->where('id_accommodation', $id_akomodasi);
        $res = $this->db->update('tb_accommodation', $data_update);
        if ($res>0) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Update');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal Mengupdate Data');
        }
        redirect(base_url('Akomodasi'));
    }

    public function deleteData()
    {
        // POST values
        $user_ids = $this->input->post('user_ids');

        // Delete records
        $this->load->model('m_akomodasi');
        $result = $this->m_akomodasi->deleteData($user_ids);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('warning', 'Gagal Menghapus Data');
        }
        redirect(base_url('Akomodasi'));
    }

    public function deleteData2() //Memindahkan data ke backup agar data yg sudah pakai 
    // id hotel tidak masalah Pada detail data
    {
        $user_ids = $this->input->post('user_ids');

        $this->load->model('m_akomodasi');
        $this->m_akomodasi->deleteData2($user_ids);
        
        redirect(base_url('Akomodasi'));
    }
    
}
