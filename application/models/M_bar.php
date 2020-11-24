<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_bar extends CI_Model
{
  public function get_kabupaten_query()
  {
    $query = $this->db->query('SELECT * FROM dim_kabupaten');
    return $query->result_array();
  }

  public function get_format_file()
  {
    $query = $this->db->query('SELECT a.kabupaten, b.nama, YEAR(NOW()) AS tahun, c.jenis_wisatawan
    FROM dim_kabupaten a, dim_objek b, dim_jenis_wisatawan c
    WHERE b.id_kabupaten = a.id AND b.id_jenis_objek = 2
    ORDER BY a.id ASC, b.id ASC, c.id ASC');
    return $query->result_array();
  }

  public function data_bar_ajax($tahun)
  {
    if ($tahun > 0) {
      $query = $this->db->query('SELECT f.id AS id_bar, a.nama AS nama_bar, b.kabupaten, c.jenis_objek, 
      d.jenis_wisatawan, e.tahun, f.jumlah, a.beroperasi_mulai, a.alamat
      FROM dim_objek a, dim_kabupaten b, dim_jenis_objek c, dim_jenis_wisatawan d, dim_waktu e, fact_pengunjung_objek f
      WHERE e.tahun = "' . $tahun . '" AND a.id = f.id_objek AND f.id_jenis_wisatawan = d.id AND a.id_jenis_objek = 2
      AND f.id_waktu = e.id AND b.id = a.id_kabupaten
      GROUP BY a.id ASC, d.id ASC');
      return $query->result_array();
    } else {
      $query = $this->db->query('SELECT f.id AS id_bar, a.nama AS nama_bar, b.kabupaten, c.jenis_objek, 
      d.jenis_wisatawan, e.tahun, f.jumlah, a.beroperasi_mulai, a.alamat
      FROM dim_objek a, dim_kabupaten b, dim_jenis_objek c, dim_jenis_wisatawan d, dim_waktu e, fact_pengunjung_objek f
      WHERE a.id = f.id_objek AND f.id_jenis_wisatawan = d.id AND a.id_jenis_objek = 2
      AND f.id_waktu = e.id AND b.id = a.id_kabupaten
      GROUP BY a.id ASC, d.id ASC');
      return $query->result_array();
    }
  }

  public function cekData($nama_bar, $tahun)
  {
    $this->db->SELECT('id_bar, nama_bar');
    $this->db->FROM('tb_bar');
    $this->db->WHERE('nama_bar', $nama_bar);
    $this->db->WHERE('tahun', $tahun);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }

  public function deleteData($user_ids = array()) //untuk menghapus jlh akomodasi di data bar
  {
    foreach ($user_ids as $userid) {
      $this->db->delete('fact_pengunjung_objek', array('id' => $userid));
    }
    return false;
  }

  public function deleteData2($user_ids) //untuk menghapus jlh akomodasi di data detail bar
  {
    $this->db->where('id', $user_ids);
    $result = $this->db->delete('fact_pengunjung_objek');
    if ($result > 0) {
      $this->session->set_flashdata('success', 'Data Berhasil Dipindahkan');
    } else {
      $this->session->set_flashdata('warning', 'Gagal Memindahkan Data');
    }
  }
}
