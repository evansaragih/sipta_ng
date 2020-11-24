<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function box1a($tahun) //data restoran
    {
        $query = $this->db->query('SELECT b.kabupaten, c.jenis_objek, e.tahun, 
        COUNT(f.id) AS jlh_restoran, SUM(f.jumlah) AS jlh_pengunjung
        FROM dim_objek a, dim_kabupaten b, dim_jenis_objek c, dim_jenis_wisatawan d, 
        dim_waktu e, fact_pengunjung_objek f
        WHERE a.id = f.id_objek AND f.id_jenis_wisatawan = d.id AND f.id_waktu = e.id 
        AND b.id = a.id_kabupaten AND a.id_jenis_objek = c.id AND c.id = 2 AND d.id = 1
        AND e.tahun = ' . $tahun . '');
        return $query->row();
    }

    public function box1b($tahun) //data jumlah pengunjung restoran
    {
        $query = $this->db->query('SELECT b.kabupaten, c.jenis_objek, e.tahun, 
        COUNT(f.id) AS jlh_restoran, SUM(f.jumlah) AS jlh_pengunjung
        FROM dim_objek a, dim_kabupaten b, dim_jenis_objek c, dim_jenis_wisatawan d, 
        dim_waktu e, fact_pengunjung_objek f
        WHERE a.id = f.id_objek AND f.id_jenis_wisatawan = d.id AND f.id_waktu = e.id 
        AND b.id = a.id_kabupaten AND a.id_jenis_objek = c.id AND c.id = 1 AND d.id = 2
        AND e.tahun = ' . $tahun . '');
        return $query->row();
    }

    public function box2a($tahun) //data akomodasi jlh unit
    {
        $query = $this->db->query('SELECT COUNT(a.id) AS jlh_unit, 
        SUM(a.jumlah_kamar)AS jlh_kamar, SUM(a.jumlah_tamu) AS jlh_tamu, 
        b.tahun AS tahun, c.kategori
        FROM fact_akomodasi a, dim_waktu b, dim_kategori c, dim_kabupaten d, dim_akomodasi e
        WHERE a.id_akomodasi = e.id AND c.id = a.id_kategori AND b.id = a.id_waktu 
        AND e.id_kabupaten = d.id  
        AND b.tahun = ' . $tahun . '');
        return $query->row();
    }

    public function box2b($tahun) //menghitung jumlah tamu seluruh akomodasi
    {
        $query = $this->db->query('SELECT SUM(a.jumlah_tamu) AS jlh_tamu, 
        b.tahun AS tahun
        FROM fact_akomodasi a, dim_waktu b, dim_kategori c, dim_kabupaten d, dim_akomodasi e
        WHERE a.id_akomodasi = e.id AND c.id = a.id_kategori AND b.id = a.id_waktu 
        AND e.id_kabupaten = d.id  
        AND b.tahun = ' . $tahun . '');
        return $query->row();
    }

    public function box3a($tahun) //data wisman
    {
        $query = $this->db->query('SELECT SUM(d.jumlah) AS jlh_wisman
        FROM dim_kebangsaan a, dim_waktu b, dim_grup c, fact_wisman d
        WHERE c.id = a.id_grup AND b.id = d.id_waktu AND d.id_kebangsaan = a.id AND b.tahun = ' . $tahun . '');
        return $query->row();
    }

    public function box4a($tahun) //data penumpang internasional
    {
        $query = $this->db->query('SELECT SUM(a.jumlah) AS jlh_internasional, c.pintu_masuk
        FROM fact_penumpang a, dim_waktu b, dim_pintu_masuk c, dim_jenis_penumpang d
        WHERE a.id_waktu = b.id AND a.id_pintu_masuk = c.id AND a.id_jenis_penumpang = d.id 
        AND d.id = 2 AND b.tahun = "' . $tahun . '"');
        return $query->row();
    }
    public function box4b($tahun) //data penumpang domestik
    {
        $query = $this->db->query('SELECT SUM(a.jumlah) AS jlh_domestik, c.pintu_masuk
        FROM fact_penumpang a, dim_waktu b, dim_pintu_masuk c, dim_jenis_penumpang d
        WHERE a.id_waktu = b.id AND a.id_pintu_masuk = c.id AND a.id_jenis_penumpang = d.id 
        AND d.id = 1 AND b.tahun = "' . $tahun . '"');
        return $query->row();
    }

    public function box5a($tahun) //data objek wisata
    {
        $query = $this->db->query('SELECT b.kabupaten, c.jenis_objek, e.tahun, 
        COUNT(f.id) AS jlh_objek_wisata, SUM(f.jumlah) AS jlh_pengunjung
        FROM dim_objek a, dim_kabupaten b, dim_jenis_objek c, dim_jenis_wisatawan d, 
        dim_waktu e, fact_pengunjung_objek f
        WHERE a.id = f.id_objek AND f.id_jenis_wisatawan = d.id AND f.id_waktu = e.id 
        AND b.id = a.id_kabupaten AND a.id_jenis_objek = c.id AND c.id = 3 AND d.id = 1
        AND e.tahun = ' . $tahun . '');
        return $query->row();
    }
    public function box5b($tahun) //data jumlah pengunjung objek wisata
    {
        $query = $this->db->query('SELECT b.kabupaten, c.jenis_objek, e.tahun, 
        COUNT(f.id) AS jlh_objek_wisata, SUM(f.jumlah) AS jlh_pengunjung
        FROM dim_objek a, dim_kabupaten b, dim_jenis_objek c, dim_jenis_wisatawan d, 
        dim_waktu e, fact_pengunjung_objek f
        WHERE a.id = f.id_objek AND f.id_jenis_wisatawan = d.id AND f.id_waktu = e.id 
        AND b.id = a.id_kabupaten AND a.id_jenis_objek = c.id AND c.id = 3 AND d.id = 2
        AND e.tahun = ' . $tahun . '');
        return $query->row();
    }


    public function box6a($tahun) //data bar
    {
        $query = $this->db->query('SELECT b.kabupaten, c.jenis_objek, e.tahun, 
        COUNT(f.id) AS jlh_bar, SUM(f.jumlah) AS jlh_pengunjung
        FROM dim_objek a, dim_kabupaten b, dim_jenis_objek c, dim_jenis_wisatawan d, 
        dim_waktu e, fact_pengunjung_objek f
        WHERE a.id = f.id_objek AND f.id_jenis_wisatawan = d.id AND f.id_waktu = e.id 
        AND b.id = a.id_kabupaten AND a.id_jenis_objek = c.id AND c.id = 2 AND d.id = 1
        AND e.tahun = ' . $tahun . '');
        return $query->row();
    }

    public function box6b($tahun) //data bar
    {
        $query = $this->db->query('SELECT b.kabupaten, c.jenis_objek, e.tahun, 
        COUNT(f.id) AS jlh_bar, SUM(f.jumlah) AS jlh_pengunjung
        FROM dim_objek a, dim_kabupaten b, dim_jenis_objek c, dim_jenis_wisatawan d, 
        dim_waktu e, fact_pengunjung_objek f
        WHERE a.id = f.id_objek AND f.id_jenis_wisatawan = d.id AND f.id_waktu = e.id 
        AND b.id = a.id_kabupaten AND a.id_jenis_objek = c.id AND c.id = 2 AND d.id = 2
        AND e.tahun = ' . $tahun . '');
        return $query->row();
    }

    public function wisman_terbanyak($tahun)
    {
        $query = $this->db->query('SELECT a.kebangsaan, SUM(d.jumlah) AS jumlah
        FROM dim_kebangsaan a, dim_waktu b, dim_grup c, fact_wisman d
        WHERE c.id = a.id_grup AND b.id = d.id_waktu AND d.id_kebangsaan = a.id AND b.tahun = ' . $tahun . '
        GROUP BY a.id
        ORDER BY SUM(d.jumlah) DESC LIMIT 5');
        return $query->result_array();
    }

    public function objek_wisata_terbanyak($tahun)
    {
        $query = $this->db->query('SELECT b.kabupaten, a.nama AS nama_objek_wisata, e.tahun, SUM(f.jumlah) AS jumlah
        FROM dim_objek a, dim_kabupaten b, dim_jenis_objek c, dim_jenis_wisatawan d, dim_waktu e, 
        fact_pengunjung_objek f
        WHERE a.id = f.id_objek AND a.id_jenis_objek = c.id AND f.id_jenis_wisatawan = d.id 
        AND f.id_waktu = e.id AND b.id = a.id_kabupaten 
        AND e.tahun = ' . $tahun . ' AND c.id = 3
        GROUP BY a.id
        ORDER BY SUM(f.jumlah) DESC LIMIT 5');
        return $query->result_array();
    }

    public function restoran_terbanyak($tahun)
    {
        $query = $this->db->query('SELECT b.kabupaten AS kabupaten, a.nama AS nama_restoran, e.tahun, 
        SUM(f.jumlah) AS jumlah
        FROM dim_objek a, dim_kabupaten b, dim_jenis_objek c, dim_jenis_wisatawan d, dim_waktu e, 
        fact_pengunjung_objek f
        WHERE a.id = f.id_objek AND a.id_jenis_objek = c.id AND f.id_jenis_wisatawan = d.id 
        AND f.id_waktu = e.id AND b.id = a.id_kabupaten 
        AND e.tahun = ' . $tahun . ' AND c.id = 1
        GROUP BY a.id
        ORDER BY SUM(f.jumlah) DESC LIMIT 5');
        return $query->result_array();
    }

    public function akomodasi_terbanyak($tahun)
    {
        $query = $this->db->query('SELECT d.kabupaten, COUNT(a.id) AS jumlah,
         b.tahun AS tahun, SUM(a.jumlah_kamar)AS jlh_kamar
        FROM fact_akomodasi a, dim_waktu b, dim_kategori c, dim_kabupaten d, dim_akomodasi e
        WHERE a.id_akomodasi = e.id AND c.id = a.id_kategori AND b.id = a.id_waktu AND e.id_kabupaten = d.id  
        AND b.tahun = ' . $tahun . '
        GROUP BY d.id
        ORDER BY COUNT(a.id) DESC LIMIT 5');
        return $query->result_array();
    }

    public function hotel_bintang_terbanyak($tahun) //hotel dengan tamu terbanyak
    {
        $query = $this->db->query('SELECT e.nama_hotel, SUM(a.jumlah_kamar)AS jlh_kamar, SUM(a.jumlah_tamu) AS jumlah, b.tahun AS tahun, c.kategori
        FROM fact_akomodasi a, dim_waktu b, dim_kategori c, dim_kabupaten d, dim_akomodasi e
        WHERE a.id_akomodasi = e.id AND c.id = a.id_kategori AND b.id = a.id_waktu AND e.id_kabupaten = d.id  
        AND b.tahun = ' . $tahun . ' AND d.id = 1
        GROUP BY e.id
        ORDER BY SUM(a.jumlah_tamu) DESC LIMIT 5');
        return $query->result_array();
    }

    public function bar_terbanyak($tahun)
    {
        $query = $this->db->query('SELECT b.kabupaten AS kabupaten, a.nama AS nama_bar, e.tahun, 
        SUM(f.jumlah) AS jumlah
        FROM dim_objek a, dim_kabupaten b, dim_jenis_objek c, dim_jenis_wisatawan d, dim_waktu e, 
        fact_pengunjung_objek f
        WHERE a.id = f.id_objek AND a.id_jenis_objek = c.id AND f.id_jenis_wisatawan = d.id 
        AND f.id_waktu = e.id AND b.id = a.id_kabupaten 
        AND e.tahun = ' . $tahun . ' AND c.id = 2
        GROUP BY a.id
        ORDER BY SUM(f.jumlah) DESC LIMIT 5');
        return $query->result_array();
    }

    public function kunjungan_objek_wisata($tahun)
    {
        $query = $this->db->query('SELECT SUM(jumlah) as jumlah, tahun
        FROM tb_objek_wisata
        WHERE tahun BETWEEN "' . ($tahun - 4) . '" AND "' . ($tahun) . '"
        GROUP BY tahun');
        return $query->result_array();
    }
}
