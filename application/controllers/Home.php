<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    function index()
    {
        $data = array(
            'title' => 'Pemilihan Karir Siswa Berdasarkan Kepribadian',
        );

        $this->load->view('frontend/layout/header', $data);
        $this->load->view('frontend/home', $data);
        $this->load->view('frontend/layout/footer');
    }

    function register()
    {
        $data = array(
            'title' => 'Registrasi - Pemilihan Karir Siswa Berdasarkan Kepribadian',
        );

        $this->load->view('frontend/layout/header', $data);
        $this->load->view('frontend/register', $data);
        $this->load->view('frontend/layout/footer');
    }

    function konsultasi()
    {
        $data = array(
            'title' => 'Konsultasi - Pemilihan Karir Siswa Berdasarkan Kepribadian',
        );

        $this->load->view('frontend/layout/header', $data);
        $this->load->view('frontend/konsultasi', $data);
        $this->load->view('frontend/layout/footer');
    }
}
