<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pernyataan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect(base_url('login'));
        }
        $this->load->model('model_pernyataan');
    }

    public function index()
    {
        $data = array(
            'title' => 'pernyataan',
            'user'  => $this->db->get_where('users', ['username' =>  $this->session->userdata('username')])->row_array(),
            'kode' => $this->model_pernyataan->kode(),
            'pernyataan' => $this->model_pernyataan->read()
        );

        $this->load->view('backend/layouts/header', $data);
        $this->load->view('backend/layouts/sidebar');
        $this->load->view('backend/pernyataan', $data);
        $this->load->view('backend/layouts/footer');
    }

    public function save()
    {
        $data = $this->input->post();
        $name = $data["daftar_pernyataan"];

        $this->model_pernyataan->save($data);

        $this->session->set_flashdata('success', 'Pernyataan <b>' . $name . '</b> berhasil ditambahkan.');
        redirect(base_url('pernyataan'));
    }

    public function update()
    {
        $data = $this->input->post();
        $id = $data["id"];
        $name = $data["daftar_pernyataan"];

        $this->model_pernyataan->update($id, $data);

        $this->session->set_flashdata('info', 'Pernyataan <b>' . $name . '</b> berhasil diperbarui.');
        redirect(base_url('pernyataan'));
    }

    public function delete()
    {
        $id = $this->input->post('id');

        $this->model_pernyataan->delete($id);
        $this->session->set_flashdata('success', 'Pernyataan berhasil dihapus');
        redirect(base_url('pernyataan'));
    }
}
