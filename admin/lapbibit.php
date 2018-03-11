<?php
include 'header.php';
include '../conn.php';?>
<div id="page-wrapper">
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                <div class="col-lg-12">
                <ol class="breadcrumb">
                <li class="active">
                <i class="fa fa-desktop"></i> Data Laporan</a></li>
                </ol>
                </div>
                </div>
				<div class="dataTable_wrapper">
				

 <!-- form grup dan modal -->
  <div class="form-group">

<a href="laporan.php" class="btn btn-info  col-lg-2"><span class='glyphicon glyphicon-list'></span> Jumlah Ayam Mati</a>

<a href="lapovk.php" class="btn btn-info col-lg-2"><span class='glyphicon glyphicon-list'></span>  Jumlah OVK Pakai</a>
<a href="lappakan.php" class="btn btn-info col-lg-2"><span class='glyphicon glyphicon-list'></span>  Jumlah Pakan</a>
<ol class="breadcrumb col-lg-2">
<th  class="active" ><span class='glyphicon glyphicon-list'></span>  Jumlah Bibit Masuk</th></ol>

 </div>  
    
</div>  
</div>  





<div class="table-responsive">
  <table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr align="center">
 
 
 <form class="form-inline" method="get">
	 <div class="col-xs-2"><label> Pilih Periode</label>
    </div>
	<div class="col-xs-5">	
	  <select class="form-control col-md-4" span="label label-success" onchange="form.submit()" name="anu" >
		<option value="">-- Semua Periode --</option>
		<?php
		  $anu =  @$_GET['anu'];
			$q = mysqli_query ($koneksi, "SELECT * FROM `tbpenyerahanbibit` Group by `Periode` ASC");
			while ($dat = mysqli_fetch_array ($q)) {
        if ($dat['Periode']== $anu) {
          echo' <option value="'.$dat['Periode'].'" selected>'.$dat['Periode'].'</option>';
        } else {
          echo' <option value="'.$dat['Periode'].'">'.$dat['Periode'].'</option>';
        }
      }
		?>
		</select>
		</div>

  </form>
  <br></br>  <br></br>
      
	  
	  <th>No</th>
      <th>Periode</th> 
	  <th>Total Bibit Masuk</th>
      <th>Detail</th>
    </tr>
    <?php
    if ($anu) {
      $sql = mysqli_query($koneksi, "SELECT *, SUM(`JumlahChickIn`) AS `total` FROM `tbpenyerahanbibit` WHERE `Periode` = '$anu'"); //form 1
	  } else {
		  $sql= mysqli_query ($koneksi, "SELECT *, SUM(`JumlahChickIn`) AS `total` FROM `tbpenyerahanbibit` group by `Periode` desc");
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
          <td>'.$data[7].'</td>
		  <td align="center">'.$data[10].'</td>
    
          <td align="center"><a href="cetakbibitper.php?id='.$data[7].'" target="_blank" class="btn-primary btn-sm"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a> 
          </td>
        </tr>';
        }
      }
    ?>
  </table>

</div>




	<div class="table-responsive">
 <a href="cetakbibitall.php" target="_blank" class="btn btn-primary" name="simpan"><span class="glyphicon glyphicon-print"></span> Cetak Data</button><a/>
</div>
</div>  

<?php include 'footer.php';?>