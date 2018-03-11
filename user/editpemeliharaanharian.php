<?php include "header.php";
include "../conn.php";
$ud1 = $_GET['id'];?>

	<div id="page-wrapper">
	<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Pemeliharaan
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
$ubah = mysqli_query ($koneksi, "select * from `tbpemeliharaanharian` where IDPHarian ='$ud1'");
//$ubah = mysqli_query ($koneksi, "SELECT `tbpenyerahanbibit` .*, `tbsupplier`.`IDSupplier`,`tbsupplier`.`NamaSupplier`,`tbsupplier`.`Alamat` FROM `tbpersediaanbibit` LEFT JOIN `tbsupplier` ON `tbpersediaanbibit`.`IDSupplier` = `tbsupplier`.`IDSupplier` where `tbpersediaanbibit`.`IDPersediaanBibit`='$ud1'");
$data = mysqli_fetch_array ($ubah);
?>


<?php
if (isset($_POST['edt'])) {
	$u = $_POST['u'];
	$m = $_POST['m'];
	$t = $_POST['t'];	
	$mt = $_POST['mt'];
	$ps = $_POST['ps'];
	$pa = $_POST['pa'];
	$c = $_POST['c'];
	$ido = $_POST['ido'];
	$ip = $_POST['ip'];
	$a = $_POST['a'];
	$op = $_POST['op'];
	//$cek = mysqli_query($koneksi, "SELECT `tbpersediaanbibit` .*, `tbsupplier`.`IDSupplier`,`tbsupplier`.`NamaSupplier`,`tbsupplier`.`Alamat` FROM `tbpersediaanbibit` LEFT JOIN `tbsupplier` ON `tbpersediaanbibit`.`IDSupplier` = `tbsupplier`.`IDSupplier` where `tbpersediaanbibit`.`IDPersediaanBibit`='$data[0]'"); //cek data yg mau diedit
	$cek = mysqli_query($koneksi, "SELECT * from `tbpemeliharaanharian` where `IDPHarian`='$data[0]'"); //cek data yg mau diedit
	
  if (mysqli_num_rows($cek) !=0) {
		//$edit = mysqli_query($koneksi, "UPDATE `tbpersediaanbibit` .*, `tbsupplier`.`IDSupplier`,`tbsupplier`.`NamaSupplier`,`tbsupplier`.`Alamat` FROM `tbpersediaanbibit` LEFT JOIN `tbsupplier` ON `tbpersediaanbibit`.`IDSupplier` = `tbsupplier`.`IDSupplier` set  `tbpersediaanbibit`.`BulanSedia`='$bs',`tbpersediaanbibit`.`TahunSedia`='$ts',`tbpersediaanbibit`.`IDSupplier`='$ids',`tbpersediaanbibit`.`Strain`='$st',`tbpersediaanbibit`.`JumlahSedia`='$js' where `tbpersediaanbibit`.`IDPersediaanBibit`='$ud1'") 
		//or die (mysqli_error());
		$edit = mysqli_query($koneksi, "UPDATE tbpemeliharaanharian set  `umur`='$u',`MingguKe`='$m',`Tanggal`='$t',`Mati`='$m',`PakanStd`='$ps',`PakanAct`='$pa',`Culling`='$c',`Afkir`='$a',`IDOVK`='$ido',`OVKPakai`='$op',`IDPakan`='$ip' where `IDPHarian`='$ud1'") 
		or die (mysqli_error());
		
				if($edit) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./pemeliharaanharian.php" >'; //coding refresh
			
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
 
<Form method="post">
        <div class="col-md-1" >
		 <label>Umur</label> 
    </div>
	<div class="col-md-2" >
		<input class="form-control form-white" name="u" pattern="[0-9]*" placeholder="Sesuai Hari" value="<?php echo $data[4]?>" >
    </div>
		
	<div class="col-md-2" >
		 <label>Minggu Ke </label>  
    </div>
	
	 <div class="col-md-2" >
		<input class="form-control" name="m" pattern="[0-9]*" placeholder="Hitung Minggu" value="<?php echo $data[2]?>">
    </div> 
	<div class="col-md-1" >
		 <label>Tanggal</label>
    </div>
	<div class="col-md-3" >
		<input type="date" class="form-control" name="t" value="<?php echo $data[3]?>" >
    </div>
	
	
	<br></br>
	<div class="col-md-1" >
		 <label>Mati</label> 
    </div>
	<div class="col-md-2" >
		<input class="form-control form-white" name="mt" pattern="[0-9]*" placeholder="Jumlah Satuan" value="<?php echo $data[8]?>" required>
    </div>
	<div class="col-md-2" >
		 <label>Pakan Std</label> 
    </div>
	<div class="col-md-2" >
		<input class="form-control form-white" name="ps" pattern="[0-9]*" placeholder="Jumlah Satuan" value="<?php echo $data[5]?>" required>
    </div>
	
		<div class="col-md-2" >
		 <label>Pakan Act</label> 
    </div>
	<div class="col-md-2" >
		<input class="form-control form-white" name="pa" pattern="[0-9]*" placeholder="Jumlah Satuan" value="<?php echo $data[6]?>" required>
    </div>
	
	
	<br></br>
	
	
	
	<div class="col-md-1" >
	<label>Culling</label> 
    </div>
	<div class="col-md-2" >
		<input class="form-control form-white" name="c" pattern="[0-9]*" placeholder="Jumlah Satuan" value="<?php echo $data[9]?>" required>
    </div>
	
	
	<div class="col-md-2" >
		 <label>IDovk</label> 
    </div>
	<div class="col-md-2" >
		
		<select class="form-control" name="ido" required="required">
		<option required="required" value="<?php echo $data[9]?>"><?php echo $data[11]?></option>
		<?php
			$q = mysqli_query ($koneksi, "SELECT * FROM `tbovk` Order by `IDOVK` asc");
			while ($dat = mysqli_fetch_array ($q)) {
			echo '<option value="'. $dat['IDOVK'].'">'.$dat['IDOVK'].' : '.$dat['NamaOVK'].'  ('.$dat[2].')</option>';
			}
		?>
		</select>
    </div>
	<div class="col-md-2" >
		 <label>Pakan</label> 
    </div>
	<div class="col-md-2" >
		
		<select class="form-control" name="ip" required="required">
		<option required="required" value="<?php echo $data[10]?>"><?php echo $data[7]?></option>
		<?php
			$q = mysqli_query ($koneksi, "SELECT * FROM `tbpakan` Order by `IDPakan` asc");
			while ($dat = mysqli_fetch_array ($q)) {
			echo '<option value="'. $dat['IDPakan'].'">'.$dat['JenisPakan'].'  ('.$dat['Merek'].')</option>';
			}
		?>
		</select>
    </div>
	
	<br></br>
	<div class="col-md-1" >
		 <label>Afkir</label> 
    </div>
	<div class="col-md-2" >
		<input class="form-control form-white" name="a" pattern="[0-9]*" placeholder="Jumlah Satuan" value="<?php echo $data[10]?>" required>
    </div>
	
	
	<div class="col-md-2" >
		 <label>OVK Pakai</label> 
    </div>
	<div class="col-md-2" >
		<input class="form-control form-white" name="op" pattern="[0-9]*" placeholder="Jumlah Satuan" value="<?php echo $data[12]?>" required>
    </div>
	
                       <!-- /.form input pada modal-->
			          
								 <p></p>
                        
 <button type="submit" class="btn btn-primary" name="edt"> <span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
 <a href="pemeliharaanharian.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>

 </form>
<?php include "footer.php";?>