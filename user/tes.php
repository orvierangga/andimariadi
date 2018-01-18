<?php
    include "../conn.php";
    include "header.php";
	
$kd = $_POST['kd'];
$jumlahp = $_POST['jumlahp'];
$kep = $_POST['kep'];
$tanggal = date('Y-m-d');
$waktu = date('h:i:s');
$petugas = $_SESSION['nama_petugas'];

 $sql = mysqli_query($koneksi, "INSERT INTO `permintaan_barang`(`kd_barang`, `jumlah_perm`, `tgl_perm`,`waktu`,`keperluan_perm`,`status_perm`, `id_petugas`) 
		VALUES ('$kd','$jumlahp','$tanggal','$waktu','$kep','menunggu','$petugas')")
		or die(mysqli_error());
		
				if($sql) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./persed_barang.php" >'; //coding refresh
			
		} else {
			echo '<script type="text/javascript">alert("Data gagal disimpan")
			</script>';
		}

$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime('- 16 year', $now));
$minage = date("Y-m-d", strtotime('- 40 year', $now));
  
?>

 <!-- $sql = mysql_query("UPDATE siswa SET nama = '$nama', umur = '$umur' WHERE id=$id");
    if ($sql) {
        //jika  berhasil tampil ini
        echo "Data Berhasil Diubah"."</br>";
        echo "<a href='index.php'>Kembali Ke Halaman Depan</a>";
    } else {
        // jika gagal tampil ini
        echo "Gagal Update: ";
    }-->