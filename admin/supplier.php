<?php
include 'header.php';
include '../conn.php';?>
<div id="page-wrapper">
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">Data Supplier <small>Supplier</small><small>( <?php echo IndonesiaTgl(date('Y-m-d'));?> )</small></h1>
                <ol class="breadcrumb">
                
                <i class="fa fa-desktop"></i><a href="pengadaanbibit.php"> Data Pengadaan</a>
				<li class="active"><i class="fa fa-desktop"></i> Data Supplier</a></li>
				<i class="fa fa-desktop"><a href="strain.php"></i> Data Strain</a>
				
                </ol>
                </div>
                </div>
				<div class="dataTable_wrapper">
				
<?php // Coding Hapus
if (isset($_GET['del'])) {
  $id = $_GET['del'];
  $cek = mysqli_query($koneksi, "SELECT * FROM tbsupplier WHERE `IDSupplier`='$id'");
  if (mysqli_num_rows($cek) > 0) {
    $delete = mysqli_query($koneksi, "DELETE FROM tbsupplier WHERE `IDSupplier`='$id'");
    if ($delete) {
      echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil!</strong> Data Telah dihapus.</div>';
  echo '<meta http-equiv="refresh" content="0; url=./supplier.php" >'; //coding refresh
    } else {
      echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Kesalahan!</strong> Tidak dapat menghapus data.</div>';
    }
  }
}
?>
 <!-- form grup dan modal -->
  <div class="form-group">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Tambah Data</a>
    
  </div>  
   
  <!-- untuk membuat cari -->
	<div class="row">
    <div class="col-xs-8">
    <input type="text" name="s" class="form-control" placeholder="Cari.." id="isi_cari">
    </div>
    <div class="col-xs-4"><a href="#" class="btn btn-success" id="cari_reload"><span class="glyphicon glyphicon-search" > </span> Cari</a>
    </div>
	</div>

<br /> <!-- enter spasi -->
<!-- tempat reload data -->
<div id="reload_data"></div>

		<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content modal-popup">
		<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
		
<!-- /.koding tambah data -->
<!-- /.penomoran otomatis -->
<?php
$cari = mysqli_query ($koneksi, "select max(`IDSupplier`) as kd from tbsupplier");
$tm_cari = mysqli_fetch_array ($cari);
$kode = substr($tm_cari['kd'],3,4);
$tambah = $kode+1;
if ($tambah<10){
$ed = "SPL0".$tambah;
}else {
$ed ="SPL".$tambah;
}
 //.koding simpan
if (isset($_POST['add'])) {
	$id1 = $_POST['id1'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$nohp = $_POST['nohp'];
	
  if ($id1 != '') {
		$insert = mysqli_query($koneksi, "INSERT INTO tbsupplier (`IDSupplier`, `NamaSupplier`,`Alamat`,`NoHP`) 
		VALUES ('$id1','$nama','$alamat','$nohp')") or die(mysqli_error());
		
				if($insert) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./supplier.php" >'; //coding refresh
			
		} else {
			echo '<script type="text/javascript">alert("Data gagal disimpan")
			</script>';
			
			echo '<meta http-equiv="refresh" content="0; url=./supplier.php" >'; //coding refresh
		}
	}  else {
		echo '<script type="text/javascript">alert("Data sudah ada")
			</script>';
			echo '<meta http-equiv="refresh" content="0; url=./supplier.php" >'; //coding refresh
  }
}
$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime('- 16 year', $now));
$minage = date("Y-m-d", strtotime('- 40 year', $now));
?>

<!-- /.form input pada modal-->
		<form  action="" method="post" class="popup-form">					
        <label>ID Supplier</label>
        <input  class="form-control form-white" name="id1" placeholder="Enter text" readonly="" value="<?php echo $ed;?>" >
                        
        <label>Nama Supplier</label>
        <input  class="form-control form-white"  name="nama" required="Tidak Boleh Kosong" placeholder="Enter text">
		
		<label>Alamat</label>
        <input  class="form-control form-white"  name="alamat" required="Tidak Boleh Kosong" type="value" placeholder="Enter text">
		
		<label>Nomor Telpon/HP</label>
        <input  class="form-control form-white"  name="nohp" required="Tidak Boleh Kosong" placeholder="Enter text">  		
	                                
            <p></p>   <!-- /.Jarak -->
       
<!-- /.Bottom simpan pada modal -->                   
<button type="submit" class="btn btn-primary" name="add"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
<a href="supplier.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>

		</form>
				</div>
				</div>
				</div>	
	
 
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
    $("#reload_data").load('get_supplier.php');
    $("#isi_cari").on("keyup", function() {
      var search = $(this).val();
      
    })
    $("#isi_cari, #cari_reload").on("keyup", function() {
      var search = $(this).val();
      $.ajax({
        url: 'get_supplier.php',
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
