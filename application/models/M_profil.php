<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_profil extends CI_Model
{

	public function getData($id_admin)
	{
		$this->db->SELECT('id_admin, nip, nama, type, jenis_kelamin, username, password, foto_profil, created_at, updated_at');
		$this->db->FROM('tb_admin');
		$this->db->WHERE('id_admin', $id_admin);
		$query = $this->db->get();
		return $query->row();
	}

	public function cekPass($password, $id_admin){
        $this->db->SELECT('id_admin, nip, nama');
        $this->db->FROM('tb_admin');
        $this->db->WHERE('password', $password);
        $this->db->WHERE('id_admin', $id_admin);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->row();
        }else{
            return false;
        }
	}
	
	public function cekData($id_admin){
        $this->db->SELECT('id_admin, nip, nama');
        $this->db->FROM('tb_admin');
        $this->db->WHERE('id_admin', $id_admin);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->row();
        }else{
            return false;
        }
    }
}
