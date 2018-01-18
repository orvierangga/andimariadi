<?php
include '../conn.php';?>


<div class="table-responsive">
  <table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th>Jenis Barang</th>
      <th>Deskripsi Barang</th>
	 
      <th>Pilihan</th>
	  </tr>
	  </thead>
        <tbody>
    <?php
      $tanggal = date('Y-m-d');
     
	 if (isset($_GET['s'])) {
        $search = $_GET['s'];
        	//$sql = mysqli_query($koneksi, "SELECT `barang_masuk` .*, `data_barang`.`kd_barang`,`data_barang`.`nama_brg`,`data_barang`.`jenis_brg` FROM `barang_masuk` LEFT JOIN `data_barang` ON `barang_masuk`.`kd_barang` = `data_barang`.`kd_barang` WHERE `data_barang`.`kd_barang` LIKE '%{$search}%' OR `data_barang`.`nama_brg` LIKE '%{$search}%' order by `no` ASC");
       $sql = mysqli_query($koneksi, "SELECT * from data_barang WHERE `kd_barang` LIKE '%{$search}%' OR `nama_brg` LIKE '%{$search}%' order by `kd_barang` ASC");
	  } else {
       // $sql = mysqli_query($koneksi, "SELECT `barang_masuk` .*, `data_barang`.`kd_barang`,`data_barang`.`nama_brg`,`data_barang`.`jenis_brg` FROM `barang_masuk` LEFT JOIN `data_barang` ON `barang_masuk`.`kd_barang` = `data_barang`.`kd_barang` order by `no` ASC");
       $sql = mysqli_query($koneksi, "SELECT * from data_barang ORDER BY `kd_barang` ASC");
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
		  <td>'.$data[2].'</td>
		  <td align="left">'.$data[3].'</td>

		<td><a href="edit.php?id='.$data[0].'"  class="btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
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