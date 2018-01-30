<?php include "../conn.php";?>
<?php
$data = $_POST['data'];
//$nama = $_POST['nama'];

$data = mysqli_query($koneksi, "SELECT `tbdatakandang` .*, `tbpeternak`.`NamaPeternak`,`tbpeternak`.`Alamat` FROM `tbdatakandang` LEFT JOIN `tbpeternak` ON `tbdatakandang`.`IDPeternak` = `tbpeternak`.`IDPeternak` WHERE `tbdatakandang`.`IDPeternak`='$data'");
	foreach ($data as $value) {
		echo $value['IDDataKandang'];
	
	}
?>