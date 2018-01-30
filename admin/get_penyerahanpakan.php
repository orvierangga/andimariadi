<?php
include '../conn.php';?>

	<div class="table-responsive">
	<table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
      <th>ID Penyerahan</th>
      <th>ID Produksi</th>
	  <th>Tanggal Terima</th>
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
        $sql = mysqli_query($koneksi, "SELECT * From `tbpenyerahanpakan` WHERE `IDPenyerahanPakan` LIKE '%{$search}%' OR `IDProduksi` LIKE '%{$search}%' OR `TglTerimaPakan` LIKE '%{$search}%' OR `SJPakan` LIKE '%{$search}%' OR `Periode` LIKE '%{$search}%' order by `IDPenyerahanPakan` ASC");
          } else {
          $sql = mysqli_query($koneksi, "SELECT * From `tbpenyerahanpakan` order by `IDPenyerahanPakan` asc");
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

		<td><a href="editpenyerahanpakan.php?id='.$data[0].'"  class="btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
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