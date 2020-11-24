<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_prediksi_akomodasi extends CI_Model
{
  public function get_data($id_pintu, $tahun_prediksi)
  {
    $query = $this->db->query('SELECT COUNT(a.id) AS jumlah_unit, 
    SUM(a.jumlah_kamar)AS jumlah_kamar, SUM(a.jumlah_tamu) AS jumlah_tamu, 
    b.tahun AS tahun, c.kategori
    FROM fact_akomodasi a, dim_waktu b, dim_kategori c, dim_kabupaten d, dim_akomodasi e
    WHERE a.id_akomodasi = e.id AND c.id = a.id_kategori AND b.id = a.id_waktu AND e.id_kabupaten = d.id  
    AND c.id = ' . $id_pintu . ' AND b.tahun <= ' . $tahun_prediksi . '
    GROUP BY b.tahun');
    return $query->result_array();
  }

  public function get_data_wilayah($id_pintu, $tahun_prediksi, $kab)
  {
    $query = $this->db->query('SELECT COUNT(a.id) AS jumlah_unit, 
    SUM(a.jumlah_kamar)AS jumlah_kamar, SUM(a.jumlah_tamu) AS jumlah_tamu, 
    b.tahun AS tahun, c.kategori
    FROM fact_akomodasi a, dim_waktu b, dim_kategori c, dim_kabupaten d, dim_akomodasi e
    WHERE a.id_akomodasi = e.id AND c.id = a.id_kategori AND b.id = a.id_waktu AND e.id_kabupaten = d.id  
    AND c.id = ' . $id_pintu . ' AND b.tahun <= ' . $tahun_prediksi . ' AND d.id = ' . $kab . '
    GROUP BY b.tahun');
    return $query->result_array();
  }

  public function get_data_provinsi($tahun_prediksi)
  {
    $query = $this->db->query('SELECT COUNT(a.id) AS jumlah_unit, 
    SUM(a.jumlah_kamar)AS jumlah_kamar, SUM(a.jumlah_tamu) AS jumlah_tamu, 
    b.tahun AS tahun, c.kategori
    FROM fact_akomodasi a, dim_waktu b, dim_kategori c, dim_kabupaten d, dim_akomodasi e
    WHERE a.id_akomodasi = e.id AND c.id = a.id_kategori AND b.id = a.id_waktu AND e.id_kabupaten = d.id  
    AND b.tahun <= ' . $tahun_prediksi . '
    GROUP BY b.tahun');
    return $query->result_array();
  }
}
