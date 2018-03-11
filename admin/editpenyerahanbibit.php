<?php include "header.php";
include "../conn.php";
$ud1 = $_GET['id'];?>

	<div id="page-wrapper">
	<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Penyerahan Bibit
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
$ubah = mysqli_query ($koneksi, "select * from `tbpenyerahanbibit` where IDProduksi ='$ud1'");
//$ubah = mysqli_query ($koneksi, "SELECT `tbpenyerahanbibit` .*, `tbsupplier`.`IDSupplier`,`tbsupplier`.`NamaSupplier`,`tbsupplier`.`Alamat` FROM `tbpersediaanbibit` LEFT JOIN `tbsupplier` ON `tbpersediaanbibit`.`IDSupplier` = `tbsupplier`.`IDSupplier` where `tbpersediaanbibit`.`IDPersediaanBibit`='$ud1'");
$data = mysqli_fetch_array ($ubah);
?>


<?php
if (isset($_POST['edt'])) {
	$ids = $_POST['ids'];
	$st = $_POST['st'];
	$tc = $_POST['tc'];	
	$jc = $_POST['jc'];
	$h = $_POST['h'];
	$p = $_POST['p'];
	$k = $_POST['k'];
	//$cek = mysqli_query($koneksi, "SELECT `tbpersediaanbibit` .*, `tbsupplier`.`IDSupplier`,`tbsupplier`.`NamaSupplier`,`tbsupplier`.`Alamat` FROM `tbpersediaanbibit` LEFT JOIN `tbsupplier` ON `tbpersediaanbibit`.`IDSupplier` = `tbsupplier`.`IDSupplier` where `tbpersediaanbibit`.`IDPersediaanBibit`='$data[0]'"); //cek data yg mau diedit
	$cek = mysqli_query($koneksi, "SELECT * from `tbpenyerahanbibit` where `IDProduksi`='$data[0]'"); //cek data yg mau diedit
	
  if (mysqli_num_rows($cek) !=0) {
		//$edit = mysqli_query($koneksi, "UPDATE `tbpersediaanbibit` .*, `tbsupplier`.`IDSupplier`,`tbsupplier`.`NamaSupplier`,`tbsupplier`.`Alamat` FROM `tbpersediaanbibit` LEFT JOIN `tbsupplier` ON `tbpersediaanbibit`.`IDSupplier` = `tbsupplier`.`IDSupplier` set  `tbpersediaanbibit`.`BulanSedia`='$bs',`tbpersediaanbibit`.`TahunSedia`='$ts',`tbpersediaanbibit`.`IDSupplier`='$ids',`tbpersediaanbibit`.`Strain`='$st',`tbpersediaanbibit`.`JumlahSedia`='$js' where `tbpersediaanbibit`.`IDPersediaanBibit`='$ud1'") 
		//or die (mysqli_error());
		$edit = mysqli_query($koneksi, "UPDATE tbpenyerahanbibit set  `IDSupplier`='$ids',`Strain`='$st',`TanggalChickIn`='$tc',`JumlahChickIn`='$jc',`Harga`='$h',`Periode`='$p',`KondisiChickIn`='$k' where `IDProduksi`='$ud1'") 
		or die (mysqli_error());
		
				if($edit) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./penyerahanbibit.php" >'; //coding refresh
			
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
 <form method="post" class="popup-form col-lg-5 ">

        <label>ID Produksi</label>
        <input  class="form-control " name="ip" placeholder="Enter text" readonly="" value="<?php echo $data[0];?>" >
        
        <label>ID Peternak</label>
        <input  class="form-control " name="ip" placeholder="Enter text" readonly="" value="<?php echo $data[1];?>" >
        
		<label>ID Supplier</label>
		<select class="form-control" span="label label-success" name="ids" required="required">
		<option required="required" value="<?php echo $data[2];?>"><?php echo $data[2];?></option>
		<?php
			$w = mysqli_query ($koneksi, "select * from `tbsupplier` order by `IDSupplier` ASC");
			while ($dat1 = mysqli_fetch_array ($w)) {
			echo '<option value="'. $dat1[0].'">' . $dat1[0].'. '.$dat1[1].'  ('.$dat1[2].')</option>';
			}
		?>
		</select>
        
		<label>Strain</label>
		 <select class="form-control" span="label label-success" name="st" >
		<option required="required" value="<?php echo $data[3];?>"><?php echo $data[3];?></option>
		<?php
			$s = mysqli_query ($koneksi, "select * from `tbstrain` order by `IDStrain` ASC");
			while ($dat2 = mysqli_fetch_array ($s)) {
			echo '<option value="' . $dat2[1]. '">'.$dat2[1].'</option>';
			}
		?>
		</select> 

					
		<label>Tanggal Chick In</label>
		<input  class="form-control"  name="tc" type="date" value="<?php echo $data[4];?>">

		<label>Jumlah Chick In</label>
        <input type="int" class="form-control form-white" name="jc" value="<?php echo $data[5];?>" >
		
		<label>Harga</label>
        <input type="int" class="form-control form-white" name="h" value="<?php echo $data[6];?>" >	
						
		<label>Periode</label>
       <input type="int" class="form-control" name="p" value="<?php echo $data[7];?>" >
       
        </br>
	
		<label>Kondisi Chick In</label>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		
        <input type="radio" name="k" value="Normal" <?php if ($data[8]== "Normal")
		{echo 'checked';}?> /> Normal &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="radio" name="k" value="Tidak Normal" <?php if ($data[8]== "Tidak Normal")
		{echo 'checked';}?> /> Tidak Normal <br/>
		 </br>
		
		<label>ID Data Kandang</label>
       <input type="text" class="form-control" placeholder="kosong" Value="<?php echo $data[9];?>" id="nama_anu" readonly >
							
                         <!-- /.form input pada modal-->
			          
								 <p></p>
                           
                         
 <button type="submit" class="btn btn-primary" name="edt"> <span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
 <a href="penyerahanbibit.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>

 </form>
<?php include "footer.php";?>