<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

    public function korlap()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('status','Korlap');
        $this->db->or_where('status','pelanggan');
        $this->db->order_by('nama', 'ASC');
        $query=$this->db->get();
		return $query->result();
    }
	public function tampil_pelanggan($id)
	{
		$this->db->select('pelanggan.*,
							user.nama');
		$this->db->from('pelanggan');
		$this->db->join('user','user.id_user=pelanggan.id_korlap','LEFT');
        $this->db->where('id_korlap',$id);
		$query=$this->db->get();
		return $query->result();
	}
	public function tampil_pelanggan_korlap($id)
	{
        $id_user = $this->encryption->decrypt($id);
		$this->db->select('pelanggan.*,
							user.nama');
		$this->db->from('pelanggan');
		$this->db->join('user','user.id_user=pelanggan.id_korlap','LEFT');
        $this->db->where('id_korlap', $id_user);
       
		$query=$this->db->get();
		return $query->result();
	}

	public function insert_pelanggan($object)
	{
		$this->db->insert('pelanggan', $object);
	}

	public function edit_pelanggan($id)
	{
		return $this->db->get_where('pelanggan',array('id_pelanggan'=>$id));
	}

	public function update_pelanggan($id, $object)
	{
		$this->db->where('id_pelanggan', $id);
		$this->db->update('pelanggan', $object); 
	}

	public function hapus_pelanggan($id)
	{
		return $this->db->delete('pelanggan', array('id_pelanggan' => $id));
	}

    public function detail($id_pelanggan = null)
    {
        // $id = $this->encryption->encrypt('');
        $this->db->select('*');
        $this->db->from('pelanggan');
        if ($id_pelanggan != null) {
            $this->db->where('id_pelanggan', $id_pelanggan);
            $this->db->order_by('id_pelanggan');
        }
        return $this->db->get();
    }
}