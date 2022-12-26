
<?php
class Mengelola_model extends CI_Model
{

    public function add_mengelola($data)
    {
        $this->id_anggota = $data['id_anggota'];
        $this->id_pustakawan = $data['id_pustakawan'];
        $this->db->insert('mengelola_anggota', $this);
    }

    public function get_last_inserted_id()
    {
        $this->db->select('id_anggota');
        $this->db->from('anggota');
        $this->db->order_by('id_anggota', 'desc');
        $this->db->limit(1);
        return $this->db->get()->row()->id_anggota;
    }


  
}