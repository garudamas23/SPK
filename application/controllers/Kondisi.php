<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kondisi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect(base_url('login'));
        }
        $this->load->model('model_kondisi');
    }

    public function index()
    {
        $data = array(
            'title' => 'Kondisi',
            'user'  => $this->db->get_where('users', ['username' =>  $this->session->userdata('username')])->row_array(),
            'kondisi' => $this->model_kondisi->read()
        );

        $this->load->view('backend/layouts/header', $data);
        $this->load->view('backend/layouts/sidebar');
        $this->load->view('backend/kondisi', $data);
        $this->load->view('backend/layouts/footer');
    }

    public function save()
    {
        $data = $this->input->post();
        $name = $data["kondisi"];

        $this->model_kondisi->save($data);

        $this->session->set_flashdata('success', 'Kondisi User <b>' . $name . '</b> berhasil ditambahkan.');
        redirect(base_url('kondisi'));
    }

    public function update()
    {
        $data = $this->input->post();
        $id = $data["id"];
        $name = $data["kondisi"];

        $this->model_kondisi->update($id, $data);

        $this->session->set_flashdata('info', 'Kondisi User <b>' . $name . '</b> berhasil diperbarui.');
        redirect(base_url('kondisi'));
    }

    public function delete()
    {
        $id = $this->input->post('id');

        $this->model_kondisi->delete($id);
        $this->session->set_flashdata('success', 'Kondisi User berhasil dihapus');
        redirect(base_url('kondisi'));
    }
}
