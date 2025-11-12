<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class model_kepribadian extends CI_Model
{

    var $table = 'kepribadian';

    function kode()
    {
        $sql = $this->db->query("SELECT MAX(RIGHT(kode_kepribadian,2)) AS kd_max FROM kepribadian");
        $kd = "";
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%02s", $tmp);
            }
        } else {
            $kd = "01";
        }
        return "K" . $kd;
    }

    public function read()
    {
        $query = $this->db->query('select * from kepribadian');
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
