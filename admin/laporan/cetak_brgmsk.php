<?php
//koneksi ke database
mysql_connect("localhost","root","");
mysql_select_db("inventory");
 
//mengambil data dari tabel
$sql=mysql_query("SELECT * FROM permintaan_barang ORDER BY kd_perm");
$data = array();
while ($row = mysql_fetch_assoc($sql)) {
    array_push($data, $row);
}
 
//mengisi judul dan header tabel
$judul = "DATA PERMINTAAN BARANG";
$header = array(
array("label"=>"Kode Permintaan", "length"=>15, "align"=>"C"),
array("label"=>"Kode Barang", "length"=>25, "align"=>"C"),
array("label"=>"Jumlah", "length"=>15, "align"=>"C"),
array("label"=>"Tanggal", "length"=>20, "align"=>"C"),
array("label"=>"Waktu", "length"=>20, "align"=>"C"),
array("label"=>"Keperluan", "length"=>40, "align"=>"C"),
array("label"=>"Status", "length"=>30, "align"=>"C"),
array("label"=>"Id Petugas", "length"=>30, "align"=>"C"),

);
 
//memanggil fpdf
require_once ("fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();
 
//tampilan Judul Laporan
$pdf->Image('logo.png',10,10,-175);
$pdf->SetFont('Arial','B','16'); //Font Arial, Tebal/Bold, ukuran font 16
$pdf->Cell(0,20, $judul, '0', 1, 'C');
 
//Header Table
$pdf->SetFont('Arial','','10');
$pdf->SetFillColor(139, 69, 19); //warna dalam kolom header
$pdf->SetTextColor(255); //warna tulisan putih
$pdf->SetDrawColor(222, 184, 135); //warna border
foreach ($header as $kolom) {
    $pdf->Cell($kolom['length'], 8, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();
 
 function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo(1).'/{nb}',0,0,'C');
}

 
 
//menampilkan data table
$pdf->SetFillColor(245, 222, 179); //warna dalam kolom data
$pdf->SetTextColor(0); //warna tulisan hitam
$pdf->SetFont('');
$fill=false;
foreach ($data as $baris) {
$i = 0;
foreach ($baris as $cell) {
$pdf->Cell($header[$i]['length'], 7, $cell, 1, '0', $kolom['align'], $fill);
$i++;
}
$fill = !$fill;
$pdf->Ln();
}
 
//output file pdf
$pdf->Output();
?>