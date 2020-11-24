<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_prediksi_akomodasi_bintang extends CI_Model
{
  public function get_data($id_pintu, $tahun_prediksi)
  {
    $query = $this->db->query('SELECT tahun, COUNT(id_kabupaten) AS jumlah_unit, 
    SUM(jumlah_kamar) AS jumlah_kamar, id_kat_akomodasi
    FROM tb_akomodasi_2
    WHERE tahun <= '.$tahun_prediksi.' AND kelas_bintang = '.$id_pintu.' AND id_kat_akomodasi = 1
    GROUP BY tahun');
    return $query->result_array();
  }

  public function get_data_wilayah($id_pintu, $tahun_prediksi, $kab)
  {
    $query = $this->db->query('SELECT tahun, COUNT(id_kabupaten) AS jumlah_unit, 
    SUM(jumlah_kamar) AS jumlah_kamar, id_kat_akomodasi
    FROM tb_akomodasi_2
    WHERE tahun <= '.$tahun_prediksi.' AND kelas_bintang = '.$id_pintu.' AND id_kabupaten = '.$kab.' AND id_kat_akomodasi = 1
    GROUP BY tahun');
    return $query->result_array();
  }

  public function get_data_provinsi($tahun_prediksi)
  {
    $query = $this->db->query('SELECT tahun, COUNT(id_kabupaten) AS jumlah_unit, 
    SUM(jumlah_kamar) AS jumlah_kamar, id_kat_akomodasi
    FROM tb_akomodasi_2
    WHERE tahun <= '.$tahun_prediksi.' AND id_kat_akomodasi = 1 AND tahun !=""
    GROUP BY tahun');
    return $query->result_array();
  }

}
