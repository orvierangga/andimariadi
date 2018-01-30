<?php
include '../conn.php';?>

	<div class="table-responsive">
	<table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
      <th>ID User</th>
      <th>Nama Pengguna</th>
      
	  <th>ID Pengguna</th>
	  <th>Status</th>
	  
      <th>Pilihan</th>
	 </tr>
	 </thead>
        <tbody>
		<!--/.tampil-->
    <?php
      $tanggal = date('d-m-y');

       if (isset($_GET['s'])) {
        $search = $_GET['s'];
        $sql = mysqli_query($koneksi, "SELECT * from `pengguna` WHERE `IDuser` LIKE '%{$search}%' OR `username` LIKE '%{$search}%' OR `IDPengguna` LIKE '%{$search}%' OR `status` LIKE '%{$search}%'  order by `IDPengguna` ASC");
          } else {
          $sql = mysqli_query($koneksi, "SELECT * FROM `pengguna` order by `IDPengguna` asc");
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
		
		  <td>'.$data[3].'</td>
		  <td>'.$data[4].'</td>
		  

		<td>
		
		<a href="editsandipengguna.php?id='.$data[0].'"  id="editpass" class="btn-primary btn-sm" data-toggle="modal" data-target="#modal2" class="btn-gray-fill"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
		 
      <a href="?del='.$data[0].'" class="btn-danger btn-sm" ><span class="glyphicon glyphicon-trash" aria-hidden="true" onclick="return confirm(\'Hapus data ini?\')"></span></a>
		  </td>
        </tr>';
		}
      }
    ?>
	</table>
	</div>
<div class="table-responsive">
 <a href="#" target="_blank" class="btn btn-primary" name="simpan"><span class="glyphicon glyphicon-print"></span> Cetak Data</button><a/>
</div>

<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
			<div class="edit"></div>	
				
			</div>
		</div>
	</div>

<script type="text/javascript">
$(document).ready(function(){
	$('#editpass').on('click', function (e) {
		var ud = $(e.relatedTarget).data('id');
		$.ajax({
			type : 'get',
			url : 'editsandipengguna.php?',
			data : 'id='+ ud,
			succes : function(data){
				alert(data)
			//$('.edit').html(data);
			}
		});
	});
});
</script>

<script type="text/javascript">
function confirm_delete() {
  return confirm('Hapus data ini?');
}
</script>