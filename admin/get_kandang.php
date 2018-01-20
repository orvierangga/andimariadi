<?php
include '../conn.php';?>

	<div class="table-responsive">
	<table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
      <th>ID Data Kandang</th>
      <th>ID Peternak</th>
	  <th>Luas Kandang</th>
	  <th>Kapasitas</th>
	  <th>Lokasi</th>
	 
      <th>Pilihan</th>
	 </tr>
	 </thead>
        <tbody>
		<!--/.tampil-->
		<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
    <?php
      $tanggal = date('Y-m-d');

       if (isset($_GET['s'])) {
        $search = $_GET['s'];
        $sql = mysqli_query($koneksi, "SELECT `tbdatakandang` .*, `tbjeniskandang`.`IDJenisKandang`,`tbjeniskandang`.`LuasKandang`,`tbjeniskandang`.`Kapasitas` FROM `tbdatakandang` LEFT JOIN `tbjeniskandang` ON `tbdatakandang`.`IDJenisKandang` = `tbjeniskandang`.`IDJenisKandang` WHERE `tbdatakandang`.`IDDataKandang` LIKE '%{$search}%' OR `tbdatakandang`.`IDPeternak` LIKE '%{$search}%' OR `tbjeniskandang`.`LuasKandang` LIKE '%{$search}%' OR `tbjeniskandang`.`Kapasitas` LIKE '%{$search}%' OR `tbdatakandang`.`Lokasi` LIKE '%{$search}%' order by `tbdatakandang`.`IDDataKandang` ASC");
          } else {
          $sql = mysqli_query($koneksi, "SELECT `tbdatakandang` .*, `tbjeniskandang`.`IDJenisKandang`,`tbjeniskandang`.`LuasKandang`,`tbjeniskandang`.`Kapasitas` FROM `tbdatakandang` LEFT JOIN `tbjeniskandang` ON `tbdatakandang`.`IDJenisKandang` = `tbjeniskandang`.`IDJenisKandang` order by `tbdatakandang`.`IDDataKandang` asc");
          }
      
      if (mysqli_num_rows($sql) == 0) {
        echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
      } else {
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
          $no++;
          echo '
        <tr align="center" bgcolor="#CCCCCC">
           
          <td>'.$data[0].'</td>
          <td ><a href="datapeternak.php?id='.$data[1].'" <span class="glyphicon glyphicon-user"></span></a> '.$data[1].'</td>
		  
		   <td >'.$data[5].'</td>
		    <td >'.$data[6].'</td>
			<td >'.$data[3].'</td>
		  
		<td><a href="editdatakandang.php?id='.$data[0].'"  class="btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
          <a href="?del='.$data[0].'" class="btn-danger btn-sm" ><span class="glyphicon glyphicon-trash" aria-hidden="true" onclick="return confirm(\'Hapus data ini?\')"></span></a></td>
        </tr>';
		}
      }
    ?>
	</table>
	
	</div>
	
<div class="table-responsive">
 <a href="#" target="_blank" class="btn btn-primary" name="simpan"><span class="glyphicon glyphicon-print"></span> Cetak Data</button><a/>
</div>
 




<script type="text/javascript">
function confirm_delete() {
  return confirm('Hapus data ini?');
}
</script>