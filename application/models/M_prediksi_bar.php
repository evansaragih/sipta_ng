<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_prediksi_bar extends CI_Model
{
  public function get_data($id_pintu, $tahun_prediksi)
  {
    $query = $this->db->query('SELECT b.kabupaten, c.jenis_objek, e.tahun, COUNT(f.id) AS jumlah_unit , 
    SUM(f.jumlah) AS jumlah_kamar, a.beroperasi_mulai
    FROM dim_objek a, dim_kabupaten b, dim_jenis_objek c, dim_jenis_wisatawan d,
    dim_waktu e, fact_pengunjung_objek f
    WHERE a.id = f.id_objek AND f.id_jenis_wisatawan = d.id AND f.id_waktu = e.id 
    AND b.id = a.id_kabupaten AND a.id_jenis_objek = c.id
    AND c.id = 2 AND e.tahun <= ' . $tahun_prediksi . ' AND b.id = ' . $id_pintu . '
    GROUP BY e.tahun ASC');
    return $query->result_array();
  }

  public function get_data_provinsi($tahun_prediksi)
  {
    $query = $this->db->query('SELECT b.kabupaten, c.jenis_objek, e.tahun, COUNT(f.id) AS jumlah_unit , 
    SUM(f.jumlah) AS jumlah_kamar, a.beroperasi_mulai
    FROM dim_objek a, dim_kabupaten b, dim_jenis_objek c, dim_jenis_wisatawan d,
    dim_waktu e, fact_pengunjung_objek f
    WHERE a.id = f.id_objek AND f.id_jenis_wisatawan = d.id AND f.id_waktu = e.id 
    AND b.id = a.id_kabupaten AND a.id_jenis_objek = c.id
    AND c.id = 2 AND e.tahun <= ' . $tahun_prediksi . '
    GROUP BY e.tahun ASC');
    return $query->result_array();
  }
}
