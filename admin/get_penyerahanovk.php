<?php
include '../conn.php';?>

	<div class="table-responsive">
	<table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
      <th>ID Penyerahan</th>
      <th>ID Produksi</th>
	  <th>Tanggal Terima OVK</th>
	  <th>Surat Jalan</th>
	  <th>Periode</th>
	 
      <th>Pilihan</th>
	 </tr>
	 </thead>
        <tbody>
		<!--/.tampil-->
    <?php
      $tanggal = date('Y-m-d');

       if (isset($_GET['s'])) {
        $search = $_GET['s'];
        $sql = mysqli_query($koneksi, "SELECT * From `tbpenyerahanovk` WHERE `IDPenyerahanOVK` LIKE '%{$search}%' OR`IDProduksi` LIKE '%{$search}%' OR `TglTerimaOVK` LIKE '%{$search}%' OR `SJOVK` LIKE '%{$search}%' OR `Periode` LIKE '%{$search}%' order by `IDPenyerahanOVK` ASC");
          } else {
          $sql = mysqli_query($koneksi, "SELECT * From `tbpenyerahanovk` order by `IDPenyerahanOVK` asc");
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
          <td >'.$data[1].'</td>
		  <td >'.$data[2].'</td>
		  <td >'.$data[3].'</td>
		  <td >'.$data[4].'</td>

		<td><a href="cetakpenovkper.php?id='.$data[0].'"  target="_blank" class="btn-primary btn-sm"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a> 
        
		<a href="editpenyerahanovk.php?id='.$data[0].'"  class="btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
          <a href="?del='.$data[0].'" class="btn-danger btn-sm" ><span class="glyphicon glyphicon-trash" aria-hidden="true" onclick="return confirm(\'Hapus data ini?\')"></span></a></td>
        </tr>';
		}
      }
    ?>
	</table>
	</div>




<script type="text/javascript">
function confirm_delete() {
  return confirm('Hapus data ini?');
}
</script>