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
  $sql=mysqli_query($koneksi,"SELECT * from `barang_masuk` where year(`tanggal_msk`)='$id'");   
   
//$ubah = mysqli_query ($koneksi, "select * from permintaan_barang where kd_perm='$ud'");
$data = mysqli_fetch_array ($sql);
?>

<?php
$nama=$_POST['nama'];
$nip=$_POST['nip'];
 //_masuk`.`kd_barang` = '{$data[1]}'");   
$sql=mysqli_query($koneksi,"SELECT * from `barang_masuk` where year(`tanggal_msk`)='$data[4]'"); 
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

<title>Total Biaya Barang Masuk Perdata</title>
</head>

<body ><border="2px" color="black">
<center>
<!--<img width="800px" align="center" src="logo.png">-->
<br>

 <div> <table>
  <tr>
    <td>&nbsp;</td>
    <td height="25" align="center" width="800px" style="font-size: 20px; font-family: arial; "><strong>TOTAL BIAYA BARANG MASUK PERDATA</strong></td>
  </tr>
</table>
</center>
<p>
</div>
    <h4 style="font-size: 12px; font-family: arial;">Tanggal Masuk : <?php echo $data[4]; ?>  </h4>
 	<table style="font-size: 16px; font-family: arial;" class="table table-striped table-hover" width="500px" bgcolor="#f5deb3">
    <tr ><th width="5px"></th>
      <th width="400px" align="left">Kode Barang</th> <th width="20px" align="left"> : </th>
        <th width="400px" align="left"> <?php echo $data[1]; ?> </th>
		</tr>
		
		<tr><th></th><th></th></tr><!--./spasi-->
		
		 <tr ><th width="5px"></th>
      <th width="400px" align="left">Jumlah Masuk</th> <th width="10px" align="left"> : </th>
        <th width="400px" align="left"> <?php echo $data[2]; ?> </th>
		</tr>
		
		<tr><th></th><th></th></tr><!--./spasi-->
		
		 <tr ><th width="5px"></th>
      <th width="400px" align="left">Harga Satuan</th> <th width="10px" align="left"> : </th>
        <th width="400px" align="left"> <?php echo $data[3]; ?> </th>
		</tr>
		
		<tr><th></th><th></th></tr><!--./spasi-->
		
		 <tr ><th width="5px"></th>
      <th width="400px" align="left">Total Harga</th> <th width="10px" align="left"> : </th>
        <th width="400px" align="left"> <?php echo $data[5]; ?> </th>
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
