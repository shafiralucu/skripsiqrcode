<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search_model extends CI_Model
{

	public function search($keyword = null)
	{
		// $this->db->select('buku_buku,judul_buku,bahasa,count(status) as jumlah');
		// $this->db->from('buku');
		// $this->db->join('eksemplar', 'buku.ISBN_buku = eksemplar.ISBN_buku', 'inner');
		// $this->db->where('status','Tersedia'); 
		// $this->db->group('ISBN_buku');
		// if(!empty($keyword)){
		// 	$this->db->like('judul_buku',$keyword);
		// }
		// return $this->db->get()->result_array();

		$tersedia = $this->tersedia($keyword);
		$tidak_tersedia = $this->tidak_tersedia($keyword);
		$temp = array_merge($tersedia, $tidak_tersedia);
		
		// https://stackoverflow.com/questions/7867350/remove-duplicates-from-array-array-unic-by-key
		$result = array();
		foreach ($temp as $v) {
			if (isset($result[$v['ISBN_buku']])) {
				// found duplicate
				continue;
			}
			// remember unique item
			$result[$v['ISBN_buku']] = $v;
		}

		return $result;
		// $result = array_map("unserialize", array_unique(array_map("serialize", $result)));
		// return $result;
	}

	public function tersedia($keyword = null)
	{
		$this->db->select('buku.ISBN_buku,judul_buku,bahasa,count(status) as jumlah, status');
		$this->db->from('buku');
		$this->db->join('eksemplar', 'buku.ISBN_buku = eksemplar.ISBN_buku', 'inner');
		$this->db->where('status', 'Tersedia');
		$this->db->group_by('buku.ISBN_buku');
		if (!empty($keyword)) {
			$this->db->like('judul_buku', $keyword);
		}
		return $this->db->get()->result_array();
	}

	public function tidak_tersedia($keyword = null)
	{
		$this->db->select('buku.ISBN_buku,judul_buku,bahasa,count(status) as jumlah, status');
		$this->db->from('buku');
		$this->db->join('eksemplar', 'buku.ISBN_buku = eksemplar.ISBN_buku', 'inner');
		$this->db->where('status', 'Tidak Tersedia');
		$this->db->group_by('buku.ISBN_buku');
		if (!empty($keyword)) {
			$this->db->like('judul_buku', $keyword);
		}
		return $this->db->get()->result_array();
	}
}
