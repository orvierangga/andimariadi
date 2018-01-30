<?php include '../conn.php';
 $ud=$_GET['id'];?>


<?php $ubah = mysqli_query ($koneksi, "select * from pengguna where IDuser='$ud'");
				$data = mysqli_fetch_array ($ubah);
				?>

<?php

if (isset($_POST['edt'])) {	
$username = $_POST['username'];
$pass1 = md5($_POST['pass1']);
$pass2 = md5($_POST['pass2']);
$cek = mysqli_query($koneksi, "select * from pengguna where IDuser='$data[0]'");

	if(mysqli_num_rows($cek) != 0){
		echo '<div class="alert alert-danger" align="center" >Kata Sandi Salah..</div>';
	} else {	
	if($pass1 == $pass2) {
	$pass = md5($pass1);
	$edit = mysqli_query($koneksi, "UPDATE `pengguna` set `username` ='$username', `password`='$pass' where `IDuser`='$ud'"); 
	echo '<div class="alert alert-success" align="center" >DOne..</div>';
	} else {
			echo '<div class="alert alert-danger" align="center" >Kata Sandi Tidak Sama..</div>';
		}
	}	
}		
?>

				<h1 class="white">Edit Data Pengguna</h1>
				<form action="" class="popup-form" method="post">
					
					<label>Nama Pengguna</label>
					<input type="text" class="form-control form-white" placeholder="Username" name="username"  value="<?php echo $data[1]?> ">
					<label>Kata Sandi</label>
					<input type="password" name="pass1" id="pass1" class="form-control form-white" required="required" >
					<label>Ketik Ulang Kata Sandi</label>
					<input type="password" name="pass2" id="pass2" class="form-control " required="Ketik Ulang Password" >
	
					
					<div class="checkbox-holder text-center">
					<div class="checkbox">
					<input type="checkbox" value="None" id="anu" name="check" class="form-checkbox" />
					<label for="ihih"><span>Tunjukkan <strong>Kata Sandi </strong></span></label>
					</div>
					<button type="submit" class="btn btn-primary" name="edt"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					
					</form>
					</div>

				
<script src="js/jquery.js"></script>				
<script type="text/javascript">
$(document).ready(function() {
	$("#anu").on("click", function() {
var data = $("#pass1").attr('type');
if (data == 'password') {
$("input[type=password]").attr('type', 'text');
} else {
$("#pass1, #pass2").attr('type', 'password');
}
  })
})
</script>
				