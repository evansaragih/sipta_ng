<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pintu extends CI_Model {

	public function get_pintu_query(){
		$query = $this->db->query('SELECT * FROM dim_pintu_masuk');
		return $query->result_array();
	}

	
	public function get_nama_pintu($id_pintu_masuk)
	{
	  $this->db->SELECT('pintu_masuk');
	  $this->db->FROM('dim_pintu_masuk');
	  $this->db->WHERE('id', $id_pintu_masuk);
	  $query = $this->db->get();
	  return $query->row();
	}
}
