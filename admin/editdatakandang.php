<?php include "header.php";
include "../conn.php";
$ud1 = $_GET['id'];?>

	<div id="page-wrapper">
	<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Pendataan Kandang
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-pencil"></i> Edit Data 
                            </li>
                        </ol>
                    </div>
                </div>
<!--/.koding edit-->
<?php 
$ubah = mysqli_query ($koneksi, "select * from tbdatakandang where IDDataKandang ='$ud1'");
$data = mysqli_fetch_array ($ubah);
?>




<?php
if (isset($_POST['edt'])) {
	
	$idp = $_POST['idp'];
	$idjk = $_POST['idjk'];	
	$cek = mysqli_query($koneksi, "select * from tbdatakandang where IDDataKandang='$data[0]'"); //cek data yg mau diedit
	
  if (mysqli_num_rows($cek) !=0) {
		$edit = mysqli_query($koneksi, "UPDATE `tbdatakandang` set  `IDPeternak`='$idp',`IDJenisKandang`='$idjk' where `IDDataKandang`='$ud1'") 
		or die (mysqli_error());
		
				if($edit) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./kandang.php" >'; //coding refresh
			
		} else {
			echo '<script type="text/javascript">alert("Data gagal disimpan")
			</script>';
		}
	} 
}

$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime('- 16 year', $now));
$minage = date("Y-m-d", strtotime('- 40 year', $now));
?>
             
<!--/.form input-->
 <form method="post" class="popup-form col-lg-4">

                        <label>ID Pendataan Kandang</label>
                        <input  class="form-control form-white"   name="d" value="<?php echo $data[0];?>" disabled>
						
                        <label>ID Peternak</label>
						<select class="form-control"  span="label label-success" name="idp">
						<option value="<?php echo $data[1];?>"><?php echo $data[1];?> </option>
						<?php
						$q = mysqli_query ($koneksi, "select * from `tbpeternak` order by `IDPeternak` ASC");
						while ($dat = mysqli_fetch_array ($q)) {
						echo '<option value="' . $dat[0]. '">' . $dat[0].'. Nama Peternak = '.$dat[1].' - Lokasi = '.$dat[2].'</option>';
						}
						?>
						</select>
						
						<label>ID Jenis Kandang</label>
                        <select class="form-control" span="label label-success" name="idjk" >
						<option value="<?php echo $data[2];?>"><?php echo $data[2];?> </option>
					      <?php	
						$r = mysqli_query ($koneksi, "select * from `tbjeniskandang` order by `IDJenisKandang` ASC");
						while ($dat2 = mysqli_fetch_array ($r)) {
						echo '<option value="' . $dat2[0]. '">' . $dat2[0].'. Luas = '.$dat2[1].' Meter - Kapasitas = '.$dat2[2].'</option>';
						} ?>
						</select>
                         <!-- /.form input pada modal-->
			          
								 <p></p>
                           
                         
 <button type="submit" class="btn btn-primary" name="edt"> <span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
 <a href="kandang.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>

 </form>
<?php include "footer.php";?>