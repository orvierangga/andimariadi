<?php include "../conn.php";?>
<option value="">Pilih</option>
<?php
$data = $_POST['data'];
if ($data == 'ADMIN') {
	$data = mysqli_query($koneksi, "SELECT * FROM `tbpegawai`");
	foreach ($data as $value) {
		echo '<option value="' . $value['IDPegawai'] . '">' . $value['Nama'] . ' - ' . $value['Alamat'] . '  (' . $value['Status'] . ')</option>';
	}
} else {
	$data = mysqli_query($koneksi, "SELECT * FROM `tbpeternak`");
	foreach ($data as $value) {
		echo '<option value="' . $value['IDPeternak'] . '">' . $value['IDPeternak'] . '. ' . $value['NamaPeternak'] . ' - ' . $value['Alamat'] . '</option>';
	}
}

//print_r($_POST);
?>