<?php
include '../conn.php';?>
<div class="table-responsive">
  <table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
      <th>Nomor</th>
	  
      <th>Kode Barang</th>
      <th>Deskripsi Barang</th>
	  
      <th>Jumlah Barang</th>
      <th>Harga Barang</th>
      <th>Tanggal Barang Masuk</th>
	  <th>Total Harga</th>
    </tr>
    <?php
      $tanggal = date('Y-m-d');
     
      if (isset($_GET['s'])) {
        $search = $_GET['s'];
        $sql = mysqli_query($koneksi, "SELECT `barang_masuk` .*, `data_barang`.`kd_barang`,`data_barang`.`nama_brg`,`data_barang`.`jenis_brg`,`data_barang`.`ket` FROM `barang_masuk` LEFT JOIN `data_barang` ON `barang_masuk`.`kd_barang` = `data_barang`.`kd_barang` WHERE `data_barang`.`kd_barang` LIKE '%{$search}%' OR `data_barang`.`nama_brg` LIKE '%{$search}%' order by `no` desc");
      } else {
        $sql = mysqli_query($koneksi, "SELECT `barang_masuk` .*, `data_barang`.`kd_barang`,`data_barang`.`nama_brg`,`data_barang`.`jenis_brg`,`data_barang`.`ket` FROM `barang_masuk` LEFT JOIN `data_barang` ON `barang_masuk`.`kd_barang` = `data_barang`.`kd_barang` order by `no` desc");
      }
      
		  
	   //form 1
        //$sql = mysqli_query($koneksi, "SELECT *,SUM(`jumlah_msk`) AS `total_semua`, sum(harga_msk) as `total_harga` FROM `barang_masuk` GROUP BY `des_barang` "); //form 2
      if (mysqli_num_rows($sql) == 0) {
        echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
      } else {
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
          $no++;
          echo '
        <tr bgcolor="#CCCCCC">
          <td>'.$no.'</td>  
          <td>'.$data[1].'</td>
		  <td>'.$data[7].' ('.$data[8].')'.$data[9].'</td>
          <td align="center">'.$data[2].'</td>
		  <td align="center">'.$data[3].'</td>
        <td align="center">'.$data[4].'</td>
		<td align="center">'.$data[5].'</td>
		
          </tr>';
        }
      }
    ?>
  </table>

</div>
