
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

    public function get_no_eks_to_qr($ISBN_buku)
    {
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

    public function update_status_eksemplar_pinjam($no_eksemplar, $ISBN_buku)
    {
        if ($this->get_status_buku($no_eksemplar, $ISBN_buku) == 'Tersedia') {
            $this->db->set('status', 'Tidak Tersedia');
            $this->db->where('no_eksemplar', $no_eksemplar);
            $this->db->where('ISBN_buku', $ISBN_buku);
            $this->db->update('eksemplar');
            return true;
        } else {
            return false;
        }
       
    }

    public function update_status_eksemplar_kembalikan($no_eksemplar, $ISBN_buku)
    {
        if ($this->get_status_buku($no_eksemplar, $ISBN_buku) == 'Tidak Tersedia') {
            $this->db->set('status', 'Tersedia');
            $this->db->where('no_eksemplar', $no_eksemplar);
            $this->db->where('ISBN_buku', $ISBN_buku);
            $this->db->update('eksemplar');
            return true;
        } else {
            return false;
        }
       
    }

    public function get_id_from_eks_isbn($no_eksemplar, $ISBN_buku)
    {
        $this->db->select('id');
        $this->db->from('eksemplar');
        $this->db->where('no_eksemplar', $no_eksemplar);
        $this->db->where('ISBN_buku', $ISBN_buku);
        return $this->db->get()->row();
    }

    public function get_status_buku($no_eksemplar, $ISBN_buku)
    {
        $this->db->select('status');
        $this->db->from('eksemplar');
        $this->db->where('no_eksemplar', $no_eksemplar);
        $this->db->where('ISBN_buku', $ISBN_buku);
        return $this->db->get()->row()->status;
    }
}
