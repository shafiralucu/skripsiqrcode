<?php
class StatusPinjam_Anggota extends CI_Controller
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
        $this->load->view('v_anggota_peminjaman');
    }

    public function scan()
    {
        $hasil_qr_code = $this->input->post('id');
        $result = explode(" ", $hasil_qr_code);
        $no_eksemplar = $result[0];
        $isbn_buku = $result[1];

        if ($this->Eksemplar_model->update_status_eksemplar_pinjam($no_eksemplar, $isbn_buku)) {
            
            $data = [];
            $data['status_pinjam'] = "Dipinjam";

            date_default_timezone_set('Asia/Jakarta');
            $now = new \Datetime('now');
            $date_peminjaman = (array) new \DateTime('now');
            $data['date_peminjaman'] = substr($date_peminjaman['date'],0,10);

            $date_pengembalian = (array) date_add($now, date_interval_create_from_date_string("3 days"));
            $data['id_anggota'] = $this->session->userdata('id_anggota');
            $data['date_pengembalian'] = substr($date_pengembalian['date'],0,10);
            $data['id_eksemplar'] = $this->Eksemplar_model->get_id_from_eks_isbn($no_eksemplar, $isbn_buku)->id;
            
            $this->Peminjaman_model->add_peminjaman($data);

            //simpan di session untuk dilempar ke halaman sukses
            $data_buku_dipinjam = array(
                'id_anggota_pinjam' => $this->session->userdata('id_anggota'),
                'id_eksemplar' => $this->Eksemplar_model->get_id_from_eks_isbn($no_eksemplar, $isbn_buku)->id,
                'tanggal_peminjaman' => substr($date_peminjaman['date'],0,10)

            );
            $this->session->set_userdata('data_buku_dipinjam', $data_buku_dipinjam); 
            echo 'true';
        } else {
            echo 'false';
        }
    }
}
