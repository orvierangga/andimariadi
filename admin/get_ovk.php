<?php
include '../conn.php';?>

	<div class="table-responsive">
	<table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
      <th>ID OVK</th>
      <th>Nama</th>
	  <th>Satuan</th>
	 
      <th>Pilihan</th>
	 </tr>
	 </thead>
        <tbody>
		<!--/.tampil-->
    <?php
      $tanggal = date('Y-m-d');

       if (isset($_GET['s'])) {
        $search = $_GET['s'];
        $sql = mysqli_query($koneksi, "SELECT * from `tbovk` WHERE `IDOVK` LIKE '%{$search}%' OR `NamaOVK` LIKE '%{$search}%' OR `Satuan` LIKE '%{$search}%' order by `IDOVK` ASC");
          } else {
          $sql = mysqli_query($koneksi, "SELECT * FROM `tbovk` order by `IDOVK` asc");
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
          <td align="left">'.$data[1].'</td>
		  <td align="left">'.$data[2].'</td>
		  

		<td><a href="editovk.php?id='.$data[0].'"  class="btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
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