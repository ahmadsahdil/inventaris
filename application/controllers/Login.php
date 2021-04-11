<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_admin');
		
	} 

	public function index()
	{
		if($this->session->userdata('user_valid') == TRUE ){
			redirect("admin");
		}
		$this->session->sess_destroy();
		$this->load->view('login');
	}

	public function do_login()
	{
		$u = $this->input->post("user");
		$p = sha1($this->input->post("pass"));
		$cari = $this->model_admin->cek_user($u, $p)->row();
		$hitung = $this->model_admin->cek_user($u, $p)->num_rows();

		if ($hitung > 0) {
			
			$data = array('user_id' => $cari->id_user ,
							'user_user' => $cari->username, 
							'user_status' => $cari->status, 

							'user_valid' => TRUE
			);

			$this->session->set_userdata($data);

			redirect('admin','refresh');
		}else{
			$this->session->set_flashdata('k','Username atau Password salah');
				redirect(base_url('login'),'refresh');
		}	
	}

	public function logout()
	{
		
		
		$this->session->sess_destroy();
		
		redirect(base_url('login'),'refresh');

	
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */