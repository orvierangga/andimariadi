<!---.//koding tidak dipakai , tidak terkoneksi dari manapun

<?php include "../conn.php";?>
<input value="">
<?php
$data = $_POST['data'];
if ($data == 'IDPeternak') {
	$data = mysqli_query($koneksi, "SELECT `tbdatakandang` .*, `tbpeternak`.`NamaPeternak`,`tbpeternak`.`Alamat` FROM `tbdatakandang` LEFT JOIN `tbpeternak` ON `tbdatakandang`.`IDPeternak` = `tbpeternak`.`IDPeternak` ORDER BY `tbdatakandang`.`IDDataKandang` asc ");
	foreach ($data as $value) {
		echo  $value['IDDataKandang']  ;
	}
} 

//print_r($_POST);
?> --->