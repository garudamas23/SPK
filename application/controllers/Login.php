<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_users');
    }

    function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Kata Sandi', 'required|trim');
        $this->form_validation->set_message('required', 'Kolom {field} harus diisi!');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/login');
        } else {
            // validasi login sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post();
        $password = $this->input->post('password');

        $this->db->where('email', $username['username'])->or_where('username', $username['username']);
        $user = $this->db->get('users')->row_array();

        //JIka usernya ada
        if ($user) {
            //Jika usernya statusnya aktif
            if ($user['status'] == 'Aktif') {
                //CEK PASSWORD
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'level' => $user['level']
                    ];

                    //MENYIMPAN DATA SESSION
                    $this->session->set_userdata($data);

                    // Memanggil Halaman sesuai dengan role atau level usernya
                    $this->session->set_flashdata('success', 'Selamat Datang, <b>' . $user['nama_lengkap'] . '</b>');
                    redirect(base_url('dashboard'));
                } else {
                    // Alert untuk Jika memasukan password salah atau kurang
                    $this->session->set_flashdata('message', '<div class="alert alert-danger"
                    role="alert">Password salah!</div>');
                    redirect(base_url('login'));
                }
            } else {
                // Alert untuk Jika username yg dimasukan status username tidak aktif
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun ini belum diaktifkan!</div>');
                redirect(base_url('login'));
            }
        } else {
            // jika user tidak ada di database
            $this->session->set_flashdata('message', '<div class="alert alert-danger"
            role="alert">Akun ini belum terdaftar!</div>');
            redirect(base_url('login'));
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('nama_lengkap', 'Nama', 'trim|required|is_unique[users.nama_lengkap]');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_message('is_unique', '{field} sudah terdaftar!');
        $this->form_validation->set_message('required', 'Kolom {field} harus diisi!');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger"
            role="alert">Gagal. Akun pernah terdaftar sebelumnya</div>');
            redirect(base_url('login#signup'));
        } else {
            $username = str_replace(' ', '', $this->input->post('nama_lengkap'));
            $data = array(
                'username' => $username,
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'foto' => 'default.png',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),

            );

            $this->model_users->save($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success"
            role="alert">Selamat akun berhasil dibuat</div>');
            redirect(base_url('login'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success"
        role="alert">Anda telah berhasil keluar!</div>');
        redirect(base_url());
    }
}
