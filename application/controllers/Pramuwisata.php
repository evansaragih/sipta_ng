<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pramuwisata extends CI_Controller
{
    public function __construct(){
		parent::__construct();
		if(! $this->session->userdata('id_admin')){
			redirect('Auth_admin');
		}elseif($this->session->userData('status')!= 'verified'){
            // redirect('JumlahPenumpang');
            echo "<script>;history.go(-1);</script>";
		}
	}

    public function index()
    {
        $this->load->model('m_pramuwisata');
        $data_pramuwisata = $this->m_pramuwisata->getData();
        $this->load->view('pramuwisata/beranda', array('data_pramuwisata' => $data_pramuwisata));
    }

    public function col_data()
    {
        $this->load->model('m_pramuwisata');
        $data_pramuwisata = $this->m_pramuwisata->getData();
        $this->load->view('pramuwisata/data_pramuwisata', array('data_pramuwisata' => $data_pramuwisata));
    }

    public function col_tambahData()
    {
        $this->load->model('m_pramuwisata');
        $data_pramuwisata_lang = $this->m_pramuwisata->getDataLanguage();
        $this->load->view('pramuwisata/tambah_data', array('data_pramuwisata_lang' => $data_pramuwisata_lang));
    }

    public function insertData()
    { //insert data jumlah penumpang berdasarkan pintu masuk
        $id= $this->session->userdata('id_admin');
        $id_specific_lang = $_POST['specific_lang-add'];
        $tahun = $_POST['tahun-add'];
        $jlh_pramuwisata = $_POST['jlh_pramuwisata-add'];
        $ket = $_POST['ket-add'];
        $data_insert = array(
            'id_pramuwisata_lang' => $id_specific_lang,
            'jumlah' => $jlh_pramuwisata,
            'tahun' => $tahun,
            'keterangan' => $ket,
            'created_by' => $id
        );
        $this->load->model('m_pramuwisata');
        $cek_data = $this->m_pramuwisata->cekData($id_specific_lang, $tahun);
        if ($cek_data > 0) {
            $this->session->set_flashdata('duplicate', 'Data Duplikat');
        } else {
            $res = $this->m_insert->insertData('tb_pramuwisata', $data_insert);
            if ($res > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            } else {
                $this->session->set_flashdata('warning', 'Gagal Menyimpan Data');
            }
        }
        redirect(base_url('Pramuwisata'));
    }

    public function updateData()
    {
        $id= $this->session->userdata('id_admin');
        $id_pramuwisata = $_POST['id_pramuwisata-edit'];
        date_default_timezone_set('Asia/Singapore');
        $tanggal = date("Y-m-d H:i:s");
        $data_update = array(
            "id_pramuwisata_lang" => $this->input->post('id_language-edit'),
            "jumlah" => $this->input->post('jlh_pramuwisata-edit'),
            "tahun" => $this->input->post('tahun-edit2'),
            "keterangan" => $this->input->post('ket-edit'),
            "updated_at" => $tanggal,
            "updated_by" => $id
        );
        $this->db->where('id_pramuwisata', $id_pramuwisata);
        $res = $this->db->update('tb_pramuwisata', $data_update);
        if ($res>0) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Update');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal Mengupdate Data');
        }
        redirect(base_url('Pramuwisata'));
    }

    public function deleteData()
    {
        // POST values
        $user_ids = $this->input->post('user_ids');

        // Delete records
        $this->load->model('m_pramuwisata');
        $result = $this->m_pramuwisata->deleteData($user_ids);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('warning', 'Gagal Menghapus Data');
        }
        redirect(base_url('Pramuwisata'));
    }
}
