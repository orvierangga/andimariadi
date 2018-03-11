<?php include "header.php";
include "../conn.php";
$ud1 = $_GET['id'];?>

	<div id="page-wrapper">
	<div class="container-fluid">
<?php 
$ubah = mysqli_query ($koneksi, "select * from `tbpanen` where IDPanen ='$ud1'");
$data = mysqli_fetch_array ($ubah);
?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Data Panen
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-pencil"></i> ID Panen : <?php echo $data[0];?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  
								<i class="fa fa-circle"></i> ID Produksi : <?php echo $data[1];?>  
                            </li>
                        </ol>
                    </div>
                </div>
<!--/.koding edit-->

<?php
if (isset($_POST['edt'])) {
	$tp = $_POST['tp'];
	$u = $_POST['u'];
	$ja = $_POST['ja'];
	$tb = $_POST['tb'];
	$br = $_POST['br'];
	$np = $_POST['np'];

	$cek = mysqli_query($koneksi, "SELECT * from `tbpanen` where `IDPanen`='$data[0]'"); //cek data yg mau diedit
	
  if (mysqli_num_rows($cek) !=0) {
		$edit = mysqli_query($koneksi, "UPDATE tbpanen set  `TanggalPengiriman`='$tp',`Umur`='$u',`JumlahAyam`='$ja',`TotalBerat`='$tb',`BeratRata`='$br',`NamaPembeli`='$np' where `IDPanen`='$ud1'") 
		or die (mysqli_error());
		
				if($edit) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./panen.php" >'; //coding refresh
			
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
 <form method="post" class="popup-form col-md-8">
        					
		<label>Tanggal Pengiriman</label>
		<input  class="form-control"  name="tp" type="date" placeholder="dd/mm/yyyy" value="<?php echo $data[2];?>">

		
		<label>Umur</label>
        <input type="text" class="form-control " name="u" pattern="[0-9]*" title="Hanya Angka" placeholder="Masukkan Angka" value="<?php echo $data[3];?>" >
							
		<label>Jumlah Ayam</label>
        <input type="text" class="form-control " name="ja" pattern="[0-9]*" title="Hanya Angka" placeholder="Masukkan Angka" value="<?php echo $data[4];?>" >
		
		<label>Total Berat</label>
       <input type="text" class="form-control" name="tb" pattern="[0-9]*" title="Hanya Angka" placeholder="Masukkan Angka" value="<?php echo $data[5];?>" >
       
        <label>Berat Rata</label>
       <input type="text" class="form-control" name="br" pattern="[0-9]*" title="Hanya Angka" placeholder="Masukkan Angka" value="<?php echo $data[6];?>" >
   
		<label>Nama Pembeli</label>
       <input type="text" class="form-control" name="np" pattern="[A-Z a-z]*" title="Hanya Huruf" placeholder="kosong" value="<?php echo $data[7];?>" >
        
								 <p></p>
                                            
 <button type="submit" class="btn btn-primary" name="edt"> <span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
 <a href="panen.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>

 </form>
 </div></div>
<?php include "footer.php";?>