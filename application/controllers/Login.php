<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		
	} 

	public function index()
	{
		cek_already_login();
        $data = array(
            'title' => 'JKS NTB | Masuk'
        );
        $this->load->view('login', $data, false);
	}

	public function do_login(){
		$username = xss_clean(addslashes(htmlspecialchars($this->input->post('_username'))));
		$password = xss_clean(addslashes(htmlspecialchars($this->input->post('_password'))));


		$user = $this->user_model->login($username);
		if ($user) {
			if (password_verify($this->db->escape_str($password), $user->password)) {
				$this->session->set_userdata('_user_id', $this->encryption->encrypt($user->id_user));
				$this->session->set_userdata('_username', $user->username);
				$this->session->set_userdata('_status', $user->status);
				redirect('admin');
			} else {
				$this->session->set_flashdata('message', 'Username atau password salah');
				redirect('login','refresh');
			}
		} else {
			$this->session->set_flashdata('message', 'Username atau password salah');
			redirect('login','refresh');
		}
	}

	public function logout()
	{
		$this->check_login->logout();
	}

}
