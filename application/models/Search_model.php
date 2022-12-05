<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model {

	public function search($keyword=null){
		$this->db->select('*');
		$this->db->from('buku');
		if(!empty($keyword)){
			$this->db->like('judul_buku',$keyword);
		}
		return $this->db->get()->result_array();
	}

}