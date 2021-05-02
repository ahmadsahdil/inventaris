<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
               <?php echo $title." | ".$this->model_admin->detailwilayah($this->uri->segment(3))->nama_wilayah?> 
           
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
                   <a href="<?php echo base_url(); ?>admin/wilayah" class="btn btn-sm btn-success " style="margin-right: 20px "><i class="fa fa-backward"></i> Kembali</a>
                   <a href="<?php echo base_url('admin/tambah_infrastruktur/'.$this->uri->segment(3)); ?>" class="btn btn-sm btn-primary " style="margin-right: 20px "><i class="fa fa-plus"></i> Tambah</a>

                  </h3>

                  <div class="box-tools">

                  </div>
                </div>
          
                <div class="box-body table-responsive no-padding">
                  <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
                      <th>No</th>
                        <th>Nama Barang</th>
                        <th>Merk/Type</th>
                        <th>MAC/SN</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Kondisi</th>
                        <th>Keterangan</th>
                        <th>Wilayah</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                      	<?php  
                        
                        $no = 1;
                        foreach ($data as $lihat):
                          $wilayah= $this->model_admin->detailwilayah($lihat->id_wilayah);
                        ?>
                    	<tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $lihat->nama_barang ?></td>
                        <td><?php echo $lihat->merk ?></td>
                        <td><?php echo $lihat->mac ?></td>
                        <td><?php echo $lihat->jumlah ?></td>
                        <td><?php echo $lihat->satuan ?></td>
                        <td><?php echo $lihat->kondisi ?></td>
                        <td><?php echo $lihat->keterangan ?></td>
                          
                        <td align="center">
                          
                            <a href="<?php echo base_url(); ?>admin/edit_infrastruktur/<?php echo $lihat->id_infrastruktur?>" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i> Edit</a>
                         <?php include 'hapus_infrastruktur.php'; ?>
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
