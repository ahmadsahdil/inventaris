<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
               <?= $title ?> 
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">   <?= $title ?> </li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          	<div class="row">          	
          	<div class="col-xs-12">
          		<div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                  <a href="<?php echo base_url(); ?>pelanggan/tambah_pelanggan" class="btn btn-sm btn-primary " style="margin-right: 20px "><i class="fa fa-plus"></i> Tambah</a>
                  <?php include 'print.php'; ?>
                  </h3>
                  <div class="box-tools">

                  </div>
                </div>
                <div class="box-body table-responsive no-padding">
                  <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
                      <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Nama PIC</th>
                        <th>Nomor PIC</th>
                        <th>Jabatan</th>
                        <th>kabupaten</th>
                        <th>Kecamatan</th>
                        <th>Desa</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Kategori</th>
                        <th>Jenis</th>
                        <th>Bandwidth</th>
                        <th>Korlap</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                      	<?php  
                        $no = 1;
                        foreach ($hasil as $lihat):
                        ?>
                    	<tr>
                        <td><?= $no++ ?></td>
                        <td><?= $lihat->nama_usaha ?></td>
                        <td><?= $lihat->pic ?></td>
                        <td><?= $lihat->no_pic ?></td>
                        <td><?= $lihat->jabatan ?></td>
                        <td><?= $daerah->detail($lihat->kabupaten)->nama ?></td>
                        <td><?= $daerah->detail($lihat->kecamatan)->nama ?></td>
                        <td><?= $daerah->detail($lihat->desa)->nama ?></td>
                        <td><?= $lihat->alamat ?></td>
                        <td><?= $lihat->email ?></td>
                        <td><?= $lihat->status ?></td>
                        <td><?= $lihat->kategori ?></td>
                        <td><?= $lihat->jenis ?></td>
                        <td><?= $lihat->bandwidth.' '. 'Mbps' ?></td>
                        <td><?= $lihat->nama?></td>
                          
                        <td align="center">
                          
                            <a href="<?php echo base_url(); ?>pelanggan/edit_pelanggan/<?= $lihat->id_pelanggan?>" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i> Edit</a>
                           <?php include 'hapus_pelanggan.php'; ?>
                        
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
