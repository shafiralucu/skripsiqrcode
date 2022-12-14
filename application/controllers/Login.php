<?php
class Login extends CI_Controller
{

    //DEFAULT CONTROLLER
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model")  ;
        $this->load->library('form_validation');
        $this->load->library('session');

    }

    public function index()
    {
            $this->load->view('v_login');
    }

    //fungsi login anggota
    public function attempt_anggota_login()
    {
        $email_anggota = $this->input->post('email_anggota');
        $password_anggota = $this->input->post('password_anggota');

        $this->User_model->attempt_anggota($email_anggota, $password_anggota);
    }


    //fungsi logout dan destroy session
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }

}