<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sp_jlh_penumpang extends CI_Model
{
  public function get_jpenumpang_kategori($tahun)
  {
    $this->db->SELECT('tb_pintu_masuk.`pintu_masuk`, SUM(jlh_internasional) AS jlh_int, 
        SUM(jlh_domestik) AS jlh_dom, (SUM(jlh_internasional)+SUM(jlh_domestik)) AS total');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->JOIN('tb_pintu_masuk', 'tb_pintu_masuk.`id_pintu_masuk` = tb_jlh_penumpang.`id_pintu_masuk`');
    $this->db->WHERE('tahun', $tahun);
    $this->db->GROUP_BY('tb_pintu_masuk.`pintu_masuk`', 'ASC');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_bandara_kategori($tahun)
  {
    $this->db->SELECT('jlh_internasional, jlh_domestik, (jlh_internasional + jlh_domestik) AS total');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->WHERE('id_pintu_masuk', '3');
    $this->db->WHERE('tahun', $tahun);
    return $this->db->get();
  }

  public function get_pelKG_kategori($tahun)
  {
    $this->db->SELECT('jlh_internasional, jlh_domestik, jlh_domestik, (jlh_internasional + jlh_domestik) AS total');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->WHERE('id_pintu_masuk', '2');
    $this->db->WHERE('tahun', $tahun);
    return $this->db->get();
  }

  public function get_pelLP_kategori($tahun)
  {
    $this->db->SELECT('jlh_internasional, jlh_domestik, jlh_domestik, (jlh_internasional + jlh_domestik) AS total');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->WHERE('id_pintu_masuk', '1');
    $this->db->WHERE('tahun', $tahun);
    return $this->db->get();
  }

  // menampilkan bulan data di kolom kategori
  public function get_jpenumpang_januari($tahun)
  {
    $this->db->SELECT('tb_bulan.`bulan`, tb_pintu_masuk.`pintu_masuk`, jlh_internasional, 
      jlh_domestik, (jlh_internasional + jlh_domestik) AS jumlah');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->JOIN('tb_bulan', 'tb_bulan.`id_bulan` = tb_jlh_penumpang.`id_bulan`');
    $this->db->JOIN('tb_pintu_masuk', 'tb_pintu_masuk.`id_pintu_masuk` = tb_jlh_penumpang.`id_pintu_masuk`');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('tb_jlh_penumpang.`id_bulan`', '1');
    $this->db->GROUP_BY('tb_pintu_masuk.`pintu_masuk`', 'ASC');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_jpenumpang_februari($tahun)
  {
    $this->db->SELECT('tb_bulan.`bulan`, tb_pintu_masuk.`pintu_masuk`, jlh_internasional, 
      jlh_domestik, (jlh_internasional + jlh_domestik) AS jumlah');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->JOIN('tb_bulan', 'tb_bulan.`id_bulan` = tb_jlh_penumpang.`id_bulan`');
    $this->db->JOIN('tb_pintu_masuk', 'tb_pintu_masuk.`id_pintu_masuk` = tb_jlh_penumpang.`id_pintu_masuk`');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('tb_jlh_penumpang.`id_bulan`', '2');
    $this->db->GROUP_BY('tb_pintu_masuk.`pintu_masuk`', 'ASC');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_jpenumpang_maret($tahun)
  {
    $this->db->SELECT('tb_bulan.`bulan`, tb_pintu_masuk.`pintu_masuk`, jlh_internasional, 
      jlh_domestik, (jlh_internasional + jlh_domestik) AS jumlah');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->JOIN('tb_bulan', 'tb_bulan.`id_bulan` = tb_jlh_penumpang.`id_bulan`');
    $this->db->JOIN('tb_pintu_masuk', 'tb_pintu_masuk.`id_pintu_masuk` = tb_jlh_penumpang.`id_pintu_masuk`');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('tb_jlh_penumpang.`id_bulan`', '3');
    $this->db->GROUP_BY('tb_pintu_masuk.`pintu_masuk`', 'ASC');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_jpenumpang_april($tahun)
  {
    $this->db->SELECT('tb_bulan.`bulan`, tb_pintu_masuk.`pintu_masuk`, jlh_internasional, 
      jlh_domestik, (jlh_internasional + jlh_domestik) AS jumlah');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->JOIN('tb_bulan', 'tb_bulan.`id_bulan` = tb_jlh_penumpang.`id_bulan`');
    $this->db->JOIN('tb_pintu_masuk', 'tb_pintu_masuk.`id_pintu_masuk` = tb_jlh_penumpang.`id_pintu_masuk`');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('tb_jlh_penumpang.`id_bulan`', '4');
    $this->db->GROUP_BY('tb_pintu_masuk.`pintu_masuk`', 'ASC');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_jpenumpang_mei($tahun)
  {
    $this->db->SELECT('tb_bulan.`bulan`, tb_pintu_masuk.`pintu_masuk`, jlh_internasional, 
      jlh_domestik, (jlh_internasional + jlh_domestik) AS jumlah');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->JOIN('tb_bulan', 'tb_bulan.`id_bulan` = tb_jlh_penumpang.`id_bulan`');
    $this->db->JOIN('tb_pintu_masuk', 'tb_pintu_masuk.`id_pintu_masuk` = tb_jlh_penumpang.`id_pintu_masuk`');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('tb_jlh_penumpang.`id_bulan`', '5');
    $this->db->GROUP_BY('tb_pintu_masuk.`pintu_masuk`', 'ASC');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_jpenumpang_juni($tahun)
  {
    $this->db->SELECT('tb_bulan.`bulan`, tb_pintu_masuk.`pintu_masuk`, jlh_internasional, 
      jlh_domestik, (jlh_internasional + jlh_domestik) AS jumlah');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->JOIN('tb_bulan', 'tb_bulan.`id_bulan` = tb_jlh_penumpang.`id_bulan`');
    $this->db->JOIN('tb_pintu_masuk', 'tb_pintu_masuk.`id_pintu_masuk` = tb_jlh_penumpang.`id_pintu_masuk`');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('tb_jlh_penumpang.`id_bulan`', '6');
    $this->db->GROUP_BY('tb_pintu_masuk.`pintu_masuk`', 'ASC');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_jpenumpang_juli($tahun)
  {
    $this->db->SELECT('tb_bulan.`bulan`, tb_pintu_masuk.`pintu_masuk`, jlh_internasional, 
      jlh_domestik, (jlh_internasional + jlh_domestik) AS jumlah');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->JOIN('tb_bulan', 'tb_bulan.`id_bulan` = tb_jlh_penumpang.`id_bulan`');
    $this->db->JOIN('tb_pintu_masuk', 'tb_pintu_masuk.`id_pintu_masuk` = tb_jlh_penumpang.`id_pintu_masuk`');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('tb_jlh_penumpang.`id_bulan`', '7');
    $this->db->GROUP_BY('tb_pintu_masuk.`pintu_masuk`', 'ASC');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_jpenumpang_agustus($tahun)
  {
    $this->db->SELECT('tb_bulan.`bulan`, tb_pintu_masuk.`pintu_masuk`, jlh_internasional, 
      jlh_domestik, (jlh_internasional + jlh_domestik) AS jumlah');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->JOIN('tb_bulan', 'tb_bulan.`id_bulan` = tb_jlh_penumpang.`id_bulan`');
    $this->db->JOIN('tb_pintu_masuk', 'tb_pintu_masuk.`id_pintu_masuk` = tb_jlh_penumpang.`id_pintu_masuk`');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('tb_jlh_penumpang.`id_bulan`', '8');
    $this->db->GROUP_BY('tb_pintu_masuk.`pintu_masuk`', 'ASC');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_jpenumpang_september($tahun)
  {
    $this->db->SELECT('tb_bulan.`bulan`, tb_pintu_masuk.`pintu_masuk`, jlh_internasional, 
      jlh_domestik, (jlh_internasional + jlh_domestik) AS jumlah');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->JOIN('tb_bulan', 'tb_bulan.`id_bulan` = tb_jlh_penumpang.`id_bulan`');
    $this->db->JOIN('tb_pintu_masuk', 'tb_pintu_masuk.`id_pintu_masuk` = tb_jlh_penumpang.`id_pintu_masuk`');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('tb_jlh_penumpang.`id_bulan`', '9');
    $this->db->GROUP_BY('tb_pintu_masuk.`pintu_masuk`', 'ASC');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_jpenumpang_oktober($tahun)
  {
    $this->db->SELECT('tb_bulan.`bulan`, tb_pintu_masuk.`pintu_masuk`, jlh_internasional, 
      jlh_domestik, (jlh_internasional + jlh_domestik) AS jumlah');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->JOIN('tb_bulan', 'tb_bulan.`id_bulan` = tb_jlh_penumpang.`id_bulan`');
    $this->db->JOIN('tb_pintu_masuk', 'tb_pintu_masuk.`id_pintu_masuk` = tb_jlh_penumpang.`id_pintu_masuk`');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('tb_jlh_penumpang.`id_bulan`', '10');
    $this->db->GROUP_BY('tb_pintu_masuk.`pintu_masuk`', 'ASC');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_jpenumpang_november($tahun)
  {
    $this->db->SELECT('tb_bulan.`bulan`, tb_pintu_masuk.`pintu_masuk`, jlh_internasional, 
      jlh_domestik, (jlh_internasional + jlh_domestik) AS jumlah');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->JOIN('tb_bulan', 'tb_bulan.`id_bulan` = tb_jlh_penumpang.`id_bulan`');
    $this->db->JOIN('tb_pintu_masuk', 'tb_pintu_masuk.`id_pintu_masuk` = tb_jlh_penumpang.`id_pintu_masuk`');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('tb_jlh_penumpang.`id_bulan`', '11');
    $this->db->GROUP_BY('tb_pintu_masuk.`pintu_masuk`', 'ASC');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_jpenumpang_desember($tahun)
  {
    $this->db->SELECT('tb_bulan.`bulan`, tb_pintu_masuk.`pintu_masuk`, jlh_internasional, 
      jlh_domestik, (jlh_internasional + jlh_domestik) AS jumlah');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->JOIN('tb_bulan', 'tb_bulan.`id_bulan` = tb_jlh_penumpang.`id_bulan`');
    $this->db->JOIN('tb_pintu_masuk', 'tb_pintu_masuk.`id_pintu_masuk` = tb_jlh_penumpang.`id_pintu_masuk`');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('tb_jlh_penumpang.`id_bulan`', '12');
    $this->db->GROUP_BY('tb_pintu_masuk.`pintu_masuk`', 'ASC');
    $query = $this->db->get();
    return $query->result_array();
  }


  public function get_jumlah_kategori1($tahun)
  {
    $this->db->SELECT('SUM(jlh_internasional) AS jlh_internasional, SUM(jlh_domestik) AS jlh_domestik');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->WHERE('tahun', $tahun);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }

  public function get_jlh_penumpang_perbulan($id_pintu_masuk, $tahun)
  {
    $this->db->SELECT('tb_pintu_masuk.`pintu_masuk` AS pintu_masuk, id_jlh_penumpang, 
    SUM(jlh_internasional) AS jlh_internasional, SUM(jlh_domestik) AS jlh_domestik, 
    tb_bulan.`bulan`, tahun');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->JOIN('tb_bulan', 'tb_bulan.`id_bulan` = tb_jlh_penumpang.`id_bulan`');
    $this->db->JOIN('tb_pintu_masuk', 'tb_pintu_masuk.`id_pintu_masuk` = tb_jlh_penumpang.`id_pintu_masuk`');
    $this->db->WHERE('tb_jlh_penumpang.`id_pintu_masuk`', $id_pintu_masuk);
    $this->db->WHERE('tahun', $tahun);
    $this->db->GROUP_BY('tb_jlh_penumpang.`id_bulan`');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_jumlah_perbulan1($id_pintu_masuk, $tahun)
  {
    $this->db->SELECT('SUM(jlh_internasional) AS jlh_internasional, SUM(jlh_domestik) AS jlh_domestik');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('tb_jlh_penumpang.`id_pintu_masuk`', $id_pintu_masuk);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }

  // untuk blok 2 diagram pie yang perbulan
  public function get_jpenumpang_bulan1($id_pintu_masuk, $tahun)
  {
    $this->db->SELECT('jlh_internasional, jlh_domestik');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('id_bulan', '1');
    $this->db->WHERE('tb_jlh_penumpang.`id_pintu_masuk`', $id_pintu_masuk);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_jpenumpang_bulan2($id_pintu_masuk, $tahun)
  {
    $this->db->SELECT('jlh_internasional, jlh_domestik');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('id_bulan', '2');
    $this->db->WHERE('tb_jlh_penumpang.`id_pintu_masuk`', $id_pintu_masuk);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_jpenumpang_bulan3($id_pintu_masuk, $tahun)
  {
    $this->db->SELECT('jlh_internasional, jlh_domestik');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('id_bulan', '3');
    $this->db->WHERE('tb_jlh_penumpang.`id_pintu_masuk`', $id_pintu_masuk);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_jpenumpang_bulan4($id_pintu_masuk, $tahun)
  {
    $this->db->SELECT('jlh_internasional, jlh_domestik');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('id_bulan', '4');
    $this->db->WHERE('tb_jlh_penumpang.`id_pintu_masuk`', $id_pintu_masuk);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_jpenumpang_bulan5($id_pintu_masuk, $tahun)
  {
    $this->db->SELECT('jlh_internasional, jlh_domestik');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('id_bulan', '5');
    $this->db->WHERE('tb_jlh_penumpang.`id_pintu_masuk`', $id_pintu_masuk);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_jpenumpang_bulan6($id_pintu_masuk, $tahun)
  {
    $this->db->SELECT('jlh_internasional, jlh_domestik');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('id_bulan', '6');
    $this->db->WHERE('tb_jlh_penumpang.`id_pintu_masuk`', $id_pintu_masuk);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_jpenumpang_bulan7($id_pintu_masuk, $tahun)
  {
    $this->db->SELECT('jlh_internasional, jlh_domestik');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('id_bulan', '7');
    $this->db->WHERE('tb_jlh_penumpang.`id_pintu_masuk`', $id_pintu_masuk);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_jpenumpang_bulan8($id_pintu_masuk, $tahun)
  {
    $this->db->SELECT('jlh_internasional, jlh_domestik');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('id_bulan', '8');
    $this->db->WHERE('tb_jlh_penumpang.`id_pintu_masuk`', $id_pintu_masuk);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_jpenumpang_bulan9($id_pintu_masuk, $tahun)
  {
    $this->db->SELECT('jlh_internasional, jlh_domestik');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('id_bulan', '9');
    $this->db->WHERE('tb_jlh_penumpang.`id_pintu_masuk`', $id_pintu_masuk);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_jpenumpang_bulan10($id_pintu_masuk, $tahun)
  {
    $this->db->SELECT('jlh_internasional, jlh_domestik');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('id_bulan', '10');
    $this->db->WHERE('tb_jlh_penumpang.`id_pintu_masuk`', $id_pintu_masuk);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_jpenumpang_bulan11($id_pintu_masuk, $tahun)
  {
    $this->db->SELECT('jlh_internasional, jlh_domestik');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('id_bulan', '11');
    $this->db->WHERE('tb_jlh_penumpang.`id_pintu_masuk`', $id_pintu_masuk);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_jpenumpang_bulan12($id_pintu_masuk, $tahun)
  {
    $this->db->SELECT('jlh_internasional, jlh_domestik');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('id_bulan', '12');
    $this->db->WHERE('tb_jlh_penumpang.`id_pintu_masuk`', $id_pintu_masuk);
    $query = $this->db->get();
    return $query->row();
  }
  // ending untuk blok 2 diagram pie yang perbulan

  public function get_jlh_penumpang_pertahun()
  {
    $this->db->SELECT('tb_pintu_masuk.`pintu_masuk` AS pintu_masuk, id_jlh_penumpang, 
    SUM(jlh_internasional) AS jlh_internasional, SUM(jlh_domestik) AS jlh_domestik, tahun');
    $this->db->FROM('tb_jlh_penumpang');
    $this->db->JOIN('tb_bulan', 'tb_bulan.`id_bulan` = tb_jlh_penumpang.`id_bulan`');
    $this->db->JOIN('tb_pintu_masuk', 'tb_pintu_masuk.`id_pintu_masuk` = tb_jlh_penumpang.`id_pintu_masuk`');
    $this->db->WHERE('tb_jlh_penumpang.`id_pintu_masuk`', '1');
    $this->db->GROUP_BY('tahun');
    $query = $this->db->get();
    return $query->result_array();
  }
}
