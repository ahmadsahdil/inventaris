<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

public function __construct(){
	parent::__construct();
	$this->check_login->check();
	admin_operator();
	$this->load->model('model_admin');
	$this->load->model('laporan');
	$this->load->model('daerah_model','daerah');
}

	// print berdasarkan id
	public function excel_barang_masuk($id)
	{
		$data=$this->laporan->tampil_barang_masuk($id);
	$this->load->view('admin/laporan/excel_barang_masuk',['data'=>$data]);
	activity_log('Print','Laporan/excel_barang_masuk id');

	
	}
	public function excel_masuk()
	{
		$data=$this->laporan->tampil_masuk();
	$this->load->view('admin/laporan/excel_barang_masuk',['data'=>$data]);
	activity_log('Print','Laporan/excel_barang_masuk');
	
	}
	public function excel_barang()
	{
		$data=$this->laporan->tampil_barang();
	$this->load->view('admin/laporan/excel_barang',['data'=>$data]);
	activity_log('Print','Laporan/excel_barang');
	
	}
		public function excel_barang_total()
	{
		$data=$this->laporan->tampil_barang_total();
	$this->load->view('admin/laporan/excel_barang_total',['data'=>$data]);
	activity_log('Print','Laporan/excel_barang_total');
	
	}
	public function tampil_barang_keluar()
	{
		$id_pemberi=$this->input->post('penerima');
		$tgl_keluar=$this->input->post('tgl_keluar');
	
		$data=$this->laporan->tampil_keluar($id_pemberi,$tgl_keluar);
		$this->load->view('admin/laporan/excel_barang_keluar',['data'=>$data]);
		activity_log('Print','Laporan/excel_barang_keluar');
	
	}
		public function excel_barang_keluar($id_penerima)
	{

		$data=$this->laporan->tampil_barang_keluar($id_penerima);
		$this->load->view('admin/laporan/excel_barang_keluar',['data'=>$data]);
		activity_log('Print','Laporan/excel_barang_keluar');
	
	}

	public function tampil_keluar()
	{
		$data=$this->laporan->tampil_semua_barang_keluar();
		$this->load->view('admin/laporan/excel_barang_keluar',['data'=>$data]);
		activity_log('Print','Laporan/excel_barang_keluar');
	
	}
	public function tampil_pelanggan()
	{
		$object = array(
			'data' => $this->laporan->tampil_pelanggan(),
			'daerah' => $this->daerah

		);
		$this->load->view('admin/laporan/excel_pelanggan',$object);
		activity_log('Print','Laporan/excel_pelanggan');
	
	}
	public function tampil_pelanggan_korlap()
	{
		$id_korlap=$this->input->post('korlap');
		$object = array(
			'data' => $this->laporan->tampil_pelanggan_korlap($id_korlap),
			'daerah' => $this->daerah

		);
		$this->load->view('admin/laporan/excel_pelanggan',$object);
		activity_log('Print','Laporan/excel_pelanggan_korlap');
	
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */