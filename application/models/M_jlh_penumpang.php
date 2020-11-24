<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jlh_penumpang extends CI_Model
{

    public function get_pintu_masuk_query()
    {
        $query = $this->db->query('SELECT * FROM dim_pintu_masuk');
        return $query->result_array();
    }

    public function get_jenis_penumpang()
    {
        $query = $this->db->query('SELECT * FROM dim_jenis_penumpang');
        return $query->result_array();
    }

    public function get_format_file()
    {
        $query = $this->db->query('SELECT a.pintu_masuk, b.bulan, YEAR(NOW()) AS tahun, c.jenis_penumpang
        FROM dim_pintu_masuk a, dim_waktu b, dim_jenis_penumpang c
        GROUP BY a.pintu_masuk, b.bulan, c.jenis_penumpang 
        ORDER BY a.id DESC, b.id ASC, c.id ASC');
        return $query->result_array();
    }

    public function data_penumpang_ajax($tahun)
    {
        if ($tahun > 0) {
            $query = $this->db->query('SELECT a.id AS id_pintu_masuk, a.pintu_masuk AS pintu_masuk, d.id AS id_jlh_penumpang, b.jenis_penumpang, c.bulan, c.tahun, d.jumlah 
            FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
            WHERE c.tahun = "' . $tahun . '" AND a.id = d.id_pintu_masuk AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
            ORDER BY d.id_pintu_masuk DESC, c.id ASC, d.id_jenis_penumpang ASC');
            return $query->result_array();
        } else {
            $query = $this->db->query('SELECT a.id AS id_pintu_masuk, a.pintu_masuk AS pintu_masuk, d.id AS id_jlh_penumpang, b.jenis_penumpang, c.bulan, c.tahun, d.jumlah 
            FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
            WHERE a.id = d.id_pintu_masuk AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang
            ORDER BY d.id_pintu_masuk DESC, c.id ASC, d.id_jenis_penumpang ASC');
            return $query->result_array();
        }
    }

    public function cekData($pintu_masuk, $bulan, $tahun, $jenis_penumpang) //untuk upload data satu satu
    {
        $query = $this->db->query('SELECT a.id AS id_pintu_masuk, a.pintu_masuk AS pintu_masuk, d.id AS id_jlh_penumpang, b.jenis_penumpang, c.bulan, c.tahun, d.jumlah 
        FROM dim_pintu_masuk a, dim_jenis_penumpang b, dim_waktu c, fact_penumpang d
        WHERE a.id = d.id_pintu_masuk AND c.id = d.id_waktu AND b.id = d.id_jenis_penumpang AND c.tahun = "' . $tahun . '" 
        AND c.bulan = "' . $bulan . '" AND a.pintu_masuk = "' . $pintu_masuk . '" AND b.jenis_penumpang = "' . $jenis_penumpang . '"');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function deleteData($user_ids = array())
    {
        foreach ($user_ids as $userid) {
            $this->db->delete('fact_penumpang', array('id' => $userid));
        }
        return false;
    }
}
