<?php
include '../conn.php';?>

	<div class="table-responsive">
	<table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
      <th>ID Pegawai</th>
      <th>Nama Pegawai</th>
      <th>Status</th>
	  <th>Alamat</th>
	  <th>Tanggal Lahir</th>
	  <th>Nomor Telpon/HP</th>
      <th>Pilihan</th>
	 </tr>
	 </thead>
        <tbody>
		<!--/.tampil-->
    <?php
      $tanggal = date('d-m-y');

       if (isset($_GET['s'])) {
        $search = $_GET['s'];
        $sql = mysqli_query($koneksi, "SELECT * from `tbpegawai` WHERE `IDPegawai` LIKE '%{$search}%' OR `Nama` LIKE '%{$search}%' OR `Alamat` LIKE '%{$search}%' OR `TanggalLahir` LIKE '%{$search}%' OR `Nohp` LIKE '%{$search}%' OR `Status` LIKE '%{$search}%' order by `IDPegawai` ASC");
          } else {
          $sql = mysqli_query($koneksi, "SELECT * FROM `tbpegawai` order by `IDPegawai` asc");
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
          <td>'.$data[1].'</td>
		  <td>'.$data[2].'</td>
		  <td>'.$data[3].'</td>
		  <td>'.$data[4].'</td>
		  <td>'.$data[5].'</td>

		<td><a href="editpegawai.php?id='.$data[0].'"  class="btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
          <a href="?del='.$data[0].'" class="btn-danger btn-sm" ><span class="glyphicon glyphicon-trash" aria-hidden="true" onclick="return confirm(\'Hapus data ini?\')"></span></a></td>
        </tr>';
		}
      }
    ?>
	</table>
	</div>
<div class="table-responsive">
 <a href="cetakpegawai.php" target="_blank" class="btn btn-primary" name="simpan"><span class="glyphicon glyphicon-print"></span> Cetak Data</button><a/>
</div>



<script type="text/javascript">
function confirm_delete() {
  return confirm('Hapus data ini?');
}
</script>