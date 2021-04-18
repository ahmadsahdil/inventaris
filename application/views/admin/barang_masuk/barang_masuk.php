 
  <style type="text/css">
        #header,#footer{
            background-color: #337ab7;
            color: #fff;
            text-align: center;
        }
        #header{
            margin-bottom: 30px;
        }
        #header h1{
            margin: 0;
            padding: 15px;
        }
        #footer{
            padding: 3px;
        }
        .btn{
            border-radius: 2px;
        }
        .btn-kecil{
            padding: 0 6px 0 6px;
        }
        .form-control[disabled], .form-control[readonly], 
        fieldset[disabled] .form-control{
            background-color: #EBF2F8;
        }
        .besar{
            font-size: 20px;
            font-weight: 300;
        }
        table th,table td{
            text-align: center;
        }
        form{
            margin-top: 20px;
        }
        .mb{
            margin-bottom: 30px;
        }
        .nav ul li{
            list-style: none;
        }
        .nav ul{
            padding-left: 20px;
            
        }
        .nav ul li a{
            text-decoration: none;
            display: block;
            padding: 4px;
            margin: 3px;
        }
        .nav ul li a:hover{
            text-decoration: none;
            color: #fff;
            background-color: #337ab7;
            border-radius: 2px;
        }
        .nav>li>a:hover{
            background-color: #337ab7;
            color: #fff;
        }
        .nav ul .active{
            background-color: #337ab7;
            border-radius: 2px;
        }
        .nav ul .active a{
            color: #fff;
        }
        .nav li a:active,.nav li a:focus{
            background-color: #337ab7;
            border-radius: 2px;
            color: #fff;
        }
    </style>
</head>
<body>

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="panel panel-default">
         <div class="panel-body form-horizontal">
         
           <div class="form-group" style="text-align: center;">
                         <label name="nama_pemberi" id="nama_pemberi" style="font-size: 20px" ><?php echo $nama_pemberi->nama_pemberi?></label>
    
                    </div>
 
                <?php  echo form_open('admin/insert_barang_masuk'); ?>
                 <input type="text" name="id_pemberi" value="<?php echo $id_pemberi?> " hidden> 
                <div class="form-group">
                  <label class="control-label col-md-3" 
                    for="id_barang">Id barang :</label>
                  <div class="col-md-5">
                    <input list="list_barang" class="form-control reset" 
                        placeholder="Isi id..." name="id_barang" id="id_barang" 
                        autocomplete="off" onchange="showbarang(this.value)" required>
                      <datalist id="list_barang">
                       <?php  
                         foreach ($barang as $barang): ?>
                            <option value="<?= $barang->id_barang ?>">|<?= $barang->nama_barang ?>|<?= $barang->merk_barang ?>|<?= $barang->satuan ?></option>
                        <?php endforeach ?>
                        
                      </datalist>
                  </div>
                  <div class="col-md-1">
                   
                  </div>
                </div>
                <div id="barang">
                    <div class="form-group">
                      <label class="control-label col-md-3" 
                        for="nama_barang">Nama Barang :</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control reset" 
                            name="nama_barang" id="nama_barang" 
                            readonly="readonly" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3" 
                        for="merk">Merk/Type :</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control reset" 
                            name="merk" id="merk" 
                            readonly="readonly" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3" 
                        for="satuan">Satuan :</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control reset" 
                            name="satuan" id="satuan" 
                            readonly="readonly" required>
                      </div>
                    </div>

                      </div>
                <div class="form-group">
                  <label class="control-label col-md-3" 
                    for="Jumlah">Jumlah:</label>
                  <div class="col-md-8">
                    <input type="number" class="form-control reset" 
                        name="jumlah" id="Jumlah " required 
                        >
                  </div>
                </div>
                  <div class="form-group">
                  <label class="control-label col-md-3" 
                    for="Keterangan">Keterangan:</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control reset" 
                        name="keterangan" id="Keterangan" 
                        >
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-md-3" 
                    for="tgl_masuk">Tanggal Masuk:</label>
                  <div class="col-md-8">

                    <input type="date" class="form-control reset" 
                        name="tgl_masuk" id="tgl_masuk" value="<?php echo date("Y-m-d"); ?>" required >bulan/tanggal/tahun
                  </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-3">
                          <?php include 'tambah_barang_masuk.php'; ?>
                    </div>
              
                   </div>

            
            <?php echo form_close(); ?> 
                    <a href="<?php echo base_url(); ?>admin/barang_masuk" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                    <a href="<?php echo site_url('report/excel_barang_masuk/'.$id_pemberi) ?>" class="btn btn-primary "><i class="fa fa-file-excel-o"></i> Export Excel</a>
                    <br>
                    <br>
             <div class="box-body table-responsive no-padding">
                  <table id="example1" class="table table-bordered table-hover dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Masuk</th>
                        <th>Nama Barang</th>
                        <th>Merk/Type</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        <?php  
                        $no = 1;
                        foreach ($data as $lihat):
                        $jenis= $this->model_admin->detailjenis($lihat->id_barang);

                        ?>

                        <tr>
                        <td><?php echo $no++ ?></td>
                          <td><?php echo date('d M Y',strtotime($lihat->tgl_masuk)) ?></td>
                          <td><?php echo $lihat->nama_barang ?></td>
                          <td><?php echo $jenis->merk_barang ?></td>
                          <td><?php echo $lihat->jumlah ?></td>
                          <td><?php echo $lihat->satuan ?></td>
                           <td><?php echo $lihat->keterangan_masuk ?></td>
<td>

                           <?php include 'edit_barang_masuk.php'; ?>
                            <?php include 'hapus_barang_masuk.php'; ?>
                          </td> 
                  
                          
                         <?php endforeach; ?>
                </tbody>
            </table>
        </div>
         

          </div>
        </div>
    </div><!-- end col-md-9 -->
    </div>
  </div>

</div>
 </section>
<script type="text/javascript">
   
    function showbarang(str) 
    {

        if (str == "") {
            $('#nama_barang').val('');
            $('#merk').val('');
            $('#satuan').val('');
            $('#jumlah').val('');
            $('#reset').hide();
            return;
        } else { 
          if (window.XMLHttpRequest) {
               xmlhttp = new XMLHttpRequest();
          } else {
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                  document.getElementById("barang").innerHTML = 
                  xmlhttp.responseText;
              }
          }
          xmlhttp.open("GET", "<?= base_url(
            'barang/getbarang') ?>/"+str,true);
          xmlhttp.send();
        }
        
        
    }
    

</script>