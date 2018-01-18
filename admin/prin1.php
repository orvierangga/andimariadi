 <?php include 'header.php';
 
 
 ?>
	
					  
					  <body onload="javascript:windows.print()">
					  <?php
					  if (!empty($_get['ni'])){
						  $datas = mysqli_query($koneksi, "select * from `data_barang` WHERE `kd_barang`='".$_GET['ni']. "'");
						  foreach($datas as $data) {
							  echo 'Nama : ' . $data['nama_brg'].'<br />';
							echo 'jumlah_barang : ' . $data['jumlah'].'<br />';
						  }
					  }
					  
  
  

  $datas = mysqli_query($koneksi, "select * FROM 'data_barang'");
  foreach($datas as $data) {
	  echo $data['kd_barang'] . $data['data_barang']. "<br/>";
	  
	  $level = $_SESSION['level'];
	  if ($level == 'admin') {
		  
	  } elseif ($level == 'user') {
	  } else {
	  }
	  
  }
  ?>
  </body>
  
  
  
  
<div class="table-responsive" style="background-color:">
	<table class="table table-striped table-bordered table-hover" id="dataTables-example" bgcolor="#CCCCCC" style="background-color:#CCC">
    <thead>
    <tr>
      <th>Nomor</th>
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
     
        $sql = mysqli_query($koneksi, "SELECT * from data_barang ORDER BY `kd_barang` ASC");
   
      if (mysqli_num_rows($sql) == 0) {
        echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
      } else {
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
          $no++;
          echo '
        <tr bgcolor="#CCCCCC">
           <td>'.$no.'</td>
          <td>'.$data[0].'</td>
          <td>'.$data[1].'</td>
		  <td>'.$data[2].'</td>
		  <td>'.$data[3].'</td>
        
        
		
		

		<td><a href="edit.php?id='.$data[0].'"  class="btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> 
          <a href="?del='.$data[0].'" class="btn-danger btn-sm" ><span class="glyphicon glyphicon-trash" aria-hidden="true" onclick="return confirm(\'Hapus data ini?\')"></span></a></td>
        </tr>';
		}
      }
    ?>
	
   <a href="#" class="btn btn-primary" onclick="printcontent('p1')"><span class="glyphicon glyphicon-print"></span> Cetak Data</a>
    <?php include 'foot.php'?>