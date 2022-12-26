<?php
class Histori_Pustakawan extends CI_Controller
{

    //DEFAULT CONTROLLER
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Peminjaman_model");
        $this->load->library('form_validation');
        $this->load->library('session');

    }

    public function index()
    {
        $data['list_peminjaman'] = $this->Peminjaman_model->join_eksemplar_peminjaman_buku_anggota();
        $this->load->view('v_pustakawan_histori',$data);
    }

    
}