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
                  <a href="<?php echo base_url(); ?>admin/tambah_barang" class="btn btn-sm btn-primary " style="margin-right: 20px "><i class="fa fa-plus"></i> Tambah</a>          
                  <a href="<?php echo base_url(); ?>report/excel_barang" class="btn btn-sm btn-primary " style="margin-right: 20px "><i class="fa fa-print"></i> Excel</a>          
                  </h3>
                  <div class="box-tools">

                  </div>
                </div>
                         <div style="text-align: center;">
                 <?php  if($this->session->flashdata('msg')){
       echo '<div class="alert alert-success">';
      echo $this->session->flashdata('msg');
      echo '</div>';
    }else if($this->session->flashdata('error')){
  echo '<div class="alert alert-danger">';
      echo $this->session->flashdata('error');
      echo '</div>';

      }?>
      </div>
                <div class="box-body table-responsive no-padding">
                  <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
                      <th>ID</th>
                        <th>Nama barang</th>
                        <th>Merk/Type</th>
                        <th>Satuan</th>
                       
                       
                        <th>Aksi</th>
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
                      
                        
                          
                        <td align="center">
                          
                            <a href="<?php echo base_url(); ?>admin/edit_barang/<?php echo $lihat->id_barang?>" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i> Edit</a>
          
                           <?php include 'hapus_barang.php'; ?>
                        
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

