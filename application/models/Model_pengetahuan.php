<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class model_pengetahuan extends CI_Model
{

    var $table = 'pengetahuan';

    public function read()
    {
        $query = $this->db->query('select a.*,daftar_kepribadian,daftar_pernyataan from pengetahuan a left join kepribadian b on a.kode_kepribadian=b.kode_kepribadian left join pernyataan c on a.kode_pernyataan=c.kode_pernyataan order by kode_kepribadian,kode_pernyataan asc');
        return $query->result_array();
    }

    public function read_kepribadian()
    {
        $query = $this->db->query('select * from kepribadian');
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
