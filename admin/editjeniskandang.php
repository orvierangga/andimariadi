<?php include "header.php";
include "../conn.php";
$ud1 = $_GET['id'];?>

	<div id="page-wrapper">
	<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Jenis Kandang
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
$ubah = mysqli_query ($koneksi, "select * from tbjeniskandang where IDJenisKandang ='$ud1'");
$data = mysqli_fetch_array ($ubah);
?>




<?php
if (isset($_POST['edt'])) {
	
	$lk = $_POST['lk'];
	$k = $_POST['k'];	
	$cek = mysqli_query($koneksi, "select * from tbjeniskandang where IDJenisKandang='$data[0]'"); //cek data yg mau diedit
	
  if (mysqli_num_rows($cek) !=0) {
		$edit = mysqli_query($koneksi, "UPDATE `tbjeniskandang` set  `LuasKandang`='$lk',`Kapasitas`='$k' where `IDJenisKandang`='$ud1'") 
		or die (mysqli_error());
		
				if($edit) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./jeniskandang.php" >'; //coding refresh
			
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

                        <label>ID Jenis Kandang</label>
                        <input  class="form-control form-white"   name="d" value="<?php echo $data[0];?>" disabled>
						
                        <label>Luas Kandang</label>
						<input  class="form-control form-white"   name="lk" value="<?php echo $data[1];?>" >
						
						 <label>Kapasitas</label>
						<input  class="form-control form-white"   name="k" value="<?php echo $data[2];?>" >
						
						
                         <!-- /.form input pada modal-->
			          
								 <p></p>
                           
                         
 <button type="submit" class="btn btn-primary" name="edt"> <span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
 <a href="jeniskandang.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>

 </form>
<?php include "footer.php";?>