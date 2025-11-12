<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect(base_url('login'));
        }
        $this->load->library('upload');
        $this->load->model('model_users');
    }

    public function index()
    {
        $data = array(
            'title' => 'Users',
            'user'  => $this->db->get_where('users', ['username' =>  $this->session->userdata('username')])->row_array(),
            'users' => $this->model_users->read()
        );

        $this->load->view('backend/layouts/header', $data);
        $this->load->view('backend/layouts/sidebar');
        $this->load->view('backend/users', $data);
        $this->load->view('backend/layouts/footer');
    }

    public function save()
    {
        if ($_FILES['foto']['size'] > 0) {
            $data = $this->input->post();
            $data['password'] = password_hash($data["password"], PASSWORD_DEFAULT);

            $data['foto'] = $this->do_upload("foto");
            $fullname = $data["nama_lengkap"];
            $this->model_users->save($data);

            $this->session->set_flashdata('success', 'Users <b>' . $fullname . '</b> berhasil ditambahkan.');
            redirect(base_url('users'));
        } else {
            $this->session->set_flashdata('error', 'Users gagal ditambahkan. Pastikan mengunggah foto Users');
            redirect(base_url('users'));
        }
    }

    public function update()
    {
        $user = $this->db->get_where('users', ['username' =>  $this->session->userdata('username')])->row_array();
        if ($_FILES['foto']['size'] > 0) {
            $data = $this->input->post();
            $id = $data["id"];
            $data['foto'] = $this->do_upload("foto");
            $fullname = $data["nama_lengkap"];

            $file = $data["file_name"];
            unlink("./assets/uploads/users/" . $file);

            unset($data["file_name"]);
            $this->model_users->update($id, $data);

            $this->session->set_flashdata('info', 'Users <b>' . $fullname . '</b> berhasil diperbarui.');

            if ($user["level"] == "Administrator") {
                redirect(base_url('users'));
            } else {
                redirect(base_url('dashboard'));
            }
        } else {
            $data = $this->input->post();
            $id = $data["id"];
            $fullname = $data["nama_lengkap"];

            unset($data["file_name"]);
            $this->model_users->update($id, $data);

            $this->session->set_flashdata('info', 'Users <b>' . $fullname . '</b> berhasil diperbarui.');
            if ($user["level"] == "Administrator") {
                redirect(base_url('users'));
            } else {
                redirect(base_url('dashboard'));
            }
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $filename = $this->input->post('filename');
        $path  = './assets/uploads/users/' . $filename;
        unlink($path);

        $this->model_users->delete($id);
        $this->session->set_flashdata('success', 'Users berhasil dihapus');
        redirect(base_url('users'));
    }

    private function do_upload($name)
    {
        $config['upload_path']      = './assets/uploads/users/';
        $config['allowed_types']   = 'jpg|png|jpeg';
        $config['remove_spaces']   = TRUE;
        $config['encrypt_name'] = TRUE;
        $this->upload->initialize($config);
        if ($this->upload->do_upload($name)) {
            $data = array('upload_data' => $this->upload->data());
            $file = $data['upload_data']['file_name'];

            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/uploads/users/' . $file;
            $config['new_image'] = './assets/uploads/users/' . $file;
            $config['quality'] = '90%';
            $config['width'] = 225;
            $config['height'] = 225;
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            return $file;
        } else {
            $this->session->set_flashdata('warning', 'Foto Users gagal diupload. Pastikan foto berformat png,jpg atau jpeg.');
            redirect(base_url('users'));
        }
    }

    public function change_password()
    {
        $data = array(
            'user'  => $this->db->get_where('users', ['username' =>  $this->session->userdata('username')])->row_array(),
        );

        $password_lama = strip_tags(htmlspecialchars($this->input->post('password_lama', true), ENT_QUOTES));
        $password_baru1 = strip_tags(htmlspecialchars($this->input->post('password1', true), ENT_QUOTES));
        $password_baru2 = strip_tags(htmlspecialchars($this->input->post('password2', true), ENT_QUOTES));

        if (!password_verify($password_lama, $data['user']['password'])) {
            $this->session->set_flashdata('error', 'Password Sekarang salah!');
            redirect(base_url('dashboard'));
        } else {
            if ($password_baru1 != $password_baru2) {
                $this->session->set_flashdata('error', 'Password Baru tidak sama!');
                redirect(base_url('dashboard'));
            } else {
                $password_hash = password_hash($password_baru1, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('username', $this->session->userdata('username'));
                $this->db->update('users');

                $this->session->set_flashdata('message', '<div class="alert alert-success"
                    role="alert">Password Anda berhasil diperbarui. Silahkan Login kembali</div>');
                redirect(base_url('login'));
            }
        }
    }
}
