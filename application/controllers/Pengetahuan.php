<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengetahuan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect(base_url('login'));
        }
        $this->load->model('model_pengetahuan');
    }

    public function index()
    {
        $data = array(
            'title' => 'Pengetahuan',
            'user'  => $this->db->get_where('users', ['username' =>  $this->session->userdata('username')])->row_array(),
            'pengetahuan' => $this->model_pengetahuan->read(),
            'kepribadian' => $this->model_pengetahuan->read_kepribadian(),
            'pernyataan' => $this->model_pengetahuan->read_pernyataan(),
            'kondisi' => $this->model_pengetahuan->read_kondisi(),
        );

        $this->load->view('backend/layouts/header', $data);
        $this->load->view('backend/layouts/sidebar');
        $this->load->view('backend/pengetahuan', $data);
        $this->load->view('backend/layouts/footer');
    }

    public function save()
    {
        $data = $this->input->post();

        $this->model_pengetahuan->save($data);

        $this->session->set_flashdata('success', 'Pengetahuan berhasil ditambahkan.');
        redirect(base_url('pengetahuan'));
    }

    public function update()
    {
        $data = $this->input->post();
        $id = $data["id"];

        $this->model_pengetahuan->update($id, $data);

        $this->session->set_flashdata('info', 'Pengetahuan berhasil diperbarui.');
        redirect(base_url('pengetahuan'));
    }

    public function delete()
    {
        $id = $this->input->post('id');

        $this->model_pengetahuan->delete($id);
        $this->session->set_flashdata('success', 'Pengetahuan berhasil dihapus');
        redirect(base_url('pengetahuan'));
    }
}
