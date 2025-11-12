<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect(base_url('login'));
        }
        $this->load->model('model_diagnosa');
    }

    public function index()
    {
        $data = array(
            'title' => 'Diagnosa',
            'user'  => $this->db->get_where('users', ['username' =>  $this->session->userdata('username')])->row_array(),
            'pernyataan' => $this->model_diagnosa->read_pernyataan(),
            'kondisi' => $this->model_diagnosa->read_kondisi(),
            'karir' => $this->model_diagnosa->read_karir()
        );

        $this->load->view('backend/layouts/header', $data);
        $this->load->view('backend/layouts/sidebar');
        $this->load->view('backend/diagnosa/diagnosa', $data);
        $this->load->view('backend/layouts/footer');
    }

    public function cetak()
    {
        $this->load->model('model_diagnosa');
        $data['diagnosa_result'] = $this->model_diagnosa->get_diagnosa($this->input->get('id'));
        $this->load->view('backend/diagnosa/diagnosa_result', $data);
    }

    public function diagnosa()
    {
        $filteredArray = $this->input->post('kondisi');
        $kondisi = array_filter($filteredArray, function ($value) {
            return $value !== null;
        });

        $kode_pernyataan = [];
        $cf_user = [];

        foreach ($kondisi as $key => $val) {
            if ($val != "#") {
                array_push($kode_pernyataan, $key);
                array_push($cf_user, $val);
            }
        }

        $data = array();
        $user = $this->db->get_where('users', ['username' =>  $this->session->userdata('username')])->row_array();
        $id_user = $user['id'];
        $random = random_string('alnum', 10);
        for ($i = 0; $i < count($kode_pernyataan); $i++) {
            $data[] = array(
                'id_user' => $id_user,
                'diagnosa_id' => $random,
                'kode_pernyataan' => $kode_pernyataan[$i],
                'cf_user' => $cf_user[$i],
            );
        }

        $this->model_diagnosa->save($data);
        redirect(base_url('diagnosa/diagnosa-result/' . $random));
    }

    public function diagnosa_result()
    {
        $diagnosa_id = $this->uri->segment(3);

        if ($diagnosa_id != null) {
            //$js = array('js' => "<script src='" . base_url() . "assets/backend/js/diagnosa_result.js'></script>");
            $data = array(
                'title' => 'Hasil Diagnosa',
                'user'  => $this->db->get_where('users', ['username' =>  $this->session->userdata('username')])->row_array(),
                'user_diagnosa' => $this->model_diagnosa->get_userdiagnosa($diagnosa_id),
                'diagnosa' => $this->model_diagnosa->get_diagnosa($diagnosa_id),
                'diagnosa_user' => $this->model_diagnosa->get_diagnosa_user($diagnosa_id),
            );

            $this->load->view('backend/layouts/header', $data);
            $this->load->view('backend/layouts/sidebar');
            $this->load->view('backend/diagnosa/diagnosa_result', $data);
        $this->load->view('backend/layouts/footer', /**$js**/);
        } else {
            redirect(base_url('diagnosa'));
        }
    }

    public function hasil_diagnosa()
    {
        $user = $this->db->get_where('users', ['username' =>  $this->session->userdata('username')])->row_array();
        $level = $user["level"];
        $id_user = $user["id"];
        $data = array(
            'title' => 'Hasil Diagnosa',
            'user'  => $user,
            'diagnosa' => $this->model_diagnosa->read($level, $id_user),
        );

        $this->load->view('backend/layouts/header', $data);
        $this->load->view('backend/layouts/sidebar');
        $this->load->view('backend/diagnosa/hasil_diagnosa', $data);
        $this->load->view('backend/layouts/footer');
    }

    public function konten(){
		$param = $this->input->post('param');
		$ret['konten'] = $this->model_diagnosa->get_konten($param);
        $ret['karir'] = $this->model_diagnosa->get_karir($param);
        echo json_encode($ret);
	}
}
