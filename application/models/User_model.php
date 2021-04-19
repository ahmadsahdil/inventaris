<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

    public function login($username)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->order_by('id_user');
        $query = $this->db->get();
        $queryResult = $query->result();

        if (count($queryResult) > 0) {

            return $query->row();
        }
    }

	public function tampil_user()
	{
		return $this->db->get('user');
	}

	public function insert_user($object)
	{
		$this->db->insert('user', $object);
	}

	public function edit_user($id)
	{
		return $this->db->get_where('user',array('id_user'=>$id));
	}

	public function update_user($id, $object)
	{
		$this->db->where('id_user', $id);
		$this->db->update('user', $object); 
	}

	public function hapus_user($id)
	{
		return $this->db->delete('user', array('id_user' => $id));
	}

    public function detail($id_user = null)
    {
        // $id = $this->encryption->encrypt('');
        $this->db->select('*');
        $this->db->from('user');
        if ($id_user != null) {
            $this->db->where('id_user', $id_user);
            $this->db->order_by('id_user');
        }
        return $this->db->get();
    }
}