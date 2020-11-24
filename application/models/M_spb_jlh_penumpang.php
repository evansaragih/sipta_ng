<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_spb_jlh_penumpang extends CI_Model
{
  //header blok1
  public function get_jenis_penumpang()
  {
    $query = $this->db->query('SELECT * FROM dim_jenis_penumpang');
    return $query->result_array();
  }

  //header blok2
  public function get_pintu_masuk()
  {
    $query = $this->db->query('SELECT * FROM dim_pintu_masuk');
    return $query->result_array();
  }

  public function get_bulan()
  {
    $query = $this->db->query('SELECT * FROM dim_waktu GROUP BY bulan ORDER BY id ASC');
    return $query->result_array();
  }

  // menampilkan bulan data di kolom kategori
  public function menurut_kategori_januari($tahun, $jenis)
  {
    $bulan = "Januari";
    $query = $this->db->query('SELECT a.pintu_masuk, b.jenis_penumpang, c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE b.id = "' . $jenis . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY a.id ASC');
    return $query->result_array();
  }

  public function menurut_kategori_februari($tahun, $jenis)
  {
    $bulan = "Februari";
    $query = $this->db->query('SELECT a.pintu_masuk, b.jenis_penumpang, c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE b.id = "' . $jenis . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY a.id ASC');
    return $query->result_array();
  }

  public function menurut_kategori_maret($tahun, $jenis)
  {
    $bulan = "Maret";
    $query = $this->db->query('SELECT a.pintu_masuk, b.jenis_penumpang, c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE b.id = "' . $jenis . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY a.id ASC');
    return $query->result_array();
  }

  public function menurut_kategori_april($tahun, $jenis)
  {
    $bulan = "April";
    $query = $this->db->query('SELECT a.pintu_masuk, b.jenis_penumpang, c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE b.id = "' . $jenis . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY a.id ASC');
    return $query->result_array();
  }

  public function menurut_kategori_mei($tahun, $jenis)
  {
    $bulan = "Mei";
    $query = $this->db->query('SELECT a.pintu_masuk, b.jenis_penumpang, c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE b.id = "' . $jenis . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY a.id ASC');
    return $query->result_array();
  }

  public function menurut_kategori_juni($tahun, $jenis)
  {
    $bulan = "Juni";
    $query = $this->db->query('SELECT a.pintu_masuk, b.jenis_penumpang, c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE b.id = "' . $jenis . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY a.id ASC');
    return $query->result_array();
  }

  public function menurut_kategori_juli($tahun, $jenis)
  {
    $bulan = "Juli";
    $query = $this->db->query('SELECT a.pintu_masuk, b.jenis_penumpang, c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE b.id = "' . $jenis . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY a.id ASC');
    return $query->result_array();
  }

  public function menurut_kategori_agustus($tahun, $jenis)
  {
    $bulan = "Agustus";
    $query = $this->db->query('SELECT a.pintu_masuk, b.jenis_penumpang, c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE b.id = "' . $jenis . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY a.id ASC');
    return $query->result_array();
  }

  public function menurut_kategori_september($tahun, $jenis)
  {
    $bulan = "September";
    $query = $this->db->query('SELECT a.pintu_masuk, b.jenis_penumpang, c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE b.id = "' . $jenis . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY a.id ASC');
    return $query->result_array();
  }

  public function menurut_kategori_oktober($tahun, $jenis)
  {
    $bulan = "Oktober";
    $query = $this->db->query('SELECT a.pintu_masuk, b.jenis_penumpang, c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE b.id = "' . $jenis . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY a.id ASC');
    return $query->result_array();
  }

  public function menurut_kategori_november($tahun, $jenis)
  {
    $bulan = "November";
    $query = $this->db->query('SELECT a.pintu_masuk, b.jenis_penumpang, c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE b.id = "' . $jenis . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY a.id ASC');
    return $query->result_array();
  }

  public function menurut_kategori_desember($tahun, $jenis)
  {
    $bulan = "Desember";
    $query = $this->db->query('SELECT a.pintu_masuk, b.jenis_penumpang, c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE b.id = "' . $jenis . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY a.id ASC');
    return $query->result_array();
  }

  public function menurut_kategori_jumlah($tahun, $jenis)
  { //jumlah masing masing pintu masuk
    $query = $this->db->query('SELECT SUM(a.jumlah) AS jumlah, c.pintu_masuk
    FROM fact_penumpang a, dim_waktu b, dim_pintu_masuk c, dim_jenis_penumpang d
    WHERE a.id_waktu = b.id AND a.id_pintu_masuk = c.id AND a.id_jenis_penumpang = d.id
     AND d.id = "' . $jenis . '" AND b.tahun = "' . $tahun . '"
    GROUP BY c.id');
    return $query->result_array();
  }

  // BLOK 2 JUMLAH PENUMPANG MENURUT WAKTU//
  public function menurut_waktu_tahun1($tahun, $id_pintu_masuk, $bulan)
  {
    $query = $this->db->query('SELECT c.tahun, d.jumlah
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = "' . $id_pintu_masuk . '" 
    AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang');
    return $query->result_array();
  }

  public function menurut_waktu_tahun2($tahun, $id_pintu_masuk, $bulan)
  {
    $tahun_x = $tahun - 1;
    $query = $this->db->query('SELECT c.tahun, d.jumlah
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE c.tahun = "' . $tahun_x . '" AND c.bulan = "' . $bulan . '" AND a.id = "' . $id_pintu_masuk . '" 
    AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang');
    return $query->result_array();
  }

  public function menurut_waktu_tahun3($tahun, $id_pintu_masuk, $bulan)
  {
    $tahun_x = $tahun - 2;
    $query = $this->db->query('SELECT c.tahun, d.jumlah
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE c.tahun = "' . $tahun_x . '" AND c.bulan = "' . $bulan . '" AND a.id = "' . $id_pintu_masuk . '" 
    AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang');
    return $query->result_array();
  }

  public function menurut_waktu_tahun4($tahun, $id_pintu_masuk, $bulan)
  {
    $tahun_x = $tahun - 3;
    $query = $this->db->query('SELECT c.tahun, d.jumlah
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE c.tahun = "' . $tahun_x . '" AND c.bulan = "' . $bulan . '" AND a.id = "' . $id_pintu_masuk . '" 
    AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang');
    return $query->result_array();
  }

  public function menurut_waktu_tahun5($tahun, $id_pintu_masuk, $bulan)
  {
    $tahun_x = $tahun - 4;
    $query = $this->db->query('SELECT c.tahun, d.jumlah
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE c.tahun = "' . $tahun_x . '" AND c.bulan = "' . $bulan . '" AND a.id = "' . $id_pintu_masuk . '" 
    AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang');
    return $query->result_array();
  }

  //BLOK 3 JUMLAH PENUMPANG MENURUT PINTU MASUK
  public function menurut_pintu_bulan1($tahun, $id_pintu_masuk)
  {
    $bulan = "Januari";
    $query = $this->db->query('SELECT c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE a.id = "' . $id_pintu_masuk . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY b.id ASC');
    return $query->result_array();
  }

  public function menurut_pintu_bulan2($tahun, $id_pintu_masuk)
  {
    $bulan = "Februari";
    $query = $this->db->query('SELECT c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE a.id = "' . $id_pintu_masuk . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY b.id ASC');
    return $query->result_array();
  }

  public function menurut_pintu_bulan3($tahun, $id_pintu_masuk)
  {
    $bulan = "Maret";
    $query = $this->db->query('SELECT c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE a.id = "' . $id_pintu_masuk . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY b.id ASC');
    return $query->result_array();
  }

  public function menurut_pintu_bulan4($tahun, $id_pintu_masuk)
  {
    $bulan = "April";
    $query = $this->db->query('SELECT c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE a.id = "' . $id_pintu_masuk . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY b.id ASC');
    return $query->result_array();
  }

  public function menurut_pintu_bulan5($tahun, $id_pintu_masuk)
  {
    $bulan = "Mei";
    $query = $this->db->query('SELECT c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE a.id = "' . $id_pintu_masuk . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY b.id ASC');
    return $query->result_array();
  }

  public function menurut_pintu_bulan6($tahun, $id_pintu_masuk)
  {
    $bulan = "Juni";
    $query = $this->db->query('SELECT c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE a.id = "' . $id_pintu_masuk . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY b.id ASC');
    return $query->result_array();
  }

  public function menurut_pintu_bulan7($tahun, $id_pintu_masuk)
  {
    $bulan = "Juli";
    $query = $this->db->query('SELECT c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE a.id = "' . $id_pintu_masuk . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY b.id ASC');
    return $query->result_array();
  }

  public function menurut_pintu_bulan8($tahun, $id_pintu_masuk)
  {
    $bulan = "Agustus";
    $query = $this->db->query('SELECT c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE a.id = "' . $id_pintu_masuk . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY b.id ASC');
    return $query->result_array();
  }

  public function menurut_pintu_bulan9($tahun, $id_pintu_masuk)
  {
    $bulan = "September";
    $query = $this->db->query('SELECT c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE a.id = "' . $id_pintu_masuk . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY b.id ASC');
    return $query->result_array();
  }

  public function menurut_pintu_bulan10($tahun, $id_pintu_masuk)
  {
    $bulan = "Oktober";
    $query = $this->db->query('SELECT c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE a.id = "' . $id_pintu_masuk . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY b.id ASC');
    return $query->result_array();
  }

  public function menurut_pintu_bulan11($tahun, $id_pintu_masuk)
  {
    $bulan = "November";
    $query = $this->db->query('SELECT c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE a.id = "' . $id_pintu_masuk . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY b.id ASC');
    return $query->result_array();
  }

  public function menurut_pintu_bulan12($tahun, $id_pintu_masuk)
  {
    $bulan = "Desember";
    $query = $this->db->query('SELECT c.bulan, c.tahun, d.jumlah 
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE a.id = "' . $id_pintu_masuk . '" AND c.tahun = "' . $tahun . '" AND c.bulan = "' . $bulan . '" 
    AND a.id = d.id_pintu_masuk AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    ORDER BY b.id ASC');
    return $query->result_array();
  }

  public function menurut_pintu_jumlah($tahun, $id_pintu_masuk)
  { //jumlah masing masing jenis penumpang (int/dom)
    $query = $this->db->query('SELECT SUM(d.jumlah) AS jumlah
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE a.id = "' . $id_pintu_masuk . '" AND c.tahun = "' . $tahun . '" AND a.id = d.id_pintu_masuk 
    AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
    GROUP BY b.id');
    return $query->result_array();
  }

  //Akhir blok 3
}
