<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Edit
              <small>Infrastruktur</small>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="<?php echo base_url(); ?>admin/infrastruktur">Infrastruktur</a></li>
              <li class="active">Edit</li>

            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form Data Edit Infrastruktur</h3>
              </div>
              <div class="box-body">
                <!-- form start -->
                <?php echo form_open_multipart('admin/update_infrastruktur'); ?>
                <?php  
                foreach ($editdata as $data):
                ?>
                  
                  <div class="form-group">
                    <label for="nama_barang">Nama Perangkat</label>
                      <input type="text" class="form-control" name="nama_barang" value="<?php echo $data->nama_barang ?>" required />
                  </div>
                  <div class="form-group">
                    <label for="merk">Merk/Type</label>
                      <input type="text" class="form-control" name="merk" value="<?php echo $data->merk ?>" required />
                  </div>
                  <div class="form-group">
                    <label for="mac">MAC/SN</label>
                      <input type="text" class="form-control" name="mac" value="<?php echo $data->mac ?>"  />
                  </div>
                  <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                      <input type="number" class="form-control" name="jumlah" value="<?php echo $data->jumlah ?>"  />
                  </div>
                  <div class="form-group">
                    <label for="satuan">Satuan</label>
                      <input type="text" class="form-control" name="satuan" value="<?php echo $data->satuan ?>"  />
                  </div>
                  <div class="form-group">
                    <label for="kondisi">Kondisi</label>
                      <input type="text" class="form-control" name="kondisi" value="<?php echo $data->kondisi ?>"  />
                  </div>
                  <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                      <input type="text" class="form-control" name="keterangan" value="<?php echo $data->keterangan ?>"  />
                  </div>
                  <div class="form-group">
                    <label for="wilayah">Wilayah</label>
                    <select name="wilayah" class="form-control">
                      <?php  
                         foreach ($wilayah as $wilayah): ?>
                            <option value="<?= $wilayah->id_wilayah ?>" <?php if ($wilayah->id_wilayah==$data->id_wilayah) {
                              echo "selected";
                            } ?>><?= $wilayah->nama_wilayah ?></option>
                        <?php endforeach ?>
                        </select>
                  </div>
                
                  <input type="hidden" name="id" value="<?php echo $data->id_infrastruktur ?>">
                  <a href="<?php echo base_url(); ?>admin/infrastruktur" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php endforeach ?>
                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>