
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


    //fungsi delete anggota
    public function delete_anggota($nama)
    {
        $this->db->where('nama', $nama);
        return $this->db->delete('anggota');
    }

    //fungsi edit anggota
//     public function update_anggota($hari, $waktu_mulai, $tahun_ajar, $genap_ganjil, $ruang_kelas, $data)
//     {
//         //kondisi where
//         $this->db->where('hari', $hari);
//         $this->db->where('waktu_mulai', $waktu_mulai);
//         $this->db->where('tahun_ajar', $tahun_ajar);
//         $this->db->where('genap_ganjil', $genap_ganjil);
//         $this->db->where('ruang_kelas', $ruang_kelas);

//         //row yang ingin diupdate
//         $this->hari = $data['hari'];
//         $this->durasi = $data['durasi'];
//         $this->ruang_kelas = $data['ruang_kelas'];
//         $this->waktu_mulai = $data['waktu_mulai'];
//         $this->jenis_kelas = $data['jenis_kelas'];
//         $this->kode_kelas = $data['kode_kelas'];
//         $this->tahun_ajar = $data['tahun_ajar'];
//         $this->genap_ganjil = $data['genap_ganjil'];
//         $this->kode_mk = $data['kode_mk'];
//         $this->nik = $data['nik'];
//         $this->db->update('relasi_mengajar', $data);
//     }
// }
}