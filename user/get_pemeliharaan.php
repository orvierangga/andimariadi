<?php
include '../conn.php';?>

	<div class="table-responsive">
	<table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
      <th>ID Produksi</th>
      <th>Data Peternak</th>
	  <th>Minggu Ke</th>
	  <th>Tanggal</th>
	  <th>Umur</th>
	  <th>Pakan STD</th>
	  <th>Pakan ACT</th>
	  <th>ID Pakan</th>
	  <th>Mati</th>
	  <th>Culling</th>
	  <th>Afkir</th>
	  <th>ID OVK</th>
	  <th>OVK Pakai</th>
	 
	 
      <th>Pilihan</th>
	 </tr>
	 </thead>
        <tbody>
		<!--/.tampil-->
    <?php
      $tanggal = date('Y-m-d');

       if (isset($_GET['s'])) {
        $search = $_GET['s'];
        $sql = mysqli_query($koneksi, "SELECT * from tbpemeliharaanharian where `IDPHarian` LIKE '%{$search}%'order by `IDPHarian` ASC");
          } else {
          $sql = mysqli_query($koneksi, "SELECT * from tbpemeliharaanharian order by `IDPHarian` asc");
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
          <td >'.$data[1].'. '.$data[10].' ('.$data[11].')</td>
		  <td >'.$data[4].'</td>
		  <td >'.$data[7].'</td>
		  <td >'.$data[9].'</td>
		   

		<td><a href="pemeliharaanharian.php?id='.$data[0].'"  class="btn-primary btn-sm"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a> 
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