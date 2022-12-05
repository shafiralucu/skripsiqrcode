<?php
class Home_Anggota extends CI_Controller
{

    //DEFAULT CONTROLLER
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Search_model");
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $keyword = $this->input->get('keyword');
		$data = $this->Search_model->search($keyword);
		$data = array(
			'keyword'	=> $keyword,
			'data'		=> $data
		);
		$this->load->view('v_anggota_home',$data);
    }

   
}
