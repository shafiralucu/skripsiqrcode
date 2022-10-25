<?php
class User_model extends CI_Model
{

    public function attempt_anggota($email_anggota, $password_anggota)
    {
        $this->db->where('email', $email_anggota);
        $query_anggota = $this->db->get('anggota');

        if ($query_anggota->num_rows() > 0) {
            $hash = $query_anggota->row('password');

            if (password_verify($password_anggota, $hash)) {
                foreach ($query_anggota->result() as $x) {
                    $sess = [
                        'id_anggota'        => $x->id_anggota,
                        'nama'              => $x->nama,
                        'no_telepon'        => $x->no_telepon,
                        'alamat'            => $x->alamat,
                        'email'             => $x->email,
                        'last_login'        => $x->last_login,
                    ];
                }
                $this->session->set_userdata($sess);
                $this->session->set_flashdata('info_login', 'Email atau Password Anggota anda benar!');
                redirect('Home_Anggota');
            } else {
                $this->session->set_flashdata('info', 'Email atau Password Anggota anda salah!');
                redirect('Login');
            }
        } else {
            $this->session->set_flashdata('info', 'Email tidak terdaftar sebagai pengguna!');
            redirect('Login');
        }
    }

    //fungsi login pustakawan
    public function attempt_pustakawan($email_pustakawan, $password_pustakawan)
    {
        $this->db->where('email', $email_pustakawan);
        $query_pustakawan = $this->db->get('pustakawan');

        if ($query_pustakawan->num_rows() > 0) {
            $hash = $query_pustakawan->row('password');

            if (password_verify($password_pustakawan, $hash)) {
                foreach ($query_pustakawan->result() as $y) {
                    $sess = [
                        'id_pustakawan' => $y->id_pustakawan,
                        'nama'          => $y->nama,
                        'no_telepon'    => $y->no_telepon,
                        'alamat'        => $y->alamat,
                        'email'         => $y->email,
                        'last_login'    => $y ->last_login,
                    ];
                }

                $this->session->set_userdata($sess);
                redirect('Home_Pustakawan');
            } else {
                $this->session->set_flashdata('info_login_2', 'Email atau Password anda salah!');
                redirect('Login');
            }
        } else {
            $this->session->set_flashdata('info_salah', 'Email tidak terdaftar sebagai pengguna!');
            redirect('Login');
        }
    }

    //method untuk logout semua sesi
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }

    //method untuk update last login
    public function _updateLastLogin($nama_pustakawan)
    {
        $pustakawan = $this->db->get($this->_table)->row();
        $this->db->set('last_login', date("Y-m-d H:i:s"));
        $this->db->where('id_pustakawan', $pustakawan->id_pustakawan);
        $this->db->update('pustakawan');
    }
}
