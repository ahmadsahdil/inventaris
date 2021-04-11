
<button type="button" class="btn btn-success btn-sm"" data-toggle="modal" data-target="#Tambah<?php echo $lihat->id_barang_masuk ?>"> 
<i class="fa fa-edit"></i>Edit
</button>

<div class="modal modal-default fade" id="Tambah<?php echo $lihat->id_barang_masuk ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit data</h4>
      </div>
      <div class="modal-body">
       <?php 
// atribut
       $atribut='class="form-horizontal"';

       // form open
       echo form_open(base_url('admin/update_barang_masuk'), $atribut);
        ?>
     <input type="" name="id_barang_masuk" value="<?php echo $lihat->id_barang_masuk ?>" hidden>

  <table width="100%" >
    <tr style="margin: 20px">


      <td style="margin-right: 10px;text-align: right; margin-bottom: 50px" width="40%">Nama Barang : </td>
      <td style="text-align: left"><input type="text" class="form-control" width="100%" name="barang" placeholder="Nama edit_barang_masuk" value="<?php echo $jenis->nama_barang ?>" required readonly></td>
    </tr>
   
    <tr>
      <td style="margin-right: 10px;text-align: right;" width="40%">Satuan: </td>
      <td style="text-align: left"><input type="text" class="form-control" name="satuan" value="<?php echo $jenis->satuan ?>" readonly></td>
    </tr>
    <tr>
      <td style="margin-right: 10px;text-align: right;" width="40%">Jumlah : </td>
      <td style="text-align: left"><input type="text" class="form-control" name="jumlah" value="<?php echo $lihat->jumlah ?>" readonly></td>
    </tr>
    <tr>
      <td style="margin-right: 10px;text-align: right;" width="40%">Keterangan : </td>
      <td style="text-align: left"><input type="text" class="form-control" name="keterangan" value="<?php echo $lihat->keterangan_masuk ?>"></td>
    </tr>
    <tr>
      <td style="margin-right: 10px;text-align: right;" width="40%">Tanggal Masuk : </td>
      <td style="text-align: left"><input type="date" class="glyphicon glyphicon-calendar" name="tanggal_masuk" value="<?php echo $lihat->tgl_masuk ?>" required><br>Bulan/Tanggal/Tahun</td>
    </tr>

 <tr>
   <td colspan="2" style="text-align: right;">
        
<button type="submit" class="btn btn-success btn-sm"> 
<i class="fa fa-edit"></i>Edit
</button>
      
   </td>
 </tr>
  
 </table>
        <?php 
// form close
        echo form_close();
         ?>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->