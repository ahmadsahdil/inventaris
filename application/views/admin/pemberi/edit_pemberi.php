<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Edit
              <small>Pemberi</small>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="<?php echo base_url(); ?>admin/supplier">Supplier</a></li>
              <li class="active">Edit</li>
              <!--
              <li><a href="#">Layout</a></li>
              <li class="active">Top Navigation</li>
              -->
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form Data Edit Supplier</h3>
              </div>
              <div class="box-body">
                <!-- form start -->
                <?php echo form_open_multipart('admin/update_supplier'); ?>
                <?php  
                foreach ($editdata as $data):
                ?>
                  
                  <div class="form-group">
                    <label for="nama_pemberi">Pihak Yang Menyerahkan</label>
                      <input type="text" class="form-control" name="nama_pemberi" value="<?php echo $data->nama_pemberi ?>"  required/>
                  </div>
                    <div class="form-group">
                    <label for="nama">Atas Nama</label>
                      <input type="text" class="form-control" name="nama" value="<?php echo $data->nama ?>"  />
                  </div>
                  </div>
                    <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                      <input type="text" class="form-control" name="keterangan" value="<?php echo $data->keterangan_pemberi ?>"  />
                  </div>
               
                  <input type="hidden" name="id" value="<?php echo $data->id_pemberi ?>">
                  <a href="<?php echo base_url(); ?>admin/barang_masuk" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Ubah</button>
                <?php endforeach ?>
                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>