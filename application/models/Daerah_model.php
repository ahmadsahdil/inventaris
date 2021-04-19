<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Daerah_model extends CI_Model
{
    public function kabupaten()
    {
        $kab = '52';
        $this->db->select('*');
        $this->db->from('daerah');
        $this->db->like('id', $kab,'after');
        $this->db->like('level', 2);
        // $this->db->like('level', 2);

        $this->db->order_by('nama', 'ASC');
        $query=$this->db->get();
		return $query->result();
        // kabupaten = 2
        // kecamatan = 3
        // desa = 4
        // SELECT * FROM `wilayah` WHERE `id` LIKE "52.%" AND `level`=2 (kabupaten)
    }

    public function kecamatan($kab)
    {
        $id = '52'.'.'.$kab;
        $this->db->select('*');
        $this->db->from('daerah');
        $this->db->like('id', $id);
        $this->db->like('level', 3);

        $this->db->order_by('nama', 'ASC');
        $query=$this->db->get();
		return $query->result();
    }
    public function desa($kab,$kec)
    {

        $kab = '52'.'.'.$kab.'.'.$kec;
        $this->db->select('*');
        $this->db->from('daerah');
        $this->db->like('id', $kab);
        $this->db->like('level', 4);
        // $this->db->like('level', 2);

        $this->db->order_by('nama', 'ASC');
        $query=$this->db->get();
		return $query->result();
    }
}