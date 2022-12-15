<?php
class AturBuku_Pustakawan extends CI_Controller
{

    //DEFAULT CONTROLLER
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Buku_model");
        $this->load->model("Eksemplar_model");
        $this->load->library('form_validation');
        $this->load->library('ciqrcode');
        $this->load->library('session');
    }

    public function index()
    {
        $data['list_buku'] = $this->Buku_model->join_buku_eksemplar();
        $this->load->view('v_pustakawan_edit_buku', $data);
    }

    public function add_buku()
    {
        $isbn_buku = $this->input->post('isbn_buku');
        $judul_buku = $this->input->post('judul_buku');
        $nomor_panggil = $this->input->post('nomor_panggil');
        $penerbit = $this->input->post('penerbit');
        $tahun = $this->input->post('tahun');
        $bahasa = $this->input->post('bahasa');
        $status = $this->input->post('status');

        //cek apakah isbn telah tersedia di tabel buku
        $buku_tersedia = $this->Buku_model->get_buku_by_isbn($isbn_buku);

        if (empty($buku_tersedia)) {
            // insert book
            $data['isbn_buku'] = $isbn_buku;
            $data['judul_buku'] = $judul_buku;
            $data['nomor_panggil'] = $nomor_panggil;
            $data['penerbit'] = $penerbit;
            $data['tahun'] = $tahun;
            $data['bahasa'] = $bahasa;

            $this->Buku_model->add_buku($data);
        }

        $no_eks = $this->Eksemplar_model->get_no_eks_to_qr($isbn_buku)->no_eksemplar;


        $data_eksemplar = [];
        if (empty($no_eks)) {
            $data_eksemplar['no_eksemplar'] = 1;
        } else {
            $data_eksemplar['no_eksemplar'] = $no_eks + 1;
        }

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/img/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $concat_no_eks_isbn = $data_eksemplar['no_eksemplar'] . ' ' . $isbn_buku;
        $image_name = $concat_no_eks_isbn . '.png';
        $data_eksemplar['isbn_buku'] = $isbn_buku;
        $data_eksemplar['status'] = $status;

        //buat nama dari qr code sesuai dengan isbn buku
        $params['data'] = $concat_no_eks_isbn; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H = High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); //fungsi untuk generate QR CODE


        $data_eksemplar['qr_code'] = $image_name;


        $this->Eksemplar_model->add_eksemplar($data_eksemplar);

        $this->session->set_flashdata('message', '<div class="alert alert-success">Buku berhasil dimasukkan </div>');
        redirect('/pustakawan/AturBuku_Pustakawan', 'refresh');
       
    }

    public function delete_eksemplar($no_eksemplar)
    {
        if ($this->Eksemplar_model->delete_eksemplar($no_eksemplar)) {
            $this->session->set_flashdata('deleted', '<div class="alert alert-success">Data Buku telah terhapus.</div>');
            redirect('/pustakawan/AturBuku_pustakawan', 'refresh');
        } else {
            $this->session->set_flashdata('deleted', '<div class="alert alert-danger">Gagal menghapus data buku.</div>');
            redirect('pustakawan/AturBuku_pustakawan', 'refresh');
        }
    }


    //fungsi edit buku
    public function edit_buku($id)
    {
        //get id yang mau di edit
        $isbn_buku = $id;

        $nomor_panggil = $this->input->post('nomor_panggil');
        $penerbit = $this->input->post('penerbit');
        $tahun = $this->input->post('tahun');
        $bahasa = $this->input->post('bahasa');
        $qr_code = "";
        $status = "";


        $data = array(
            'ISBN_buku' => $isbn_buku,
            'nomor_panggil' => $nomor_panggil,
            'penerbit' => $penerbit,
            'tahun_terbit' => $tahun,
            'bahasa' => $bahasa
        );


        //jika buku berhasil diedit
        if ($this->Buku_model->edit_buku($isbn_buku, $data)) {
            $this->session->set_flashdata('updated', '<div class="alert alert-success">Data buku telah berhasil di-update.</div>');
            redirect('pustakawan/AturBuku_Pustakawan', 'refresh');
        } else {
            $this->session->set_flashdata('updated', '<div class="alert alert-danger">Gagal mengupdate data buku.</div>');
            redirect('pustakawan/AturBuku_Pustakawan', 'refresh');
        }
    }
}
