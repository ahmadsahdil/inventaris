<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

public function __construct(){
	parent::__construct();
	$this->load->model('model_admin');
	$this->load->model('laporan');
}

	// print berdasarkan id
	public function excel_barang_masuk($id)
	{
		$data=$this->laporan->tampil_barang_masuk($id);
	$this->load->view('admin/laporan/excel_barang_masuk',['data'=>$data]);
	
	}
	public function excel_masuk()
	{
		$data=$this->laporan->tampil_masuk();
	$this->load->view('admin/laporan/excel_barang_masuk',['data'=>$data]);
	
	}
	public function excel_barang()
	{
		$data=$this->laporan->tampil_barang();
	$this->load->view('admin/laporan/excel_barang',['data'=>$data]);
	
	}
		public function excel_barang_total()
	{
		$data=$this->laporan->tampil_barang_total();
	$this->load->view('admin/laporan/excel_barang_total',['data'=>$data]);
	
	}
	public function tampil_barang_keluar()
	{
		$id_pemberi=$this->input->post('penerima');
		$tgl_keluar=$this->input->post('tgl_keluar');
	
		$data=$this->laporan->tampil_keluar($id_pemberi,$tgl_keluar);
		$this->load->view('admin/laporan/excel_barang_keluar',['data'=>$data]);
	
	}
		public function excel_barang_keluar($id_penerima)
	{

		$data=$this->laporan->tampil_barang_keluar($id_penerima);
		$this->load->view('admin/laporan/excel_barang_keluar',['data'=>$data]);
	
	}

	public function tampil_keluar()
	{
		$data=$this->laporan->tampil_semua_barang_keluar();
		$this->load->view('admin/laporan/excel_barang_keluar',['data'=>$data]);
	
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */