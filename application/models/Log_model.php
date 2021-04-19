<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Log_model extends CI_Model
{
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('log');
        $this->db->order_by('log_id', 'DESC');
        $query = $this->db->get();
        $queryResult = $query->result();
        if (count($queryResult) > 0) {
            return $query->result();
        }
    }

    public function add($data)
    {
        return $this->db->insert('log', $data);
    }

    public function delete()
    {
        return $this->db->delete('log', array('DATEDIFF(CURDATE(), tanggal) >' =>  30));
    }
}