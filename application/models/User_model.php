<?php
class User_model extends CI_Model
{

    //method untuk update last login
    public function _updateLastLogin()
    {
        $pustakawan = $this->db->get($this->_table)->row();
        $this->db->set('last_login', date("Y-m-d H:i:s"));
        $this->db->where('id_pustakawan', $pustakawan->id_pustakawan);
        $this->db->update('pustakawan');
    }

    public function attempt_anggota($email_anggota, $password_anggota)
    {
        $this->db->where('email', $email_anggota);
        $query = $this->db->get('anggota');

        if ($query->num_rows() > 0) {
            $hash = $query->row('password');

            if (password_verify($password_anggota, $hash)) {
                foreach ($query->result() as $x) {
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
                redirect('anggota/Home_Anggota');
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
        $query2 = $this->db->get('pustakawan');

        if ($query2->num_rows() > 0) {
            $hash = $query2->row('password');

            if (password_verify($password_pustakawan, $hash)) {
                foreach ($query2->result() as $y) {
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
                redirect('pustakawan/Home_Pustakawan');
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

    
}
