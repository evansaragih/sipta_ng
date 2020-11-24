<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_prediksi_penumpang extends CI_Model
{
  public function get_data2($id_pintu, $tahun_prediksi) //menampilkan data untuk prediksi tahun dan bulan
  {
    $query = $this->db->query('SELECT c.bulan AS bulan, c.tahun AS tahun, SUM(d.jumlah) AS jumlah
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE a.id = d.id_pintu_masuk AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang AND
    a.id = ' . $id_pintu . ' AND c.tahun <= ' . $tahun_prediksi . ' GROUP BY c.id ASC');
    return $query->result_array();
  }

  public function get_data_tahun2($tahun_prediksi)
  {
    $query = $this->db->query('SELECT c.bulan AS bulan, c.tahun AS tahun, SUM(d.jumlah) AS jumlah
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE a.id = d.id_pintu_masuk AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang AND
    c.tahun <= ' . $tahun_prediksi . ' GROUP BY c.id ASC');
    return $query->result_array();
  }


  public function get_data($id_pintu, $tahun_prediksi) // menampilkan data untuk prediksi pertahunan saja
  {
    $query = $this->db->query('SELECT c.bulan AS bulan, c.tahun AS tahun, SUM(d.jumlah) AS jumlah
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE a.id = d.id_pintu_masuk AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang AND
    a.id = ' . $id_pintu . ' AND c.tahun <= ' . $tahun_prediksi . ' GROUP BY c.tahun ASC');
    return $query->result_array();
  }

  public function get_data_tahun($tahun_prediksi)
  {
    $query = $this->db->query('SELECT c.bulan AS bulan, c.tahun AS tahun, SUM(d.jumlah) AS jumlah
    FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
    WHERE a.id = d.id_pintu_masuk AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang AND
    c.tahun <= ' . $tahun_prediksi . ' GROUP BY c.tahun ASC');
    return $query->result_array();
  }
}
