<?php include "header.php";
include "../conn.php";
$ud1 = $_GET['id'];?>

	<div id="page-wrapper">
	<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Pengadaan Bibit
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
//$ubah = mysqli_query ($koneksi, "select * from tbpersediaanbibit where IDPersediaanBibit ='$ud1'");
$ubah = mysqli_query ($koneksi, "SELECT `tbpersediaanbibit` .*, `tbsupplier`.`IDSupplier`,`tbsupplier`.`NamaSupplier`,`tbsupplier`.`Alamat` FROM `tbpersediaanbibit` LEFT JOIN `tbsupplier` ON `tbpersediaanbibit`.`IDSupplier` = `tbsupplier`.`IDSupplier` where `tbpersediaanbibit`.`IDPersediaanBibit`='$ud1'");
$data = mysqli_fetch_array ($ubah);
?>


<?php
if (isset($_POST['edt'])) {
	$bs = $_POST['bs'];
	$ts = $_POST['ts'];
	$ids = $_POST['ids'];	
	$st = $_POST['st'];
	$js = $_POST['js'];
	
	//$cek = mysqli_query($koneksi, "SELECT `tbpersediaanbibit` .*, `tbsupplier`.`IDSupplier`,`tbsupplier`.`NamaSupplier`,`tbsupplier`.`Alamat` FROM `tbpersediaanbibit` LEFT JOIN `tbsupplier` ON `tbpersediaanbibit`.`IDSupplier` = `tbsupplier`.`IDSupplier` where `tbpersediaanbibit`.`IDPersediaanBibit`='$data[0]'"); //cek data yg mau diedit
	$cek = mysqli_query($koneksi, "SELECT * from `tbpersediaanbibit` where `IDPersediaanBibit`='$data[0]'"); //cek data yg mau diedit
	
  if (mysqli_num_rows($cek) !=0) {
		//$edit = mysqli_query($koneksi, "UPDATE `tbpersediaanbibit` .*, `tbsupplier`.`IDSupplier`,`tbsupplier`.`NamaSupplier`,`tbsupplier`.`Alamat` FROM `tbpersediaanbibit` LEFT JOIN `tbsupplier` ON `tbpersediaanbibit`.`IDSupplier` = `tbsupplier`.`IDSupplier` set  `tbpersediaanbibit`.`BulanSedia`='$bs',`tbpersediaanbibit`.`TahunSedia`='$ts',`tbpersediaanbibit`.`IDSupplier`='$ids',`tbpersediaanbibit`.`Strain`='$st',`tbpersediaanbibit`.`JumlahSedia`='$js' where `tbpersediaanbibit`.`IDPersediaanBibit`='$ud1'") 
		//or die (mysqli_error());
		$edit = mysqli_query($koneksi, "UPDATE tbpersediaanbibit set  `BulanSedia`='$bs',`TahunSedia`='$ts',`IDSupplier`='$ids',`Strain`='$st',`JumlahSedia`='$js' where `IDPersediaanBibit`='$ud1'") 
		or die (mysqli_error());
		
				if($edit) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./pengadaanbibit.php" >'; //coding refresh
			
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

                        <label>ID Pengadaan Bibit</label>
                        <input  class="form-control form-white"   name="d" value="<?php echo $data[0];?>" disabled>
						
                        <label>Bulan</label>
						<select class="form-control"  span="label label-success" name="bs">
						<option value="<?php echo $data[1];?>"><?php echo $data[1];?> </option>
						<option value="Januari">Januari</option><option value="Februari">Februari</option><option value="Maret">Maret</option>
						<option value="April">April</option><option value="Mei">Mei</option><option value="Juni">Juni</option>
						<option value="Juli">Juli</option><option value="Agustus">Agustus</option><option value="September">September</option>
						<option value="Oktober">Oktober</option><option value="November">November</option><option value="Desember">Desember</option>
						</select>
						
						<label>Tahun</label>
						<select class="form-control"  span="label label-success" name="ts">
						<option value="<?php echo $data[2];?>"><?php echo $data[2];?> </option>
						<?php 
						$tahun =  @$_GET['tahun'];
						$mulai = date('Y') - 5 ;
						for ( $i = $mulai; $i<$mulai + 20; $i++) {
						if ($i == $tahun) {
						echo' <option value="'.$i.'" selected>'.$i.'</option>'; 
						} else {
						echo' <option value="'.$i.'">'.$i.'</option>' ; 
							}
						}
						?>
						</select>
						
						<label>Data Supplier</label>
						<select class="form-control"  span="label label-success" name="ids">
						<option value="<?php echo $data[3];?>"><?php echo $data[3];?>. <?php echo $data[7];?> (<?php echo $data[8];?>)</option>
						<?php
						$q = mysqli_query ($koneksi, "select * from `tbsupplier` order by `IDSupplier` ASC");
						while ($dat = mysqli_fetch_array ($q)) {
						echo '<option value="'. $dat[0].'">' . $dat[0].'. '.$dat[1].'  ('.$dat[2].')</option>';
						}
						?>
						</select>
						
						<label>Strain</label>
						<select class="form-control"  span="label label-success" name="st">
						<option value="<?php echo $data[4];?>"><?php echo $data[4];?> </option>
						<?php
						$s = mysqli_query ($koneksi, "select * from `tbstrain` order by `IDStrain` ASC");
						while ($dat1 = mysqli_fetch_array ($s)) {
						echo '<option value="' . $dat1[1]. '">' . $dat1[0].'. '.$dat1[1].'</option>';
						}
						?>
						</select>
						
						 <label>Jumlah</label>
						<input  class="form-control form-white"   name="js" value="<?php echo $data[5];?>" >
						
							
                         <!-- /.form input pada modal-->
			          
								 <p></p>
                           
                         
 <button type="submit" class="btn btn-primary" name="edt"> <span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
 <a href="pengadaanbibit.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>

 </form>
<?php include "footer.php";?>