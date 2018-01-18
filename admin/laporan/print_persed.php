<?php
$id = $_GET['id'];

 // Define relative path from this script to mPDF
 $nama_dokumen='PDF With MPDF'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../laporan/mpdf/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
 $mpdf->AddPage();
 $stylesheet = file_get_contents('../laporan/mpdf/mpdf.css');
 $mpdf->SetFont('Arial','B','12'); //Font Arial, Tebal/Bold, ukuran font 16
          	  $mpdf->Image('headercetak.png',1,3,400,35);
         
$mpdf->Cell(180,1,'','B',1,'L');
$mpdf->Cell(180,1,'','B',0,'L');
$mpdf->Ln(1);

 
//Header Table
$mpdf->SetFont('Arial','','8');
$mpdf->SetFillColor(139, 69, 19); //warna dalam kolom header
$mpdf->SetTextColor(255); //warna tulisan putih
$mpdf->SetDrawColor(222, 184, 135); //warna border
foreach ($header as $kolom) {
    $mpdf->Cell($kolom['length'], 9, $kolom['label'], 1, '0', $kolom['align'], true);
}
 
 
 
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start(); 
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--CONTOH Code START-->
<?php require_once '../conn.php'

?>

<?php
//$sql = mysqli_query($koneksi,"SELECT * , SUM(`jumlah_msk`) AS `total_semua` FROM `barang_masuk` LEFT JOIN `data_barang` ON `barang_masuk`.`kd_barang` = `data_barang`.`kd_barang` where `barang_masuk`.`kd_barang` = '{$id}'");
  
  $sql=mysqli_query($koneksi,"SELECT * , SUM(`jumlah_msk`) AS `total_semua`,sum(`total_harga`) AS `totalhargasemua` FROM `barang_masuk` LEFT JOIN `data_barang` ON `barang_masuk`.`kd_barang` = `data_barang`.`kd_barang` where `barang_masuk`.`kd_barang` = '{$id}'");   
   
//$ubah = mysqli_query ($koneksi, "select * from permintaan_barang where kd_perm='$ud'");
$data = mysqli_fetch_array ($sql);
?>

<?php
//$sql=mysql_query("SELECT * FROM permintaan_barang ORDER BY kd_perm");
$nama=$_POST['nama'];
$nip=$_POST['nip'];
//$sql = mysqli_query($koneksi,"SELECT * , SUM(`jumlah_msk`) AS `total_semua` FROM `barang_masuk` LEFT JOIN `data_barang` ON `barang_masuk`.`kd_barang` = `data_barang`.`kd_barang` where `barang_masuk`.`kd_barang` = '{$data[1]}'");
 $sql=mysqli_query($koneksi,"SELECT * , SUM(`jumlah_msk`) AS `total_semua`,sum(`total_harga`) AS `totalhargasemua` FROM `barang_masuk` LEFT JOIN `data_barang` ON `barang_masuk`.`kd_barang` = `data_barang`.`kd_barang` where `barang_masuk`.`kd_barang` = '{$data[1]}'");   
//$sql= mysqli_query ($koneksi,"SELECT * FROM permintaan_barang where kd_perm = '$data[1]' ");
$cari = mysqli_fetch_array($sql);
$hitung=mysqli_num_rows($sql);

if ($hitung==0) {
  echo "Data Tidak Ditemukan! ";
}
else {
 ?>
 
 
 
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/table.css" rel="stylesheet">
<link rel="stylesheet" href="../css/stylee.css" type="text/css"  />

<title>Data Persediaan Barang</title>
</head>

<body ><border="2px" color="black">
<center>
<!--<img width="800px" align="center" src="logo.png">-->
<br>

 <div> <table>
  <tr>
    <td>&nbsp;</td>
    <td height="25" align="center" width="800px" style="font-size: 20px; font-family: arial; "><strong>LAPORAN PERSEDIAAN BARANG</strong></td>
  </tr>
</table>
</center>
<p>
</div>
    <h4 style="font-size: 12px; font-family: arial;">Tanggal Terakhir Masuk : <?php echo $data[4]; ?>  </h4>
 	<table style="font-size: 16px; font-family: arial;" class="table table-striped table-hover" width="500px" bgcolor="#f5deb3">
    <tr ><th width="5px"></th>
      <th width="400px" align="left">Kode Barang</th> <th width="20px" align="left"> : </th>
        <th width="400px" align="left"> <?php echo $data[1]; ?> </th>
		</tr>
		
		<tr><th></th><th></th></tr><!--./spasi-->
		
		 <tr ><th width="5px"></th>
      <th width="400px" align="left">Nama Barang</th> <th width="10px" align="left"> : </th>
        <th width="400px" align="left"> <?php echo $data[7]; ?> </th>
		</tr>
		
		<tr><th></th><th></th></tr><!--./spasi-->
		
		 <tr ><th width="5px"></th>
      <th width="400px" align="left">Jenis Barang</th> <th width="10px" align="left"> : </th>
        <th width="400px" align="left"> <?php echo $data[8]; ?> </th>
		</tr>
		
		<tr><th></th><th></th></tr><!--./spasi-->
		
		 <tr ><th width="5px"></th>
      <th width="400px" align="left">Keterangan</th> <th width="10px" align="left"> : </th>
        <th width="400px" align="left"> <?php echo $data[9]; ?> </th>
		</tr>
		
		<tr><th></th><th></th></tr><!--./spasi-->
		
		 <tr ><th width="5px"></th>
      <th width="400px" align="left">Jumlah Tersedia</th> <th width="10px" align="left"> : </th>
        <th width="400px" align="left"> <?php echo $data[10]; ?> </th>
		</tr>
		
		
	<tr><th></th><th></th></tr><!--./spasi-->
		
		 <tr ><th width="5px"></th>
      <th width="400px" align="left">Total Biaya</th> <th width="10px" align="left"> : </th>
        <th width="400px" align="left"> <?php echo $data[11]; ?> </th>
		</tr>
		
		
		<tr><th></th><th></th></tr><!--./spasi-->
		
	 <tr>
 
	</tr></table>
 
	  <?php
 
}
    ?>
 		
	 
 	<br>
	<br><br><br><br><br><br><br><br><br>
 	
<div>
<div style="width : 800px; float:right">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mengetahui,<br> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Manager 
<br><br><br><br><br>Ir.Muhammad Chaliq Fadli, M.Eng<br/>NIP.  09090</p>
</div>
<div style="clear : both"></div>
</div>
	
	
	
	

   </border>
  </body>
  </html>

<?php

$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>
