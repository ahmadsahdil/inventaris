<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log extends CI_Controller {

	function __construct() {
		parent:: __construct();
        cek_not_login();
        admin();
		$this->load->model('log_model');

	}

    function index() {
		
		$a['data']=$this->log_model->listing();
		$a['page']="log/log";
		$a['title']="Log";
		$this->load->view('admin/index', $a);
	}
}