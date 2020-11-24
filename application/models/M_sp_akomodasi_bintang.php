<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sp_akomodasi_bintang extends CI_Model
{
  public function get_kategori_query()
  {
    $this->db->SELECT('tb_kat_akomodasi.`kategori`, id_kategori');
    $this->db->FROM('tb_kat_akomodasi');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_nama_kabupaten($kab)
  {
    $this->db->SELECT('kabupaten');
    $this->db->FROM('tb_kabupaten');
    $this->db->WHERE('id_kabupaten', $kab);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_kat_akomodasi($kat)
  {
    $this->db->SELECT('kategori');
    $this->db->FROM('tb_kat_akomodasi');
    $this->db->WHERE('id_kategori', $kat);
    $query = $this->db->get();
    return $query->row();
  }


  public function get_menurut_kategori($kab, $tahun)
  {
    $query = $this->db->query('SELECT kelas_bintang AS akomodasi, COUNT(id_akomodasi)  AS jlh_akomodasi,
    SUM(jumlah_kamar) AS jlh_kamar
    FROM tb_akomodasi_2
    WHERE id_kabupaten = '.$kab.' AND tahun = '.$tahun.' AND kelas_bintang >0
    GROUP BY kelas_bintang');
    return $query->result_array();
  }

  public function get_menurut_wilayah($kat, $tahun)
  {
    $query = $this->db->query('SELECT tb_kabupaten.`kabupaten` AS kabupaten, 
    COUNT(id_akomodasi) AS jlh_akomodasi, SUM(jumlah_kamar) AS jlh_kamar, kelas_bintang, tahun
    FROM tb_akomodasi_2
    INNER JOIN tb_kat_akomodasi ON tb_kat_akomodasi.`id_kategori` = tb_akomodasi_2.`id_kat_akomodasi` 
    INNER JOIN tb_kabupaten ON tb_kabupaten.`id_kabupaten` = tb_akomodasi_2.`id_kabupaten`
    WHERE tb_akomodasi_2.`kelas_bintang` = '.$kat.' AND tahun = '.$tahun.'
    GROUP BY tb_kabupaten.`id_kabupaten`');
    return $query->result_array();
  }

  public function get_menurut_waktu($kat, $kab)
  {
    $query = $this->db->query('SELECT COUNT(id_akomodasi) AS jlh_akomodasi, SUM(jumlah_kamar) AS jlh_kamar, 
    tb_kat_akomodasi.`kategori`, kelas_bintang, tb_kabupaten.`kabupaten`, tahun
    FROM tb_akomodasi_2
    INNER JOIN tb_kat_akomodasi ON tb_kat_akomodasi.`id_kategori` = tb_akomodasi_2.`id_kat_akomodasi` 
    INNER JOIN tb_kabupaten ON tb_kabupaten.`id_kabupaten` = tb_akomodasi_2.`id_kabupaten`
    WHERE tb_akomodasi_2.`kelas_bintang` =  '.$kat.' AND tb_akomodasi_2.`id_kabupaten` =  '.$kab.'
    GROUP BY tahun');
    return $query->result_array();
  }

  public function get_kab_denpasar($tahun, $kat)
  {
    $query = $this->db->query('SELECT id_kabupaten, id_kat_akomodasi, COUNT(id_akomodasi) AS jlh_akomodasi,
     SUM(jumlah_kamar) AS jlh_kamar, tahun
    FROM tb_akomodasi_2
    WHERE tahun = '.$tahun.' AND tb_akomodasi_2.`kelas_bintang` = '.$kat.' AND id_kabupaten = 1');
    return $query->row();
  }

  public function get_kab_badung($tahun, $kat)
  {
    $query = $this->db->query('SELECT id_kabupaten, id_kat_akomodasi, COUNT(id_akomodasi) AS jlh_akomodasi,
     SUM(jumlah_kamar) AS jlh_kamar, tahun
    FROM tb_akomodasi_2
    WHERE tahun = '.$tahun.' AND tb_akomodasi_2.`kelas_bintang` = '.$kat.' AND id_kabupaten = 2');
    return $query->row();
  }

  public function get_kab_bangli($tahun, $kat)
  {
    $query = $this->db->query('SELECT id_kabupaten, id_kat_akomodasi, COUNT(id_akomodasi) AS jlh_akomodasi,
     SUM(jumlah_kamar) AS jlh_kamar, tahun
    FROM tb_akomodasi_2
    WHERE tahun = '.$tahun.' AND tb_akomodasi_2.`kelas_bintang` = '.$kat.' AND id_kabupaten = 3');
    return $query->row();
  }

  public function get_kab_buleleng($tahun, $kat)
  {
    $query = $this->db->query('SELECT id_kabupaten, id_kat_akomodasi, COUNT(id_akomodasi) AS jlh_akomodasi,
     SUM(jumlah_kamar) AS jlh_kamar, tahun
    FROM tb_akomodasi_2
    WHERE tahun = '.$tahun.' AND tb_akomodasi_2.`kelas_bintang` = '.$kat.' AND id_kabupaten = 4');
    return $query->row();
  }

  public function get_kab_gianyar($tahun, $kat)
  {
    $query = $this->db->query('SELECT id_kabupaten, id_kat_akomodasi, COUNT(id_akomodasi) AS jlh_akomodasi,
     SUM(jumlah_kamar) AS jlh_kamar, tahun
    FROM tb_akomodasi_2
    WHERE tahun = '.$tahun.' AND tb_akomodasi_2.`kelas_bintang` = '.$kat.' AND id_kabupaten = 5');
    return $query->row();
  }

  public function get_kab_jembrana($tahun, $kat)
  {
    $query = $this->db->query('SELECT id_kabupaten, id_kat_akomodasi, COUNT(id_akomodasi) AS jlh_akomodasi,
     SUM(jumlah_kamar) AS jlh_kamar, tahun
    FROM tb_akomodasi_2
    WHERE tahun = '.$tahun.' AND tb_akomodasi_2.`kelas_bintang` = '.$kat.' AND id_kabupaten = 6');
    return $query->row();
  }

  public function get_kab_klungkung($tahun, $kat)
  {
    $query = $this->db->query('SELECT id_kabupaten, id_kat_akomodasi, COUNT(id_akomodasi) AS jlh_akomodasi,
     SUM(jumlah_kamar) AS jlh_kamar, tahun
    FROM tb_akomodasi_2
    WHERE tahun = '.$tahun.' AND tb_akomodasi_2.`kelas_bintang` = '.$kat.' AND id_kabupaten = 7');
    return $query->row();
  }

  public function get_kab_karangasem($tahun, $kat)
  {
    $query = $this->db->query('SELECT id_kabupaten, id_kat_akomodasi, COUNT(id_akomodasi) AS jlh_akomodasi,
     SUM(jumlah_kamar) AS jlh_kamar, tahun
    FROM tb_akomodasi_2
    WHERE tahun = '.$tahun.' AND tb_akomodasi_2.`kelas_bintang` = '.$kat.' AND id_kabupaten = 8');
    return $query->row();
  }

  public function get_kab_tabanan($tahun, $kat)
  {
    $query = $this->db->query('SELECT id_kabupaten, id_kat_akomodasi, COUNT(id_akomodasi) AS jlh_akomodasi,
     SUM(jumlah_kamar) AS jlh_kamar, tahun
    FROM tb_akomodasi_2
    WHERE tahun = '.$tahun.' AND tb_akomodasi_2.`kelas_bintang` = '.$kat.' AND id_kabupaten = 9');
    return $query->row();
  }

  public function get_max($kat, $tahun)
  {
    $query = $this->db->query('SELECT (COUNT(id_akomodasi)) AS max, MAX(jumlah_kamar) AS max_kamar
    FROM tb_akomodasi_2
    WHERE tahun = '.$tahun.' AND tb_akomodasi_2.`kelas_bintang` = '.$kat.'');
    return $query->row();
  }

  public function get_min($tahun, $kat)
  {
    $query = $this->db->query('SELECT (COUNT(id_akomodasi)) AS min, MIN(jumlah_kamar) AS max_kamar
    FROM tb_akomodasi_2
    WHERE tahun = '.$tahun.' AND tb_akomodasi_2.`kelas_bintang` = '.$kat.'');
    return $query->row();
  }
}
