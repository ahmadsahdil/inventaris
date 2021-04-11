<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_admin extends CI_Model {
public function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data);
    }
	
	public function tampil_barang()
	{
		$this->db->select('barang_masuk.*,
							pemberi.nama_pemberi,barang.nama_barang');
		$this->db->from('barang_masuk');
		
		// join
		$this->db->join('pemberi','pemberi.id_pemberi=barang_masuk.id_pemberi','LEFT');
		$this->db->join('barang','barang.id_barang=barang_masuk.id_barang','LEFT');
		
		// end join
	
		$this->db->where('jumlah>0');
		$this->db->order_by('id_barang_masuk');
		$query=$this->db->get();
		return $query->result();
	}

	public function tampil_barang_masuk($id_pemberi)
	{
		$this->db->select('barang_masuk.*,
							pemberi.nama_pemberi,barang.nama_barang,barang.satuan');
		$this->db->from('barang_masuk');
		
		// join
		$this->db->join('pemberi','pemberi.id_pemberi=barang_masuk.id_pemberi','LEFT');
		$this->db->join('barang','barang.id_barang=barang_masuk.id_barang','LEFT');
		// end join
	$this->db->where('barang_masuk.id_pemberi',$id_pemberi);

		$this->db->order_by('tgl_masuk');
		$query=$this->db->get();
		return $query->result();
	}
	public function tampil_barang_masuk1()
	{
		$this->db->select('barang_masuk.*,
							pemberi.nama_pemberi,barang.nama_barang');
		$this->db->from('barang_masuk');
		
		// join
		$this->db->join('pemberi','pemberi.id_pemberi=barang_masuk.id_pemberi','LEFT');
		$this->db->join('barang','barang.id_barang=barang_masuk.id_barang','LEFT');
	// 	// end join
	// $this->db->where('barang_masuk.id_pemberi',$id_pemberi);

	// error ketika dipakai
		// $this->db->group_by('pemberi.nama_pemberi');
		$query=$this->db->get();
		return $query->result();
	}
		public function tampil_barang_keluar($id_penerima)
	{
		$this->db->select('barang_keluar.*,
						penerima.nama_penerima,barang.*');
		$this->db->from('barang_keluar');
		$this->db->join('penerima','penerima.id_penerima=barang_keluar.id_penerima','LEFT');
		$this->db->join('barang','barang.id_barang=barang_keluar.id_barang','LEFT');
		$this->db->where('barang_keluar.id_penerima',$id_penerima);

		$this->db->order_by('tgl_keluar');
		$query=$this->db->get();
		return $query->result();
	}
	public function tampil_barang_keluar1()
	{
		$this->db->select('barang_keluar.*,
						penerima.nama_penerima,barang.*');
		$this->db->from('barang_keluar');
		$this->db->join('penerima','penerima.id_penerima=barang_keluar.id_penerima','LEFT');
		$this->db->join('barang','barang.id_barang=barang_keluar.id_barang','LEFT');
		

		$this->db->order_by('id_barang_keluar');
		$query=$this->db->get();
		return $query->result();
	}
	public function tampil_barang_print()
	{
		$this->db->select('barang_keluar.*,
						penerima.nama_penerima,barang.*');
		$this->db->from('barang_keluar');
		$this->db->join('penerima','penerima.id_penerima=barang_keluar.id_penerima','LEFT');
		$this->db->join('barang','barang.id_barang=barang_keluar.id_barang','LEFT');
		// error kerika dipakai
		// $this->db->group_by('id_penerima');
		$query=$this->db->get();
		return $query->result();
	}

// error di barang keluar
	// public function tampil_barang_($id_penerima,$tgl_barang)
	// {
	// 	$this->db->select('barang_keluar.*,
	// 					penerima.nama_penerima,barang.*');
	// 	$this->db->from('barang_keluar');
	// 	$this->db->join('penerima','penerima.id_penerima=barang_keluar.id_penerima','LEFT');
	// 	$this->db->join('barang','barang.id_barang=barang_keluar.id_barang','LEFT');

	// 	$this->db->or_where(array('barang_keluar.id_penerima'=>$id_penerima,
	// 					 'tgl_barang'=>($tgl_barang)));
	// 	$this->db->order_by('id_barang_keluar');
	// 	$query=$this->db->get();
	// 	return $query->result();
	// }

public function total_jenis_penerima($idpenerima,$idjenisbarang)
	{
		$this->db->select('barang_masuk.*,
						penerima.*,barang.*');
		$this->db->from('barang_masuk');
		$this->db->join('penerima','penerima.id_penerima=barang_keluar.id_penerima','LEFT');
		$this->db->join('barang','barang.id_barang=barang_masuk.id_barang','LEFT');
		$this->db->where(array('barang_masuk.id_penerima'=>$idpenerima,
						 'barang_masuk.id_barang'=>$idjenisbarang));
		
		$query=$this->db->get();
		return $query->result();
	}


	// public function tampil_inventory()
	// {
	// 	$this->db->select('*'
	// 						);
	// 	$this->db->from('inventory');
		
	// 	$this->db->order_by('id_inventory');
	// 	$query=$this->db->get();
	// 	return $query->result();
	// }
		public function tampil_pemberi()
	{
		$this->db->select('*'
							);
		$this->db->from('pemberi');
		
		$this->db->order_by('id_pemberi');
		$query=$this->db->get();
		return $query->result();
	}
	public function tampil_barang1()
	{
		$this->db->select('*'
							);
		$this->db->from('barang');
		$this->db->where('stok>0');
		
		$this->db->order_by('id_barang');
		$query=$this->db->get();
		return $query->result();

	}
		public function tampil_barang_all()
	{
		$this->db->select('*'
							);
		$this->db->from('barang');
		
		$this->db->order_by('id_barang');
		$query=$this->db->get();
		return $query->result();

	}

	public function tampil_penerima()
	{
		$this->db->select('*'
							);
		$this->db->from('penerima');
		
		$this->db->order_by('id_penerima');
		$query=$this->db->get();
		return $query->result();
	}
		public  function detailjenis($idjenis){
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->where('id_barang',$idjenis);
		$this->db->order_by('id_barang');
		$query=$this->db->get();
		return $query->row();
	}
			public  function detailbarang($idjenis){
		$this->db->select('*');
		$this->db->from('barang_masuk');
		$this->db->where('id_barang_masuk',$idjenis);
		$this->db->order_by('id_barang_masuk');
		$query=$this->db->get();
		return $query->row();
	}
	// detail jenis untuk Distribusi barang
	

	public  function detailpemberi($idpemberi){
		$this->db->select('*');
		$this->db->from('pemberi');
		$this->db->where('id_pemberi',$idpemberi);
		$this->db->order_by('id_pemberi');
		$query=$this->db->get();
		return $query->row();
	}

	public  function detailpenerima($idpenerima){
		$this->db->select('*');
		$this->db->from('penerima');
		$this->db->where('id_penerima',$idpenerima);
		$this->db->order_by('id_penerima');
		$query=$this->db->get();
		return $query->row();
	}

	public function total_barang_masuk()
	{
		return $this->db->get('barang_masuk');
	}
	public function total_barang_keluar()
	{
		return $this->db->get('barang_keluar');
	}
	
	public function total_penerima()
	{
		return $this->db->get('penerima');
	}
	public function total_barang()
	{
		return $this->db->get('barang');
	}
	public function total_pemberi()
	{
		return $this->db->get('pemberi');
	}
		public function total_user()
	{
		return $this->db->get('user');
	}
/*
/*
/*
	public function edit_jenis($id)
	{
		return $this->db->get_where('barang_masuk',array('idMasuk'=>$id));
	}
*/



	// Function Hapus 
	public function hapus_barang_masuk($id)
	{
		return $this->db->delete('barang_masuk', array('id_barang_masuk' => $id));
	}

	public function hapus_barang_keluar($id)
	{
		return $this->db->delete('barang_keluar', array('id_barang_keluar' => $id));
	}
	public function hapus_pemberi($id)
	{
		return $this->db->delete('pemberi', array('id_pemberi' => $id));
	}
		public function hapus_barang($id)
	{
		return $this->db->delete('barang', array('id_barang' => $id));
	}
		public function hapus_penerima($id)
	{
		return $this->db->delete('penerima', array('id_penerima' => $id));
	}









	public function cek_user($user, $pass)
	{
		$array = array('username' => $user, 'password' => $pass);

		$query = $this->db->where($array);

		$query = $this->db->get('user');

		return $query;
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

	public function detail($IdUser)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user',$IdUser);
		$this->db->order_by('id_user');
		$query=$this->db->get();
		return $query->row();
	}

	public function detail_jenis($id_barang)
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->where('id_barang',$id_barang);
		$this->db->order_by('id_barang');
		$query=$this->db->get();
		return $query->row();
	}
	  function getKodeBarang(){
        $q = $this->db->query("select MAX(RIGHT(id_barang_masuk,3)) as kd_max from barang_masuk");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "BM-".$kd;
    }

}
