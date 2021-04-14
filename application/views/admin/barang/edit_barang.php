<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Edit
              <small>Barang</small>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="<?php echo base_url(); ?>admin/barang">Barang</a></li>
              <li class="active">Edit</li>

            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form Data Edit Barang</h3>
              </div>
              <div class="box-body">
                <!-- form start -->
                <?php echo form_open('admin/update_barang'); ?>
                <?php  
                foreach ($editdata as $data):
                ?>
                  
                  <div class="form-group">
                    <label for="nama_donatur">Nama barang</label>
                      <input type="text" class="form-control" name="nama_barang" value="<?php echo $data->nama_barang ?>" required />
                  </div>
                 <div class="form-group">
                    <label for="satuan">Satuan</label>
                      <input type="text" class="form-control" name="satuan" value="<?php echo $data->satuan ?>" required />
                  </div>
                 <div class="form-group">
                    <label for="merk">Merk/Type</label>
                      <input type="text" class="form-control" name="merk" value="<?php echo $data->merk_barang ?>" required />
                  </div>
                 <div class="form-group">
                    <label for="total_masuk">Total Masuk</label>
                      <input type="number" class="form-control" name="total_masuk" value="<?php echo $data->total_masuk ?>" required />
                  </div>
                 <div class="form-group">
                    <label for="total_keluar">Total Keluar</label>
                      <input type="number" class="form-control" name="total_keluar" value="<?php echo $data->total_keluar ?>" required />
                  </div>
                 <div class="form-group">
                    <label for="stok">Stok</label>
                      <input type="number" class="form-control" name="stok" value="<?php echo $data->stok ?>" required />
                  </div>
                 <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                      <input type="text" class="form-control" name="keterangan" value="<?php echo $data->keterangan ?>" />
                  </div>
                   
                  
                
                  <input type="hidden" name="id" value="<?php echo $data->id_barang?>">
                  <a href="<?php echo base_url(); ?>admin/barang" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php endforeach ?>
                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>