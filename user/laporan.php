<?php
include 'header.php';
include '../conn.php';?>
<div id="page-wrapper">
<div class="container-fluid">
<?php 
$data1 = mysqli_query($koneksi, "SELECT * FROM `tbpenyerahanbibit` WHERE `IDPeternak`='" . $_SESSION['IDPengguna']. "'");
$wahin = mysqli_fetch_assoc($data1);
$row = mysqli_num_rows($data1);
?>

                <!-- Page Heading -->
                <div class="row">
                <div class="col-lg-12">
	 <h1 class="page-header">Rekapitulasi Data Panen<small>( <?php echo IndonesiaTgl(date('Y-m-d'));?> )</small></h1>
          
				<ol class="breadcrumb">
                <li class="active">
                <i class="fa fa-desktop"></i> Rincian Dari ID Peternak : <?php echo $_SESSION['IDPengguna']?> </a></li>
                </ol>
                </div>
                </div>
				<div class="dataTable_wrapper">
				


<div class="table-responsive">
  <table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr align="center">
   <th>Periode</th>
	  <th>ID Produksi</th>
	  <th>Strain</th>
	  <th>Tanggal ChickIn</th>
	  <th>Jumlah ChickIn</th>
      <th>Harga</th> 
	 
	   <th>ID Kandang</th>
	  <th>Total Mati</th>
	   <th>Total OVK Pakai</th>
	    <th>Total Pakan Std</th>
		 <th>Total Pakan Act</th>
    </tr>
    <?php
  
	$sql= mysqli_query ($koneksi, "SELECT `tbpenyerahanbibit` .* , `tbpemeliharaanharian`.`IDProduksi`,SUM(`tbpemeliharaanharian`.`Mati`) as `totalmati`,SUM(`tbpemeliharaanharian`.`OVKPakai`) as `totalovk`,SUM(`tbpemeliharaanharian`.`PakanStd`) as `Std`,SUM(`tbpemeliharaanharian`.`PakanAct`) as `act` FROM `tbpenyerahanbibit` LEFT JOIN `tbpemeliharaanharian` ON `tbpenyerahanbibit`.`IDProduksi` = `tbpemeliharaanharian`.`IDProduksi` WHERE `tbpenyerahanbibit`.`IDPeternak` ='" . $_SESSION['IDPengguna']. "' GROUP by `tbpenyerahanbibit`.`IDProduksi` ORDER BY `tbpenyerahanbibit`.`Periode`");
	
	 if (mysqli_num_rows($sql) == 0) {
        echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
      } else {
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
          $no++;
          echo '
        <tr align="center" bgcolor="#CCCCCC">
          <td>'.$data[7].'</td>
          <td>'.$data[10].'</td>
		  <td>'.$data[3].'</td>
		  <td>'.$data[4].'</td>
		  <td>'.$data[5].' Ekor</td>
		  <td>Rp.'.number_format ($data[6]).'</td>
		  
		  <td>'.$data[9].'</td>
		   <td>'.$data[11].' Ekor</td>
		    <td>'.$data[12].' Bks</td>
			 <td>'.$data[13].' Sak</td>
			  <td>'.$data[14].' Sak</td>
    
          
         
        </tr>';
        }
      }
    ?>
  </table>

</div>
	</div> 
							<div class="row">
                <div class="col-lg-12">
	      
				<ol class="breadcrumb">
                <li class="active">
                <i class="fa fa-desktop"></i> Data Panen ID Peternak : <?php echo $_SESSION['IDPengguna']?> </a></li>
                </ol>
                </div>
                </div>
				
<div class="dataTable_wrapper">

<div class="table-responsive">
  <table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr align="center">
  <th>Periode</th>
   <th>ID Produksi</th>
	  <th>ID Panen</th>
	  
	  <th>Tanggal Panen</th>
	  <th>Umur</th>
      <th>Jumlah Ayam</th> 
	  <th>Total Berat</th>
	   <th>Berat Rata</th>
	 
    </tr>
    <?php
    
	$panen= mysqli_query ($koneksi, "SELECT `tbpenyerahanbibit` .*, `tbpanen`.`IDPanen`, `tbpanen`.`IDProduksi`,`tbpanen`.`TanggalPengiriman`,`tbpanen`.`Umur`,`tbpanen`.`JumlahAyam`,`tbpanen`.`TotalBerat`,`tbpanen`.`BeratRata` FROM `tbpenyerahanbibit` LEFT JOIN `tbpanen` ON `tbpenyerahanbibit`.`IDProduksi` = `tbpanen`.`IDProduksi` WHERE `tbpenyerahanbibit`.`IDPeternak` ='" . $_SESSION['IDPengguna']. "' ORDER BY `tbpenyerahanbibit`.`Periode` desc");
	
	 if (mysqli_num_rows($panen) == 0) {
        echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
      } else {
        $no = 0;
        while ($data1 = mysqli_fetch_array($panen)) {
          $no++;
          echo '
        <tr align="center" bgcolor="#CCCCCC">
          <td>'.$data1[7].'</td>
          <td>'.$data1[0].'</td>
		  <td>'.$data1[10].'</td>
		  <td>'.$data1[12].'</td>
		  <td>'.$data1[13].' Hari</td>
		  <td>'.$data1[14].' Ekor</td>
		  
		  <td>'.$data1[15].' Kg</td>
		   <td>'.$data1[16].' Kg</td>
		    
          
         
        </tr>';
        }
      }
    ?>
  </table>

</div>
	</div>

	
</div>
</div> 

<?php include 'footer.php';?>