<?php
include 'header.php';
include '../conn.php';?>
<div id="page-wrapper">
<div class="container-fluid">
<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
Master Data <small>Penggguna</small><small>( <?php echo IndonesiaTgl(date('Y-m-d'));?> )</small>
</h1>
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-user" > </i> Data Pengguna
</li>
</ol>
</div>
</div>
<?php
if (isset($_GET['del'])) {
$nik = $_GET['del'];
$cek = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE `IDuser`='$nik'");
if (mysqli_num_rows($cek) > 0) {
$delete = mysqli_query($koneksi, "DELETE FROM pengguna WHERE `IDuser`='$nik'");
if ($delete) {
echo '<div class="alert alert-danger alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Berhasil!</strong> Data telah dihapus.</div>';
} else {
echo '<div class="alert alert-warning alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Kesalahan!</strong> Tidak dapat menghapus data.</div>';
}
}
}
?>
<div class="form-group">
<span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="#" data-toggle="modal" data-target="#modal1"  class="btn btn-blue">Tambah Data </a>

</div>
<!-- untuk membuat cari -->
<div class="row">
<div class="col-xs-8">
<input type="text" name="s" class="form-control" placeholder="Cari.." id="isi_cari">
</div>
<div class="col-xs-4">
<a href="#" class="btn btn-success" id="cari_reload"><span class="glyphicon glyphicon-search" > </span> Cari</a>
</div>
</div>
<br />
<!-- tempat reload data -->
<div id="reload_data"></div>


<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
<!-- /.row -->
<?php
$cari = mysqli_query ($koneksi, "select max(`IDuser`) as kd from pengguna");
$tm_cari = mysqli_fetch_array ($cari);
$kode = substr($tm_cari['kd'],3,3);
$tambah = $kode+1;
if ($tambah<10){
$ed = "USR0".$tambah;
}else {
$ed ="USR".$tambah;
}
if (isset($_POST['add'])) {
$idu = $_POST['idu'];
$un = $_POST['un'];
$pass = md5($_POST['pass']);
$pass2 = md5($_POST['pass2']);
$kdp = $_POST['kdp'];
$status = $_POST['status'];
//if ($idp != ''){
if ($pass==$pass2){
$insert = mysqli_query($koneksi, "INSERT INTO `pengguna` (`IDuser`, `username`,`password` ,`IDPengguna`,`status`)
VALUES ('$idu','$un','$pass','$kdp','$status')") or die(mysqli_error());
if($insert){
echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
echo '<meta http-equiv="refresh" content="0; url=./pengguna.php" >'; //coding refresh
} else {
echo '<script type="text/javascript">alert("Data gagal disimpan")
</script>';
echo '<meta http-equiv="refresh" content="0; url=./pengguna.php" >'; //coding refresh
}
} else {
echo '<script type="text/javascript">alert("Gagal Disimpan, Kesalahan Pengetikan Ulang Password")
</script>';
echo '<meta http-equiv="refresh" content="0; url=./pengguna.php" >'; //coding refresh
}
}
$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime('- 16 year', $now));
$minage = date("Y-m-d", strtotime('- 40 year', $now));
?>



<form action="" method="post" class="popup-form" >
<label>ID Pengguna</label>
<input class="form-control form-white" name="idu" placeholder="Enter text" readonly="" value="<?php echo $ed;?>" >
<label>Nama Pengguna</label>
<input class="form-control form-white" name="un" placeholder="Enter text" required="required">
<label>Kata Sandi</label>
<input type="password" name="pass" id="passw" class="form-control form-white" required="required" >
<label>Ketik Ulang Kata Sandi</label>
<input type="password" name="pass2" id="passw2" class="form-control " required="Ketik Ulang Password" >
<label>Status</label>
<select class="form-control" name="status" id="jenis" required="required">
<option required="required" value="">Pilih</option>
<option value="ADMIN">ADMIN</option>
<option value="PETERNAK">PETERNAK</option>
</select>
<label>ID Data Pengguna</label>
<select class="form-control" id="nama_anu" name="kdp" required="required">
<option required="required" value="">Pilih</option>
</select>

<p></p>
<div class="checkbox-holder text-center">
<div class="checkbox">
<input type="checkbox" value="None" id="squaredOne" name="check" class="form-checkbox" />
<label for="squaredOne"><span>Tunjukkan <strong>Kata Sandi </strong></span></label>
</div>
<button type="submit" class="btn btn-primary" name="add"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
<a href="data_petugas.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>
</form>
</div>
</div>
</div>
</div>

</table>
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
$("#reload_data").load('get_pengguna.php');
$("#isi_cari").on("keyup", function() {
var search = $(this).val();
})
$("#isi_cari, #cari_reload").on("keyup", function() {
var search = $(this).val();
$.ajax({
url: 'get_pengguna.php',
data: 's='+search,
success:function(data) {
$("#reload_data").html(data);
},
error:function(data) {
alert('Tidak Ada Data');
}
})
});

$("#jenis").on("change", function() {
      var data = $(this).val();
      //alert(data);
      if (data == 'ADMIN') {
        $.ajax({
          type: 'POST',
          url: 'combojenispengguna.php',
          data: 'data=' + data,
          success:function(data) {
            $("#nama_anu").html(data);
          }
        })
        //alert('sip')
      }  else {
        $.ajax({
          type: 'POST',
          url: 'combojenispengguna.php',
          data: 'data=' + data,
          success:function(data) {
            $("#nama_anu").html(data);
          }
        })
        //alert('anu');
      }
    });

$("#squaredOne").on("click", function() {
var data = $("#passw").attr('type');
if (data == 'password') {
$("input[type=password]").attr('type', 'text');
} else {
$("#passw, #passw2").attr('type', 'password');
}
  
 
  })
})

</script>


<?php include 'footer.php';?>