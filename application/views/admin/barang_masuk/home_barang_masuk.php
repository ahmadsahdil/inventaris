

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
               <?php echo $title ?> 
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">   <?php echo $title ?> </li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
            <div class="row">           
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                  <a href="<?php echo base_url(); ?>admin/tambah_supplier" class="btn btn-sm btn-primary " style="margin-right: 20px "><i class="fa fa-plus"></i> Tambah</a>
                    <a href="<?php echo site_url('report/excel_masuk') ?>" class="btn btn-primary "><i class="fa fa-file-excel-o"></i> Export Excel</a>
                    
                  </h3>

                  <div class="box-tools">

                  </div>
                 
                </div>
                <div class="box-body table-responsive no-padding">
                  <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
                      <th>No</th>
                        <th>Pihak yang menyerahkan</th>
                        <th>Atas Nama</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php  
                        $no = 1;
                        foreach ($pemberi as $lihat):
                        ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $lihat->nama_pemberi ?></td>
                        <td><?php echo $lihat->nama ?></td>
                        <td><?php echo $lihat->keterangan_pemberi ?></td>
                          
                        <td align="center">
                          
                        <a href="<?php echo base_url(); ?>admin/edit_supplier/<?php echo $lihat->id_pemberi?>" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i> Edit</a>
                           <?php include 'hapus_pemberi.php'; ?>
                            <a href="<?php echo site_url('admin/tambah_barang_masuk/'.$lihat->id_pemberi) ?>" class="btn btn-sm btn-success "><i class="fa fa-check-square-o"></i> Pilih</a>
                           
                        
                        </td>    
                                      
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                  
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
