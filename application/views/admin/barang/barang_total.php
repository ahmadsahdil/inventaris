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
                   
                  <a href="<?php echo site_url('report/excel_barang_total/') ?>" class="btn btn-sm btn-primary "  style="margin-right: 20px "><i class="fa fa-file-excel-o"></i> Export Excel</a>

                  </h3>
                  <div class="box-tools">

                  </div>
                </div>
                <div class="box-body table-responsive no-padding">
                  <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
                      <th>No</th>
                        <th>Nama barang</th>
                        <th>Merk/Type</th>
                        <th>Satuan</th>
                        <th>Barang Masuk</th>
                        <th>Barang Keluar</th>
                        <th>Stok</th>
                        <th>Keterangan</th>
                    </thead>
                    <tbody>
                        <?php  
                        $no = 1;
                        foreach ($data as $lihat):
                        ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $lihat->nama_barang ?></td>
                        <td><?php echo $lihat->merk_barang ?></td>
                        <td><?php echo $lihat->satuan ?></td>
                        <td><?php echo $lihat->total_masuk ?></td>
                        <td><?php echo $lihat->total_keluar ?></td>
                        <td><?php echo $lihat->stok ?></td>
                        <td><?php echo $lihat->keterangan ?></td>
                        
                          
                       
                                      
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
