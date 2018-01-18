 <?php
     
include 'header.php';
       ?>
		<script>
function printcontent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print(); 
	document.body.innerHTML = retorepage ;
	}
</script>
        <div id="page-wrapper">
 <div id="p1">
           <div class="row">
               
                <!-- /.col-lg-12 -->
            </div>
           
      
        

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Data Barang <small>Daftar Barang Masuk</small><small>Tahun ( <?php echo IndonesiaTgl(date('Y-m-d'));?> )</small>
                        </h1>
                        
                    </div>
                </div>
				<div class="dataTable_wrapper">
	

  
<div class="table-responsive" style="background-color:">
	<table class="table table-striped table-bordered table-hover" id="dataTables-example" bgcolor="#CCCCCC" style="background-color:#CCC">
    <thead>
    <tr>
      <th>Nomor</th>
      <th>Kode Barang</th>
      <th>Deskripsi Barang</th>
      <th>Jenis Barang</th>
      <th>Deskripsi Barang</th>
	 
      <th>Tanggal</th>
	   <th>Total</th>
	  </tr>
	  </thead>
        <tbody>
    <?php
      $tanggal = date('Y-m-d');
     
         $sql = mysqli_query($koneksi, "SELECT `barang_masuk` .*, `data_barang`.`kd_barang`,`data_barang`.`nama_brg`,`data_barang`.`jenis_brg` FROM `barang_masuk` LEFT JOIN `data_barang` ON `barang_masuk`.`kd_barang` = `data_barang`.`kd_barang` order by `no` ASC");
		
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
          <td>'.$data[7].'( '.$data[8].')</td>
		  <td>'.$data[2].'</td>
		  <td>'.$data[3].'</td>
        <td>'.$data[4].'</td>
		<td>'.$data[5].'</td>
        
		
		

		</tr>';
		}
      }
    ?>
	</tbody>
  </table>
</div>

</div>
        
    </div>
	</div>
	
   <a href="cetak_brgmsk.php" class="btn btn-primary" onclick="printcontent('p1')"><span class="glyphicon glyphicon-print"></span> Cetak Data</a>
    <?php include 'footer.php'?>