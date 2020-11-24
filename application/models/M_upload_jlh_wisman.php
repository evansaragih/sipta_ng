<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_upload_jlh_wisman extends CI_Model
{
    function select()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('fact_wisman');
        return $query;
    }

    function insert($data)
    {
        $this->db->insert_batch('load_wisman', $data);
    }
}
