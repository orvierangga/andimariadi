<?php include "../conn.php";?>
<input value="">
<?php
$data = $_POST['data'];
if ($data == 'IDPeternak') {
	$data = mysqli_query($koneksi, "SELECT * FROM `tbdatakandang` ");
	foreach ($data as $value) {
		echo  $value['IDDataKandang']  ;
	}
} 

//print_r($_POST);
?>