<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_akomodasi extends CI_Model
{

  public function get_kategori_query()
  {
    $query = $this->db->query('SELECT * FROM dim_kategori');
    return $query->result_array();
  }

  public function get_nama_kategori($id_pintu_masuk)
  {
    $this->db->SELECT('kategori');
    $this->db->FROM('dim_kategori');
    $this->db->WHERE('id', $id_pintu_masuk);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_nama_kabupaten($kab)
  {
    $this->db->SELECT('kabupaten');
    $this->db->FROM('dim_kabupaten');
    $this->db->WHERE('id', $kab);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_kabupaten_query()
  {
    $query = $this->db->query('SELECT a.id, b.kabupaten, a.nama_hotel
        FROM dim_akomodasi a, dim_kabupaten b
        WHERE b.id = a.id_kabupaten');
    return $query->result_array();
  }

  public function get_format_file()
  {
    $query = $this->db->query('SELECT a.id, b.kabupaten, a.nama_hotel, YEAR(NOW()) AS tahun
        FROM dim_akomodasi a, dim_kabupaten b, dim_waktu d
        WHERE b.id = a.id_kabupaten
        GROUP BY a.nama_hotel
        ORDER BY a.id ASC, b.id ASC');
    return $query->result_array();
  }

  public function data_akomodasi_ajax($tahun)
  {
    if ($tahun > 0) {
      $query = $this->db->query('SELECT a.nama_hotel, b.kategori, b.id AS id_kategori, 
      c.kabupaten, c.id AS id_kabupaten, d.tahun, e.jumlah_kamar, e.jumlah_tamu, a.nama_pimpinan, 
      a.nama_perusahaan, a.alamat, a.email, a.website, a.telp, a.fax, e.id AS id_akomodasi
      FROM dim_akomodasi a, dim_kategori b, dim_kabupaten c, dim_waktu d, fact_akomodasi e
      WHERE d.tahun ="' . $tahun . '" AND a.id = e.id_akomodasi AND b.id = e.id_kategori AND e.id_waktu = d.id
      GROUP BY a.id');
      return $query->result_array();
    } else {
      $query = $this->db->query('SELECT a.nama_hotel, b.kategori, b.id AS id_kategori, 
      c.kabupaten, c.id AS id_kabupaten, d.tahun, e.jumlah_kamar, e.jumlah_tamu, a.nama_pimpinan, 
      a.nama_perusahaan, a.alamat, a.email, a.website, a.telp, a.fax, e.id AS id_akomodasi
      FROM dim_akomodasi a, dim_kategori b, dim_kabupaten c, dim_waktu d, fact_akomodasi e 
      WHERE a.id = e.id_akomodasi AND b.id = e.id_kategori AND e.id_waktu = d.id
      GROUP BY a.id');
      return $query->result_array();
    }
  }

  public function cekDataHotel($id_akomodasi, $kat_akomodasi, $tahun)
  {
    $query = $this->db->query('SELECT a.nama_hotel, b.kategori, b.id AS id_kategori, 
      c.kabupaten, c.id AS id_kabupaten, d.tahun, e.jumlah_kamar, e.jumlah_tamu, a.nama_pimpinan, 
      a.nama_perusahaan, a.alamat, a.email, a.website, a.telp, a.fax, e.id AS id_akomodasi
      FROM dim_akomodasi a, dim_kategori b, dim_kabupaten c, dim_waktu d, fact_akomodasi e
      WHERE a.id = e.id_akomodasi AND b.id = e.id_kategori AND e.id_waktu = d.id AND
      d.tahun ="' . $tahun . '" AND b.kategori = "' . $kat_akomodasi . '" AND 
      a.id = "' . $id_akomodasi . '"');
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }

  public function deleteData($user_ids = array()) //untuk menghapus jlh akomodasi di data akomodasi
  {
    foreach ($user_ids as $userid) {
      $this->db->delete('fact_akomodasi', array('id' => $userid));
    }
    return false;
  }
}
