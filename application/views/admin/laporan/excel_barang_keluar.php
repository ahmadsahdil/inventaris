<?php
header("Cache-Control: no-chace, must-revalidate");
header("Pragma: no-chace"); 
 header('Content-type: application/x-msexcel');
 header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename=Barang_keluar.xls');



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
<span style="margin-left: 20px;font-size: 20px"><b>Data Barang Keluar</b></span>
	
</div>
<br>
 <table border="1" >
                    <thead>
                        <tr style="background-color:blue;">
                        <th style="border:1px solid #000;width:30px;color: white">No</th>
                         <th style="border:1px solid #000;width:250;color: white">Pihak Yang Menerima</th>
                         <th style="border:1px solid #000;width:250;color: white">Atas Nama</th>
                         <th style="border:1px solid #000;width:250;color: white">Keterangan</th>
                        <th style="border:1px solid #000;width:120px;color: white">Tanggal Keluar</th>
                        <th style="border:1px solid #000;width:250;color: white">Nama Barang</th>
                        <th style="border:1px solid #000;width:250;color: white">Merk/Type</th>
                        <th style="border:1px solid #000;width:70px;color: white">Jumlah</th>
                        <th style="border:1px solid #000;width:70px;color: white">satuan</th>
                        <th style="border:1px solid #000;width:150px;color: white">Keterangan Barang</th>
                       </tr>
                    
                    </thead>
                    <tbody>

                        <?php  
                        $no = 1;
                        foreach ($data as $lihat):
                        ?>

                        <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $lihat->nama_penerima ?></td>
                        <td><?php echo $lihat->atas_nama ?></td>
                        <td><?php echo $lihat->keterangan_penerima ?></td>
                          <td><?php echo date('d M Y',strtotime($lihat->tgl_keluar)) ?></td>
                          <td><?php echo $lihat->nama_barang ?></td>
                          <td><?php echo $lihat->merk_barang ?></td>
                          <td><?php echo $lihat->jumlah_keluar ?></td>
                          <td><?php echo $lihat->satuan ?></td>
                           <td><?php echo $lihat->keterangan_keluar ?></td>
                    	</tr>
                    	<?php endforeach; ?>
                    </tbody>
                  </table>