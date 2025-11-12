<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class model_dashboard extends CI_Model
{
    public function hasil_diagnosa($level, $id_user)
    {
        $this->db->select('COUNT(*) AS hasil');
        $this->db->from('diagnosa');
        if ($level == "Administrator") {
        } else {
            $this->db->where('id_user', $id_user);
        }
        $this->db->group_by('diagnosa_id');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function pengetahuan()
    {
        $sql = $this->db->query("SELECT COUNT(*) AS hasil FROM pengetahuan ");
        return $sql->row_array();
    }

    function kepribadian()
    {
        $sql = $this->db->query("SELECT COUNT(*) AS hasil FROM kepribadian ");
        return $sql->row_array();
    }

    function karir()
    {
        $sql = $this->db->query("SELECT COUNT(*) AS hasil FROM karir ");
        return $sql->row_array();
    }

    function pernyataan()
    {
        $sql = $this->db->query("SELECT COUNT(*) AS hasil FROM pernyataan ");
        return $sql->row_array();
    }

    function kondisi()
    {
        $sql = $this->db->query("SELECT COUNT(*) AS hasil FROM kondisi ");
        return $sql->row_array();
    }

    function konten()
    {
        $sql = $this->db->query("SELECT COUNT(*) AS hasil FROM konten ");
        return $sql->row_array();
    }
}
