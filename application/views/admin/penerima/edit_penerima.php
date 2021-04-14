<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Edit
              <small>Penerima</small>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="<?php echo base_url(); ?>admin/penerima">Penerima</a></li>
              <li class="active">Edit</li>

            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form Data Edit pemberi</h3>
              </div>
              <div class="box-body">
                <!-- form start -->
                <?php echo form_open_multipart('admin/update_penerima'); ?>
                <?php  
                foreach ($editdata as $data):
                ?>
                  
                  <div class="form-group">
                    <label for="nama_penerima">Pihak Yang Menerima</label>
                      <input type="text" class="form-control" name="nama_penerima" value="<?php echo $data->nama_penerima ?>" required />
                  </div>
                  <div class="form-group">
                    <label for="atas_nama">Atas Nama</label>
                      <input type="text" class="form-control" name="atas_nama" value="<?php echo $data->atas_nama ?>" required />
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                      <input type="text" class="form-control" name="alamat" value="<?php echo $data->alamat ?>"  />
                  </div>
                
                  <input type="hidden" name="id" value="<?php echo $data->id_penerima ?>">
                  <a href="<?php echo base_url(); ?>admin/penerima" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php endforeach ?>
                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>