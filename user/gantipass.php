<?php
include 'header.php';
include '../conn.php';?>
<div id="page-wrapper">
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">Ganti Password ( <?php echo IndonesiaTgl(date('Y-m-d'));?> )</small></h1>
               
                </div>
                </div>
				<div class="dataTable_wrapper">
				
<?php
 //.koding simpan
if (isset($_POST['add'])) {
	$username	= $_SESSION['username'];
	$password	= md5($_POST['password']);
	$pass1	= $_POST['js'];
	$pass2	= $_POST['js1'];
	$login=mysqli_query($koneksi,"SELECT * FROM `pengguna` WHERE `username`='$username'  AND `password` ='$password'");
	if(mysqli_num_rows($login) == 0){
		echo '<div class="alert alert-danger" align="center" >Kata Sandi Salah..</div>';
	} else {
		if($pass1 == $pass2) {
			$pass = md5($pass1);
			$login=mysqli_query($koneksi,"UPDATE `pengguna` SET `password`='$pass' WHERE `username`='$username'");
			echo '<div class="alert alert-success" align="center" >DOne..</div>';
			
		} else {
			echo '<div class="alert alert-danger" align="center" >Kata Sandi Tidak Sama..</div>';
		}
	}
}
?>

<!-- /.form input pada modal-->
		<form  action="" method="post" class="col-lg-5">					
                        		
		<label>Password Lama</label>
        <input type="password" class="form-control form-white" name="password" placeholder="" required="" >
		<label>Password baru</label>
        <input type="password" class="form-control form-white" name="js" placeholder="" required="" >
		<label>Ulang Password baru</label>
        <input type="password" class="form-control form-white" name="js1" placeholder="" required="" >
			                                
            <p></p>   <!-- /.Jarak -->
       
<!-- /.Bottom simpan pada modal -->                   
<button type="submit" class="btn btn-primary" name="add"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>

		</form>
				</div>
				</div>
				</div>	
	
 
</div>
</div>
</div>
	

<?php include 'footer.php';?>

