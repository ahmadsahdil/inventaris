
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Tambah
              <small>Supplier</small>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="<?php echo base_url(); ?>admin/supplier">Supplier</a></li>
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
                <h3 class="box-title">Form Data Tambah Supplier</h3>
              </div>
              <div class="box-body">
                <!-- form start -->
                <?php echo form_open('admin/insert_supplier'); ?>
                  <div class="form-group">
                   <label>Pihak Yang Menyerahkan</label>
                      <input type="text" class="form-control" name="nama_pemberi" placeholder="Masukkan Nama supplier" required />
                  </div>
                   <div class="form-group">
                    <label for="nama">Atas Nama</label>
                      <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama"  />
                  </div>
                   <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                      <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan"  />
                  </div>
                  <div class="form-group">
                  <label for="tgl_pemberi">Tanggal :</label>
                    <input type="date" class="form-control" 
                        name="tgl_pemberi" id="tgl_pemberi" value="<?php echo date("Y-m-d"); ?>" required >bulan/tanggal/tahun
                </div>
             
                 
                  <a href="<?php echo base_url(); ?>admin/barang_masuk" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php echo form_close(); ?>
                
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>