<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
		parent:: __construct();
		cek_not_login();
		$this->load->model('user_model');

	}

	/* ========================Fungsi Manage User============================= */
	function index() {

		$a['data']=$this->user_model->tampil_user()->result_object();
		$a['page']="user/manage_user";
		$a['title']="User";

		$this->load->view('admin/index', $a);
	}

	function tambah_user() {

		$a['page']="user/tambah_user";
		$a['title']="Tambah User";

		$this->load->view('admin/index', $a);
	}

	function insert_user() {


		$username=xss_clean($this->input->post('username'));
		$password=xss_clean($this->input->post('password'));
		$status=xss_clean($this->input->post('status'));
        $user=$this->user_model->login($username);

if ($user) {
    $this->session->set_flashdata('error', 'Username sudah ada');
    redirect('user/tambah_user');
}else{
    $object=array('username'=> $username,
        'password'=> password_hash($password, PASSWORD_DEFAULT),
        'status'=> $status);
    $this->user_model->insert_user($object);
    $this->session->set_flashdata('msg', 'Data Berhasil di Tambah');
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
		$user=$this->user_model->login($username);
		$data=array('username'=> $username,
			'password'=> password_hash($password, PASSWORD_DEFAULT),
		);

		if (password_verify(xss_clean(htmlspecialchars($i->post('password_lama'))), $user->password)) {
			$this->user_model->update_user($edit_id, $data);
			$this->session->set_flashdata('msg', 'Data Berhasil di Update');
			redirect('user');
		}

		else {
			$this->session->set_flashdata('msg', 'Data Gagal di Update');
			redirect('user');
		}


	}


	function hapus_user($id) {

		$this->user_model->hapus_user($id);
		$this->session->set_flashdata('msg', 'Data Berhasil di Hapus');
		redirect('user');
	}

	function reset_password($id) {
        $data=array(
			'password'=> password_hash($this->session->userdata('_username'), PASSWORD_DEFAULT)
		);
		$this->user_model->update_user($id, $data);
		$this->session->set_flashdata('msg', 'Password Berhasil di Reset');
		redirect('user');
	}


}
