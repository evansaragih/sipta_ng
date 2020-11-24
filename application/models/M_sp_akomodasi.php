<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sp_akomodasi extends CI_Model
{
  //header1
  public function get_kabupaten()
  {
    $query = $this->db->query('SELECT * FROM dim_kabupaten');
    return $query->result_array();
  }

  public function get_nama_kabupaten($id_kab)
  {
    $this->db->SELECT('kabupaten');
    $this->db->FROM('dim_kabupaten');
    $this->db->WHERE('id', $id_kab);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_kategori()
  {
    $query = $this->db->query('SELECT * FROM dim_kategori');
    return $query->result_array();
  }

  public function get_nama_kategori($id_kat)
  {
    $this->db->SELECT('kategori');
    $this->db->FROM('dim_kategori');
    $this->db->WHERE('id', $id_kat);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_menurut_kategori($id_kab, $tahun)
  {
    $query = $this->db->query('SELECT a.kategori, COUNT(e.id) AS jlh_akomodasi, SUM(b.jumlah_kamar) AS jlh_kamar, SUM(b.jumlah_tamu) AS jlh_tamu
    FROM dim_kategori a, fact_akomodasi b, dim_waktu c, dim_kabupaten d, dim_akomodasi e
    WHERE b.id_akomodasi = e.id AND b.id_kategori = a.id AND b.id_waktu = c.id AND e.id_kabupaten = d.id
    AND d.id = "' . $id_kab . '" AND c.tahun = "' . $tahun . '"
    GROUP BY a.id');
    return $query->result_array();
  }


  public function get_jumlah_kategori2($kab, $tahun) //gadipake
  {
    $this->db->SELECT('SUM(jlh_akomodasi) AS jlh_akomodasi, SUM(jlh_kamar) AS jlh_kamar');
    $this->db->FROM('tb_akomodasi');
    $this->db->WHERE('tahun', $tahun);
    $this->db->WHERE('tb_akomodasi.`id_kabupaten`', $kab);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }

  //blok2
  public function get_menurut_wilayah($id_kat, $tahun)
  {
    $query = $this->db->query('SELECT d.kabupaten, COUNT(e.id) AS jlh_akomodasi, 
    SUM(b.jumlah_kamar) AS jlh_kamar, SUM(b.jumlah_tamu) AS jlh_tamu, c.tahun, a.kategori
    FROM dim_kategori a, fact_akomodasi b, dim_waktu c, dim_kabupaten d, dim_akomodasi e
    WHERE b.id_akomodasi = e.id AND b.id_kategori = a.id AND b.id_waktu = c.id AND e.id_kabupaten = d.id
    AND a.id = "' . $id_kat . '" AND c.tahun = "' . $tahun . '"
    GROUP BY d.id
    ');
    return $query->result_array();
  }

  //blok3
  public function get_menurut_waktu($id_kat, $tahun)
  {
    $query = $this->db->query('SELECT c.tahun, COUNT(e.id) AS jlh_akomodasi, SUM(b.jumlah_kamar) AS jlh_kamar, 
    SUM(b.jumlah_tamu) AS jlh_tamu, d.kabupaten, a.kategori
    FROM dim_kategori a, fact_akomodasi b, dim_waktu c, dim_kabupaten d, dim_akomodasi e
    WHERE b.id_akomodasi = e.id AND b.id_kategori = a.id AND b.id_waktu = c.id AND e.id_kabupaten = d.id
    AND a.id = "' . $id_kat . '" AND d.id = "' . $tahun . '"
    GROUP BY c.tahun');
    return $query->result_array();
  }

  public function get_kab_denpasar($id_kat, $tahun)
  {
    $query = $this->db->query('SELECT d.kabupaten, COUNT(e.id) AS jlh_akomodasi, 
    SUM(b.jumlah_kamar) AS jlh_kamar, SUM(b.jumlah_tamu) AS jlh_tamu, c.tahun, a.kategori
    FROM dim_kategori a, fact_akomodasi b, dim_waktu c, dim_kabupaten d, dim_akomodasi e
    WHERE b.id_akomodasi = e.id AND b.id_kategori = a.id AND b.id_waktu = c.id AND e.id_kabupaten = d.id
    AND a.id = "' . $id_kat . '" AND c.tahun = "' . $tahun . '" AND d.id = 1');
    return $query->row();
  }

  public function get_kab_badung($id_kat, $tahun)
  {
    $query = $this->db->query('SELECT d.kabupaten, COUNT(e.id) AS jlh_akomodasi, 
    SUM(b.jumlah_kamar) AS jlh_kamar, SUM(b.jumlah_tamu) AS jlh_tamu, c.tahun, a.kategori
    FROM dim_kategori a, fact_akomodasi b, dim_waktu c, dim_kabupaten d, dim_akomodasi e
    WHERE b.id_akomodasi = e.id AND b.id_kategori = a.id AND b.id_waktu = c.id AND e.id_kabupaten = d.id
    AND a.id = "' . $id_kat . '" AND c.tahun = "' . $tahun . '" AND d.id = 2');
    return $query->row();
  }

  public function get_kab_bangli($id_kat, $tahun)
  {
    $query = $this->db->query('SELECT d.kabupaten, COUNT(e.id) AS jlh_akomodasi, 
    SUM(b.jumlah_kamar) AS jlh_kamar, SUM(b.jumlah_tamu) AS jlh_tamu, c.tahun, a.kategori
    FROM dim_kategori a, fact_akomodasi b, dim_waktu c, dim_kabupaten d, dim_akomodasi e
    WHERE b.id_akomodasi = e.id AND b.id_kategori = a.id AND b.id_waktu = c.id AND e.id_kabupaten = d.id
    AND a.id = "' . $id_kat . '" AND c.tahun = "' . $tahun . '" AND d.id = 3');
    return $query->row();
  }

  public function get_kab_buleleng($id_kat, $tahun)
  {
    $query = $this->db->query('SELECT d.kabupaten, COUNT(e.id) AS jlh_akomodasi, 
    SUM(b.jumlah_kamar) AS jlh_kamar, SUM(b.jumlah_tamu) AS jlh_tamu, c.tahun, a.kategori
    FROM dim_kategori a, fact_akomodasi b, dim_waktu c, dim_kabupaten d, dim_akomodasi e
    WHERE b.id_akomodasi = e.id AND b.id_kategori = a.id AND b.id_waktu = c.id AND e.id_kabupaten = d.id
    AND a.id = "' . $id_kat . '" AND c.tahun = "' . $tahun . '" AND d.id = 4');
    return $query->row();
  }

  public function get_kab_gianyar($id_kat, $tahun)
  {
    $query = $this->db->query('SELECT d.kabupaten, COUNT(e.id) AS jlh_akomodasi, 
    SUM(b.jumlah_kamar) AS jlh_kamar, SUM(b.jumlah_tamu) AS jlh_tamu, c.tahun, a.kategori
    FROM dim_kategori a, fact_akomodasi b, dim_waktu c, dim_kabupaten d, dim_akomodasi e
    WHERE b.id_akomodasi = e.id AND b.id_kategori = a.id AND b.id_waktu = c.id AND e.id_kabupaten = d.id
    AND a.id = "' . $id_kat . '" AND c.tahun = "' . $tahun . '" AND d.id = 5');
    return $query->row();
  }

  public function get_kab_jembrana($id_kat, $tahun)
  {
    $query = $this->db->query('SELECT d.kabupaten, COUNT(e.id) AS jlh_akomodasi, 
    SUM(b.jumlah_kamar) AS jlh_kamar, SUM(b.jumlah_tamu) AS jlh_tamu, c.tahun, a.kategori
    FROM dim_kategori a, fact_akomodasi b, dim_waktu c, dim_kabupaten d, dim_akomodasi e
    WHERE b.id_akomodasi = e.id AND b.id_kategori = a.id AND b.id_waktu = c.id AND e.id_kabupaten = d.id
    AND a.id = "' . $id_kat . '" AND c.tahun = "' . $tahun . '" AND d.id = 6');
    return $query->row();
  }

  public function get_kab_klungkung($id_kat, $tahun)
  {
    $query = $this->db->query('SELECT d.kabupaten, COUNT(e.id) AS jlh_akomodasi, 
    SUM(b.jumlah_kamar) AS jlh_kamar, SUM(b.jumlah_tamu) AS jlh_tamu, c.tahun, a.kategori
    FROM dim_kategori a, fact_akomodasi b, dim_waktu c, dim_kabupaten d, dim_akomodasi e
    WHERE b.id_akomodasi = e.id AND b.id_kategori = a.id AND b.id_waktu = c.id AND e.id_kabupaten = d.id
    AND a.id = "' . $id_kat . '" AND c.tahun = "' . $tahun . '" AND d.id = 7');
    return $query->row();
  }

  public function get_kab_karangasem($id_kat, $tahun)
  {
    $query = $this->db->query('SELECT d.kabupaten, COUNT(e.id) AS jlh_akomodasi, 
    SUM(b.jumlah_kamar) AS jlh_kamar, SUM(b.jumlah_tamu) AS jlh_tamu, c.tahun, a.kategori
    FROM dim_kategori a, fact_akomodasi b, dim_waktu c, dim_kabupaten d, dim_akomodasi e
    WHERE b.id_akomodasi = e.id AND b.id_kategori = a.id AND b.id_waktu = c.id AND e.id_kabupaten = d.id
    AND a.id = "' . $id_kat . '" AND c.tahun = "' . $tahun . '" AND d.id = 8');
    return $query->row();
  }

  public function get_kab_tabanan($id_kat, $tahun)
  {
    $query = $this->db->query('SELECT d.kabupaten, COUNT(e.id) AS jlh_akomodasi, 
    SUM(b.jumlah_kamar) AS jlh_kamar, SUM(b.jumlah_tamu) AS jlh_tamu, c.tahun, a.kategori
    FROM dim_kategori a, fact_akomodasi b, dim_waktu c, dim_kabupaten d, dim_akomodasi e
    WHERE b.id_akomodasi = e.id AND b.id_kategori = a.id AND b.id_waktu = c.id AND e.id_kabupaten = d.id
    AND a.id = "' . $id_kat . '" AND c.tahun = "' . $tahun . '" AND d.id = 9');
    return $query->row();
  }

  public function get_max($id_kat, $tahun)
  {
    $query = $this->db->query('SELECT COUNT(e.id) AS max, MAX(b.jumlah_kamar) AS max_kamar, MAX(b.jumlah_tamu) AS max_tamu
    FROM dim_kategori a, fact_akomodasi b, dim_waktu c, dim_kabupaten d, dim_akomodasi e
    WHERE b.id_akomodasi = e.id AND b.id_kategori = a.id AND b.id_waktu = c.id AND e.id_kabupaten = d.id
    AND a.id = "' . $id_kat . '" AND c.tahun = "' . $tahun . '"');
    return $query->row();
  }

  public function get_min($id_kat, $tahun)
  {
    $query = $this->db->query('SELECT COUNT(e.id) AS min, MIN(b.jumlah_kamar) AS max_kamar, MIN(b.jumlah_tamu) AS max_tamu
    FROM dim_kategori a, fact_akomodasi b, dim_waktu c, dim_kabupaten d, dim_akomodasi e
    WHERE b.id_akomodasi = e.id AND b.id_kategori = a.id AND b.id_waktu = c.id AND e.id_kabupaten = d.id
    AND a.id = "' . $id_kat . '" AND c.tahun = "' . $tahun . '"');
    return $query->row();
  }
}
