
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Tambah
              <small>Penerima</small>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="<?php echo base_url(); ?>admin/penerima">Penerima</a></li>
              <li class="active">Tambah</li>

            </ol>
          </section>
 <?php  if($this->session->flashdata('alert')){
       echo '<div class="alert alert-danger">';
      echo $this->session->flashdata('alert');
      echo '</div>';
    }?>
          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form Data Tambah Penerima</h3>
              </div>
              <div class="box-body">
                <!-- form start -->
                <?php echo form_open('admin/insert_penerima'); ?>
                  <div class="form-group">
                   <label>Pihak Yang Menerima</label>
                      <input type="text" class="form-control" name="nama_penerima" placeholder="Masukkan Nama Penerima" required />
                  </div>
                   <div class="form-group">
                   <label>Alamat</label>
                      <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat"  />
                  </div>
                 
                 
                 
                  <a href="<?php echo base_url(); ?>admin/penerima/penerima" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php echo form_close(); ?>
                
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>