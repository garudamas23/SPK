<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepribadian extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect(base_url('login'));
        }
        $this->load->library('upload');
        $this->load->helper('text');
        $this->load->model('model_kepribadian');
    }

    public function index()
    {
        $data = array(
            'title' => 'kepribadian',
            'user'  => $this->db->get_where('users', ['username' =>  $this->session->userdata('username')])->row_array(),
            'kode' => $this->model_kepribadian->kode(),
            'kepribadian' => $this->model_kepribadian->read()
        );

        $this->load->view('backend/layouts/header', $data);
        $this->load->view('backend/layouts/sidebar');
        $this->load->view('backend/kepribadian', $data);
        $this->load->view('backend/layouts/footer');
    }

    public function save()
    {
        $data = $this->input->post();
        $name = $data["daftar_kepribadian"];

        $this->model_kepribadian->save($data);

        $this->session->set_flashdata('success', 'Kepribadian <b>' . $name . '</b> berhasil ditambahkan. Harap tambahkan konten terkait kepribadian <b>' . $name . '</b>');
        //redirect(base_url('kepribadian'));
        redirect(base_url('konten'));
    }

    public function update()
    {
        $data = $this->input->post();
        $id = $data["id"];
        $name = $data["daftar_kepribadian"];

        $this->model_kepribadian->update($id, $data);

        $this->session->set_flashdata('info', 'Kepribadian <b>' . $name . '</b> berhasil diperbarui.');
        redirect(base_url('kepribadian'));
    }

    public function delete()
    {
        $id = $this->input->post('id');

        $this->model_kepribadian->delete($id);
        $this->session->set_flashdata('success', 'Kepribadian berhasil dihapus');
        redirect(base_url('kepribadian'));
    }
}
