<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
		parent:: __construct();
		cek_not_login();
		$this->load->model('user_model');

	}

	/* ========================Fungsi Manage User============================= */
	function index() {
		admin();
		$a['data']=$this->user_model->tampil_user()->result_object();
		$a['page']="user/manage_user";
		$a['title']="User";
		$this->load->view('admin/index', $a);
	}

	function tambah_user() {
admin();
		$a['page']="user/tambah_user";
		$a['title']="Tambah User";

		$this->load->view('admin/index', $a);
	}

	function insert_user() {
admin();

		$username=xss_clean($this->input->post('username'));
		$password=xss_clean($this->input->post('password'));
		$status=xss_clean($this->input->post('status'));
		$user=$this->user_model->login($username);

		if ($user) {
			// $this->session->set_flashdata('error', 'Username sudah ada');
			$this->session->set_flashdata(array(
				'msg'=> 'Username sudah ada',
				'status'=> 'error'
			));
			redirect('user/tambah_user');
		}

		else {
			$object=array(
				'id_user'=> generate_string(100),
				'username'=> $username,
				'password'=> password_hash($password, PASSWORD_DEFAULT),
				'status'=> $status);
			$this->user_model->insert_user($object);
			$this->session->set_flashdata(array(
				'msg'=> 'Data Berhasil di Tambah',
				'status'=> 'success'
			));
			redirect('user');

		}
	}

	function edit_user($id) {

		$a['editdata']=$this->user_model->edit_user($id)->result_object();
		$a['page']="user/edit_user";
		$a['title']="Edit User";

		$this->load->view('admin/index', $a);
	}

	function update_user() {
		$i=$this->input;
		$edit_id=xss_clean(htmlspecialchars($this->input->post('id')));
		$username=xss_clean(htmlspecialchars($i->post('username')));
		$password=xss_clean(htmlspecialchars($i->post('password')));
		$status=xss_clean(htmlspecialchars($i->post('status')));
		$hak=xss_clean(htmlspecialchars($i->post('hak')));
		$user=$this->user_model->detail($edit_id)->row();
		$data=array('username'=> $username,
			'password'=> password_hash($password, PASSWORD_DEFAULT),
		);
		if ($hak == "user") {
			$data['status']=$status;
		} 
		if (password_verify(xss_clean(htmlspecialchars($i->post('password_lama'))), $user->password)) {
			$this->user_model->update_user($edit_id, $data);
			$this->session->set_flashdata(array(
				'msg'=> 'User Berhasil di Ubah',
				'status'=> 'success'
			));
		}

		else {
			$this->session->set_flashdata(array(
				'msg'=> 'User Gagal di Ubah',
				'status'=> 'error'
			));
		}

		if ($hak == "personal") {
			redirect('/');
		} else {
			redirect('user');
		}
		


	}


	function hapus_user($id) {
admin();
		$this->user_model->hapus_user($id);
		$this->session->set_flashdata(array(
			'msg'=> 'Data Berhasil di Hapus',
			'status'=> 'success'
		));
		redirect('user');
	}

	function reset_password($id) {
		admin();
		$user=$this->user_model->detail($id)->row();	
		$data=array('password'=> password_hash($user->username, PASSWORD_DEFAULT));
		if($this->user_model->update_user($id, $data)){
			$this->session->set_flashdata(array(
				'msg'=> 'Password Berhasil di Reset',
				'status'=> 'success'
			));
			redirect('user');
		}else{
			$this->session->set_flashdata(array(
				'msg'=> 'Password Berhasil di Reset',
				'status'=> 'success'
			));
			redirect('user');

		}
		
		
	}



	function user_edit() {
		$id = $this->encryption->decrypt($this->session->userdata('_user_id'));
		$a['editdata']=$this->user_model->edit_user($id)->result_object();
		$a['page']="user/user_edit";
		$a['title']="Edit User";
		$this->load->view('admin/index', $a);
	}

	

}
