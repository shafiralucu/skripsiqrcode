
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
        // $this->last_login = $data['last_login'];
        $this->db->insert('anggota', $this);
    }


    //fungsi delete anggota
    public function delete_anggota($id){
		return $this->db->delete('anggota', array('id_anggota' => $id));
	}

    //fungsi untuk mengambil data anggota perpustakaan baru untuk show anggota
    public function show_anggota()
    {
        $this->db->select('*');
        $this->db->from('anggota');
        $query = $this->db->get();
        return $query->result();
    }

    //fungsi untuk edit anggota perpustakaan
    public function edit_anggota($id_edit, $data){
		return $this->db->where('id_anggota', $id_edit)->update('anggota',$data);
	}
}
