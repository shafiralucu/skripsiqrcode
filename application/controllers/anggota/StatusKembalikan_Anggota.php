<?php
class StatusKembalikan_Anggota extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Buku_model");
        $this->load->model("Eksemplar_model");
        $this->load->model("Peminjaman_model");
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('v_anggota_status_pengembalian');
    }

    public function scan()
    {
        $hasil_qr_code = $this->input->post('id');
        $result = explode(" ", $hasil_qr_code);
        $no_eksemplar = $result[0];
        $isbn_buku = $result[1];
        $id_anggota = $this->session->userdata('id_anggota');
        $id_eksemplar = $this->Eksemplar_model->get_id_from_eks_isbn($no_eksemplar, $isbn_buku)->id;


        if ($this->Eksemplar_model->update_status_eksemplar_kembalikan($no_eksemplar, $isbn_buku)) {
            $this->Peminjaman_model->update_pengembalian($id_eksemplar, $id_anggota);
            echo 'true';
        } else {
            echo 'false';
        }

        
    }
}
