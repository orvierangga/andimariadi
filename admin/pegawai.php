<?php
include 'header.php';
include '../conn.php';?>
<div id="page-wrapper">
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">Data Pegawai <small>Biodata Pegawai CV. Rehobot</small><small>( <?php echo IndonesiaTgl(date('Y-m-d'));?> )</small></h1>
                <ol class="breadcrumb">
                <li class="active">
                <i class="fa fa-user"></i> Data Pegawai</a></li>
                </ol>
                </div>
                </div>
				<div class="dataTable_wrapper">
				
<?php // Coding Hapus
if (isset($_GET['del'])) {
  $id = $_GET['del'];
  $cek = mysqli_query($koneksi, "SELECT * FROM tbpegawai WHERE `IDPegawai`='$id'");
  if (mysqli_num_rows($cek) > 0) {
    $delete = mysqli_query($koneksi, "DELETE FROM tbpegawai WHERE `IDPegawai`='$id'");
    if ($delete) {
      echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil!</strong> Data Telah dihapus.</div>';
  echo '<meta http-equiv="refresh" content="0; url=./pegawai.php" >'; //coding refresh
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
$cari = mysqli_query ($koneksi, "select max(`IDPegawai`) as kd from tbpegawai");
$tm_cari = mysqli_fetch_array ($cari);
$kode = substr($tm_cari['kd'],2,4);
$tambah = $kode+1;
if ($tambah<10){
$ed = "PG00".$tambah;
}else {
$ed ="PGW".$tambah;
}
 //.koding simpan
if (isset($_POST['add'])) {
	$idp = $_POST['idp'];
	$nama = $_POST['nama'];
	$status = $_POST['status'];
	$alamat = $_POST['alamat'];
	$tgllahir = $_POST['tgllahir'];
	$nohp = $_POST['nohp'];
	
  if ($idp != '') {
		$insert = mysqli_query($koneksi, "INSERT INTO tbpegawai (`IDPegawai`, `Nama`,`Status`,`Alamat`,`TanggalLahir`,`Nohp`) 
		VALUES ('$idp','$nama','$status','$alamat','$tgllahir','$nohp')") or die(mysqli_error());
		
				if($insert) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./pegawai.php" >'; //coding refresh
			
		} else {
			echo '<script type="text/javascript">alert("Data gagal disimpan")
			</script>';
			
			echo '<meta http-equiv="refresh" content="0; url=./pegawai.php" >'; //coding refresh
		}
	}  else {
		echo '<script type="text/javascript">alert("Data sudah ada")
			</script>';
			echo '<meta http-equiv="refresh" content="0; url=./pegawai.php" >'; //coding refresh
  }
}
$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime('- 16 year', $now));
$minage = date("Y-m-d", strtotime('- 40 year', $now));
?>

<!-- /.form input pada modal-->
		<form  action="" method="post" class="popup-form">					
        <label>ID Pegawai</label>
        <input  class="form-control form-white" name="idp" placeholder="Enter text" readonly="" value="<?php echo $ed;?>" >               
        <label>Nama Pegawai</label>
        <input  class="form-control form-white"  name="nama" required="Tidak Boleh Kosong" placeholder="Enter text">		
		<label>Status</label>
        <input  class="form-control form-white"  name="status" required="Tidak Boleh Kosong" placeholder="Enter text">					
		<label>Alamat</label>
        <input  class="form-control "  name="alamat" required="Tidak Boleh Kosong" placeholder="Enter text">
		<label>Tanggal Lahir</label>
		<input  class="form-control"  name="tgllahir" required="Tidak Boleh Kosong" type="date" placeholder="dd/mm/yyyy">	
		<label>Nomor Telpon/HP</label>
        <input  class="form-control form-white" pattern="[0-9]{3}" name="nohp" required="Tidak Boleh Kosong" placeholder="Enter text">
		
        
            <p></p>   <!-- /.Jarak -->
       
<!-- /.Bottom simpan pada modal -->                   
<button type="submit" class="btn btn-primary" name="add"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
<a href="pegawai.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>

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
	  $('#demo').collapse('show');
    $("#reload_data").load('get_pegawai.php');
    $("#isi_cari").on("keyup", function() {
      var search = $(this).val();
      
    })
    $("#isi_cari, #cari_reload").on("keyup", function() {
      var search = $(this).val();
      $.ajax({
        url: 'get_pegawai.php',
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
