<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_spt_jlh_wisman extends CI_Model
{
  //AWAL BLOK 1//
  public function get_total_wisman($tahun, $tahun5) //untuk blok 1 total wisman yang dibawah
  {
    $query = $this->db->query('SELECT a.tahun, SUM(b.jumlah) AS jumlah, c.grup 
    FROM dim_waktu a, fact_wisman b, dim_grup c, dim_kebangsaan d
    WHERE d.id = b.id_kebangsaan AND d.id_grup = c.id AND a.id = b.id_waktu 
    AND a.tahun BETWEEN "' . $tahun5 . '" AND "' . $tahun . '"
    GROUP BY c.grup
    ORDER BY c.id ASC');
    return $query->result_array();
  }

  public function get_group_kebangsaan()
  {
    $this->db->SELECT('grup, id');
    $this->db->FROM('dim_grup');
    $this->db->GROUP_BY('id', 'ASC');
    $query = $this->db->get();
    return $query->result_array();
  }

  //blok1, tabel, pie, area
  public function get_jlh_wisman_januari($tahun) //mendapatkan jumlah wisatawan pergrup kebangsaan tahun 1
  {
    $query = $this->db->query('SELECT a.tahun, SUM(b.jumlah) AS jumlah, c.grup 
    AS jenis_kebangsaan, c.path_map
    FROM dim_waktu a, fact_wisman b, dim_grup c, dim_kebangsaan d
    WHERE d.id = b.id_kebangsaan AND d.id_grup = c.id AND a.id = b.id_waktu 
    AND a.tahun = "' . $tahun . '"
    GROUP BY c.id ASC');
    return $query->result_array();
  }
  public function get_jlh_wisman_februari($tahun1) //mendapatkan jumlah wisatawan pergrup kebangsaan bulan 1
  {
    $query = $this->db->query('SELECT a.tahun, SUM(b.jumlah) AS jumlah, c.grup 
    AS jenis_kebangsaan, c.path_map
    FROM dim_waktu a, fact_wisman b, dim_grup c, dim_kebangsaan d
    WHERE d.id = b.id_kebangsaan AND d.id_grup = c.id AND a.id = b.id_waktu 
    AND a.tahun = "' . $tahun1 . '"
    GROUP BY c.id ASC');
    return $query->result_array();
  }
  public function get_jlh_wisman_maret($tahun2) //mendapatkan jumlah wisatawan pergrup kebangsaan bulan 1
  {
    $query = $this->db->query('SELECT a.tahun, SUM(b.jumlah) AS jumlah, c.grup 
    AS jenis_kebangsaan, c.path_map
    FROM dim_waktu a, fact_wisman b, dim_grup c, dim_kebangsaan d
    WHERE d.id = b.id_kebangsaan AND d.id_grup = c.id AND a.id = b.id_waktu 
    AND a.tahun = "' . $tahun2 . '"
    GROUP BY c.id ASC');
    return $query->result_array();
  }
  public function get_jlh_wisman_april($tahun3) //mendapatkan jumlah wisatawan pergrup kebangsaan bulan 1
  {
    $query = $this->db->query('SELECT a.tahun, SUM(b.jumlah) AS jumlah, c.grup 
    AS jenis_kebangsaan, c.path_map
    FROM dim_waktu a, fact_wisman b, dim_grup c, dim_kebangsaan d
    WHERE d.id = b.id_kebangsaan AND d.id_grup = c.id AND a.id = b.id_waktu 
    AND a.tahun = "' . $tahun3 . '"
    GROUP BY c.id ASC');
    return $query->result_array();
  }
  public function get_jlh_wisman_mei($tahun4) //mendapatkan jumlah wisatawan pergrup kebangsaan bulan 1
  {
    $query = $this->db->query('SELECT a.tahun, SUM(b.jumlah) AS jumlah, c.grup 
    AS jenis_kebangsaan, c.path_map
    FROM dim_waktu a, fact_wisman b, dim_grup c, dim_kebangsaan d
    WHERE d.id = b.id_kebangsaan AND d.id_grup = c.id AND a.id = b.id_waktu 
    AND a.tahun = "' . $tahun4 . '"
    GROUP BY c.id ASC');
    return $query->result_array();
  }
  public function get_jlh_wisman_juni($tahun5) //mendapatkan jumlah wisatawan pergrup kebangsaan bulan 1
  {
    $query = $this->db->query('SELECT a.tahun, SUM(b.jumlah) AS jumlah, c.grup 
    AS jenis_kebangsaan, c.path_map
    FROM dim_waktu a, fact_wisman b, dim_grup c, dim_kebangsaan d
    WHERE d.id = b.id_kebangsaan AND d.id_grup = c.id AND a.id = b.id_waktu 
    AND a.tahun = "' . $tahun5 . '"
    GROUP BY c.id ASC');
    return $query->result_array();
  }

  //blok1 maps
  public function get_jwisman_asia_tahun($tahun, $asia) //mendapatkan jumlah wisatawan pergrup kebangsaan bulan 1
  {
    $query = $this->db->query('SELECT b.grup AS jenis_kebangsaan, 
    SUM(d.jumlah) AS jumlah, b.path_map AS path_map
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = "' . $asia . '"');
    return $query->row();
  }
  public function get_jwisman_asean_tahun($tahun, $asean) //mendapatkan jumlah wisatawan pergrup kebangsaan bulan 1
  {
    $query = $this->db->query('SELECT b.grup AS jenis_kebangsaan, 
    SUM(d.jumlah) AS jumlah, b.path_map AS path_map
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = "' . $asean . '"');
    return $query->row();
  }
  public function get_jwisman_africa_tahun($tahun, $africa) //mendapatkan jumlah wisatawan pergrup kebangsaan bulan 1
  {
    $query = $this->db->query('SELECT b.grup AS jenis_kebangsaan, 
    SUM(d.jumlah) AS jumlah, b.path_map AS path_map
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = "' . $africa . '"');
    return $query->row();
  }
  public function get_jwisman_america_tahun($tahun, $amerika) //mendapatkan jumlah wisatawan pergrup kebangsaan bulan 1
  {
    $query = $this->db->query('SELECT b.grup AS jenis_kebangsaan, 
    SUM(d.jumlah) AS jumlah, b.path_map AS path_map
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = "' . $amerika . '"');
    return $query->row();
  }
  public function get_jwisman_europe_tahun($tahun, $europe) //mendapatkan jumlah wisatawan pergrup kebangsaan bulan 1
  {
    $query = $this->db->query('SELECT b.grup AS jenis_kebangsaan, 
    SUM(d.jumlah) AS jumlah, b.path_map AS path_map
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = "' . $europe . '"');
    return $query->row();
  }
  public function get_jwisman_mid_east_tahun($tahun, $mid_east) //mendapatkan jumlah wisatawan pergrup kebangsaan bulan 1
  {
    $query = $this->db->query('SELECT b.grup AS jenis_kebangsaan, 
    SUM(d.jumlah) AS jumlah, b.path_map AS path_map
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = "' . $mid_east . '"');
    return $query->row();
  }
  //Akhir Untuk BLOK 1----------------------------------------------------------------//
  //Awal Untuk BLOK 2----------------------------------------------------------------//
  public function get_asia_tahun($tahun) // get asia tahun1
  {
    $query = $this->db->query('SELECT b.grup AS kebangsaan, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = 1
    ');
    return $query->row();
  }

  public function get_asean_tahun($tahun)
  {
    $query = $this->db->query('SELECT b.grup AS kebangsaan, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = 2
    ');
    return $query->row();
  }

  public function get_africa_tahun($tahun)
  {
    $query = $this->db->query('SELECT b.grup AS kebangsaan, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = 3
    ');
    return $query->row();
  }

  public function get_america_tahun($tahun)
  {
    $query = $this->db->query('SELECT b.grup AS kebangsaan, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = 4
    ');
    return $query->row();
  }

  public function get_europe_tahun($tahun)
  {
    $query = $this->db->query('SELECT b.grup AS kebangsaan, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = 5
    ');
    return $query->row();
  }

  public function get_mideast_tahun($tahun)
  {
    $query = $this->db->query('SELECT b.grup AS kebangsaan, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = 6
    ');
    return $query->row();
  }

  public function get_other_tahun($tahun)
  {
    $query = $this->db->query('SELECT b.grup AS kebangsaan, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '" AND b.id = 7
    ');
    return $query->row();
  }

  public function get_asia_tahun_vs($tahun_vs)
  {
    $query = $this->db->query('SELECT b.grup AS kebangsaan, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun_vs . '" AND b.id = 1
    ');
    return $query->row();
  }

  public function get_asean_tahun_vs($tahun_vs)
  {
    $query = $this->db->query('SELECT b.grup AS kebangsaan, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun_vs . '" AND b.id = 2
    ');
    return $query->row();
  }

  public function get_africa_tahun_vs($tahun_vs)
  {
    $query = $this->db->query('SELECT b.grup AS kebangsaan, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun_vs . '" AND b.id = 3
    ');
    return $query->row();
  }

  public function get_america_tahun_vs($tahun_vs)
  {
    $query = $this->db->query('SELECT b.grup AS kebangsaan, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun_vs . '" AND b.id = 4
    ');
    return $query->row();
  }

  public function get_europe_tahun_vs($tahun_vs)
  {
    $query = $this->db->query('SELECT b.grup AS kebangsaan, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun_vs . '" AND b.id = 5
    ');
    return $query->row();
  }

  public function get_mideast_tahun_vs($tahun_vs)
  {
    $query = $this->db->query('SELECT b.grup AS kebangsaan, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun_vs . '" AND b.id = 6
    ');
    return $query->row();
  }

  public function get_other_tahun_vs($tahun_vs)
  {
    $query = $this->db->query('SELECT b.grup AS kebangsaan, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun_vs . '" AND b.id = 7
    ');
    return $query->row();
  }
  //Akhir Untuk BLOK 2----------------------------------------------------------------//
  //Awal Untuk BLOK 3----------------------------------------------------------------//
  public function get_blok3($id_grup, $tahun) //untuk blok 1 total wisman yang dibawah
  {
    $query = $this->db->query('SELECT a.tahun, b.grup, c.kebangsaan AS kebangsaan, SUM(d.jumlah) AS jumlah
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun ="' . $tahun . '" AND b.id = "' . $id_grup . '"
    GROUP BY c.id
    ');
    return $query->result_array();
  }

  public function get_id_grup_kebangsaan_blok3($id_grup)
  {
    $this->db->SELECT('grup, id');
    $this->db->FROM('dim_grup');
    $this->db->WHERE('id', $id_grup);
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

  public function get_blok4($id_nationality) //untuk blok 1 total wisman yang dibawah
  {
    $query = $this->db->query('SELECT c.kebangsaan, d.jumlah, a.tahun, a.bulan
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND c.id = "' . $id_nationality . '"
    GROUP BY a.tahun DESC
    ');
    return $query->result_array();
  }
  //Akhir Untuk BLOK 4----------------------------------------------------------------//
  //Awal Untuk BLOK 5----------------------------------------------------------------//
  public function get_ranking_tahun($tahun)
  {
    $query = $this->db->query('SELECT c.kebangsaan, d.jumlah, a.tahun, a.bulan
    FROM dim_waktu a, dim_grup b, dim_kebangsaan c, fact_wisman d
    WHERE b.id = c.id_grup AND d.id_waktu = a.id AND c.id = d.id_kebangsaan 
    AND a.tahun = "' . $tahun . '"
    ORDER BY d.jumlah DESC');
    return $query->result_array();
  }
}
