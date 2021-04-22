<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->check_login->check();
		$this->load->model('daerah_model','daerah');
		$this->load->model('pelanggan_model','pelanggan');
    }
    
        function index() {
            if($this->session->userdata('_status') == "Korlap") {
                $pelanggan = $this->pelanggan->tampil_pelanggan_korlap($this->session->userdata('_user_id'));
            } else {
                $pelanggan = $this->pelanggan->tampil_pelanggan();
            }
            
            $data = array(
                'hasil' => $pelanggan,
                'daerah' => $this->daerah,
                'korlap' => $this->pelanggan->korlap(),
                'page' => "pelanggan/pelanggan",
                'title' => "Pelanggan"
            );
            $this->load->view('admin/index', $data);
        }
    
        function tambah_pelanggan() {
            $data = array(
                'kab' => $this->daerah->kabupaten(),
                'korlap' => $this->pelanggan->korlap(),
                'page' => "pelanggan/tambah_pelanggan",
                'title' => "Tambah Pelanggan"
            );
            $this->load->view('admin/index', $data);
        }
    
        function insert_pelanggan() {
    
    
            $nama_perusahaan=xss_clean(addslashes(htmlspecialchars($this->input->post('nama_perusahaan'))));
            $nama_pic=xss_clean(addslashes(htmlspecialchars($this->input->post('nama_pic'))));
            $nomor_pic=xss_clean(addslashes(htmlspecialchars($this->input->post('nomor_pic'))));
            $jabatan=xss_clean(addslashes(htmlspecialchars($this->input->post('jabatan'))));
            $kabupaten=xss_clean(addslashes(htmlspecialchars($this->input->post('kabupaten'))));
            $kecamatan=xss_clean(addslashes(htmlspecialchars($this->input->post('kecamatan'))));
            $desa=xss_clean(addslashes(htmlspecialchars($this->input->post('desa'))));
            $alamat=xss_clean(addslashes(htmlspecialchars($this->input->post('alamat'))));
            $email=xss_clean(addslashes(htmlspecialchars($this->input->post('email'))));
            $status=xss_clean(addslashes(htmlspecialchars($this->input->post('status'))));
            $kategori=xss_clean(addslashes(htmlspecialchars($this->input->post('kategori'))));
            $jenis=xss_clean(addslashes(htmlspecialchars($this->input->post('jenis'))));
            $bandwidth=xss_clean(addslashes(htmlspecialchars($this->input->post('bandwidth'))));
            $id_user = $this->encryption->decrypt($this->session->userdata('_user_id'));
            $korlap= $this->session->userdata('_status')== 'Korlap'? $id_user : xss_clean(addslashes(htmlspecialchars($this->input->post('korlap'))));
            
            
            $object=array(
                'id_pelanggan' => generate_string(50),
                'nama_usaha'=> $nama_perusahaan,
                'pic'=> $nama_pic,
                'no_pic'=> $nomor_pic,
                'jabatan'=> $jabatan,
                'kabupaten'=> $kabupaten,
                'kecamatan'=> $kecamatan,
                'desa'=> $desa,
                'alamat'=> $alamat,
                'email'=> $email,
                'status'=> $status,
                'kategori'=> $kategori,
                'jenis'=> $jenis,
                'bandwidth'=> $bandwidth,
                'id_korlap'=> $korlap,
                'create_by'=> $this->session->userdata('_nama'),
                'create_at'=> date("Y-m-d h:i:s")
            );
            $this->pelanggan->insert_pelanggan($object);
            $this->session->set_flashdata(array(
                'msg'=> 'Data Berhasil di Tambah',
                'status'=> 'success'
            ));
            activity_log('Tambah Pelanggan',$nama_perusahaan);
            redirect('pelanggan');
        }
    
        function edit_pelanggan($id) {
            $data = array(
                'daerah' => $this->daerah,
                'kab' => $this->daerah->kabupaten(),
                'korlap' => $this->pelanggan->korlap(),
                'editdata' => $this->pelanggan->edit_pelanggan($id)->result_object(),
                'page' => "pelanggan/edit_pelanggan",
                'title' => "Edit Pelanggan"
            );
            $this->load->view('admin/index', $data);
        }
    
        function update_pelanggan() {
            $i=$this->input;
            $edit_id=xss_clean(htmlspecialchars($this->input->post('id')));
            $nama_perusahaan=xss_clean(addslashes(htmlspecialchars($this->input->post('nama_perusahaan'))));
            $nama_pic=xss_clean(addslashes(htmlspecialchars($this->input->post('nama_pic'))));
            $nomor_pic=xss_clean(addslashes(htmlspecialchars($this->input->post('nomor_pic'))));
            $jabatan=xss_clean(addslashes(htmlspecialchars($this->input->post('jabatan'))));
            $kabupaten=xss_clean(addslashes(htmlspecialchars($this->input->post('kabupaten'))));
            $kecamatan=xss_clean(addslashes(htmlspecialchars($this->input->post('kecamatan'))));
            $desa=xss_clean(addslashes(htmlspecialchars($this->input->post('desa'))));
            $alamat=xss_clean(addslashes(htmlspecialchars($this->input->post('alamat'))));
            $email=xss_clean(addslashes(htmlspecialchars($this->input->post('email'))));
            $status=xss_clean(addslashes(htmlspecialchars($this->input->post('status'))));
            $kategori=xss_clean(addslashes(htmlspecialchars($this->input->post('kategori'))));
            $jenis=xss_clean(addslashes(htmlspecialchars($this->input->post('jenis'))));
            $bandwidth=xss_clean(addslashes(htmlspecialchars($this->input->post('bandwidth'))));
            $id_user = $this->encryption->decrypt($this->session->userdata('_user_id'));
            $korlap= $this->session->userdata('_status')== 'Korlap'? $id_user : xss_clean(addslashes(htmlspecialchars($this->input->post('korlap'))));
            
            
            $object=array(
                'nama_usaha'=> $nama_perusahaan,
                'pic'=> $nama_pic,
                'no_pic'=> $nomor_pic,
                'jabatan'=> $jabatan,
                'kabupaten'=> $kabupaten,
                'kecamatan'=> $kecamatan,
                'desa'=> $desa,
                'alamat'=> $alamat,
                'email'=> $email,
                'status'=> $status,
                'kategori'=> $kategori,
                'jenis'=> $jenis,
                'bandwidth'=> $bandwidth,
                'id_korlap'=> $korlap,
                'create_by'=> $this->session->userdata('_nama'),
                'create_at'=> date("Y-m-d h:i:s")
            );
            $this->pelanggan->update_pelanggan($edit_id, $object);
            $this->session->set_flashdata(array(
                'msg'=> 'Data Berhasil di Ubah',
                'status'=> 'success'
            ));
            activity_log('Ubah Pelanggan',$nama_perusahaan);
            redirect('pelanggan');

    
    
        }
    
    
        function hapus_pelanggan($id) {
    
            $this->pelanggan->hapus_pelanggan($id);
            $this->session->set_flashdata(array(
                'msg'=> 'Data Berhasil di Hapus',
                'status'=> 'success'
            ));
            activity_log('Hapus Pelanggan',$id);
            redirect('pelanggan');
        }
    
           

}