<?php
session_start();
include '../conn.php';
?>
	
	<div class="table-responsive">
	<table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
      <th>No</th>
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
      $id = $_GET['id'];
       if (isset($_GET['s'])) {
        $search = $_GET['s'];
        $sql = mysqli_query($koneksi, "SELECT * from tbpemeliharaanharian where `MingguKe` LIKE '%{$search}%' AND `IDProduksi`='{$id}' order by `IDPHarian` ASC");
          } else {
          $sql = mysqli_query($koneksi, "SELECT * from tbpemeliharaanharian where `IDProduksi`='{$id}' order by `IDPHarian` asc");
          }
      
      if (mysqli_num_rows($sql) == 0) {
        echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
      } else {
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
          $no++;
          echo '
        <tr align="center" bgcolor="#CCCCCC">
          <td>'.$no.'</td> 
          <td>'.$data[2].'</td>
          <td >'.$data[3].'</td>
		  <td >'.$data[4].'</td>
		  <td >'.$data[5].'</td>
		  <td >'.$data[6].'</td>
		  <td >'.$data[7].'</td>
		  <td >'.$data[8].'</td>
		  <td >'.$data[9].'</td>
		  <td >'.$data[10].'</td>
		  <td >'.$data[11].'</td>
		  <td >'.$data[12].'</td>
		   
<td><a href="editpemeliharaanharian.php?id='.$data[0].'"  class="btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
</td>
      
		</tr>';
		}
      }
    ?>
	</table>
	</div>
<!-- koding pilihan
<td><a href="pemeliharaanharian.php?id='.$data[0].'"  class="btn-primary btn-sm"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a> 
          <a href="?del='.$data[0].'" class="btn-danger btn-sm" ><span class="glyphicon glyphicon-trash" aria-hidden="true" onclick="return confirm(\'Hapus data ini?\')"></span></a></td>
    -->    

<script type="text/javascript">
function confirm_delete() {
  return confirm('Hapus data ini?');
}
</script>