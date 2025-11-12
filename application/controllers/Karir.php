<?php
defined('BASEPATH') or exit('No direct script access allowed');

class karir extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect(base_url('login'));
        }
        $this->load->helper('text');
        $this->load->model('model_karir');
    }

    public function index()
    {
        $data = array(
            'title' => 'karir',
            'user'  => $this->db->get_where('users', ['username' =>  $this->session->userdata('username')])->row_array(),
            'kode' => $this->model_karir->kode(),
            'karir' => $this->model_karir->read(),
            'kepribadian' => $this->model_karir->read_kepribadian(),
        );

        $this->load->view('backend/layouts/header', $data);
        $this->load->view('backend/layouts/sidebar');
        $this->load->view('backend/karir', $data);
        $this->load->view('backend/layouts/footer');
    }

    public function save()
    {
        $data = $this->input->post();
        $this->model_karir->save($data);

        $this->session->set_flashdata('success', 'karir berhasil ditambahkan.');
        redirect(base_url('karir'));
    }

    public function update()
    {
        $data = $this->input->post();
        $id = $data["id"];

        $this->model_karir->update($id, $data);

        $this->session->set_flashdata('info', 'karir berhasil diperbarui.');
        redirect(base_url('karir'));
    }

    public function delete()
    {
        $id = $this->input->post('id');

        $this->model_karir->delete($id);
        $this->session->set_flashdata('success', 'karir berhasil dihapus');
        redirect(base_url('karir'));
    }
}
