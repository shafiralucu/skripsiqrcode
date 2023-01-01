<?php
class AturAnggota_Pustakawan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Anggota_model");
        $this->load->model("Mengelola_model");

        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $data['list_anggota'] = $this->Anggota_model->show_anggota();
        $this->load->view('v_pustakawan_edit_anggota', $data);
    }

    public function add_anggota()
    {
        $nama = $this->input->post('nama');
        $password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
        $email = $this->input->post('emailanggota');
        $alamat = $this->input->post('alamat');
        $no_telepon = $this->input->post('no_telepon');
        // $last_login = $this->input->post('last_login');
 
        $data['nama'] = $nama;
        $data['password'] = $password;
        $data['email'] = $email;
        $data['no_telepon'] = $no_telepon;
        $data['alamat'] = $alamat;
        // $data['last_login'] = $last_login;


        $this->Anggota_model->add_anggota($data);

        $data_mengelola['id_pustakawan'] = $this->session->userdata('id_pustakawan');
        $data_mengelola['id_anggota'] = $this->Mengelola_model->get_last_inserted_id();

        $this->Mengelola_model->add_mengelola($data_mengelola);

        
        $data['list_anggota'] = $this->Anggota_model->show_anggota();
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data anggota berhasil dimasukkan!</div>');
        redirect('pustakawan/AturAnggota_pustakawan', 'refresh');
    }

    public function delete_anggota($id)
    {
        if ($this->Anggota_model->delete_anggota($id)) {
			$this->session->set_flashdata('deleted', '<div class="alert alert-success">Data anggota telah terhapus.</div>');
            redirect('pustakawan/AturAnggota_pustakawan', 'refresh');
		} else {
			$this->session->set_flashdata('deleted', '<div class="alert alert-danger">Gagal menghapus data anggota.</div>');
            redirect('pustakawan/AturAnggota_pustakawan', 'refresh');
		}
    }


	public function edit_anggota($id)
	{
        $id_edit = $id;
        
		$nama = $this->input->post('nama');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $email = $this->input->post('emailanggota');
        $no_hp = $this->input->post('nohp');
        $alamat = $this->input->post('alamat');


		$data = array(
			'nama' => $nama,
			'password' => $password,
			'email' => $email,
			'no_telepon' => $no_hp,
			'alamat' => $alamat
		);

		if ($this->Anggota_model->edit_anggota($id_edit, $data)) {
			$this->session->set_flashdata('updated', '<div class="alert alert-success">Data anggota telah berhasil di-update.</div>');
            redirect('pustakawan/AturAnggota_Pustakawan', 'refresh');
		} else {
			$this->session->set_flashdata('updated', '<div class="alert alert-danger">Gagal mengupdate data anggota.</div>');
            redirect('pustakawan/AturAnggota_Pustakawan', 'refresh');
		}
	}
}
