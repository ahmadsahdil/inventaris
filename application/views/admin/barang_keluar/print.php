<button type="button" class="btn  btn-primary" data-toggle="modal" data-target="#print">
<i class="fa fa-cloud-download"></i>Print
</button>
<div class="modal modal-primary fade" id="print">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Download Berdasarkan Nama Penerima / Tanggal Keluar </h4>
      </div>
      <div class="modal-body">
           <?php echo form_open('report/tampil_barang_keluar/'); ?>
           <div class="form-group">
                    <select name="penerima" class="form-control" >
                    <option value="">--Pilih--</option>
                    <!-- <option value="semua">Semua</option> -->
                        <?php foreach ($penerima as $lihat) {?>   

                     <option value="<?php 
                      echo $lihat->id_penerima?>"><?php echo $lihat->nama_penerima?></option>
                        <?php }; ?>
                      </select>
                      </div>
                      <br>
                       <input type="date" class="form-control" value="<?= date("mm/dd/yyyy"); ?>" name="tgl_keluar"  />
                       <br>
                        <!--  <button type="submit" name="simpan" class="btn btn-outline  pull-right" id="simpan" ><i class="fa fa-print"></i>  Download</button> -->
                         <button type="submit" name="export" class="btn btn-outline  pull-right"  id="export" ><i class="fa fa-file-excel-o"></i>  Export Excel</button>
                           <a href="<?php echo base_url(); ?>report/tampil_keluar" class="btn btn-sm btn-primary "><i class="fa fa-file-excel-o"></i> Cetak Semua</a>
                          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <?php echo form_close(); ?>
                 <br>
                 <br>
      </div>

     <!--  <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
    
           

      </div> -->
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
