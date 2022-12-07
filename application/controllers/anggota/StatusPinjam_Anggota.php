<?php
class StatusPinjam_Anggota extends CI_Controller
{

    //DEFAULT CONTROLLER
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Buku_model");
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('v_anggota_status_peminjaman');
    }

    //satu function untuk nerima data dari js
    //rute baru
    public function scan()
    {
        $hasil_qr_code = $this->input->post('id');
        $result = explode(" ", $hasil_qr_code);
        $no_eksemplar = $result[0];
        $isbn_buku = $result[1];

        // echo $this->input->post('id');
        // echo $this->input->post($no_eksemplar);
        // echo $this->input->post($isbn_buku);
        // //kayak return
        // $this->output->set_output(json_encode($this->input->post('id')));
        // $this->output->set_output(json_encode($no_eksemplar));
        // $this->output->set_output(json_encode($isbn_buku));
        //split 2 variable, jadi isbn buku dan nomor eksemplar
        //lempar isbn dan nomor eksemplar ke model
        // $this->Scan_model->update_status_buku_pinjam($hasil_qr_code);
        //redirect

        

        if ($this->Buku_model->update_status_buku_pinjam($no_eksemplar, $isbn_buku)) {
            //tambah ditabel peminjaman
            $this->load->view('v_anggota_status_peminjaman_sukses');
        } else {
            $this->session->set_flashdata('updated', '<div class="alert alert-danger">Gagal melakukan proses peminjaman buku.</div>');
            redirect('pustakawan/AturAnggota_Pustakawan', 'refresh');
        }
    }
}
