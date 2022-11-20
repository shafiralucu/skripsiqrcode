
<?php
//kelas model untuk Pustakawan, fungsi2 untuk CRUD buku pada perpustakaan
class Buku_model extends CI_Model
{

    //fungsi untuk menambahkan buku perpustakaan baru
    public function add_buku($data)
    {
        $this->isbn_buku = $data['isbn_buku'];
        $this->judul_buku = $data['judul_buku'];
        $this->nomor_panggil = $data['nomor_panggil'];
        $this->penerbit = $data['penerbit'];
        $this->tahun_terbit = $data['tahun'];
        $this->bahasa = $data['bahasa']; 
        $this->qr_code = $data['qr_code'];    
        $this->status = $data['status'];                      
        $this->db->insert('buku', $this);
    }


    //fungsi delete buku
    public function delete_buku($id){
		return $this->db->delete('buku', array('isbn_buku' => $id));
	}

    //fungsi untuk mengambil data buku perpustakaan baru untuk show buku
    public function show_buku()
    {
        $this->db->select('*');
        $this->db->from('buku');
        $query = $this->db->get();
        return $query->result();
    }

    //fungsi untuk edit buku perpustakaan
    public function edit_buku($id_edit, $data){
		return $this->db->where('isbn_buku', $id_edit)->update('buku',$data);
	}
}
