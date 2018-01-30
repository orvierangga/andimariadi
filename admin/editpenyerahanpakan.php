<?php include "header.php";
include "../conn.php";
$ud1 = $_GET['id'];?>

	<div id="page-wrapper">
	<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Penyerahan Pakan
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
$ubah = mysqli_query ($koneksi, "select * from tbpenyerahanpakan where IDPenyerahanPakan ='$ud1'");
$data = mysqli_fetch_array ($ubah);
?>


<?php
if (isset($_POST['edt'])) {
	$idp = $_POST['idp'];
	$ttp = $_POST['ttp'];
	$sj = $_POST['sj'];
	$p = $_POST['p'];
	
	$cek = mysqli_query($koneksi, "SELECT * from `tbpenyerahanpakan` where `IDPenyerahanPakan`='$data[0]'"); //cek data yg mau diedit
	
  if (mysqli_num_rows($cek) !=0) {
		$edit = mysqli_query($koneksi, "UPDATE tbpenyerahanpakan set  `IDProduksi`='$idp',`TglTerimaPakan`='$ttp',`SJPakan`='$sj',`Periode`='$p' where `IDPenyerahanPakan`='$ud1'") 
		or die (mysqli_error());
		
				if($edit) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./penyerahanpakan.php" >'; //coding refresh
			
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

                        <label>ID Penyerahan</label>
                        <input  class="form-control form-white"   name="d" value="<?php echo $data[0];?>" disabled>

						<label>ID Produksi</label>
						 <select class="form-control" span="label label-success" name="idp" >
						<option value="<?php echo $data[1];?>"><?php echo $data[1];?></option>
						<?php
							$q = mysqli_query ($koneksi, "select * from `tbpenyerahanbibit` order by `IDProduksi` ASC");
						while ($dat = mysqli_fetch_array ($q)) {
						echo '<option value="' . $dat[0]. '">' . $dat[0].'. Nama Peternak = '.$dat[1].' - Lokasi = '.$dat[2].'</option>';
							}	
							?>
						</select>
                        
						<label>Tanggal Terima Pakan</label>
						<input type="date" class="form-control form-white"   name="ttp" value="<?php echo $data[2];?>" >
						
						<label>Surat Jalan</label>
						<input  class="form-control form-white"   name="sj" value="<?php echo $data[3];?>" >
						
						<label>Periode</label>
						<input  class="form-control form-white"   name="p" value="<?php echo $data[4];?>" >
						
							
                         <!-- /.form input pada modal-->
			          
								 <p></p>
                           
                         
 <button type="submit" class="btn btn-primary" name="edt"> <span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
 <a href="penyerahanpakan.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>

 </form>
<?php include "footer.php";?>