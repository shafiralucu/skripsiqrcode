
<?php
class Peminjaman_model extends CI_Model
{

    public function add_peminjaman($data)
    {
        $this->id_anggota = $data['id_anggota'];
        $this->id_eksemplar = $data['id_eksemplar'];
        $this->tanggal_peminjaman = $data['date_peminjaman'];
        $this->tanggal_pengembalian = $data['date_pengembalian'];
        $this->status_pinjam = $data['status_pinjam'];
        $this->db->insert('peminjaman', $this);
    }


    public function update_pengembalian($id_eksemplar, $id_anggota)
    {
        $this->db->set('status_pinjam', 'Telah Dikembalikan');
        $this->db->where('id_eksemplar', $id_eksemplar);
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('peminjaman');
    }

    public function join_eksemplar_peminjaman_buku_anggota()
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('eksemplar', 'eksemplar.id = peminjaman.id_eksemplar', 'inner');
        $this->db->join('buku', 'eksemplar.ISBN_buku = buku.ISBN_buku', 'inner');
        $this->db->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota', 'inner');
        $this->db->order_by('tanggal_peminjaman', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function anggota_pinjam($id) {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('eksemplar', 'eksemplar.id = peminjaman.id_eksemplar', 'inner');
        $this->db->join('buku', 'eksemplar.ISBN_buku = buku.ISBN_buku', 'inner');
        $this->db->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota', 'inner');
        $this->db->where('anggota.id_anggota', $id);
        $this->db->where('status_pinjam', 'Dipinjam');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_detail_buku($id_eksemplar, $id_anggota, $tanggal_peminjaman) {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('eksemplar', 'eksemplar.id = peminjaman.id_eksemplar', 'inner');
        $this->db->join('buku', 'eksemplar.ISBN_buku = buku.ISBN_buku', 'inner');
        $this->db->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota', 'inner');
        $this->db->where('eksemplar.id', $id_eksemplar);
        $this->db->where('anggota.id_anggota', $id_anggota);        
        $this->db->where('tanggal_peminjaman', $tanggal_peminjaman);        
        $this->db->where('status_pinjam','Dipinjam');
        $query = $this->db->get();
        return $query->result();
    }
}
