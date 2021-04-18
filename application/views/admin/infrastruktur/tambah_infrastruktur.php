
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Tambah
              <small>Infrastruktur</small>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="<?php echo base_url(); ?>admin/infrastruktur">Infrastruktur</a></li>
              <li class="active">Tambah</li>

            </ol>
          </section>
          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form Data Tambah Infrastruktur</h3>
              </div>
              <div class="box-body">
                <!-- form start -->
                <?php echo form_open('admin/insert_infrastruktur'); ?>
                <div class="form-group">
                    <label for="nama_barang">Nama Perangkat</label>
                      <input type="text" class="form-control" name="nama_barang" value="" required />
                  </div>
                  <div class="form-group">
                    <label for="merk">Merk/Type</label>
                      <input type="text" class="form-control" name="merk" value="" required />
                  </div>
                  <div class="form-group">
                    <label for="mac">MAC/SN</label>
                      <input type="text" class="form-control" name="mac" value=""  />
                  </div>
                  <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                      <input type="number" class="form-control" name="jumlah" value=""  />
                  </div>
                  <div class="form-group">
                    <label for="satuan">Satuan</label>
                      <input type="text" class="form-control" name="satuan" value=""  />
                  </div>
                  <div class="form-group">
                    <label for="kondisi">Kondisi</label>
                      <input type="text" class="form-control" name="kondisi" value=""  />
                  </div>
                  <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                      <input type="text" class="form-control" name="keterangan" value=""  />
                  </div>
                  <div class="form-group">
                    <label for="wilayah">Wilayah</label>
                    <select name="wilayah" class="form-control">
                      <?php  
                         foreach ($wilayah as $wilayah): ?>
                            <option value="<?= $wilayah->id_wilayah ?>"><?= $wilayah->nama_wilayah ?></option>
                        <?php endforeach ?>
                        </select>
                  </div>
                 
                 
                 
                  <a href="<?php echo base_url(); ?>admin/infrastruktur/infrastruktur" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php echo form_close(); ?>
                
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>