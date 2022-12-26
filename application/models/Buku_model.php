
<?php
class Buku_model extends CI_Model
{

    public function add_buku($data)
    {
        $this->isbn_buku = $data['isbn_buku'];
        $this->judul_buku = $data['judul_buku'];
        $this->nomor_panggil = $data['nomor_panggil'];
        $this->penerbit = $data['penerbit'];
        $this->tahun_terbit = $data['tahun'];
        $this->bahasa = $data['bahasa'];
        $this->db->insert('buku', $this);
    }

    public function get_buku_by_isbn($ISBN_buku)
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->where('ISBN_buku', $ISBN_buku);
        $query = $this->db->get();
        return $query->result();
    }

    public function join_buku_eksemplar()
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->join('eksemplar', 'buku.ISBN_buku = eksemplar.ISBN_buku', 'inner');
        $this->db->order_by('judul_buku', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function edit_buku($ISBN_buku, $data)
    {
        return $this->db->where('isbn_buku', $ISBN_buku)->update('buku', $data);
    }



   


}
