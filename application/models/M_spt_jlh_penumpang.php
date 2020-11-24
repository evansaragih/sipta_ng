<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_spt_jlh_penumpang extends CI_Model
{
  //blok 1 menurut kategori
  public function menurut_kategori($jenis)
  {
    $query = $this->db->query('SELECT c.tahun, a.pintu_masuk, SUM(d.jumlah) AS jumlah
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE a.id = d.id_pintu_masuk AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang 
    AND b.id = "' . $jenis . '"
    GROUP BY c.tahun DESC, a.id');
    return $query->result_array();
  }

  //blok 2 menurut pintu masuk 10 tahun
  public function menurut_pintu_1($tahun, $id_pintu_masuk)
  {
    $tahun_x = $tahun - 0;
    $query = $this->db->query('SELECT c.tahun, SUM(d.jumlah) AS jumlah, b.jenis_penumpang
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE c.tahun = "' . $tahun_x . '" AND a.id = "' . $id_pintu_masuk . '" 
    AND a.id = d.id_pintu_masuk AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    GROUP BY b.id');
    return $query->result_array();
  }

  public function menurut_pintu_2($tahun, $id_pintu_masuk)
  {
    $tahun_x = $tahun - 1;
    $query = $this->db->query('SELECT c.tahun, SUM(d.jumlah) AS jumlah, b.jenis_penumpang
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE c.tahun = "' . $tahun_x . '" AND a.id = "' . $id_pintu_masuk . '" 
    AND a.id = d.id_pintu_masuk AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    GROUP BY b.id');
    return $query->result_array();
  }

  public function menurut_pintu_3($tahun, $id_pintu_masuk)
  {
    $tahun_x = $tahun - 2;
    $query = $this->db->query('SELECT c.tahun, SUM(d.jumlah) AS jumlah, b.jenis_penumpang
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE c.tahun = "' . $tahun_x . '" AND a.id = "' . $id_pintu_masuk . '" 
    AND a.id = d.id_pintu_masuk AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    GROUP BY b.id');
    return $query->result_array();
  }

  public function menurut_pintu_4($tahun, $id_pintu_masuk)
  {
    $tahun_x = $tahun - 3;
    $query = $this->db->query('SELECT c.tahun, SUM(d.jumlah) AS jumlah, b.jenis_penumpang
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE c.tahun = "' . $tahun_x . '" AND a.id = "' . $id_pintu_masuk . '" 
    AND a.id = d.id_pintu_masuk AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    GROUP BY b.id');
    return $query->result_array();
  }

  public function menurut_pintu_5($tahun, $id_pintu_masuk)
  {
    $tahun_x = $tahun - 4;
    $query = $this->db->query('SELECT c.tahun, SUM(d.jumlah) AS jumlah, b.jenis_penumpang
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE c.tahun = "' . $tahun_x . '" AND a.id = "' . $id_pintu_masuk . '" 
    AND a.id = d.id_pintu_masuk AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    GROUP BY b.id');
    return $query->result_array();
  }

  //blok 3 menurut total penumpang
  public function menurut_total_penumpang($tahun)
  {
    $query = $this->db->query('SELECT a.pintu_masuk, SUM(d.jumlah) AS jumlah
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE c.tahun = "' . $tahun . '" AND a.id = d.id_pintu_masuk AND c.id = d.id_waktu 
    AND b.id = d.id_jenis_penumpang
    GROUP BY a.id');
    return $query->result_array();
  }
}
