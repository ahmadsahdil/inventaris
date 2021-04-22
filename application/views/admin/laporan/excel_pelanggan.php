<?php
header("Cache-Control: no-chace, must-revalidate");
header("Pragma: no-chace"); 
 header('Content-type: application/x-msexcel');
 header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename=pelanggan.xls');



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
<span style="margin-left: 20px;font-size: 20px"><b>Data pelanggan</b></span>
	
</div>
<br>
 <table border="1" >
                    <thead>
                        <tr style="background-color:blue;">
                        <th style="border:1px solid #000;width:30px;color: white">No</th>
                         <th style="border:1px solid #000;width:250;color: white">Nama Perusahaan</th>
                         <th style="border:1px solid #000;width:250;color: white">Nama PIC</th>
                         <th style="border:1px solid #000;width:250;color: white">Nomor PIC</th>
                        <th style="border:1px solid #000;width:120px;color: white">Jabatan</th>
                        <th style="border:1px solid #000;width:250;color: white">Kabupaten</th>
                        <th style="border:1px solid #000;width:250;color: white">Kecamatan</th>
                        <th style="border:1px solid #000;width:70px;color: white">Desa</th>
                        <th style="border:1px solid #000;width:70px;color: white">Alamat</th>
                        <th style="border:1px solid #000;width:150px;color: white">Email</th>
                        <th style="border:1px solid #000;width:150px;color: white">Status</th>
                        <th style="border:1px solid #000;width:150px;color: white">Kategori</th>
                        <th style="border:1px solid #000;width:150px;color: white">Jenis</th>
                        <th style="border:1px solid #000;width:150px;color: white">Bandwidth</th>
                        <th style="border:1px solid #000;width:150px;color: white">Korlap</th>
                       </tr>
                    
                    </thead>
                    <tbody>

                        <?php  
                        $no = 1;
                        foreach ($data as $lihat):
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
                           <td><?= $lihat->bandwidth.' '. 'Mbps'?></td>
                           <td><?= $lihat->nama ?></td>
                    	</tr>
                    	<?php endforeach; ?>
                    </tbody>
                  </table>