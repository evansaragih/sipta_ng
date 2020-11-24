<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sp_tinjau_region extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function box1a($tahun, $kab) //data restoran
    {
        $query = $this->db->query('SELECT b.kabupaten, c.jenis_objek, e.tahun, 
        COUNT(f.id) AS jlh_restoran, SUM(f.jumlah) AS jlh_pengunjung
        FROM dim_objek a, dim_kabupaten b, dim_jenis_objek c, dim_jenis_wisatawan d, 
        dim_waktu e, fact_pengunjung_objek f
        WHERE a.id = f.id_objek AND f.id_jenis_wisatawan = d.id AND f.id_waktu = e.id 
        AND b.id = a.id_kabupaten AND a.id_jenis_objek = c.id AND c.id = 1 AND d.id = 1
        AND e.tahun = ' . $tahun . ' AND b.id = ' . $kab . ' ');
        return $query->row();
    }

    public function box1b($tahun, $kab) //data restoran wisatwan domestik
    {
        $query = $this->db->query('SELECT b.kabupaten, c.jenis_objek, e.tahun, 
        COUNT(f.id) AS jlh_restoran, SUM(f.jumlah) AS jlh_pengunjung
        FROM dim_objek a, dim_kabupaten b, dim_jenis_objek c, dim_jenis_wisatawan d, 
        dim_waktu e, fact_pengunjung_objek f
        WHERE a.id = f.id_objek AND f.id_jenis_wisatawan = d.id AND f.id_waktu = e.id 
        AND b.id = a.id_kabupaten AND a.id_jenis_objek = c.id AND c.id = 1 AND d.id = 2
        AND e.tahun = ' . $tahun . ' AND b.id = ' . $kab . ' ');
        return $query->row();
    }

    public function box2a($tahun, $kab) //data akomodasi jlh unit
    {
        $query = $this->db->query('SELECT COUNT(a.id) AS jlh_akomodasi, 
        SUM(a.jumlah_kamar)AS jlh_kamar, SUM(a.jumlah_tamu) AS jlh_tamu, 
        b.tahun AS tahun, c.kategori
        FROM fact_akomodasi a, dim_waktu b, dim_kategori c, dim_kabupaten d, dim_akomodasi e
        WHERE a.id_akomodasi = e.id AND c.id = a.id_kategori AND b.id = a.id_waktu 
        AND e.id_kabupaten = d.id  
        AND b.tahun = ' . $tahun . ' AND d.id = ' . $kab . '');
        return $query->row();
    }

    public function box3a($tahun, $kab) //data bar
    {
        $query = $this->db->query('SELECT b.kabupaten, c.jenis_objek, e.tahun, 
        COUNT(f.id) AS jlh_bar, SUM(f.jumlah) AS jlh_pengunjung
        FROM dim_objek a, dim_kabupaten b, dim_jenis_objek c, dim_jenis_wisatawan d, 
        dim_waktu e, fact_pengunjung_objek f
        WHERE a.id = f.id_objek AND f.id_jenis_wisatawan = d.id AND f.id_waktu = e.id 
        AND b.id = a.id_kabupaten AND a.id_jenis_objek = c.id AND c.id = 2 AND d.id = 1
        AND e.tahun = ' . $tahun . ' AND b.id = ' . $kab . ' ');
        return $query->row();
    }

    public function box3b($tahun, $kab) //data bar
    {
        $query = $this->db->query('SELECT b.kabupaten, c.jenis_objek, e.tahun, 
        COUNT(f.id) AS jlh_bar, SUM(f.jumlah) AS jlh_pengunjung
        FROM dim_objek a, dim_kabupaten b, dim_jenis_objek c, dim_jenis_wisatawan d, 
        dim_waktu e, fact_pengunjung_objek f
        WHERE a.id = f.id_objek AND f.id_jenis_wisatawan = d.id AND f.id_waktu = e.id 
        AND b.id = a.id_kabupaten AND a.id_jenis_objek = c.id AND c.id = 2 AND d.id = 2
        AND e.tahun = ' . $tahun . ' AND b.id = ' . $kab . ' ');
        return $query->row();
    }

    public function box4a($tahun, $kab) //data restoran
    {
        $query = $this->db->query('SELECT b.kabupaten, c.jenis_objek, e.tahun, 
        COUNT(f.id) AS jlh_objek_wisata, SUM(f.jumlah) AS jlh_pengunjung
        FROM dim_objek a, dim_kabupaten b, dim_jenis_objek c, dim_jenis_wisatawan d, 
        dim_waktu e, fact_pengunjung_objek f
        WHERE a.id = f.id_objek AND f.id_jenis_wisatawan = d.id AND f.id_waktu = e.id 
        AND b.id = a.id_kabupaten AND a.id_jenis_objek = c.id AND c.id = 3 AND d.id = 1
        AND e.tahun = ' . $tahun . ' AND b.id = ' . $kab . ' ');
        return $query->row();
    }
    public function box4b($tahun, $kab) //data bar
    {
        $query = $this->db->query('SELECT b.kabupaten, c.jenis_objek, e.tahun, 
        COUNT(f.id) AS jlh_objek_wisata, SUM(f.jumlah) AS jlh_pengunjung
        FROM dim_objek a, dim_kabupaten b, dim_jenis_objek c, dim_jenis_wisatawan d, 
        dim_waktu e, fact_pengunjung_objek f
        WHERE a.id = f.id_objek AND f.id_jenis_wisatawan = d.id AND f.id_waktu = e.id 
        AND b.id = a.id_kabupaten AND a.id_jenis_objek = c.id AND c.id = 3 AND d.id = 2
        AND e.tahun = ' . $tahun . ' AND b.id = ' . $kab . ' ');
        return $query->row();
    }
}
