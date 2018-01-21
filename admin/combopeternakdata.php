<?php include "../conn.php";?>
<?php
$data = $_POST['data'];
//$nama = $_POST['nama'];

$data = mysqli_query($koneksi, "SELECT * FROM `tbdatakandang` WHERE `IDPeternak`='$data'");
	foreach ($data as $value) {
		echo $value['IDDataKandang'];
	}
?>