<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Check_login
{
	protected $CI;
	public function __construct()
	{
		$this->CI = &get_instance();
	}
	// check login
	public function check()
	{

		$this->CI->load->model('user_model');
		$user_id = $this->CI->encryption->decrypt($this->CI->session->userdata('_user_id'));
		$user_data = $this->CI->user_model->detail($user_id)->row();
		return $user_data;
	}
	//logout
	public function logout()
	{
		$this->CI->session->sess_destroy();
		redirect('login','refresh');
	}
}