
<?php
//kelas model untuk Pustakawan, fungsi2 untuk CRUD anggota perpustakaan
class Anggota_model extends CI_Model
{

    //fungsi untuk menambahkan anggota perpustakaan baru
    public function add_anggota($data)
    {
        $this->nama = $data['nama'];
        $this->password = $data['password'];
        $this->email = $data['email'];
        $this->alamat = $data['alamat'];
        $this->no_telepon = $data['no_telepon'];
        $this->db->insert('anggota', $this);
    }


    //fungsi untuk menampilkan jadwal
    //parameter hari, ruang, tahun ajar, waktu mulai
    //pemanggilan SP show_jadwal()
    public function show_jadwal_m($ruang, $input_waktu_mulai, $input_waktu_selesai, $hari, $tahunajar, $ganjilgenap)
    {
        $query = $this->db->query("call show_jadwal('" . $ruang . "','" . $input_waktu_mulai . "','" . $input_waktu_selesai . "','" . $hari . "','" . $tahunajar . "','" . $ganjilgenap . "')");
        return $query->result();
    }


    //fungsi untuk cek file penugasan di tahun ajar dan ganjil genap tertentu sudah tersedia atau belum
    public function data_penugasan($input_tahun_ajar_fp, $input_gg_fp)
    {
        $this->db->select('*');
        $this->db->from('file_penugasan');
        $this->db->where('tahun_ajar', $input_tahun_ajar_fp);
        $this->db->where('genap_ganjil', $input_gg_fp);
        $query = $this->db->get();
        return $query->num_rows();;
    }


    //fungsi untuk autocomplete pada field jquery
    public function cari_judul($kode)
    {
        $this->db->like('title', $kode);
        $query = $this->db->get('berita');
        return $query->result();
    }

    //fungsi delete relasi mengajar
    public function delete_relasi_mengajar($hari, $waktu_mulai, $tahun_ajar, $genap_ganjil, $ruang_kelas)
    {
        $this->db->where('hari', $hari);
        $this->db->where('waktu_mulai', $waktu_mulai);
        $this->db->where('tahun_ajar', $tahun_ajar);
        $this->db->where('genap_ganjil', $genap_ganjil);
        $this->db->where('ruang_kelas', $ruang_kelas);
        return $this->db->delete('relasi_mengajar');
    }

    //fungsi edit relasi mengajar
    public function edit_relasi_mengajar($hari, $waktu_mulai, $tahun_ajar, $genap_ganjil, $ruang_kelas, $data)
    {
        //kondisi where
        $this->db->where('hari', $hari);
        $this->db->where('waktu_mulai', $waktu_mulai);
        $this->db->where('tahun_ajar', $tahun_ajar);
        $this->db->where('genap_ganjil', $genap_ganjil);
        $this->db->where('ruang_kelas', $ruang_kelas);

        //row yang ingin diupdate
        $this->hari = $data['hari'];
        $this->durasi = $data['durasi'];
        $this->ruang_kelas = $data['ruang_kelas'];
        $this->waktu_mulai = $data['waktu_mulai'];
        $this->jenis_kelas = $data['jenis_kelas'];
        $this->kode_kelas = $data['kode_kelas'];
        $this->tahun_ajar = $data['tahun_ajar'];
        $this->genap_ganjil = $data['genap_ganjil'];
        $this->kode_mk = $data['kode_mk'];
        $this->nik = $data['nik'];
        $this->db->update('relasi_mengajar', $data);
    }
}
