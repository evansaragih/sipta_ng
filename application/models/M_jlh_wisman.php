<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jlh_wisman extends CI_Model
{

    public function get_kebangsaan_query()
    {
        $query = $this->db->query('SELECT * FROM dim_kebangsaan');
        return $query->result_array();
    }

    public function get_format_file()
    {
        $query = $this->db->query('SELECT a.kebangsaan, b.bulan, c.grup, YEAR(NOW()) AS tahun
        FROM dim_kebangsaan a, dim_waktu b, dim_grup c
        WHERE c.id = a.id_grup
        GROUP BY a.id, b.bulan
        ORDER BY a.id ASC, b.id ASC');
        return $query->result_array();
    }

    public function data_wisman_ajax($tahun)
    {
        if ($tahun > 0) {
            $query = $this->db->query('SELECT d.id AS id_jlh_wisman, c.grup AS jenis_kebangsaan, a.id AS id_nationality, a.kebangsaan, b.bulan, b.tahun, d.jumlah 
            FROM dim_kebangsaan a, dim_waktu b, dim_grup c, fact_wisman d
            WHERE b.tahun = "' . $tahun . '" AND c.id = a.id_grup AND b.id = d.id_waktu AND d.id_kebangsaan = a.id
            ORDER BY a.id ASC, b.id ASC');
            return $query->result_array();
        } else {
            $query = $this->db->query('SELECT d.id AS id_jlh_wisman, c.grup AS jenis_kebangsaan, a.id AS id_nationality, a.kebangsaan, b.bulan, b.tahun, d.jumlah 
            FROM dim_kebangsaan a, dim_waktu b, dim_grup c, fact_wisman d
            WHERE c.id = a.id_grup AND b.id = d.id_waktu AND d.id_kebangsaan = a.id
            ORDER BY a.id ASC, b.id ASC');
            return $query->result_array();
        }
    }

    public function cekData($nationality, $bulan, $tahun)
    {
        $query = $this->db->query('SELECT d.id AS id_jlh_wisman, c.grup AS jenis_kebangsaan, a.id AS id_nationality, a.kebangsaan, b.bulan, b.tahun, d.jumlah 
            FROM dim_kebangsaan a, dim_waktu b, dim_grup c, fact_wisman d
            WHERE c.id = a.id_grup AND b.id = d.id_waktu AND d.id_kebangsaan = a.id AND
            b.tahun = "' . $tahun . '" AND b.bulan = "' . $bulan . '" AND a.kebangsaan = "' . $nationality . '"');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function deleteData($user_ids = array())
    {
        foreach ($user_ids as $userid) {
            $this->db->delete('fact_wisman', array('id' => $userid));
        }
        return false;
    }
}
