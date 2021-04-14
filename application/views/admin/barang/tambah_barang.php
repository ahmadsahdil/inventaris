
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Tambah
              <small>Barang</small>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="<?php echo base_url(); ?>admin/barang_masuk">Barang</a></li>
              <li class="active">Tambah</li>

            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form Data Tambah Barang</h3>
              </div>
              <div class="box-body">
                <!-- form start -->
                <?php echo form_open('admin/insert_barang'); ?>
                  <div class="form-group">
                   <label>Nama barang</label>
                      <input type="text" class="form-control" name="nama_barang" placeholder="Masukkan Nama barang" required />
                  </div>
                   <label>Merk/Type</label>
                      <input type="text" class="form-control" name="merk" placeholder="Masukkan Merk/Type barang" required />
                  </div>
                  <div class="form-group">
                   <label>Satuan</label>
                      <input type="text" class="form-control" name="satuan" placeholder="Masukkan Satuan" required />
                  </div>
                  <a href="<?php echo base_url(); ?>admin/barang/barang" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php echo form_close(); ?>
                
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>