<?php
class AturBuku_Pustakawan extends CI_Controller
{

    //DEFAULT CONTROLLER
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Anggota_model");
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $data['list_anggota'] = $this->Anggota_model->show_anggota();
        $this->load->view('v_pustakawan_edit_buku', $data);
    }

    public function add_anggota()
    {

        $nama = $this->input->post('nama');
        $password = $this->input->post('password');
        $email = $this->input->post('emailanggota');
        $no_hp = $this->input->post('nohp');
        $alamat = $this->session->userdata('alamat');

        $data['nama'] = $nama;
        $data['password'] = $password;
        $data['email'] = $email;
        $data['no_hp'] = $no_hp;
        $data['alamat'] = $alamat;


        $this->Anggota_model->add_anggota($data);


        $this->session->set_flashdata('message', '<div class="alert alert-success">Data anggota berhasil dimasukkan!</div>');
        $this->load->view('v_pustakawan_edit_anggota', $data);
    }

    public function delete_anggota()
    {

        $nama = $this->input->post('nama');
        $password = $this->input->post('password');
        $email = $this->input->post('emailanggota');
        $no_hp = $this->input->post('nohp');
        $alamat = $this->input->post('alamat');

        $data['nama'] = $nama;
        $data['password'] = $password;
        $data['email'] = $email;
        $data['no_hp'] = $no_hp;
        $data['alamat'] = $alamat;


        $this->Anggota_model->delete_anggota($data);


        $this->session->set_flashdata('message', '<div class="alert alert-success">Mata kuliah berhasil dimasukkan!</div>');
        $this->load->view('v_admin', $data);
    }


    //fungsi edit file penugasan
	public function edit()
	{
		//get id yang mau di edit
		$id = $this->input->post('id_anggota');

		$nama = $this->input->post('nama');
        $password = $this->input->post('password');
        $email = $this->input->post('emailanggota');
        $no_hp = $this->input->post('nohp');
        $alamat = $this->input->post('alamat');


		$data = array(
			'id' => $id,
			'nama' => $nama,
			'password' => $password,
			'email' => $email,
			'no_hp' => $no_hp,
			'alamat' => $alamat
		);


		//jika anggota berhasil diedit
		if ($this->Anggota_model->edit_anggota($id, $data)) {
			$this->session->set_flashdata('updated', '<div class="alert alert-success">Data anggota telah berhasil di-update.</div>');
            redirect('pustakawan/AturAnggota_Pustakawan', 'refresh');
		} else {
			$this->session->set_flashdata('updated', '<div class="alert alert-danger">Gagal mengupdate data anggota.</div>');
            redirect('pustakawan/AturAnggota_Pustakawan', 'refresh');
		}
	}
}
