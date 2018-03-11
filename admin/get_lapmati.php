<?php
include '../conn.php';?>

	<div class="table-responsive">
	<table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
      <th>No</th>
	  <th>ID Pruduksi</th>
	  <th>Peternak</th>
	
	 
	  <th>ID Supplier</th>
	  <th>Strain</th>
	  <th>Tanggal Chick In</th>
	  <th>Jumlah Masuk</th>
	   <th>Jumlah Mati</th>
	 
	  <th>ID Kandang</th>
	  
	 
	 
	 </tr>
	 </thead>
        <tbody>
		<!--/.tampil-->
    <?php
      $tanggal = date('Y-m-d');
      $id = $_GET['id'];
       //if (isset($_GET['s'])) {
        //$search = $_GET['s'];
         //$sql = mysqli_query($koneksi, "SELECT * from tbpemeliharaanharian where `MingguKe` LIKE '%{$search}%' AND `IDProduksi`='$id' order by `IDPHarian` ASC");
       // $sql = mysqli_query($koneksi, "SELECT `tbpenyerahanbibit` .* , `tbpemeliharaanharian`.`IDProduksi`,SUM(`tbpemeliharaanharian`.`Mati`) as `total` FROM `tbpenyerahanbibit` LEFT JOIN `tbpemeliharaanharian` ON `tbpenyerahanbibit`.`IDProduksi` = `tbpemeliharaanharian`.`IDProduksi` where `tbpemeliharaanharian`.`IDProduksi` LIKE '%{$search}%' AND `tbpenyerahanbibit`.`Periode`='$id' order by `IDPHarian` desc");
       
		
          //$sql = mysqli_query($koneksi, "SELECT `tbpenyerahanbibit` .* , `tbpemeliharaanharian`.`IDProduksi`,SUM(`tbpemeliharaanharian`.`Mati`) as `total` FROM `tbpenyerahanbibit` LEFT JOIN `tbpemeliharaanharian` ON `tbpenyerahanbibit`.`IDProduksi` = `tbpemeliharaanharian`.`IDProduksi` where `tbpenyerahanbibit`.`Periode`='$id' order by `IDPHarian` desc");
          $sql = mysqli_query($koneksi, " SELECT `tbpenyerahanbibit` .* , `tbpemeliharaanharian`.`IDProduksi`,`tbpemeliharaanharian`.`Mati` FROM `tbpenyerahanbibit` LEFT JOIN `tbpemeliharaanharian` ON `tbpenyerahanbibit`.`IDProduksi` = `tbpemeliharaanharian`.`IDProduksi` where `tbpenyerahanbibit`.`Periode` ='$id' GROUP BY `tbpenyerahanbibit`.`IDProduksi` desc");
        
			   
      
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
		  <td >'.$data[5].'</td>
		   <td >'.$data[11].'</td>
		   <td >'.$data[9].'</td>
		  
		   
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
 <a href="lapmati.php?id='.$data[7].'" target="_blank" class="btn btn-primary" name="simpan"><span class="glyphicon glyphicon-print"></span> Cetak Data</button><a/>
</div>
<script type="text/javascript">
function confirm_delete() {
  return confirm('Hapus data ini?');
}
</script>