<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        // Fungsi untuk menghindari user melakukan akses ke halaman admin
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect(base_url('login'));
        }
        $this->load->model('model_dashboard');
    }

    function index()
    {
        $user = $this->db->get_where('users', ['username' =>  $this->session->userdata('username')])->row_array();
        $level = $user["level"];
        $id_user = $user["id"];
        $data = array(
            'title' => 'Dashboard',
            'user'  => $user,
            'hasil_diagnosa' => $this->model_dashboard->hasil_diagnosa($level, $id_user),
            'pengetahuan' => $this->model_dashboard->pengetahuan(),
            'kepribadian' => $this->model_dashboard->kepribadian(),
            'pernyataan' => $this->model_dashboard->pernyataan(),
            'karir' => $this->model_dashboard->karir(),
            'kondisi' => $this->model_dashboard->kondisi(),
        );

        $this->load->view('backend/layouts/header', $data);
        $this->load->view('backend/layouts/sidebar');
        $this->load->view('backend/dashboard', $data);
        $this->load->view('backend/layouts/footer');
    }
}
