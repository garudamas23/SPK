<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class model_diagnosa extends CI_Model
{

    var $table = 'diagnosa';

    public function read($level, $id_user)
    {
        $this->db->from('diagnosa as a');
        $this->db->join('users as b', 'a.id_user=b.id', 'left');
        if ($level == "Administrator") {
        } else {
            $this->db->where('b.id', $id_user);
        }
        $this->db->group_by('diagnosa_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function read_pernyataan()
    {
        $query = $this->db->query('select * from pernyataan');
        return $query->result_array();
    }

    public function read_kondisi()
    {
        $query = $this->db->query('select * from kondisi');
        return $query->result_array();
    }

    public function read_kepribadian()
    {
        $query = $this->db->query('select * from kepribadian');
        return $query->result_array();
    }

    public function read_karir()
    {
        $query = $this->db->query('select * from karir');
        return $query->result_array();
    }

    public function get_kepribadian()
    {
        $this->db->from('kepribadian');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_pengetahuan($kode_pernyataan)
    {
        $this->db->from('pengetahuan');
        $this->db->where_in('kode_pernyataan', $kode_pernyataan);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_userdiagnosa($diagnosa_id)
    {
        $this->db->from('diagnosa as a');
        $this->db->join('users as b', 'a.id_user = b.id', 'left');
        $this->db->where('diagnosa_id', $diagnosa_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_diagnosa($diagnosa_id)
    {
        $query = $this->db->query("SELECT * FROM view_cf_h_e WHERE diagnosa_id='$diagnosa_id' ");
        return $query->result_array();
    }

    public function get_diagnosa_user($diagnosa_id)
    {
        $query = $this->db->query("SELECT * FROM view_cf_user WHERE diagnosa_id='$diagnosa_id' ");
        return $query->result_array();
    }

    public function get_karir($kode_kepribadian)
    {
        $this->db->from('karir');
        $this->db->where('kode_kepribadian', $kode_kepribadian);
        $query = $this->db->get();
        return $query->row();
    }

    function save($data)
    {
        $sql = $this->db->insert_batch($this->table, $data);
        return $sql;
    }

    function update($id, $data)
    {
        $this->db->where('id', $id);
        $sql = $this->db->update($this->table, $data);

        return $sql;
    }

    function delete($id)
    {
        $sql = $this->db->query("DELETE FROM $this->table WHERE id='$id' ");
        return $sql;
    }

    public function cetak()
    {
        if ($this->input->get('print')) {
            $this->load->helper('dompdf');

            $html = $this->load->view('backend/diagnosa/diagnosa_result', $data, true);

            $pdf = new DOMPDF();
            $pdf->setPaper('A4', 'portrait');
            $pdf->setMargins(2.54, 2.54, 2.54, 2.54);
            $pdf->autobreak();
            $pdf->load_html($html);
            $pdf->render();
            $pdf->stream('hasil_diagnosa.pdf');
        }
    }
}
