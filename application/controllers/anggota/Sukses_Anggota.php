<?php
class Sukses_Anggota extends CI_Controller
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
        $id_anggota         = $this->session->userdata['data_buku_dipinjam']['id_anggota_pinjam'];
        $id_eksemplar         = $this->session->userdata['data_buku_dipinjam']['id_eksemplar'];
        $tanggal_peminjaman         = $this->session->userdata['data_buku_dipinjam']['tanggal_peminjaman'];

        $data['detail_peminjaman_buku'] = $this->Peminjaman_model->get_detail_buku($id_eksemplar, $id_anggota, $tanggal_peminjaman);
        $this->load->view('v_anggota_status_peminjaman_sukses',$data);
    }

}
