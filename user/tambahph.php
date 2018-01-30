<?php
include 'header.php';
include '../conn.php';?>
<div id="page-wrapper">
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">Data Pemeliharaan <small>Pemeliharaan Ayam</small><small>( <?php echo IndonesiaTgl(date('Y-m-d'));?> )</small></h1>
                <ol class="breadcrumb">
                <li class="active">
				
                <i class="fa fa-desktop"></i> Data Pemeliharaan</a></li>
                </ol>
                </div>
                </div>
	 <?php
$cari = mysqli_query ($koneksi, "select max(`IDPHarian`) as kd from tbpemeliharaanharian");
$tm_cari = mysqli_fetch_array ($cari);
$kode = substr($tm_cari['kd'],2,3);
$tambah = $kode+1;
if ($tambah<10){
$ed = "PH0".$tambah;
}else {
$ed ="PH0".$tambah;
}
 //.koding simpan
if (isset($_POST['add'])) {
	$idph = $_POST['idph'];
	$idp = $_POST['idp'];
	$mk = $_POST['mk'];
	$t = $_POST['t'];
	$u = $_POST['u'];
	$ps = $_POST['ps'];
	$pa = $_POST['pa'];
	$ip = $_POST['ip'];
	$mati = $_POST['mati'];
	$cul = $_POST['cul'];
	$afkir = $_POST['afkir'];
	$ovk = $_POST['ovk'];
	$ovkp = $_POST['ovkp'];
	
  if ($idph != '') {
		$insert = mysqli_query($koneksi, "INSERT INTO tbpemeliharaanharian (`IDPHarian`, `IDProduksi`,`MingguKe`,`Tanggal`,`Umur`,`PakanStd`,`PakanAct`,`IDPakan`,`Mati`,`Culling`,`Afkir`,`IDOVK`,`OVKPakai`) 
		VALUES ('$idph','$idp','$mk','$t','$u','$ps','$pa','$ip','$mati','$cul','$afkir','$ovk','$ovkp')") or die(mysqli_error());
		
				if($insert) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./pemeliharaanharian.php" >'; //coding refresh
			
		} else {
			echo '<script type="text/javascript">alert("Data gagal disimpan")
			</script>';
			
			echo '<meta http-equiv="refresh" content="0; url=./pemeliharaanharian.php" >'; //coding refresh
		}
	}  else {
		echo '<script type="text/javascript">alert("Data sudah ada")
			</script>';
			echo '<meta http-equiv="refresh" content="0; url=./pemeliharaanharian.php" >'; //coding refresh
  }
}
$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime('- 16 year', $now));
$minage = date("Y-m-d", strtotime('- 40 year', $now));
?>
			
				
<Form method="post">
<div class="col-md-4" >
		 <label>IDPHarian </label>  
    
		<input class="form-control" name="idph" value="<?php echo $ed;?>" required>
     
		 <label>ID Produksi </label>  
    
		<input class="form-control" name="idp" value="" required>
    		 <label>Minggu Ke </label>  
    
		<input class="form-control" name="mk" value="" required>
    
		 <label>Tanggal</label>
    
		<input type="date" class="form-control" name="t" value="" required>
    
		 <label>Umur</label> 
    
		<input class="form-control form-white" name="u" value="" required>
    
		 <label>Pakan Std</label> 
    
		<input class="form-control form-white" name="ps" value="" required>
 
	
		 <label>Pakan Act</label> 
   
	
		<input class="form-control form-white" name="pa" value="" required>
  
	
	
		 <label>Jenis Pakan</label> 
 
		<input class="form-control form-white" name="ip" value="" required>
  
	
	
		 <label>Mati</label> 
  
		<input class="form-control form-white" name="mati" value="" required>
   
		 <label>Culling</label> 
   
		<input class="form-control form-white" name="cul" value="" required>
   
		 <label>Afkir</label> 
   
		<input class="form-control form-white" name="afkir" value="" required>
    
		 <label>ID OVK</label> 
  
		<input class="form-control form-white" name="ovk" value="" required>
  
		 <label>OVK Pakai</label> 
   
		<input class="form-control form-white" name="ovkp" value="" required>
  
	
	<br></br> 
	
	<button type="submit" class="btn btn-primary" name="add"> <span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button> 
	</div>
	</form>
	
	
	<form  action="" method="post" class="popup-form">					
        <label>IDPemeliharaan</label>
        <input  class="form-control form-white" name="idph" placeholder="Enter text" readonly="" value="<?php echo $ed;?>" >
                        
        <label>ID Produksi</label>
		<input  class="form-control form-white" name="idph" placeholder="Enter text" readonly="" value="<?php echo $anu['IDProduksi'];?>" >
        
		<label>Minggu Ke</label>
        <input  class="form-control form-white" name="l" placeholder="Enter text" value="" required>
			   
		<label>Tanggal</label>
        <input type="date" class="form-control form-white" name="l" placeholder="Enter text" value="" required>
		
		<label>Umur</label>
        <input class="form-control form-white" name="l" placeholder="Enter text" value="" required>
		
		
		<label>Pakan STD</label>
        <input class="form-control form-white" name="l" placeholder="Enter text" value="" >
		
		<label>Pakan ACT</label>
        <input class="form-control form-white" name="l" placeholder="Enter text" value="" >
		
		<label>ID Pakan</label>
        <input class="form-control form-white" name="l" placeholder="Enter text" value="" >
		
		<label>Mati</label>
        <input class="form-control form-white" name="l" placeholder="Enter text" value="" >
		
		<label>Culling</label>
        <input class="form-control form-white" name="l" placeholder="Enter text" value="" >
		
		<label>Afkir</label>
        <input class="form-control form-white" name="l" placeholder="Enter text" value="" >
		
		<label>ID OVK</label>
        <input class="form-control form-white" name="l" placeholder="Enter text" value="" >
		
		<label>OVKPakai</label>
        <input class="form-control form-white" name="l" placeholder="Enter text" value="" >		
            <p></p>   <!-- /.Jarak -->
       
<!-- /.Bottom simpan pada modal -->                   
<button type="submit" class="btn btn-primary" name="add"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
<a href="pemeliharaanharian.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>

		</form>