<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_statistik_pariwisata extends CI_Model
{
    public function get_akomodasi_query()
    {
      $this->db->SELECT('id_akomodasi, tb_akomodasi.`id_kabupaten` AS id_kabupaten, tb_kabupaten.`kabupaten` AS kabupaten, 
      tb_kat_akomodasi.`kategori` AS akomodasi, jlh_akomodasi, jlh_kamar, tahun, tb_admin.`nama` as created_by,
       tb_akomodasi.`keterangan` as keterangan, created_at, updated_at, updated_by');
      $this->db->FROM('tb_akomodasi');
      $this->db->JOIN('tb_kabupaten', 'tb_kabupaten.`id_kabupaten` = tb_akomodasi.`id_kabupaten`');
      $this->db->JOIN('tb_kat_akomodasi', 'tb_kat_akomodasi.`id_kategori` = tb_akomodasi.`id_kat_akomodasi`');
      $this->db->JOIN('tb_admin', 'tb_admin.`id_admin` = tb_akomodasi.`created_by`');
      $this->db->WHERE('tahun', '2001');
      $this->db->WHERE('tb_akomodasi.`id_kabupaten`', '3');
      $query = $this->db->get();
      return $query->result_array();
    }

    public function get_akomodasi_cari($kab)
    {
      $this->db->SELECT('id_akomodasi, tb_akomodasi.`id_kabupaten` AS id_kabupaten, tb_kabupaten.`kabupaten` AS kabupaten, 
      tb_kat_akomodasi.`kategori` AS akomodasi, jlh_akomodasi, jlh_kamar, tahun, tb_admin.`nama` as created_by,
       tb_akomodasi.`keterangan` as keterangan, created_at, updated_at, updated_by');
      $this->db->FROM('tb_akomodasi');
      $this->db->JOIN('tb_kabupaten', 'tb_kabupaten.`id_kabupaten` = tb_akomodasi.`id_kabupaten`');
      $this->db->JOIN('tb_kat_akomodasi', 'tb_kat_akomodasi.`id_kategori` = tb_akomodasi.`id_kat_akomodasi`');
      $this->db->JOIN('tb_admin', 'tb_admin.`id_admin` = tb_akomodasi.`created_by`');
      $this->db->WHERE('tahun', '2001');
      $this->db->WHERE('tb_akomodasi.`id_kabupaten`', $kab);
      $query = $this->db->get();
      return $query->result_array();
    }
}
