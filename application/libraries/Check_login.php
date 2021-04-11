<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Check_login
{
	protected $CI;
	function __construct()
	{
		$this->CI =& get_instance();
	}

	public function check()
	{
		if ($this->CI->session->userdata('user_id')=="" &&
			$this->CI->session->userdata('user_user')=="" &&
			$this->CI->session->userdata('user_status')=="" &&
			$this->CI->session->userdata('user_nama')=="") {
			$this->CI->session->set_flashdata('k','Anda belum login');
		redirect('login','refresh');

		
	// 	}else if (
	// 		$this->CI->session->userdata('user_status')=="Operator") {
			
	// 	redirect('Oops','refresh');
	}
	
}
}