<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Kebangsaan extends CI_Model
{
  public function get_kategori_query()
  {
    $query = $this->db->query('SELECT * FROM dim_grup');
    return $query->result_array();
  }

  public function getData() //get data grup kebangsaan
  {
    $this->db->SELECT('id, grup, path_map');
    $this->db->FROM('dim_grup');
    $this->db->ORDER_BY('grup', 'ASC');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getDataRestoran() //get data kebangsaan
  {
    $this->db->SELECT('dim_kebangsaan.`id` AS id_kebangsaan, dim_grup.`id` AS id_grup, dim_grup.`grup`,
    dim_kebangsaan.`kebangsaan`');
    $this->db->FROM('dim_kebangsaan');
    $this->db->JOIN('dim_grup', 'dim_grup.`id` = dim_kebangsaan.`id_grup`');
    $this->db->ORDER_BY('dim_grup.`grup`', 'ASC');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function cekData($grup_kebangsaan) //pada tambah data restoran pertahun
  {
    $this->db->SELECT('id , grup');
    $this->db->FROM('dim_grup');
    $this->db->WHERE('grup', $grup_kebangsaan);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }

  public function cekData_kebangsaan($nationality) //pada tambah data restoran pertahun
  {
    $this->db->SELECT('id , kebangsaan');
    $this->db->FROM('dim_kebangsaan');
    $this->db->WHERE('kebangsaan', $nationality);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }
}
