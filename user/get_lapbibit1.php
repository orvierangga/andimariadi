<?php
include '../conn.php';?>

	<div class="table-responsive">
	<table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
      <th>No</th>
	  <th>ID Produksi</th>
	  <th>Peternak</th>
	
	 
	 
	  <th>Strain</th>
	  <th>Tanggal Chick In</th>
	
	  <th>Jumlah Bibit Masuk</th>
	  <th>Harga Satuan Bibit</th>
	  <th>Total Harga Bibit</th>	  
	 
	 
	 </tr>
	 </thead>
        <tbody>
		<!--/.tampil-->
    <?php
      $tanggal = date('Y-m-d');
      $id = $_GET['id'];
       //$sql = mysqli_query($koneksi, "SELECT `tbpenyerahanbibit`.`IDPeternak`,`tbpenyerahanbibit`.`Strain`,`tbpenyerahanbibit`.`TanggalChickIn`,`tbpemeliharaanharian`.`IDPakan`, `tbpakan`.`JenisPakan`,`tbpakan`.`Merek`,`tbpemeliharaanharian`.`IDProduksi`,COUNT(`tbpemeliharaanharian`.`PakanStd`+`tbpemeliharaanharian`.`PakanAct`) as `total` FROM `tbpenyerahanbibit` LEFT JOIN `tbpemeliharaanharian` ON `tbpenyerahanbibit`.`IDProduksi` = `tbpemeliharaanharian`.`IDProduksi`LEFT JOIN `tbpakan` ON `tbpakan`.`IDPakan`= `tbpemeliharaanharian`.`IDPakan` WHERE `tbpenyerahanbibit`.`Periode`='$id' order by `tbpemeliharaanharian`.`IDProduksi` asc");
      $sql = mysqli_query($koneksi, "select `IDProduksi`,`IDPeternak`,`Strain`,`TanggalChickIn`, `JumlahChickIn`,`Harga`,`JumlahChickIn`*`Harga` AS `total` FROM `tbpenyerahanbibit` WHERE `Periode`='$id' GROUP BY `IDProduksi` ASC");
      
      if (mysqli_num_rows($sql) == 0) {
        echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
      } else {
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
          $no++;
          echo '
        <tr align="center" bgcolor="#CCCCCC">
          <td>'.$no.'</td> 
          <td>'.$data[0].'</td>
          <td >'.$data[1].'</td>
		  <td >'.$data[2].'</td>
		 <td >'.$data[3].'</td>
		  <td >'.$data[4].'</td>
		  <td >Rp. '.number_format($data[5]).'</td>	
			 <td >Rp. '.number_format($data[6]).'</td>		   
		</tr>';
		}
      }
    ?>
	</table>
	
<!-- koding pilihan
<td><a href="pemeliharaanharian.php?id='.$data[0].'"  class="btn-primary btn-sm"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a> 
          <a href="?del='.$data[0].'" class="btn-danger btn-sm" ><span class="glyphicon glyphicon-trash" aria-hidden="true" onclick="return confirm(\'Hapus data ini?\')"></span></a></td>
    --> 
</div>	
<div class="table-responsive">
 <a href="laporan/printtotalbm_thn.php" target="_blank" class="btn btn-primary" name="simpan"><span class="glyphicon glyphicon-print"></span> Cetak Data</button><a/>
</div>
<script type="text/javascript">
function confirm_delete() {
  return confirm('Hapus data ini?');
}
</script>