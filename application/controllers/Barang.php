<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_admin');
		  // $this->load->helper('currency_format_helper');
	}
function tambah_jenis(){
		$this->check_login->check();
                    $i=$this->input;
					$object = array(
			  	     		 
					 		
				  			'nama_barang' =>$i->post('nama_barang'),
				  			'satuan' =>$i->post('satuan'),
				  			'stok' =>0
				  			
					  );
		$this->db->insert('barang', $object);
		redirect('admin/barang_masuk','refresh');
                }


	public function getbarang($id)
	{

		$barang = $this->model_admin->detailjenis($id);

		if ($barang) {


			echo ' 
			
                            <input type="text" name="id_barang" value="'.$barang->id_barang.'" hidden> 
                    <div class="form-group">
                      <label class="control-label col-md-3" 
                        for="nama_barang">Nama jenis barang :</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control reset" 
                            name="nama_barang" id="nama_barang" 
                            readonly="readonly" value="'.$barang->nama_barang.'" required>
                      </div>
                    </div>
                     <!-- <div id="barang"> -->
                    <div class="form-group">
                      <label class="control-label col-md-3" 
                        for="satuan">Satuan :</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control reset" 
                            name="satuan" id="satuan" 
                            readonly="readonly" value="'.$barang->satuan.'" required>
                      </div>
                    </div>

                   
';
	    }
	    else{

	    	echo ' 
                    <div class="form-group">
                      <label class="control-label col-md-3" 
                        for="nama_barang">Nama jenis barang :</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control reset" 
                            name="nama_barang" id="nama_barang" 
                            readonly="readonly" required>
                      </div>
                    
                    <div class="form-group">
                      <label class="control-label col-md-3" 
                        for="satuan">Satuan :</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control reset" 
                            name="satuan" id="satuan" 
                            readonly="readonly" required>
                      
                    </div>
';
	    }

	}
	public function getbarang1($id)
	{

		$barang = $this->model_admin->detailjenis($id);

		if ($barang) {

			if ($barang->stok == '0' ) {
				$disabled = 'disabled';
				$info_stok = '<span class="help-block badge" id="reset" 
					          style="background-color: #d9534f;">
					          stok habis</span>';
			}else{
				$disabled = '';
				$info_stok = '<span class="help-block badge" id="reset" 
					          style="background-color: #5cb85c;">stok : '
					          .$barang->stok.'</span>';
			}
			echo ' 
			
                    


                    <input type="text" name="id_barang" value="'.$barang->id_barang.'" hidden> 
                    <div class="form-group">
                      <label class="control-label col-md-3" 
                        for="nama_barang">Nama jenis barang :</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control reset" 
                            name="nama_barang" id="nama_barang" 
                            readonly="readonly" value="'.$barang->nama_barang.'" required>
                      </div>
                    </div>
                     <!-- <div id="barang"> -->
                    <div class="form-group">
                      <label class="control-label col-md-3" 
                        for="satuan">Satuan :</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control reset" 
                            name="satuan" id="satuan" 
                            readonly="readonly" value="'.$barang->satuan.'" required>
                      </div>
                    </div>
                     <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="qty">Jumlah :</label>
				      <div class="col-md-4">
				        <input type="number" class="form-control reset" 
				        	name="jumlah" placeholder="Isi jumlah..."  
				        	id="jumlah" min="0"  
				        	max="'.$barang->stok.'" '.$disabled.' required > 
				      </div>'.$info_stok.'
				    </div>
            
                  
                   
';
	    }
	    else{

	    	echo ' 
	    		  <input type="text" name="id_barang"  hidden> 
                    <div class="form-group">
                      <label class="control-label col-md-3" 
                        for="nama_barang">Nama jenis barang :</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control reset" 
                            name="nama_barang" id="nama_barang" 
                            readonly="readonly" required>
                      </div>
                    </div>
      
                    <div class="form-group">
                      <label class="control-label col-md-3" 
                        for="satuan">Satuan :</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control reset" 
                            name="satuan" id="satuan" 
                            readonly="readonly" required>
                      </div>
                    </div>
                      <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="qty">Jumlah :</label>
				      <div class="col-md-4">
				        <input type="number" class="form-control reset" 
				        	name="jumlah" placeholder="Isi jumlah..."  
				        	id="jumlah" required>
				      </div>
				    </div>




';
	    }

	}



   function insert_barang_masuk(){
		$this->check_login->check();
                    $i=$this->input;
					$object = array(
			  	     		 'id_barang_masuk' =>$i->post('nomasuk'),
					 		 'id_pemberi' =>$i->post('pemberi'),
				  			'id_barang' =>$i->post('id_barang'),
				  			'jumlah' =>$i->post('jumlah'),
				  			'tgl_masuk' => $i->post('tgl_masuk')
					  );
		$this->db->insert('barang_masuk', $object);
		redirect('admin/barang_masuk','refresh');
                
}


}