<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sp_objek_wisata extends CI_Model
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

  public function get_jenis_wisatawan()
  {
    $query = $this->db->query('SELECT * FROM dim_jenis_wisatawan');
    return $query->result_array();
  }

  public function get_nama_jenis_wisatawan($id_jenis)
  {
    $this->db->SELECT('jenis_wisatawan');
    $this->db->FROM('dim_jenis_wisatawan');
    $this->db->WHERE('id', $id_jenis);
    $query = $this->db->get();
    return $query->row();
  }

  // blok1 menurut objek wisata
  public function menurut_objek_wisata($id_kab, $tahun, $id_jenis)
  {
    $query = $this->db->query('SELECT a.nama, b.jumlah
    FROM dim_objek a, fact_pengunjung_objek b, dim_waktu c, dim_jenis_wisatawan d, 
    dim_kabupaten e, dim_jenis_objek g
    WHERE a.id = b.id_objek AND b.id_jenis_wisatawan = d.id AND c.id = b.id_waktu 
    AND a.id_kabupaten = e.id AND b.id_jenis_wisatawan = d.id
    AND e.id = "' . $id_kab . '" AND c.tahun = "' . $tahun . '" AND d.id = "' . $id_jenis . '" 
    AND g.id = a.id_jenis_objek AND g.id = 3
    ');
    return $query->result_array();
  }

  public function menurut_kabupaten($tahun, $id_jenis)
  {
    $query = $this->db->query('SELECT e.kabupaten, COUNT(e.id) AS jumlah_unit, SUM(b.jumlah) AS jumlah_pengunjung
    FROM dim_objek a, fact_pengunjung_objek b, dim_waktu c, dim_jenis_wisatawan d, dim_kabupaten e, dim_jenis_objek g
    WHERE a.id = b.id_objek AND b.id_jenis_wisatawan = d.id AND c.id = b.id_waktu AND a.id_kabupaten = e.id AND b.id_jenis_wisatawan = d.id AND g.id = a.id_jenis_objek
    AND d.id = "' . $id_jenis . '" AND c.tahun = "' . $tahun . '" AND g.id = 3
    GROUP BY e.id
    ');
    return $query->result_array();
  }

  public function get_kab_denpasar($tahun, $id_jenis)
  {
    $query = $this->db->query('SELECT e.kabupaten, COUNT(e.id) AS jumlah_unit, SUM(b.jumlah) AS jumlah_pengunjung
    FROM dim_objek a, fact_pengunjung_objek b, dim_waktu c, dim_jenis_wisatawan d, dim_kabupaten e, dim_jenis_objek g
    WHERE a.id = b.id_objek AND b.id_jenis_wisatawan = d.id AND c.id = b.id_waktu AND a.id_kabupaten = e.id AND b.id_jenis_wisatawan = d.id AND g.id = a.id_jenis_objek
    AND d.id = "' . $id_jenis . '" AND c.tahun = "' . $tahun . '" AND g.id = 3 AND e.id = 1');
    return $query->row();
  }

  public function get_kab_badung($tahun, $id_jenis)
  {
    $query = $this->db->query('SELECT e.kabupaten, COUNT(e.id) AS jumlah_unit, SUM(b.jumlah) AS jumlah_pengunjung
    FROM dim_objek a, fact_pengunjung_objek b, dim_waktu c, dim_jenis_wisatawan d, dim_kabupaten e, dim_jenis_objek g
    WHERE a.id = b.id_objek AND b.id_jenis_wisatawan = d.id AND c.id = b.id_waktu AND a.id_kabupaten = e.id AND b.id_jenis_wisatawan = d.id AND g.id = a.id_jenis_objek
    AND d.id = "' . $id_jenis . '" AND c.tahun = "' . $tahun . '" AND g.id = 3 AND e.id = 2');
    return $query->row();
  }

  public function get_kab_bangli($tahun, $id_jenis)
  {
    $query = $this->db->query('SELECT e.kabupaten, COUNT(e.id) AS jumlah_unit, SUM(b.jumlah) AS jumlah_pengunjung
    FROM dim_objek a, fact_pengunjung_objek b, dim_waktu c, dim_jenis_wisatawan d, dim_kabupaten e, dim_jenis_objek g
    WHERE a.id = b.id_objek AND b.id_jenis_wisatawan = d.id AND c.id = b.id_waktu AND a.id_kabupaten = e.id AND b.id_jenis_wisatawan = d.id AND g.id = a.id_jenis_objek
    AND d.id = "' . $id_jenis . '" AND c.tahun = "' . $tahun . '" AND g.id = 3 AND e.id = 3');
    return $query->row();
  }

  public function get_kab_buleleng($tahun, $id_jenis)
  {
    $query = $this->db->query('SELECT e.kabupaten, COUNT(e.id) AS jumlah_unit, SUM(b.jumlah) AS jumlah_pengunjung
    FROM dim_objek a, fact_pengunjung_objek b, dim_waktu c, dim_jenis_wisatawan d, dim_kabupaten e, dim_jenis_objek g
    WHERE a.id = b.id_objek AND b.id_jenis_wisatawan = d.id AND c.id = b.id_waktu AND a.id_kabupaten = e.id AND b.id_jenis_wisatawan = d.id AND g.id = a.id_jenis_objek
    AND d.id = "' . $id_jenis . '" AND c.tahun = "' . $tahun . '" AND g.id = 3 AND e.id = 4');
    return $query->row();
  }

  public function get_kab_gianyar($tahun, $id_jenis)
  {
    $query = $this->db->query('SELECT e.kabupaten, COUNT(e.id) AS jumlah_unit, SUM(b.jumlah) AS jumlah_pengunjung
    FROM dim_objek a, fact_pengunjung_objek b, dim_waktu c, dim_jenis_wisatawan d, dim_kabupaten e, dim_jenis_objek g
    WHERE a.id = b.id_objek AND b.id_jenis_wisatawan = d.id AND c.id = b.id_waktu AND a.id_kabupaten = e.id AND b.id_jenis_wisatawan = d.id AND g.id = a.id_jenis_objek
    AND d.id = "' . $id_jenis . '" AND c.tahun = "' . $tahun . '" AND g.id = 3 AND e.id = 5');
    return $query->row();
  }

  public function get_kab_jembrana($tahun, $id_jenis)
  {
    $query = $this->db->query('SELECT e.kabupaten, COUNT(e.id) AS jumlah_unit, SUM(b.jumlah) AS jumlah_pengunjung
    FROM dim_objek a, fact_pengunjung_objek b, dim_waktu c, dim_jenis_wisatawan d, dim_kabupaten e, dim_jenis_objek g
    WHERE a.id = b.id_objek AND b.id_jenis_wisatawan = d.id AND c.id = b.id_waktu AND a.id_kabupaten = e.id AND b.id_jenis_wisatawan = d.id AND g.id = a.id_jenis_objek
    AND d.id = "' . $id_jenis . '" AND c.tahun = "' . $tahun . '" AND g.id = 3 AND e.id = 6');
    return $query->row();
  }

  public function get_kab_klungkung($tahun, $id_jenis)
  {
    $query = $this->db->query('SELECT e.kabupaten, COUNT(e.id) AS jumlah_unit, SUM(b.jumlah) AS jumlah_pengunjung
    FROM dim_objek a, fact_pengunjung_objek b, dim_waktu c, dim_jenis_wisatawan d, dim_kabupaten e, dim_jenis_objek g
    WHERE a.id = b.id_objek AND b.id_jenis_wisatawan = d.id AND c.id = b.id_waktu AND a.id_kabupaten = e.id AND b.id_jenis_wisatawan = d.id AND g.id = a.id_jenis_objek
    AND d.id = "' . $id_jenis . '" AND c.tahun = "' . $tahun . '" AND g.id = 3 AND e.id = 7');
    return $query->row();
  }

  public function get_kab_karangasem($tahun, $id_jenis)
  {
    $query = $this->db->query('SELECT e.kabupaten, COUNT(e.id) AS jumlah_unit, SUM(b.jumlah) AS jumlah_pengunjung
    FROM dim_objek a, fact_pengunjung_objek b, dim_waktu c, dim_jenis_wisatawan d, dim_kabupaten e, dim_jenis_objek g
    WHERE a.id = b.id_objek AND b.id_jenis_wisatawan = d.id AND c.id = b.id_waktu AND a.id_kabupaten = e.id AND b.id_jenis_wisatawan = d.id AND g.id = a.id_jenis_objek
    AND d.id = "' . $id_jenis . '" AND c.tahun = "' . $tahun . '" AND g.id = 3 AND e.id = 8');
    return $query->row();
  }

  public function get_kab_tabanan($tahun, $id_jenis)
  {
    $query = $this->db->query('SELECT e.kabupaten, COUNT(e.id) AS jumlah_unit, SUM(b.jumlah) AS jumlah_pengunjung
    FROM dim_objek a, fact_pengunjung_objek b, dim_waktu c, dim_jenis_wisatawan d, dim_kabupaten e, dim_jenis_objek g
    WHERE a.id = b.id_objek AND b.id_jenis_wisatawan = d.id AND c.id = b.id_waktu AND a.id_kabupaten = e.id AND b.id_jenis_wisatawan = d.id AND g.id = a.id_jenis_objek
    AND d.id = "' . $id_jenis . '" AND c.tahun = "' . $tahun . '" AND g.id = 3 AND e.id = 9');
    return $query->row();
  }

  public function get_max($tahun, $id_jenis)
  {
    $query = $this->db->query('SELECT COUNT(e.id) AS max, MAX(b.jumlah) AS max_kamar
    FROM dim_objek a, fact_pengunjung_objek b, dim_waktu c, dim_jenis_wisatawan d, dim_kabupaten e, dim_jenis_objek g
    WHERE a.id = b.id_objek AND b.id_jenis_wisatawan = d.id AND c.id = b.id_waktu AND a.id_kabupaten = e.id AND b.id_jenis_wisatawan = d.id AND g.id = a.id_jenis_objek
    AND d.id = "' . $id_jenis . '" AND c.tahun = "' . $tahun . '" AND g.id = 3');
    return $query->row();
  }

  public function get_min($tahun, $id_jenis)
  {
    $query = $this->db->query('SELECT COUNT(e.id) AS min, MIN(b.jumlah) AS min_kamar
    FROM dim_objek a, fact_pengunjung_objek b, dim_waktu c, dim_jenis_wisatawan d, dim_kabupaten e, dim_jenis_objek g
    WHERE a.id = b.id_objek AND b.id_jenis_wisatawan = d.id AND c.id = b.id_waktu AND a.id_kabupaten = e.id AND b.id_jenis_wisatawan = d.id AND g.id = a.id_jenis_objek
    AND d.id = "' . $id_jenis . '" AND c.tahun = "' . $tahun . '" AND g.id = 3');
    return $query->row();
  }

  public function menurut_waktu($id_kab, $id_jenis)
  {
    $query = $this->db->query('SELECT c.tahun, COUNT(e.id) AS jumlah_unit, SUM(b.jumlah) AS jumlah_pengunjung
    FROM dim_objek a, fact_pengunjung_objek b, dim_waktu c, dim_jenis_wisatawan d, dim_kabupaten e, dim_jenis_objek g
    WHERE a.id = b.id_objek AND b.id_jenis_wisatawan = d.id AND c.id = b.id_waktu AND a.id_kabupaten = e.id AND b.id_jenis_wisatawan = d.id AND g.id = a.id_jenis_objek
    AND d.id = "' . $id_jenis . '" AND g.id = 3 AND e.id = "' . $id_kab . '"
    GROUP BY a.id, c.tahun DESC');
    return $query->result_array();
  }
}
