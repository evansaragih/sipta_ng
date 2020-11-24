<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_insert extends CI_Model {
	
	public function __construct() {
    	parent::__construct();
	}

	public function insertData($tableName,$data){
		$res = $this->db->insert($tableName,$data);
		return $res;
	}
}
