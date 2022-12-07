
<?php
class Eksemplar_model extends CI_Model
{

    public function add_eksemplar($data_eksemplar)
    {
        $this->isbn_buku = $data_eksemplar['isbn_buku'];
        $this->no_eksemplar = $data_eksemplar['no_eksemplar'];
        $this->qr_code = $data_eksemplar['qr_code'];
        $this->status = $data_eksemplar['status'];
        $this->db->insert('eksemplar', $this);
    }

    public function get_no_eks_to_qr($ISBN_buku) {
        $this->db->select('no_eksemplar');
        $this->db->from('eksemplar');
        $this->db->where('ISBN_buku', $ISBN_buku);
        $this->db->order_by('no_eksemplar', 'desc');
        $this->db->limit(1);  
        return $this->db->get()->row();
    }

    public function delete_eksemplar($no_eksemplar)
    {
        return $this->db->delete('eksemplar', array('no_eksemplar' => $no_eksemplar));
    }

}
