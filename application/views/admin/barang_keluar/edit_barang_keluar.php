
<button type="button" class="btn btn-success btn-sm"" data-toggle="modal" data-target="#Tambah<?php echo $lihat->id_barang_keluar ?>"> 
<i class="fa fa-edit"></i>Edit
</button>

<div class="modal modal-default fade" id="Tambah<?php echo $lihat->id_barang_keluar ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit data</h4>
      </div>
      <div class="modal-body">
       <?php 

       $atribut='class="form-horizontal"';

       echo form_open(base_url('admin/update_barang_keluar'), $atribut);
        ?>
     <input type="" name="id_barang_keluar" value="<?php echo $lihat->id_barang_keluar ?>" hidden>

  <table width="100%" >
    <tr style="margin: 20px">


      <td style="margin-right: 10px;text-align: right; margin-bottom: 50px" width="40%">Jenis Bantuan : </td>
      <td style="text-align: left"><input type="text" class="form-control" width="100%" name="barang" placeholder="Nama edit_barang_keluar" value="<?php echo $jenis->nama_barang ?>" required readonly></td>
    </tr>
   
    <tr>
      <td style="margin-right: 10px;text-align: right;" width="40%">Satuan: </td>
      <td style="text-align: left"><input type="text" class="form-control" name="satuan" value="<?php echo $jenis->satuan ?>" readonly></td>
    </tr>
    <tr>
      <td style="margin-right: 10px;text-align: right;" width="40%">Jumlah : </td>
      <td style="text-align: left"><input type="text" class="form-control" name="jumlah" value="<?php echo $lihat->jumlah_keluar ?>" readonly></td>
    </tr>
    <tr>
      <td style="margin-right: 10px;text-align: right;" width="40%">Keterangan : </td>
      <td style="text-align: left"><input type="text" class="form-control" name="keterangan_keluar" value="<?php echo $lihat->keterangan_keluar ?>"></td>
    </tr>
    <tr>
      <td style="margin-right: 10px;text-align: right;" width="40%">Tanggal Distribusi : </td>
      <td style="text-align: left"><input type="date" class="glyphicon glyphicon-calendar" name="tanggal_keluar" value="<?php echo $lihat->tgl_keluar ?>" required><br>bulan/Tanggal/Tahun</td>
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