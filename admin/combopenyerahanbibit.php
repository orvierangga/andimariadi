<?php include "../conn.php";?>
<?php
$data = $_POST['data'];
//$nama = $_POST['nama'];

$data = mysqli_query($koneksi, "SELECT * from `tbpenyerahanbibit` WHERE `IDProduksi`='$data'");
	foreach ($data as $value) {
		echo $value['Periode'];
	
	}
?>