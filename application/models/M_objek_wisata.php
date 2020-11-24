<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_objek_wisata extends CI_Model
{
  public function get_kabupaten_query()
  {
    $query = $this->db->query('SELECT * FROM tb_kabupaten');
    return $query->result_array();
  }

  public function get_format_file()
  {
    $query = $this->db->query('SELECT a.kabupaten, b.nama, YEAR(NOW()) AS tahun, c.jenis_wisatawan
    FROM dim_kabupaten a, dim_objek b, dim_jenis_wisatawan c
    WHERE b.id_kabupaten = a.id AND b.id_jenis_objek = 3
    ORDER BY a.id ASC, b.id ASC, c.id ASC');
    return $query->result_array();
  }

  public function data_objek_wisata_ajax($tahun)
  {
    if ($tahun > 0) {
      $query = $this->db->query('SELECT f.id AS id_objek_wisata, a.nama AS nama_objek_wisata, b.kabupaten, c.jenis_objek, 
      d.jenis_wisatawan, e.tahun, f.jumlah, a.beroperasi_mulai, a.alamat
      FROM dim_objek a, dim_kabupaten b, dim_jenis_objek c, dim_jenis_wisatawan d, dim_waktu e, fact_pengunjung_objek f
      WHERE e.tahun = "' . $tahun . '" AND a.id = f.id_objek AND f.id_jenis_wisatawan = d.id AND a.id_jenis_objek = 3
      AND f.id_waktu = e.id AND b.id = a.id_kabupaten
      GROUP BY a.id ASC, d.id ASC');
      return $query->result_array();
    } else {
      $query = $this->db->query('SELECT f.id AS id_objek_wisata, a.nama AS nama_objek_wisata, b.kabupaten, c.jenis_objek, 
      d.jenis_wisatawan, e.tahun, f.jumlah, a.beroperasi_mulai, a.alamat
      FROM dim_objek a, dim_kabupaten b, dim_jenis_objek c, dim_jenis_wisatawan d, dim_waktu e, fact_pengunjung_objek f
      WHERE a.id = f.id_objek AND f.id_jenis_wisatawan = d.id AND a.id_jenis_objek = 3
      AND f.id_waktu = e.id AND b.id = a.id_kabupaten
      GROUP BY a.id ASC, d.id ASC');
      return $query->result_array();
    }
  }

  public function cekDataObjekWisata($id_kabupaten, $nama_objek_wisata) //pada saat ingin membuat
  //  data restoran baru dari data restoran lama yang telah tidak terdaftar
  {
    $this->db->SELECT('id_objek_wisata, nama_objek_wisata, id_kabupaten');
    $this->db->FROM('tb_objek_wisata');
    $this->db->WHERE('id_kabupaten', $id_kabupaten);
    $this->db->WHERE('nama_objek_wisata', $nama_objek_wisata);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }

  public function getDataHotel_kota($id_kabupaten)
  {
    $this->db->SELECT('tb_restoran.`id_restoran`, tb_restoran.`id_kabupaten`, tb_kabupaten.`kabupaten` AS kabupaten,
    nama_restoran, pemilik, alamat, telp_hp, fax, keterangan, created_at, tb_admin.`nama` AS created_by, updated_at, updated_by, status');
    $this->db->FROM('tb_restoran');
    $this->db->JOIN('tb_kabupaten', 'tb_kabupaten.`id_kabupaten` = tb_restoran.`id_kabupaten`');
    $this->db->JOIN('tb_admin', 'tb_admin.`id_admin` = tb_restoran.`created_by`');
    $this->db->WHERE('tb_restoran.`id_kabupaten`', $id_kabupaten);
    $this->db->WHERE('status', 'Terdaftar');
    $query = $this->db->get();
    // $query = $this->db->get_where('tb_hotel', array('id_kabupaten'=>$id_kabupaten, 'status' =>$status));
    return $query->result();
  }

  public function getDataHotel_detail($id_restoran)
  {
    $this->db->SELECT('tb_restoran.`id_restoran`, tb_restoran.`id_kabupaten`, tb_kabupaten.`kabupaten` AS kabupaten,
    nama_restoran, pemilik, alamat, telp_hp, fax, keterangan, created_at, tb_admin.`nama` AS created_by, updated_at, 
    updated_by, tb_restoran.`status`');
    $this->db->FROM('tb_restoran');
    $this->db->JOIN('tb_kabupaten', 'tb_kabupaten.`id_kabupaten` = tb_restoran.`id_kabupaten`');
    $this->db->JOIN('tb_admin', 'tb_admin.`id_admin` = tb_restoran.`created_by`');
    $this->db->WHERE('tb_restoran.`id_restoran`', $id_restoran);
    $query = $this->db->get();
    // $status = "Terdaftar";
    // $query = $this->db->get_where('tb_hotel', array('id_hotel'=>$id_hotel, 'status' =>$status));
    return $query->result();
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
