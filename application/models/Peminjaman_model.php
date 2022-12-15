
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
        // $where = [ 
        //     'id_eksemplar' => $no_eksemplar, 
        //     'id_anggota' => $id_anggota, 
        //     'status_pinjam'=> 'Dipinjam'
        // ];
        
        $this->db->set('status_pinjam', 'Telah Dikembalikan');
        $this->db->where('id_eksemplar', $id_eksemplar);
        $this->db->where('id_anggota', $id_anggota);
        // $this->db->where('status_pinjam', 'Dipinjam');
        // $this->db->where($where);
        $this->db->update('peminjaman');
    }
}
