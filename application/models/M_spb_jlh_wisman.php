<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_spb_jlh_wisman extends CI_Model
{
  public function get_total_wisman($tahun) //untuk blok 1 total wisman yang dibawah
  {
    $query = $this->db->query('SELECT SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.bulan = "Januari" AND a.tahun = "' . $tahun . '"
    GROUP BY b.id ASC');
    return $query->result_array();
  }

  public function get_group_kebangsaan() //blum dipake cek lagi
  {
    $query = $this->db->query('SELECT * FROM dim_grup');
    return $query->result_array();
  }


  public function get_jenis_kebangsaan($id_grup)
  {
    $this->db->SELECT('grup');
    $this->db->FROM('dim_grup');
    $this->db->WHERE('id', $id_grup);
    $query = $this->db->get();
    return $query->row();
  }

  //blok1, tabel, pie, area
  public function get_jlh_wisman_januari($tahun) //mendapatkan jumlah wisatawan pergrup kebangsaan bulan 1
  {
    $query = $this->db->query('SELECT a.tahun, a.bulan, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.bulan = "Januari" AND a.tahun = "' . $tahun . '"
    GROUP BY b.id ASC');
    return $query->result_array();
  }
  public function get_jlh_wisman_februari($tahun) //mendapatkan jumlah wisatawan pergrup kebangsaan bulan 1
  {
    $query = $this->db->query('SELECT a.tahun, a.bulan, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.bulan = "Februari" AND a.tahun = "' . $tahun . '"
    GROUP BY b.id ASC');
    return $query->result_array();
  }
  public function get_jlh_wisman_maret($tahun) //mendapatkan jumlah wisatawan pergrup kebangsaan bulan 1
  {
    $query = $this->db->query('SELECT a.tahun, a.bulan, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.bulan = "Maret" AND a.tahun = "' . $tahun . '"
    GROUP BY b.id ASC');
    return $query->result_array();
  }
  public function get_jlh_wisman_april($tahun) //mendapatkan jumlah wisatawan pergrup kebangsaan bulan 1
  {
    $query = $this->db->query('SELECT a.tahun, a.bulan, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.bulan = "April" AND a.tahun = "' . $tahun . '"
    GROUP BY b.id ASC');
    return $query->result_array();
  }
  public function get_jlh_wisman_mei($tahun) //mendapatkan jumlah wisatawan pergrup kebangsaan bulan 1
  {
    $query = $this->db->query('SELECT a.tahun, a.bulan, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.bulan = "Mei" AND a.tahun = "' . $tahun . '"
    GROUP BY b.id ASC');
    return $query->result_array();
  }
  public function get_jlh_wisman_juni($tahun) //mendapatkan jumlah wisatawan pergrup kebangsaan bulan 1
  {
    $query = $this->db->query('SELECT a.tahun, a.bulan, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.bulan = "Juni" AND a.tahun = "' . $tahun . '"
    GROUP BY b.id ASC');
    return $query->result_array();
  }
  public function get_jlh_wisman_juli($tahun) //mendapatkan jumlah wisatawan pergrup kebangsaan bulan 1
  {
    $query = $this->db->query('SELECT a.tahun, a.bulan, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.bulan = "Juli" AND a.tahun = "' . $tahun . '"
    GROUP BY b.id ASC');
    return $query->result_array();
  }
  public function get_jlh_wisman_agt($tahun) //mendapatkan jumlah wisatawan pergrup kebangsaan bulan 1
  {
    $query = $this->db->query('SELECT a.tahun, a.bulan, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.bulan = "Agustus" AND a.tahun = "' . $tahun . '"
    GROUP BY b.id ASC');
    return $query->result_array();
  }
  public function get_jlh_wisman_sept($tahun) //mendapatkan jumlah wisatawan pergrup kebangsaan bulan 1
  {
    $query = $this->db->query('SELECT a.tahun, a.bulan, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.bulan = "September" AND a.tahun = "' . $tahun . '"
    GROUP BY b.id ASC');
    return $query->result_array();
  }
  public function get_jlh_wisman_okt($tahun) //mendapatkan jumlah wisatawan pergrup kebangsaan bulan 1
  {
    $query = $this->db->query('SELECT a.tahun, a.bulan, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.bulan = "Oktober" AND a.tahun = "' . $tahun . '"
    GROUP BY b.id ASC');
    return $query->result_array();
  }
  public function get_jlh_wisman_nov($tahun) //mendapatkan jumlah wisatawan pergrup kebangsaan bulan 1
  {
    $query = $this->db->query('SELECT a.tahun, a.bulan, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.bulan = "November" AND a.tahun = "' . $tahun . '"
    GROUP BY b.id ASC');
    return $query->result_array();
  }
  public function get_jlh_wisman_des($tahun) //mendapatkan jumlah wisatawan pergrup kebangsaan bulan 1
  {
    $query = $this->db->query('SELECT a.tahun, a.bulan, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.bulan = "Desember" AND a.tahun = "' . $tahun . '"
    GROUP BY b.id ASC');
    return $query->result_array();
  }

  //blok1 maps
  public function get_asia($tahun, $bulan)
  {
    $query = $this->db->query('SELECT b.grup, SUM(d.jumlah) AS jumlah, b.path_map AS path_map
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = 1 AND a.bulan = "' . $bulan . '"
    ');
    return $query->row();
  }

  public function get_asean($tahun, $bulan)
  {
    $query = $this->db->query('SELECT b.grup, SUM(d.jumlah) AS jumlah, b.path_map AS path_map
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = 2 AND a.bulan = "' . $bulan . '"
    ');
    return $query->row();
  }

  public function get_africa($tahun, $bulan)
  {
    $query = $this->db->query('SELECT b.grup, SUM(d.jumlah) AS jumlah, b.path_map AS path_map
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = 3 AND a.bulan = "' . $bulan . '"
    ');
    return $query->row();
  }

  public function get_american($tahun, $bulan)
  {
    $query = $this->db->query('SELECT b.grup, SUM(d.jumlah) AS jumlah, b.path_map AS path_map
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = 4 AND a.bulan = "' . $bulan . '"
    ');
    return $query->row();
  }

  public function get_europe($tahun, $bulan)
  {
    $query = $this->db->query('SELECT b.grup, SUM(d.jumlah) AS jumlah, b.path_map AS path_map
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = 5 AND a.bulan = "' . $bulan . '"
    ');
    return $query->row();
  }

  public function get_middle_east($tahun, $bulan)
  {
    $query = $this->db->query('SELECT b.grup, SUM(d.jumlah) AS jumlah, b.path_map AS path_map
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = 6 AND a.bulan = "' . $bulan . '"
    ');
    return $query->row();
  }
  //Akhir Untuk BLOK 1----------------------------------------------------------------//
  //Awal Untuk BLOK 2----------------------------------------------------------------//
  public function get_bulan1_tahun($id_grup, $tahun)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = "' . $id_grup . '" AND a.bulan = "Januari"
    ');
    return $query->row();
  }

  public function get_bulan2_tahun($id_grup, $tahun)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = "' . $id_grup . '" AND a.bulan = "Februari"
    ');
    return $query->row();
  }

  public function get_bulan3_tahun($id_grup, $tahun)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = "' . $id_grup . '" AND a.bulan = "Maret"
    ');
    return $query->row();
  }

  public function get_bulan4_tahun($id_grup, $tahun)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = "' . $id_grup . '" AND a.bulan = "April"
    ');
    return $query->row();
  }

  public function get_bulan5_tahun($id_grup, $tahun)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = "' . $id_grup . '" AND a.bulan = "Mei"
    ');
    return $query->row();
  }

  public function get_bulan6_tahun($id_grup, $tahun)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = "' . $id_grup . '" AND a.bulan = "Juni"
    ');
    return $query->row();
  }

  public function get_bulan7_tahun($id_grup, $tahun)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = "' . $id_grup . '" AND a.bulan = "Juli"
    ');
    return $query->row();
  }

  public function get_bulan8_tahun($id_grup, $tahun)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = "' . $id_grup . '" AND a.bulan = "Agustus"
    ');
    return $query->row();
  }

  public function get_bulan9_tahun($id_grup, $tahun)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = "' . $id_grup . '" AND a.bulan = "September"
    ');
    return $query->row();
  }

  public function get_bulan10_tahun($id_grup, $tahun)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = "' . $id_grup . '" AND a.bulan = "Oktober"
    ');
    return $query->row();
  }

  public function get_bulan11_tahun($id_grup, $tahun)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = "' . $id_grup . '" AND a.bulan = "November"
    ');
    return $query->row();
  }

  public function get_bulan12_tahun($id_grup, $tahun)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = "' . $id_grup . '" AND a.bulan = "Desember"
    ');
    return $query->row();
  }

  public function get_bulan1_tahun_vs($id_grup, $tahun_vs)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun_vs . '" AND b.id = "' . $id_grup . '" AND a.bulan = "Januari"
    ');
    return $query->row();
  }

  public function get_bulan2_tahun_vs($id_grup, $tahun_vs)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun_vs . '" AND b.id = "' . $id_grup . '" AND a.bulan = "Februari"
    ');
    return $query->row();
  }

  public function get_bulan3_tahun_vs($id_grup, $tahun_vs)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun_vs . '" AND b.id = "' . $id_grup . '" AND a.bulan = "Maret"
    ');
    return $query->row();
  }

  public function get_bulan4_tahun_vs($id_grup, $tahun_vs)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun_vs . '" AND b.id = "' . $id_grup . '" AND a.bulan = "April"
    ');
    return $query->row();
  }

  public function get_bulan5_tahun_vs($id_grup, $tahun_vs)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun_vs . '" AND b.id = "' . $id_grup . '" AND a.bulan = "Mei"
    ');
    return $query->row();
  }

  public function get_bulan6_tahun_vs($id_grup, $tahun_vs)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun_vs . '" AND b.id = "' . $id_grup . '" AND a.bulan = "Juni"
    ');
    return $query->row();
  }

  public function get_bulan7_tahun_vs($id_grup, $tahun_vs)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun_vs . '" AND b.id = "' . $id_grup . '" AND a.bulan = "Juli"
    ');
    return $query->row();
  }

  public function get_bulan8_tahun_vs($id_grup, $tahun_vs)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun_vs . '" AND b.id = "' . $id_grup . '" AND a.bulan = "Agustus"
    ');
    return $query->row();
  }

  public function get_bulan9_tahun_vs($id_grup, $tahun_vs)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun_vs . '" AND b.id = "' . $id_grup . '" AND a.bulan = "September"
    ');
    return $query->row();
  }

  public function get_bulan10_tahun_vs($id_grup, $tahun_vs)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun_vs . '" AND b.id = "' . $id_grup . '" AND a.bulan = "Oktober"
    ');
    return $query->row();
  }

  public function get_bulan11_tahun_vs($id_grup, $tahun_vs)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun_vs . '" AND b.id = "' . $id_grup . '" AND a.bulan = "November"
    ');
    return $query->row();
  }

  public function get_bulan12_tahun_vs($id_grup, $tahun_vs)
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun_vs . '" AND b.id = "' . $id_grup . '" AND a.bulan = "Desember"
    ');
    return $query->row();
  }

  //Akhir Untuk BLOK 2----------------------------------------------------------------//
  //Awal Untuk BLOK 3----------------------------------------------------------------//
  public function get_blok3($id_grup, $bulan, $tahun) //untuk blok 1 total wisman yang dibawah
  {
    $query = $this->db->query('SELECT a.tahun, c.kebangsaan AS kebangsaan, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = "' . $id_grup . '" AND a.bulan = "' . $bulan . '"
    GROUP BY c.id ASC
    ');
    return $query->result_array();
  }

  public function get_bulan_blok3()
  {
    $this->db->SELECT('bulan');
    $this->db->FROM('dim_waktu');
    $this->db->GROUP_BY('bulan');
    $this->db->ORDER_BY('id', 'ASC');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_id_bulan_blok3($bulan)
  {
    $this->db->SELECT('bulan');
    $this->db->FROM('dim_waktu');
    $this->db->WHERE('bulan', $bulan);
    $query = $this->db->get();
    return $query->row();
  }
  //Akhir Untuk BLOK 3----------------------------------------------------------------//
  //Awal Untuk BLOK 4----------------------------------------------------------------//
  public function get_kebangsaan_blok4()
  {
    $this->db->SELECT('kebangsaan, id');
    $this->db->FROM('dim_kebangsaan');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_id_kebangsaan_blok4($id_nationality)
  {
    $this->db->SELECT('kebangsaan, id');
    $this->db->FROM('dim_kebangsaan');
    $this->db->WHERE('id', $id_nationality);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_blok4($id_nationality, $tahun) //untuk blok 1 total wisman yang dibawah
  {
    $query = $this->db->query('SELECT c.kebangsaan, d.jumlah, a.tahun, a.bulan
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND c.id = "' . $id_nationality . '"
    ');
    return $query->result_array();
  }

  //Awal Untuk BLOK 5----------------------------------------------------------------//
  public function get_ranking_bulan($tahun, $bulan)
  {
    $query = $this->db->query('SELECT c.kebangsaan, d.jumlah, a.tahun, a.bulan
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND a.bulan = "' . $bulan . '"
    ORDER BY d.jumlah DESC');
    return $query->result_array();
  }
}
