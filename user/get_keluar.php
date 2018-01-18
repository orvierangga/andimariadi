<?php
include '../conn.php';?>

<div class="table-responsive">
  <table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
	
      <th>Tanggal keluar</th>
	 <th>Kode Barang</th>
      <th>Deskripsi Barang</th>
	  
      <th>Jumlah Barang</th>
      <th>Keperluan</th>
     
	  <th>Status</th>
	  <th>Id Petugas</th>
      <th>Pilihan</th>
    </tr>

  <?php
      $tanggal = date('Y-m-d');
      if (isset($_GET['s'])) {
        $search = $_GET['s'];
        $sql = mysqli_query($koneksi, "SELECT `barang_keluar` .*, `data_barang`.`kd_barang`,`data_barang`.`nama_brg`,`data_barang`.`jenis_brg`,`data_barang`.`ket` FROM `barang_keluar` LEFT JOIN `data_barang` ON `barang_keluar`.`kd_barang` = `data_barang`.`kd_barang` WHERE `barang_keluar`.`kd_barang` LIKE '%{$search}%' OR `data_barang`.`nama_brg` LIKE '%{$search}%' ORDER by `tanggal_keluar` DESC");
		 //form 1
        //$sql = mysqli_query($koneksi, "SELECT *,SUM(`jumlah_msk`) AS `total_semua`, sum(harga_msk) as `total_harga` FROM `barang_masuk` GROUP BY `des_barang` "); //form 2
      }else{
		     $sql = mysqli_query($koneksi, "SELECT `barang_keluar` .*, `data_barang`.`kd_barang`,`data_barang`.`nama_brg`,`data_barang`.`jenis_brg`,`data_barang`.`ket` FROM `barang_keluar` LEFT JOIN `data_barang` ON `barang_keluar`.`kd_barang`  = `data_barang`.`kd_barang` ORDER by `kd_keluar` DESC");
	  }
	  if (mysqli_num_rows($sql) == 0) {
        echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
      } else {
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
          $no++;
          echo '
        <tr align="center" bgcolor="#CCCCCC">
          
		   <td >'.$data[4].'</td>
          <td align="left">'.$data[1].'</td>
		   <td align="left">'.$data[8].'  ('.$data[9].')'.$data[10].'</td>
          <td ">'.$data[2].'</td>
		  <td >'.$data[3].'</td>
       
		<td >'.$data[5].'</td>
		<td >'.$data[6].'</td>
		
          <td width="90px" align="center"><a href="editbrgmsk.php?id='.$data[0].'"  class="btn-primary btn-sm"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a> 
          <a href="?del='.$data[0].'" class="btn-danger btn-sm" ><span class="glyphicon glyphicon-trash" aria-hidden="true" onclick="return confirm(\'Hapus data ini?\')"></span></a></td>
        </tr>';
        }
      }
    ?>
  </table>
</div>

