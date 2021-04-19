
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
                  </h3>
                  <div class="box-tools">

                  </div>
                </div>
                <select name="kabupaten" id="kabupaten" style="width: 200px;">
          <option value="">Pilih</option>
          
          <?php
          foreach($kab as $tes){ // Lakukan looping pada variabel siswa dari controller
            echo "<option value='".$tes->id."'>".$tes->nama."</option>";
          }
          ?>
          </select>
  <p>Kecamatan :</p>
  <select name="kecamatan" class="form-control" id="kecamatan">
   <option>Select Kecamatan</option>
  </select>

  <p>Desa :</p>
  <select name="des" class="form-control" id="desa">
   <option>Select Desa</option>
  </select>
  <hr>
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->



      <script>
      $(document).ready(function(){
     $("#kabupaten").change(function (){
        console.log($(this).val());
                var url = "<?php echo site_url('daerah/getkecamatan');?>/"+$(this).val();
                $('#kecamatan').load(url);
                return false;
                
            })
     $("#kecamatan").change(function (){
        console.log($(this).val());
                var url = "<?php echo site_url('daerah/getdesa');?>/"+$(this).val();
                $('#desa').load(url);
                return false;
                
            })
            })
      </script>
