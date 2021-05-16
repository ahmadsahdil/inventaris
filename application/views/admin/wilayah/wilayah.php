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
                   <a href="<?php echo base_url(); ?>admin/tambah_wilayah" class="btn btn-sm btn-primary " style="margin-right: 20px "><i class="fa fa-plus"></i> Tambah</a>
                   <?php include 'print.php'; ?>
                  </h3>

                  <div class="box-tools">

                  </div>
                </div>

                <div class="box-body table-responsive no-padding">
                  <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
                      <th>ID</th>
                        <th>Nama Wilayah</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                      	<?php  
                        $no = 1;
                        foreach ($data as $lihat):
                        ?>
                    	<tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $lihat->nama_wilayah ?></td>                          
                        <td align="center">
                        <a href="<?php echo site_url('admin/lihat_infra/'.$lihat->id_wilayah) ?>" class="btn btn-sm btn-success "><i class="fa fa-check-square-o"></i> Lihat</a>
                            <a href="<?php echo base_url(); ?>admin/edit_wilayah/<?php echo $lihat->id_wilayah?>" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i> Edit</a>
                           <!--  <a href="<?php echo base_url(); ?>admin/hapus_wilayah/<?php echo $lihat->id_wilayah?>" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i> Hapus</a>
                         -->
                         <?php include 'hapus_wilayah.php'; ?>
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
