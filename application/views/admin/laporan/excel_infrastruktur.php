<?php
header("Cache-Control: no-chace, must-revalidate");
header("Pragma: no-chace"); 
 header('Content-type: application/x-msexcel');
 header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename=infrastruktur-wilayah.xls');



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
<span style="margin-left: 20px;font-size: 20px"><b>Data Infrastruktur</b></span>
	
</div>
<br>
 <table border="1" >
                    <thead>
                        <tr style="background-color:blue;">
                        <th style="border:1px solid #000;width:30px;color: white">No</th>
                         <th style="border:1px solid #000;width:250;color: white">Nama Wilayah</th>
                         <th style="border:1px solid #000;width:250;color: white">Nama Barang</th>
                         <th style="border:1px solid #000;width:250;color: white">Merk/Type</th>
                        <th style="border:1px solid #000;width:120px;color: white">MAC/SN</th>
                        <th style="border:1px solid #000;width:250;color: white">Jumlah</th>
                        <th style="border:1px solid #000;width:250;color: white">Satuan</th>
                        <th style="border:1px solid #000;width:70px;color: white">Kondisi</th>
                        <th style="border:1px solid #000;width:70px;color: white">Keterangan</th>
                       </tr>
                    
                    </thead>
                    <tbody>

                        <?php  
                        $no = 1;
                        foreach ($data as $lihat):
                        ?>

                        <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $lihat->nama_wilayah?></td>
                        <td><?= $lihat->nama_barang?></td>
                        <td><?= $lihat->merk?></td>
                        <td><?= $lihat->mac?></td>
                        <td><?= $lihat->jumlah?></td>
                        <td><?= $lihat->satuan?></td>
                        <td><?= $lihat->kondisi?></td>
                        <td><?= $lihat->keterangan?></td>
                    	</tr>
                    	<?php endforeach; ?>
                    </tbody>
                  </table>