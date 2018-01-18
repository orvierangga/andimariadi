<?php
include 'header.php';?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Master Data <small>Barang Masuk</small><small>( <?php echo IndonesiaTgl(date('Y-m-d'));?> )</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-desktop"> </i> Data Barang Masuk
                            </li>
                        </ol>
                    </div>
                </div>
<?php
if (isset($_GET['del'])) {
  $nik = $_GET['del'];
  $cek = mysqli_query($koneksi, "SELECT * FROM barang_masuk WHERE `no`='$nik'");
  if (mysqli_num_rows($cek) > 0) {
    $delete = mysqli_query($koneksi, "DELETE FROM barang_masuk WHERE `no`='$nik'");
    if ($delete) {
      echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil!</strong> Data absensi telah dihapus.</div>';
    } else {
      echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Kesalahan!</strong> Tidak dapat menghapus data.</div>';
    }
  } else {
    echo '<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Oh snap!</strong> Data tidak ditemukan.</div>';
  }
}

?>
<div class="form-group">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Tambah Data</a>
  </div>
 <form class="form-inline" method="get">
			<select class="form-control" onchange="form.submit()" name="tahun">
  <option value="0">Tahun</option>
  <?php 
	$tahun =  @$_GET['tahun'];
	
  $mulai = date('Y') - 5 ;
  for ( $i = $mulai; $i<$mulai + 50; $i++) {
    if ($i == $tahun) {
      echo' <option value="'.$i.'" selected>'.$i.'</option>'; 
    } else {
      echo' <option value="'.$i.'">'.$i.'</option>' ; 
    }
  }
    ?>
  </select>
  </form>
<div class="table-responsive">
  <table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
      <th>Nomor</th>
      <th>Deskripsi Barang</th>
	  
      <th>Jumlah Barang</th>
      <th>Harga Barang</th>
      <th>Tanggal Barang Masuk</th>
	  <th>Total Harga</th>
      <th>Pilihan</th>
    </tr>
    <?php
      if ($tahun) {
        $sql = mysqli_query($koneksi, "SELECT * from `barang_masuk` where year(`tanggal_msk`)='$tahun'"); //form 1
	  } 
	  else {
		  $sql= mysqli_query ($koneksi, "SELECT * from barang_masuk");
	  }//$sql = mysqli_query($koneksi, "SELECT *,SUM(`jumlah_msk`) AS `total_semua`, sum(harga_msk) as `total_harga` FROM `barang_masuk` GROUP BY `des_barang` "); //form 2
	 
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
          <td align="center">'.$data[2].'</td>
		  <td align="center">'.$data[3].'</td>
        <td align="center">'.$data[4].'</td>
		<td align="center">'.$data[5].'</td>
		
          <td align="center"><a href="editbrgmsk.php?id='.$data[0].'"  class="btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
          <a href="?del='.$data[0].'" class="btn-danger btn-sm" ><span class="glyphicon glyphicon-trash" aria-hidden="true" onclick="return confirm(\'Hapus data ini?\')"></span></a></td>
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
<?php

		
if (isset($_POST['simpan'])) {
	$no = $_POST ['no'];
	
	$jumlah = $_POST['jumlah'];
	$harga = $_POST['harga'];
	$tanggal = date('Y-m-d');
	$total = $jumlah*$harga;
  if ($no != '') {
		$insert = mysqli_query($koneksi, "INSERT INTO barang_masuk(`des_barang`, `jumlah_msk` , `harga_msk` ,`tanggal_msk` ,`total_harga`) 
		VALUES ('$no','$jumlah','$harga','$tanggal','$total')") or die(mysqli_error());
		
				if($insert) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./barang_masuk.php" >'; //coding refresh
			
		} else {
			echo '<script type="text/javascript">alert("Data gagal disimpan")
			</script>';
		}
	}  else {
		echo '<script type="text/javascript">alert("Pilih Data Barang")
			</script>';
  }
}

$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime('- 16 year', $now));
$minage = date("Y-m-d", strtotime('- 40 year', $now));
?>
              

                    <form action="" method='post' class="popup-form">


                           
							
    <label class="control-label">Kode Barang</label>


      <select class="form-control" name="no">
        <option value="">Pilih</option>
        <?php
		$q = mysqli_query ($koneksi, "select * from `data_barang` order by `nama_brg` ASC");
		while ($data = mysqli_fetch_array ($q)) {
			echo '<option value="' . $data [0] .' - ' . $data[1].' ('.$data[3].') '.$data[2]. '">'. $data[0] .' - ' . $data[1] .' ('.$data[3].') '.$data[2]. '</option>';
		}
		?>
      </select>

    
                                
                                
								
								<label>Jumlah</label>
                                <input  class="form-control form-white" name="jumlah" placeholder="Enter text">
                            
                                <label>Harga</label>
                                <input  class="form-control form-white"  name="harga" placeholder="Enter text">
                            

                           
							
                           
							
                                <label>Tanggal Barang Masuk</label>
                                <p align='center'> <input  class="form-control form-white"   placeholder="Enter text" value="<?php echo IndonesiaTgl(date('Y-m-d')); ?>" readonly>
                            </p>
                          
                             <button type="submit" class="btn btn-primary" name="simpan"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
								<button type="reset" class="btn btn-default">Reset</button>

                        </form>
			</div>
		</div>
		
	</div>
	<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				
				
			</div>
		</div>
	</div>
<script type="text/javascript">
function confirm_delete() {
  return confirm('Hapus data ini?');
}
</script>
<?php include 'footer.php';?>
