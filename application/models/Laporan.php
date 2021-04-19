<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Model {
public function tampil_barang_masuk($id_pemberi)
	{
		$this->db->select('barang_masuk.*,
							pemberi.*,barang.*');
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
	public function tampil_masuk()
	{
		$this->db->select('barang_masuk.*,
							pemberi.*,barang.*');
		$this->db->from('barang_masuk');
		
		// join
		$this->db->join('pemberi','pemberi.id_pemberi=barang_masuk.id_pemberi','LEFT');
		$this->db->join('barang','barang.id_barang=barang_masuk.id_barang','LEFT');
		// end join
	// $this->db->where('barang_masuk.id_pemberi',$id_pemberi);

		$this->db->order_by('tgl_masuk');
		// $this->db->group_by('nama_pemberi');
		$query=$this->db->get();
		return $query->result();
	}
	public function tampil_barang()
	{
		$this->db->select('*'
							);
		$this->db->from('barang');
		
		$this->db->order_by('id_barang');
		$query=$this->db->get();
		return $query->result();

	}
	public function tampil_barang_total()
	{
		$this->db->select('*'
							);
		$this->db->from('barang');
		
		$this->db->order_by('id_barang');
		$query=$this->db->get();
		return $query->result();

	}

	public function tampil_barang_keluar($id_penerima)
	{
		$this->db->select('barang_keluar.*,
						penerima.*,barang.*');
		$this->db->from('barang_keluar');
		$this->db->join('penerima','penerima.id_penerima=barang_keluar.id_penerima','LEFT');
		$this->db->join('barang','barang.id_barang=barang_keluar.id_barang','LEFT');
		$this->db->where('barang_keluar.id_penerima',$id_penerima);

		$this->db->order_by('tgl_keluar');
		$query=$this->db->get();
		return $query->result();
	}
	public function tampil_keluar($id_penerima,$tgl_keluar)
	{
		$this->db->select('barang_keluar.*,
						penerima.*,barang.*');
		$this->db->from('barang_keluar');
		$this->db->join('penerima','penerima.id_penerima=barang_keluar.id_penerima','LEFT');
		$this->db->join('barang','barang.id_barang=barang_keluar.id_barang','LEFT');

		// $this->db->where(array('barang_keluar.id_penerima'=>$id_penerima,
		// 				 'tgl_keluar'=>($tgl_keluar)));
		$this->db->where('barang_keluar.id_penerima', $id_penerima);
		$this->db->or_where('tgl_keluar', $tgl_keluar);
		$this->db->order_by('id_barang_keluar');
		$query=$this->db->get();
		return $query->result();
	}
		public function tampil_semua_barang_keluar()
	{
		$this->db->select('barang_keluar.*,
						penerima.*,barang.*');
		$this->db->from('barang_keluar');
		$this->db->join('penerima','penerima.id_penerima=barang_keluar.id_penerima','LEFT');
		$this->db->join('barang','barang.id_barang=barang_keluar.id_barang','LEFT');
		
		$this->db->order_by('barang_keluar.id_penerima');
		$this->db->order_by('tgl_keluar');
		
		$query=$this->db->get();
		return $query->result();
	}

	public function tampil_infrastruktur($id_wilayah)
	{
		$this->db->select('wilayah.*,
							infrastruktur.*');
		$this->db->from('infrastruktur');
		
		// join
		$this->db->join('wilayah','infrastruktur.id_wilayah=wilayah.id_wilayah','LEFT');
		// end join
	$this->db->where('wilayah.id_wilayah',$id_wilayah);

		$this->db->order_by('id_wilayah');
		$query=$this->db->get();
		return $query->result();
	}
}