<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pramuwisata extends CI_Model
{
  public function get_kabupaten_query()
  {
    $query = $this->db->query('SELECT * FROM tb_kabupaten');
    return $query->result_array();
  }

  public function getData()
  {
    $this->db->SELECT('id_pramuwisata, tb_pramuwisata.`id_pramuwisata_lang` AS id_pramuwisata_lang,
    tb_pramuwisata_lang.`language` AS language, tahun, jumlah,
    keterangan, tb_admin.`nama` AS created_by, tb_pramuwisata.`updated_by` AS updated_by,
    tb_pramuwisata.`updated_at` AS updated_at, tb_pramuwisata.`created_at` AS created_at');
    $this->db->FROM('tb_pramuwisata');
    $this->db->JOIN('tb_pramuwisata_lang', 'tb_pramuwisata_lang.`id_pramuwisata_lang` = tb_pramuwisata.`id_pramuwisata_lang`');
    $this->db->JOIN('tb_admin', 'tb_admin.`id_admin` = tb_pramuwisata.`created_by`');
    $this->db->ORDER_BY('tb_pramuwisata.`created_at`', 'DESC');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getDataLanguage()
  {
    $query = $this->db->query('SELECT * FROM tb_pramuwisata_lang');
    return $query->result_array();
  }

  public function cekData($id_specific_lang, $tahun)
  {
    $this->db->SELECT('id_pramuwisata, jumlah');
    $this->db->FROM('tb_pramuwisata');
    $this->db->WHERE('id_pramuwisata_lang', $id_specific_lang);
    $this->db->WHERE('tahun', $tahun);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }

  public function deleteData($user_ids = array())
  {
    foreach ($user_ids as $userid) {
      $this->db->delete('tb_pramuwisata', array('id_pramuwisata' => $userid));
    }
    return false;
  }
}
