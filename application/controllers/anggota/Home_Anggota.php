<?php
class Home_Anggota extends CI_Controller
{

    //DEFAULT CONTROLLER
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Search_model");
        $this->load->model("Peminjaman_model");
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $keyword = $this->input->get('keyword');
        $id = $this->session->userdata('id_anggota');
        $list_peminjaman_anggota =  $this->Peminjaman_model->anggota_pinjam($id);
		$data = $this->Search_model->search($keyword);
		$data = array(
			'keyword'	=> $keyword,
			'data'		=> $data,
            'list_peminjaman_anggota' => $list_peminjaman_anggota
		);
		$this->load->view('v_anggota_home',$data);
    }

   
}
