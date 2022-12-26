<?php
class Login_Pustakawan extends CI_Controller
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
            $this->load->view('v_login_pustakawan');
    }


     //fungsi login pustakawan
     public function attempt_pustakawan_login()
     {
         $email_pustakawan = $this->input->post('email_pustakawan');
         $password_pustakawan = $this->input->post('password_pustakawan');
 
         $this->User_model->attempt_pustakawan($email_pustakawan, $password_pustakawan);
     }

    //fungsi logout dan destroy session
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }

}