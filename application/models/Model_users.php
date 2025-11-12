<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class model_users extends CI_Model
{

    var $table = 'users';

    public function read()
    {
        $query = $this->db->query('select * from users');
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
