<?php include '../conn.php';?>

  
<div class="table-responsive">
  <table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
      <th>Kode Barang</th>
      <th>Jumlah Permintaan</th>
      <th>Tanggal</th>
      <th>Waktu</th>
      <th>Keperluan</th>
      <th>Status</th>
      <th>ID Petugas</th>
    
	</tr>	 
	 
	  <?php
      $tanggal = date('Y-m-d');
      if (isset($_GET['s'])) {
        $search = $_GET['s'];
     
  //harusnya kaini om
  $sql = mysqli_query($koneksi, "SELECT * from permintaan_barang where `kd_barang` LIKE '%{$search}%' order by `kd_barang` ASC");
  
    } else {
  $sql = mysqli_query($koneksi, "SELECT * from permintaan_barang order by `kd_barang` ASC ");
    }
    if (mysqli_num_rows($sql) == 0) {
        echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
      } else {
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
          $no++;
          echo '
        <tr align="center" bgcolor="#CCCCCC">
          <td >'.$data[1].'</td>
          <td>'.$data[2].'</td>
		  <td>'.$data[3].'</td>
        <td>'.$data[4].'</td>
		<td>'.$data[5].'</td>
		<td>'.$data[6].'</td>
		<td>'.$data[7].'</td>
            </tr>';
        }
      }
	  
    ?>
  </table>
</div>
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a> 
				                <!-- /.row -->
</div>
  
    </div>
  </div>
<script type="text/javascript">
function confirm_delete() {
  return confirm('Hapus data ini?');
}
</script>
<?php include 'footer.php';?>
