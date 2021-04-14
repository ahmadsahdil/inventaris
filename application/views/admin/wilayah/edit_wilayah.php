<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Edit
              <small>Wilayah</small>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="<?php echo base_url(); ?>admin/wilayah">Wilayah</a></li>
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
                <?php echo form_open_multipart('admin/update_wilayah'); ?>
                <?php  
                foreach ($editdata as $data):
                ?>
                  
                  <div class="form-group">
                    <label for="nama_wilayah">Nama Wilayah</label>
                      <input type="text" class="form-control" name="nama_wilayah" value="<?php echo $data->nama_wilayah ?>" required />
                  </div>              
                  <input type="hidden" name="id" value="<?php echo $data->id_wilayah ?>">
                  <a href="<?php echo base_url(); ?>admin/wilayah" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php endforeach ?>
                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>