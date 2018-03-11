<?php
include '../conn.php';?>

	<div class="table-responsive">
	<table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
      <th>ID Pengadaan Bibit</th>
      <th>Bulan</th>
	  <th>Tahun</th>
	  <th>Data Supplier</th>
	  <th>Strain</th>
	  <th>Jumlah</th>
	 
      <th>Pilihan</th>
	 </tr>
	 </thead>
        <tbody>
		<!--/.tampil-->
    <?php
      $tanggal = date('Y-m-d');

       if (isset($_GET['s'])) {
        $search = $_GET['s'];
        $sql = mysqli_query($koneksi, "SELECT `tbpersediaanbibit` .*, `tbsupplier`.`IDSupplier`,`tbsupplier`.`NamaSupplier`,`tbsupplier`.`Alamat` FROM `tbpersediaanbibit` LEFT JOIN `tbsupplier` ON `tbpersediaanbibit`.`IDSupplier` = `tbsupplier`.`IDSupplier` WHERE `tbpersediaanbibit`.`IDPersediaanBibit` LIKE '%{$search}%' OR `tbpersediaanbibit`.`BulanSedia` LIKE '%{$search}%' OR `tbpersediaanbibit`.`TahunSedia` LIKE '%{$search}%' OR `tbsupplier`.`IDSupplier` LIKE '%{$search}%' OR `tbsupplier`.`NamaSupplier` LIKE '%{$search}%' OR `tbsupplier`.`Alamat` LIKE '%{$search}%' OR `tbpersediaanbibit`.`Strain` LIKE '%{$search}%' OR `tbpersediaanbibit`.`JumlahSedia` LIKE '%{$search}%' order by `tbpersediaanbibit`.`IDPersediaanBibit` ASC");
          } else {
          $sql = mysqli_query($koneksi, "SELECT `tbpersediaanbibit` .*, `tbsupplier`.`IDSupplier`,`tbsupplier`.`NamaSupplier`,`tbsupplier`.`Alamat` FROM `tbpersediaanbibit` LEFT JOIN `tbsupplier` ON `tbpersediaanbibit`.`IDSupplier` = `tbsupplier`.`IDSupplier` order by `tbpersediaanbibit`.`IDPersediaanBibit` asc");
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
		  <td >'.$data[3].'. '.$data[7].' ('.$data[8].')</td>
		  <td >'.$data[4].'</td>
		  <td >'.$data[5].' Ekor</td> 

		<td><a href="cetakbibitadaper.php?id='.$data[0].'"  target="_blank" class="btn-primary btn-sm"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a> 
        <a href="editpengadaanbibit.php?id='.$data[0].'"  class="btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
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