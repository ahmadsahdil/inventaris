<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	function __construct(){
		parent::__construct();
		// $this->load->model('pelanggan');
		$this->load->model('daerah_model','daerah');
		// $this->load->model('pelanggan_model');
    }
    
        function index() {
    
            $a['kab']=$this->daerah->kabupaten();
            $a['page']="pelanggan/pelanggan";
            $a['title']="Pelanggan";
            $this->load->view('admin/index', $a);
        }
    
        function tambah_pelanggan() {
    
            $a['page']="pelanggan/tambah_pelanggan";
            $a['title']="Tambah Pelanggan";
    
            $this->load->view('admin/index', $a);
        }
    
        function insert_pelanggan() {
    
    
            $pelangganname=xss_clean($this->input->post('pelangganname'));
            $password=xss_clean($this->input->post('password'));
            $status=xss_clean($this->input->post('status'));
            $pelanggan=$this->pelanggan_model->login($pelangganname);
    
            if ($pelanggan) {
                // $this->session->set_flashdata('error', 'Pelangganname sudah ada');
                $this->session->set_flashdata(array(
                    'msg'=> 'Pelangganname sudah ada',
                    'status'=> 'error'
                ));
                redirect('pelanggan/tambah_pelanggan');
            }
    
            else {
                $object=array('pelangganname'=> $pelangganname,
                    'password'=> password_hash($password, PASSWORD_DEFAULT),
                    'status'=> $status);
                $this->pelanggan_model->insert_pelanggan($object);
                $this->session->set_flashdata(array(
                    'msg'=> 'Data Berhasil di Tambah',
                    'status'=> 'success'
                ));
                redirect('pelanggan');
    
            }
        }
    
        function edit_pelanggan($id) {
    
            $a['editdata']=$this->pelanggan_model->edit_pelanggan($id)->result_object();
            $a['page']="pelanggan/edit_pelanggan";
            $a['title']="Edit Pelanggan";
    
            $this->load->view('admin/index', $a);
        }
    
        function update_pelanggan() {
            $i=$this->input;
            $edit_id=xss_clean(htmlspecialchars($this->input->post('id')));
            $pelangganname=xss_clean(htmlspecialchars($i->post('pelangganname')));
            $password=xss_clean(htmlspecialchars($i->post('password')));
            $pelanggan=$this->pelanggan_model->login($pelangganname);
            $data=array('pelangganname'=> $pelangganname,
                'password'=> password_hash($password, PASSWORD_DEFAULT),
            );
    
            if (password_verify(xss_clean(htmlspecialchars($i->post('password_lama'))), $pelanggan->password)) {
                $this->pelanggan_model->update_pelanggan($edit_id, $data);
                $this->session->set_flashdata(array(
                    'msg'=> 'Data Berhasil di Ubah',
                    'status'=> 'success'
                ));
                redirect('pelanggan');
            }
    
            else {
                $this->session->set_flashdata(array(
                    'msg'=> 'Data Gagal di Ubah',
                    'status'=> 'error'
                ));
                redirect('pelanggan');
            }
    
    
        }
    
    
        function hapus_pelanggan($id) {
    
            $this->pelanggan_model->hapus_pelanggan($id);
            $this->session->set_flashdata(array(
                'msg'=> 'Data Berhasil di Hapus',
                'status'=> 'success'
            ));
            redirect('pelanggan');
        }
    
        function reset_password($id) {
            $pelanggan=$this->pelanggan_model->detail($id)->row();	
            $data=array('password'=> password_hash($pelanggan->pelangganname, PASSWORD_DEFAULT));
            if($this->pelanggan_model->update_pelanggan($id, $data)){
                $this->session->set_flashdata(array(
                    'msg'=> 'Password Berhasil di Reset',
                    'status'=> 'success'
                ));
                redirect('pelanggan');
            }else{
                $this->session->set_flashdata(array(
                    'msg'=> 'Password Berhasil di Reset',
                    'status'=> 'success'
                ));
                redirect('pelanggan');
    
            }
            
            
        }
    
    
    
    

}