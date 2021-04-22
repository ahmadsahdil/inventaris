<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daerah extends CI_Controller {

	function __construct(){
		parent::__construct();
    $this->check_login->check();
    $this->load->model('daerah_model','daerah');
    }


	public function getkecamatan($id)
	{
        $kabupaten = substr($id, 3, 2);
		$kecamatan = $this->daerah->kecamatan($kabupaten);
        $data = "<option value=''> - Pilih Kecamatan - </option>";
        foreach ($kecamatan as $value) {
            $data .= "<option value='".$value->id."'>".$value->nama."</option>";
        }
        echo $data;
    }

    public function getdesa($id)
	{
        $kab = substr($id, 3, 2);
        $kec = substr($id, 6, 2);
		$desa = $this->daerah->desa($kab,$kec);
        $data = "<option value=''> - Pilih Desa - </option>";
        foreach ($desa as $value) {
            $data .= "<option value='".$value->id."'>".$value->nama."</option>";
        }
        echo $data;
    }
}