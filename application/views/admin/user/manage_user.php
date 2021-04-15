<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage User
            <?= $this->session->userdata('_username'); ?>
                    </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage User</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          	<div class="row">          	
          	<div class="col-xs-12">
          		<div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                  	<a href="<?php echo base_url(); ?>user/tambah_user" class="btn btn-sm btn-primary "><i class="fa fa-plus"></i> Tambah</a>
                  </h3>
                  <div class="box-tools">
                 
                  </div>
                </div><!-- /.box-header -->
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
                        <th>No</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                      	<?php  
                        $no = 1;
                        foreach ($data as $lihat):
                        ?>
                    	<tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo ucwords($lihat->username)?></td>
                        <td><?php echo ucwords($lihat->status)?></td>
                    	
                        <td align="center">
                        <?php if($this->session->userdata('_status')=="Admin") {?>
                            <a onclick="return confirm('yakin?')" href="<?php echo base_url(); ?>user/reset_password/<?php echo $lihat->id_user ?>" class="btn btn-sm btn-success "><i class="fa fa-edit"></i> Reset PWD</a>
                            <?php } ?>
                            <a href="<?php echo base_url(); ?>user/edit_user/<?php echo $lihat->id_user ?>" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i> Edit</a>
                            <?php include 'hapus_user.php'; ?>

                      
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
