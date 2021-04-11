<?php
header("Cache-Control: no-chace, must-revalidate");
header("Pragma: no-chace"); 
 header('Content-type: application/x-msexcel');
 header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename=Barang_total.xls');



 ?>
<style type="text/css">
table,th,td{
	border-collapse: collapse;
	padding: 15px;
	margin: 10px;
	color: #000;
}
</style>

<div style="text-align: center;">
<span style="margin-left: 20px;font-size: 20px"><b>Data Total Masuk Dan Keluar</b></span>
	
</div>
<br>
  <table border="1" >
                    <thead style="color: white">
                      <tr style="background-color:blue;">
                        <th style="border:1px solid #000;width:30px;color: white">No</th>
                        <th style="border:1px solid #000;width:200;color: white">Nama Barang</th>
                        <th style="border:1px solid #000;width:70px;color: white">satuan</th>
                        <th style="border:1px solid #000;width:150px;color: white">Total Barang Masuk</th>
                        <th style="border:1px solid #000;width:160px;color: white">Total Barang Keluar</th>
                        <th style="border:1px solid #000;width:70px;color: white">Stok</th>
                     
                       
                    </thead>
                    <tbody>
                      	<?php  
                        $no = 1;
                        foreach ($data as $lihat):
                        ?>
                    	<tr>
                        <td><?php echo $no++ ?></td>
                          <td><?php echo $lihat->nama_barang?></td>
                          <td><?php echo $lihat->satuan ?></td>
                          <td><?php echo $lihat->total_masuk ?></td>
                           <td><?php echo $lihat->total_keluar ?></td>
                          <td><?php echo $lihat->stok ?></td>
                       
                                  		
                    	</tr>
                    	<?php endforeach; ?>
                    </tbody>
                  </table>