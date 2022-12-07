
<?php
class Peminjaman_model extends CI_Model
{

    public function add_peminjaman($data)
    {
        $this->id_eksemplar = $data['isbn_buku'];
        $this->judul_buku = $data['judul_buku'];
        $this->nomor_panggil = $data['nomor_panggil'];
        $this->penerbit = $data['penerbit'];
        $this->tahun_terbit = $data['tahun'];
        $this->bahasa = $data['bahasa'];
        $this->db->insert('peminjaman', $this);
    }


}
