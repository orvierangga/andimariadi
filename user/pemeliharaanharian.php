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
				<div class="dataTable_wrapper">
				
<?php 
//anu koding seleksi
$data1 = mysqli_query($koneksi, "SELECT * FROM `tbpenyerahanbibit` WHERE `IDPeternak`='" . $_SESSION['IDPengguna']. "'");
$row = mysqli_num_rows($data1);
?>

 <!-- seleksi peternak yang sudah masuk akses -->
  <div class="form-group">
<?php
		if (!empty($row)) {
			?>
			<!--<span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Tambah Pemeliharaan Harian</a>
			-->
			<?php
		}
	?>
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
     
   <div class="row">
   <?php if (empty($row)) { ?>
			<div class="alert alert-danger" role="alert">
			Anda belum masuk dalam daftar penginputan!
			</div>
	<?php
		}
		foreach($data1 as $anu):
	?>
		<div class="col-md-2 form-method"  align="right">
		<input type="hidden" name="idph" class="form-control" value="<?php echo $ed;?>" readonly>      
		<input name="idp" class="form-control" value="<?php echo $anu['IDProduksi'];?>" readonly>        
        </div>
		
		
	
    <div class="col-lg-2" >
		<label>ID Peternak</label> :  <?php echo $anu['IDPeternak'];?>
	</div>
	<div class="col-lg-3" >
		<label>Tanggal Chick In</label> : <?php echo $anu['TanggalChickIn'];?>
    </div><br></br>
	<!--input tambah-->
	<div class="col-md-1" >
		 <label>Umur</label> 
    </div>
	<div class="col-md-2" >
		<input class="form-control form-white" name="u" value="" required>
    </div>
		
	<div class="col-md-2" >
		 <label>Minggu Ke </label>  
    </div>
	
	 <div class="col-md-2" >
		<input class="form-control" name="mk" value="" required>
    </div> 
	<div class="col-md-1" >
		 <label>Tanggal</label>
    </div>
	<div class="col-md-3" >
		<input type="date" class="form-control" name="t" value="" required>
    </div>
	
	
	<br></br>
	<div class="col-md-1" >
		 <label>Mati</label> 
    </div>
	<div class="col-md-2" >
		<input class="form-control form-white" name="mati" value="" required>
    </div>
	<div class="col-md-2" >
		 <label>Pakan Std</label> 
    </div>
	<div class="col-md-2" >
		<input class="form-control form-white" name="ps" value="" required>
    </div>
	
		<div class="col-md-2" >
		 <label>Pakan Act</label> 
    </div>
	<div class="col-md-2" >
		<input class="form-control form-white" name="pa" value="" required>
    </div>
	
	
	<br></br>
	
	
	
	<div class="col-md-1" >
	<label>Culling</label> 
    </div>
	<div class="col-md-2" >
		<input class="form-control form-white" name="cul" value="" required>
    </div>
	<div class="col-md-2" >
		 <label>Jenis Pakan</label> 
    </div>
	<div class="col-md-3" >
		<input class="form-control form-white" name="ip" value="" required>
    </div>
	
	<div class="col-md-1" >
		 <label>IDovk</label> 
    </div>
	<div class="col-md-2" >
		<input class="form-control form-white" name="ovk" value="" required>
    </div>
	
	
	<br></br>
	<div class="col-md-1" >
		 <label>Afkir</label> 
    </div>
	<div class="col-md-2" >
		<input class="form-control form-white" name="afkir" value="" required>
    </div>
	
	
	<div class="col-md-2" >
		 <label>OVK Pakai</label> 
    </div>
	<div class="col-md-2" >
		<input class="form-control form-white" name="ovkp" value="" required>
    </div>
	
	<div class="col-md-4" align="right">
	<button type="submit" class="btn btn-primary" name="add"> <span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button> 
	</div></div>
	</form>
   
   <br />
   
  <!-- untuk membuat cari -->
	<div class="row">
    <div class="col-xs-9">
    <input type="text" name="s" class="form-control" placeholder="Cari.." id="isi_cari">
    </div>
    <div class="col-xs-1" align="right"><a href="#" class="btn btn-success" id="cari_reload"><span class="glyphicon glyphicon-search" > </span> Cari</a>
    </div>
	<div class="col-xs-1" align="left"><a href="#" class="btn btn-secondary" id="cari_reload"><span class="glyphicon glyphicon-print" > </span> Cetak</a>
    </div>
	</div> 
	

<br /> <!-- enter spasi -->
<!-- tempat reload data -->
<div id="reload_data"></div>
<?php
	 endforeach;
	 ?>
		
<!-- /.koding tambah data -->
<!-- /.penomoran otomatis -->

<!-- /.form input pada modal-->
		
				
				
	
 
</div>
</div>
</div>
	
	
<script type="text/javascript">
function confirm_delete() {
  return confirm('Hapus data ini?');
}
</script>
<!-- jQuery -->
<script src="js/jquery.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#reload_data").load('get_pemeliharaanharian.php');
    $("#isi_cari").on("keyup", function() {
      var search = $(this).val();
      
    })
    $("#isi_cari, #cari_reload").on("keyup", function() {
      var search = $(this).val();
      $.ajax({
        url: 'get_pemeliharaanharian.php',
        data: 's='+search,
        success:function(data) {
          $("#reload_data").html(data);
        },
        error:function(data) {
          alert('Tidak Ada Data');
        }
      }) 
    });
  })
</script>
<?php include 'footer.php';?>
