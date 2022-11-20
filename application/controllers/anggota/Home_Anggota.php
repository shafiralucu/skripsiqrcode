<?php
class Home_Anggota extends CI_Controller
{

    //DEFAULT CONTROLLER
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('v_anggota_home');
    }

    public function search($keyword)
    {
        if (!$keyword) {
            return null;
        }
        $this->db->like('judul_buku', $keyword);
        $this->db->or_like('content', $keyword);
        $query = $this->db->get($this->_table);
        return $query->result();
    }
}
