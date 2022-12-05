<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scan_model extends CI_Model
{

	//fungsi untuk update status buku pinjam
	public function update_status_buku_pinjam($ISBN_buku)
	{
		//set status buku dari Tersedia menjadi Tidak tersediaj
		$this->db->set('status', 'Tidak Tersedia');
		$this->db->where('ISBN_buku', $ISBN_buku);
		$this->db->update('buku');
	}

	//fungsi untuk update status buku kembali
	public function update_status_buku_kembali($ISBN_buku)
	{
		//set status buku dari Tersedia menjadi Tidak tersediaj
		$this->db->set('status', 'Tersedia');
		$this->db->where('ISBN_buku', $ISBN_buku);
		$this->db->update('buku');
	}
}
