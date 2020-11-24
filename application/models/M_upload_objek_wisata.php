<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_upload_objek_wisata extends CI_Model
{
    function select()
    {
        $query = $this->db->query('SELECT a.id FROM fact_pengunjung_objek a, dim_objek c
        WHERE c.id = a.id_objek AND c.id_jenis_objek = 3');
        return $query;
    }

    function insert($data)
    {
        $this->db->insert_batch('load_objek', $data);
    }
}
