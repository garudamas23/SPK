<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class model_karir extends CI_Model
{

    var $table = 'karir';

    function kode()
    {
        $sql = $this->db->query("SELECT MAX(RIGHT(kode_karir,1)) AS kd_max FROM karir");
        $kd = "";
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%01s", $tmp);
            }
        } else {
            $kd = "1";
        }
        return "KR" . $kd;
    }

    public function read_kepribadian()
    {
        $query = $this->db->query('select * from kepribadian');
        return $query->result_array();
    }

    public function read()
    {
        $this->db->select('a.id,kode_karir,a.kode_kepribadian,daftar_karir,daftar_kepribadian');
        $this->db->from('karir as a');
        $this->db->join('kepribadian as b', 'a.kode_kepribadian = b.kode_kepribadian', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    function save($data)
    {
        $sql = $this->db->insert($this->table, $data);
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
}
