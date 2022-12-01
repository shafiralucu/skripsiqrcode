
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
        // $this->qr_code = $data['qr_code'];
        // $this->status = $data['status'];
        $this->db->insert('buku', $this);
    }

    //fungsi untuk tambah eksemplar
    public function add_eksemplar($data_eksemplar)
    {
        $this->isbn_buku = $data_eksemplar['isbn_buku'];
        $this->qr_code = $data_eksemplar['qr_code'];
        $this->status = $data_eksemplar['status'];
        $this->db->insert('eksemplar', $this);
    }


    //fungsi delete buku
    public function delete_buku($id)
    {
        return $this->db->delete('eksemplar', array('no_eksemplar' => $id));
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
    public function edit_buku($id_edit, $data)
    {
        return $this->db->where('isbn_buku', $id_edit)->update('buku', $data);
    }

    //fungsi untuk join buku dan eksemplar
    public function join_buku_eksemplar()
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->join('eksemplar', 'buku.ISBN_buku = eksemplar.ISBN_buku', 'inner');
        $query = $this->db->get();
        return $query->result();
    }

    //fungsi untuk get buku by isbn
    public function get_buku_by_isbn($ISBN_buku)
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->where('ISBN_buku', $ISBN_buku);
        $query = $this->db->get();
        return $query->result();
    }

    //fungsi untuk melakukan pencarian buku
    public function search($keyword)
    {
        if (!$keyword) {
            return null;
        }
        $this->db->like('title', $keyword);
        $this->db->or_like('content', $keyword);
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function get_auto_increment_no_eksemplar()
    {
        $next = $this->db->query("SHOW TABLE STATUS LIKE 'eksemplar'");
        $next = $next->row(0);
        $next_id = $next->Auto_increment;
        return $next_id;
    }
}
