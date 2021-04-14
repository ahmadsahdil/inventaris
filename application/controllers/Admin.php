<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->model('model_admin');

	}

	function index() {
		$this->check_login->check();

		$a['barang_masuk']=$this->model_admin->total_barang_masuk()->num_rows();
		$a['barang_keluar']=$this->model_admin->total_barang_keluar()->num_rows();
		$a['pemberi']=$this->model_admin->total_pemberi()->num_rows();
		$a['barang']=$this->model_admin->total_barang()->num_rows();
		$a['penerima']=$this->model_admin->total_penerima()->num_rows();
		$a['user']=$this->model_admin->total_user()->num_rows();
		$a['page']="home";
		$a['title']="Admin";

		$this->load->view('admin/index', $a);
	}

	function barang_masuk() {
		$this->check_login->check();
		$a['data']=$this->model_admin->tampil_barang_masuk1();
		$a['pemberi']=$this->model_admin->tampil_pemberi();
		$a['page']="barang_masuk/home_barang_masuk";
		$a['title']="barang Masuk";
		$this->session->set_userdata('TAG', 0);
		$this->load->view('admin/index', $a);
	}

	function tambah_barang_masuk($id=0) {
		$this->check_login->check();
		$a['pemberi']=$this->model_admin->tampil_pemberi();
		$a['barang']=$this->model_admin->tampil_barang_all();
		$a['data']=$this->model_admin->tampil_barang_masuk($id);
		$a['nama_pemberi']=$this->model_admin->detailpemberi($id);
		$a['id_pemberi']=$id;
		$a['page']="barang_masuk/barang_masuk";
		$a['title']="Tambah barang Masuk";
		$this->session->set_userdata('id_pemberi', $id);
		$this->load->view('admin/index', $a);
	}

	function insert_barang_masuk() {
		$this->check_login->check();
		$i=$this->input;
		$id_barang=$i->post('id_barang');
		$jumlah=$i->post('jumlah');
		$object=array('id_pemberi'=>$i->post('id_pemberi'),
			'id_barang'=>$id_barang,
			'jumlah'=>$jumlah,
			'keterangan_masuk'=>$i->post('keterangan'),
			'tgl_masuk'=> $i->post('tgl_masuk'));
		$this->db->insert('barang_masuk', $object);

		$barang=$this->model_admin->detailjenis($id_barang);
		$data_barang=array('total_masuk'=> $barang->total_masuk +=$jumlah,
			'stok'=> $barang->stok +=$jumlah);
		$this->db->where('id_barang', $id_barang);
		$this->db->update('barang', $data_barang);
		$this->session->set_flashdata("msg", "Data berhasil ditambah");
		redirect('admin/tambah_barang_masuk/'.$i->post('id_pemberi'), 'refresh');

	}


	function update_barang_masuk() {
		$this->check_login->check();
		$id=$this->input->post('id_barang_masuk');

		$i=$this->input;
		$object=array('tgl_masuk'=>$i->post('tanggal_masuk'),
			'keterangan_masuk'=>$i->post('keterangan'));
		$this->db->where('id_barang_masuk', $id);
		$this->db->update('barang_masuk', $object);
		$this->session->set_flashdata('msg', 'Data Berhasil di Update');
		$id_pemberi=$this->session->userdata('id_pemberi');
		redirect('admin/tambah_barang_masuk/'.$id_pemberi, 'refresh');

	}



	function hapus_barang_masuk($id) {
		$this->check_login->check();
		$id_pemberi=$this->session->userdata('id_pemberi');


		$id_masuk=$this->model_admin->detailbarang($id);
		$barang=$this->model_admin->detailjenis($id_masuk->id_barang);

		if ($this->model_admin->hapus_barang_masuk($id)) {
			$data_barang=array('total_masuk'=> $barang->total_masuk -=$id_masuk->jumlah,
				'stok'=> $barang->stok -=$id_masuk->jumlah);
			$this->db->where('id_barang', $barang->id_barang);
			$this->db->update('barang', $data_barang);
		}

		$this->session->set_flashdata("msg", "Data berhasil dihapus");
		redirect('admin/tambah_barang_masuk/'.$id_pemberi);

	}



	// function barang barang

	function barang_keluar() {
		$this->check_login->check();
		// $a['data']	= $this->model_admin->tampil_barang_keluar();
		$a['dataprint']=$this->model_admin->tampil_barang_print();
		$a['penerima']=$this->model_admin->tampil_penerima();

		// $a['print']	= $this->model_admin->tampil_barang();
		$a['page']="barang_keluar/home_barang_keluar";
		$a['title']="Barang Keluar";
		$this->load->view('admin/index', $a);
	}

	function tambah_barang_keluar($id=0) {
		$this->check_login->check();
		$a['penerima']=$this->model_admin->tampil_penerima();
		$a['barang']=$this->model_admin->tampil_barang1();
		$a['data']=$this->model_admin->tampil_barang_keluar($id);
		$a['nama_penerima']=$this->model_admin->detailpenerima($id);
		$a['id_penerima']=$id;
		$a['page']="barang_keluar/barang_keluar";
		$a['title']="Tambah Barang Keluar";

		$this->session->set_userdata('id_penerima', $id);
		$this->load->view('admin/index', $a);
	}

	function update_barang_keluar() {
		$this->check_login->check();
		$id=$this->input->post('id_barang_keluar');

		$i=$this->input;
		$object=array('tgl_keluar'=>$i->post('tanggal_keluar'),
			'keterangan_keluar'=>$i->post('keterangan_keluar'));
		$this->db->where('id_barang_keluar', $id);
		$this->db->update('barang_keluar', $object);
		$this->session->set_flashdata('msg', 'Data Berhasil di Update');
		$id_penerima=$this->session->userdata('id_penerima');
		redirect('admin/tambah_barang_keluar/'.$id_penerima, 'refresh');

	}


	function insert_barang_keluar() {
		$i=$this->input;
		$id_barang=$i->post('id_barang');
		if ($id_barang !="") {
			# code... $this->check_login->check();
			$valid=$this->form_validation;
			
			$barang = $this->model_admin->detailjenis($id_barang);
			$jumlah = $i->post('jumlah');

			$object=array('id_penerima'=>$i->post('id_penerima'),
				'id_barang'=>$id_barang,
				'jumlah_keluar'=> $jumlah,
				'tgl_keluar'=> $i->post('tgl_keluar'),
				'keterangan_keluar'=> $i->post('keterangan'));
			
			if (($barang->stok)>=$jumlah) {
				if ($this->db->insert('barang_keluar', $object)) {
					$data_barang=array(
						'total_keluar'=> $barang->total_keluar +=$jumlah,
						'stok'=> $barang->stok -=$jumlah
					);
					$this->db->where('id_barang', $id_barang);
					$this->db->update('barang', $data_barang);
				}

				$this->session->set_flashdata("msg", "Data berhasil ditambah");
			}

			else {
				$this->session->set_flashdata('error', "stok kurang");
				redirect('admin/tambah_barang_keluar/'.$i->post('id_penerima'));

			}
			redirect('admin/tambah_barang_keluar/'.$i->post('id_penerima'));
		}

		else {

			redirect('admin/tambah_barang_keluar/'.$i->post('id_penerima'));

		}
	}

	function hapus_barang_keluar($id) {
		$segment3=$this->session->userdata('id_penerima');
		$this->check_login->check();
		$id_keluar=$this->model_admin->detailbarangkeluar($id);
		$barang=$this->model_admin->detailjenis($id_keluar->id_barang);

		if ($this->model_admin->hapus_barang_keluar($id)) {
			$data_barang=array(
				'total_keluar'=> $barang->total_keluar -=$id_keluar->jumlah_keluar,
				'stok'=> $barang->stok +=$id_keluar->jumlah_keluar);
			$this->db->where('id_barang', $barang->id_barang);
			$this->db->update('barang', $data_barang);
		}
		$this->session->set_flashdata("msg", "Data berhasil dihapus");
		redirect('admin/tambah_barang_keluar/'.$segment3);
	}




	// Fungsi pemberi
	function pemberi() {
		$this->check_login->check();
		$a['data']=$this->model_admin->tampil_pemberi();
		$a['page']="pemberi/pemberi";
		$a['title']="pemberi";
		$this->load->view('admin/index', $a);
	}

	function tambah_pemberi() {
		$this->check_login->check();
		$a['page']="pemberi/tambah_pemberi";
		$a['title']="Tambah pemberi";

		$this->load->view('admin/index', $a);
	}

	function insert_pemberi() {
		$this->check_login->check();
		$i=$this->input;
		$object=array('nama_pemberi'=>$i->post('nama_pemberi'),
			'nama'=>$i->post('nama'));
		$this->db->insert('pemberi', $object);
		$this->session->set_flashdata('msg', 'Data Berhasil di Tambah');
		redirect('admin/pemberi', 'refresh');
	}



	function edit_pemberi($id) {

		$this->check_login->check();
		$a['editdata']=$this->db->get_where('pemberi', array('id_pemberi'=>$id))->result_object();
		$a['page']="pemberi/edit_pemberi";
		$a['title']="Edit pemberi";

		$this->load->view('admin/index', $a);
	}

	function update_pemberi() {
		$this->check_login->check();
		$id=$this->input->post('id');

		$i=$this->input;
		$object=array('nama_pemberi'=>$i->post('nama_pemberi'),
			'nama'=>$i->post('nama'));
		$this->db->where('id_pemberi', $id);
		$this->db->update('pemberi', $object);
		$this->session->set_flashdata('msg', 'Data Berhasil di Update');
		// echo "ini tidak kosong";
		redirect('admin/pemberi/pemberi', 'refresh');

	}

	function hapus_pemberi($id) {
		$this->check_login->check();

		$this->model_admin->hapus_pemberi($id);
		$this->session->set_flashdata('msg', 'Data Berhasil di Hapus');
		redirect('admin/pemberi/pemberi', 'refresh');
	}




	// ==========================Fungsi Jenis barang==========================================
	function get_detail_barang() {
		$id['id_barang']=$this->input->post('id_barang');
		$data=array('detail_barang'=>$this->model_admin->getSelectedData('barang', $id)->result(),
		);
		$this->load->view('pages/ajax_detail_barang', $data);
	}

	function total_barang() {
		$this->check_login->check();
		$a['data']=$this->model_admin->tampil_barang_all();
		$a['page']="barang/barang_total";
		$a['title']="barang Masuk Dan Keluar";
		$this->load->view('admin/index', $a);
	}

	function barang() {
		$this->check_login->check();
		$a['data']=$this->model_admin->tampil_barang_all();
		$a['page']="barang/barang";
		$a['title']="Barang";
		$this->load->view('admin/index', $a);
	}

	function tambah_barang() {
		$this->check_login->check();
		$a['page']="barang/tambah_barang";
		$a['title']="Tambah barang";

		$this->load->view('admin/index', $a);
	}

	function insert_barang() {
		$this->check_login->check();
		$i=$this->input;
		$object=array(
			'nama_barang'=>$i->post('nama_barang'),
			'merk_barang'=>$i->post('merk'),
			'satuan'=>$i->post('satuan'),
			'stok'=>0);
		$this->db->insert('barang', $object);
		$this->session->set_flashdata('msg', 'Data Berhasil di Tambah');
		redirect('admin/barang', 'refresh');
	}




	function edit_barang($id) {

		$this->check_login->check();
		$a['editdata']=$this->db->get_where('barang', array('id_barang'=>$id))->result_object();
		$a['page']="barang/edit_barang";
		$a['title']="Edit Barang";

		$this->load->view('admin/index', $a);
	}

	function update_barang() {
		$this->check_login->check();
		$id=$this->input->post('id');

		$i=$this->input;
		$object=array(
			'nama_barang'=>$i->post('nama_barang'),
			'merk_barang'=>$i->post('merk'),
			'satuan'=>$i->post('satuan'),
			'total_masuk'=>$i->post('total_masuk'),
			'total_keluar'=>$i->post('total_keluar'),
			'stok'=>$i->post('stok'),
			'keterangan'=>$i->post('keterangan'),
		);
		$this->db->where('id_barang', $id);
		$this->db->update('barang', $object);
		$this->session->set_flashdata('msg', 'Data Berhasil di Update');

		// echo "ini tidak kosong";
		redirect('admin/barang/barang', 'refresh');

	}

	function hapus_barang($id) {
		$this->check_login->check();

		$this->model_admin->hapus_barang($id);
		$this->session->set_flashdata('msg', 'Data Berhasil di Hapus');
		redirect('admin/barang/barang', 'refresh');
	}






	// ===========================Fungsi penerima======================================
	function penerima() {
		$this->check_login->check();
		$a['data']=$this->model_admin->tampil_penerima();
		$a['page']="penerima/penerima";
		$a['title']="penerima";
		$this->load->view('admin/index', $a);
	}

	function tambah_penerima() {
		$this->check_login->check();
		$a['page']="penerima/tambah_penerima";
		$a['title']="Tambah penerima";

		$this->load->view('admin/index', $a);
	}

	function insert_penerima() {
		$this->check_login->check();
		$i=$this->input;
		$object=array(
			'nama_penerima'=>$i->post('nama_penerima'),
			'atas_nama'=>$i->post('atas_nama'),
			'alamat'=>$i->post('alamat'));
		$this->db->insert('penerima', $object);
		$this->session->set_flashdata('msg', 'Data Berhasil di Tambah');
		redirect('admin/penerima', 'refresh');
	}



	function edit_penerima($id) {

		$this->check_login->check();
		$a['editdata']=$this->db->get_where('penerima', array('id_penerima'=>$id))->result_object();
		$a['page']="penerima/edit_penerima";
		$a['title']="Edit penerima";

		$this->load->view('admin/index', $a);
	}

	function update_penerima() {
		$this->check_login->check();
		$id=$this->input->post('id');

		$i=$this->input;
		$object=array(
			'nama_penerima'=>$i->post('nama_penerima'),
			'atas_nama'=>$i->post('atas_nama'),
			'alamat'=>$i->post('alamat'));
		$this->db->where('id_penerima', $id);
		$this->db->update('penerima', $object);
		$this->session->set_flashdata('msg', 'Data Berhasil di Update');
		// echo "ini tidak kosong";
		redirect('admin/penerima/penerima', 'refresh');

	}

	function hapus_penerima($id) {
		$this->check_login->check();

		$this->model_admin->hapus_penerima($id);
		$this->session->set_flashdata('msg', 'Data Berhasil di Hapus');
		redirect('admin/penerima/penerima', 'refresh');
	}


	// ===========================Fungsi inventory======================================
	function inventory() {
		$this->check_login->check();
		$a['data']=$this->model_admin->tampil_inventory();
		$a['page']="inventory/inventory";
		$a['title']="Inventory";
		$this->load->view('admin/index', $a);
	}



	/* ========================Fungsi Manage User============================= */
	function manage_user() {
		$this->check_login->check();
		$a['data']=$this->model_admin->tampil_user()->result_object();
		$a['page']="user/manage_user";
		$a['title']="User";

		$this->load->view('admin/index', $a);
	}

	function tambah_user() {
		$this->check_login->check();
		$a['page']="user/tambah_user";
		$a['title']="Tambah User";

		$this->load->view('admin/index', $a);
	}

	function insert_user() {

		$this->check_login->check();
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$status=$this->input->post('status');


		$object=array('username'=> $username,
			'password'=> sha1($password),
			'status'=> $status);
		$this->model_admin->insert_user($object);
		$this->session->set_flashdata('msg', 'Data Berhasil di Tambah');
		redirect('admin/manage_user', 'refresh');
	}

	function edit_user($id) {
		$this->check_login->check();
		$a['editdata']=$this->model_admin->edit_user($id)->result_object();
		$a['page']="user/edit_user";
		$a['title']="Edit User";

		$this->load->view('admin/index', $a);
	}

	function update_user() {
		$this->check_login->check();
		$id=$this->input->post('id');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$pass_old=$this->input->post('pass_old');
		$status=$this->input->post('status');


		if (empty($password)) {
			$object=array('username'=> $username,
				'password'=> $pass_old);
		}

		else {
			$object=array('username'=> $username,
				'password'=> sha1($password));
		}


		$this->model_admin->update_user($id, $object);
		$this->session->set_flashdata('msg', 'Data Berhasil di Update');
		redirect('admin/manage_user', 'refresh');
	}

	function hapus_user($id) {
		$this->check_login->check();
		$this->model_admin->hapus_user($id);
		$this->session->set_flashdata('msg', 'Data Berhasil di Hapus');
		redirect('admin/manage_user', 'refresh');
	}


// ========================== Infrasktruktur =================================
function infrastruktur() {
	$this->check_login->check();
	$a['data']=$this->model_admin->tampil_infrastruktur();
	$a['page']="infrastruktur/infrastruktur";
	$a['title']="Infrastruktur";
	$this->load->view('admin/index', $a);
}

function tambah_infrastruktur() {
	$this->check_login->check();
	$a['page']="infrastruktur/tambah_infrastruktur";
	$a['title']="Tambah Infrastruktur";
	$a['wilayah']=$this->model_admin->tampil_wilayah();
	$this->load->view('admin/index', $a);
}

function insert_infrastruktur() {
	$this->check_login->check();
	$i=$this->input;
	$object=array(
		'nama_barang'=>$i->post('nama_barang'),
		'merk'=>$i->post('merk'),
		'mac'=>$i->post('mac'),
		'jumlah'=>$i->post('jumlah'),
		'satuan'=>$i->post('satuan'),
		'kondisi'=>$i->post('kondisi'),
		'keterangan'=>$i->post('keterangan'),
		'id_wilayah'=>$i->post('wilayah')
	);
	$this->db->insert('infrastruktur', $object);
	$this->session->set_flashdata('msg', 'Data Berhasil di Tambah');
	redirect('admin/infrastruktur');
}




function edit_infrastruktur($id) {

	$this->check_login->check();
	$a['editdata']=$this->db->get_where('infrastruktur', array('id_infrastruktur'=>$id))->result_object();
	$a['wilayah']=$this->model_admin->tampil_wilayah();
	$a['page']="infrastruktur/edit_infrastruktur";
	$a['title']="Edit Infrastruktur";

	$this->load->view('admin/index', $a);
}

function update_infrastruktur() {
	$this->check_login->check();
	$id=$this->input->post('id');

	$i=$this->input;
	$object=array(
		'nama_barang'=>$i->post('nama_barang'),
		'merk'=>$i->post('merk'),
		'mac'=>$i->post('mac'),
		'jumlah'=>$i->post('jumlah'),
		'satuan'=>$i->post('satuan'),
		'kondisi'=>$i->post('kondisi'),
		'keterangan'=>$i->post('keterangan'),
		'id_wilayah'=>$i->post('wilayah')
	);
	$this->db->where('id_infrastruktur', $id);
	$this->db->update('infrastruktur', $object);
	$this->session->set_flashdata('msg', 'Data Berhasil di Update');
	// echo "ini tidak kosong";
	redirect('admin/infrastruktur/infrastruktur');

}

function hapus_infrastruktur($id) {
	$this->check_login->check();

	$this->model_admin->hapus_infrastruktur($id);
	$this->session->set_flashdata('msg', 'Data Berhasil di Hapus');
	redirect('admin/infrastruktur/infrastruktur');
}


// ========================== Wilayah =================================
function wilayah() {
	$this->check_login->check();
	$a['data']=$this->model_admin->tampil_wilayah();
	$a['page']="wilayah/wilayah";
	$a['title']="Wilayah";
	$this->load->view('admin/index', $a);
}

function tambah_wilayah() {
	$this->check_login->check();
	$a['page']="wilayah/tambah_wilayah";
	$a['title']="Tambah Wilayah";

	$this->load->view('admin/index', $a);
}

function insert_wilayah() {
	$this->check_login->check();
	$i=$this->input;
	$object=array(
		'nama_wilayah'=>$i->post('nama_wilayah'),
	);
	$this->db->insert('wilayah', $object);
	$this->session->set_flashdata('msg', 'Data Berhasil di Tambah');
	redirect('admin/wilayah');
}



function edit_wilayah($id) {

	$this->check_login->check();
	$a['editdata']=$this->db->get_where('wilayah', array('id_wilayah'=>$id))->result_object();
	$a['page']="wilayah/edit_wilayah";
	$a['title']="Edit Wilayah";

	$this->load->view('admin/index', $a);
}

function update_wilayah() {
	$this->check_login->check();
	$id=$this->input->post('id');

	$i=$this->input;
	$object=array(
		'nama_wilayah'=>$i->post('nama_wilayah'),

	);
	$this->db->where('id_wilayah', $id);
	$this->db->update('wilayah', $object);
	$this->session->set_flashdata('msg', 'Data Berhasil di Update');
	// echo "ini tidak kosong";
	redirect('admin/wilayah/wilayah');

}

function hapus_wilayah($id) {
	$this->check_login->check();

	$this->model_admin->hapus_wilayah($id);
	$this->session->set_flashdata('msg', 'Data Berhasil di Hapus');
	redirect('admin/wilayah/wilayah');
}

function lihat_infra($id) {

	$this->check_login->check();
	$a['data']=$this->model_admin->tampil_infra_wilayah($id);
	$a['wilayah']=$this->model_admin->tampil_wilayah();
	$a['page']="wilayah/infrastruktur";
	$a['title']="Lihat Infrastruktur";

	$this->load->view('admin/index', $a);
}

}
