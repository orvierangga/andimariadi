<?php include "../conn.php";?>
<?php
$data = $_POST['data'];
$nama = $_POST['nama'];
if ($data == 'IDPeternak') {
	$data = mysqli_query($koneksi, "SELECT * FROM `tbdatakandang` WHERE `IDDataKandang`='$nama'");
	foreach ($data as $value) {
		echo $value['IDDataKandang'];
	}
} 
?>