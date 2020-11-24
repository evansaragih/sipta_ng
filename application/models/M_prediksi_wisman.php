<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_prediksi_wisman extends CI_Model
{
  public function get_data($id_grup, $tahun_prediksi)
  {
    $query = $this->db->query('SELECT a.tahun, a.bulan, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun <= ' . $tahun_prediksi . ' AND b.id = ' . $id_grup . '
    GROUP BY a.id ASC');
    return $query->result_array();
  }

  public function get_data_tahun($tahun_prediksi)
  {
    $query = $this->db->query('SELECT a.tahun, a.bulan, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun <= ' . $tahun_prediksi . '
    GROUP BY a.id ASC');
    return $query->result_array();
  }

  public function get_data_tahun2($id_grup, $tahun_prediksi)
  {
    $query = $this->db->query('SELECT a.tahun, a.bulan, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun <= ' . $tahun_prediksi . ' AND b.id = ' . $id_grup . '
    GROUP BY a.tahun ASC');
    return $query->result_array();
  }

  public function get_data_tahun3($tahun_prediksi)
  {
    $query = $this->db->query('SELECT a.tahun, a.bulan, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun <= ' . $tahun_prediksi . '
    GROUP BY a.tahun ASC');
    return $query->result_array();
  }
}
