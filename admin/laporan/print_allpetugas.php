<?php
//koneksi ke database
mysql_connect("localhost","root","");
mysql_select_db("inventory");
 
//mengambil data dari tabel
$sql=mysql_query("SELECT * FROM `data_petugas` ORDER BY `id_petugas` ASC ");
$data = array();
while ($row = mysql_fetch_assoc($sql)) {
    array_push($data, $row);
	
}
 

//mengisi judul dan header tabel

$judul = "DATA PETUGAS AKSES APLIKASI";
$header = array(

array("label"=>"ID Petugas", "length"=>25, "align"=>"C"),
array("label"=>"Nama Petugas", "length"=>35, "align"=>"C"),
array("label"=>"Password (Enkripsi)", "length"=>70, "align"=>"C"),
array("label"=>"Kode Pegawai", "length"=>35, "align"=>"C"),
array("label"=>"Status", "length"=>25, "align"=>"C"),
);
 
$footer = array(
array("label"=>"PT. PLN AP2B (Persero) Wilayah Kalimantan Selatan-Kalimantan Tengah", "length"=>15, "align"=>"C"), 
);
 
 
//memanggil fpdf
require_once ("fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();

//tampilan Judul Laporan
$pdf->SetFont('Arial','B','12'); //Font Arial, Tebal/Bold, ukuran font 16
            $pdf->Image('logo.png',1,9,35,26);
           $pdf->Ln(5);
            $pdf->SetX(1);
            $pdf->Cell(132,0.5,'INVENTORY WORKSHOP - PT. PLN AP2B (Persero) ','0', 1, 'R');
           $pdf->Ln(5);
            $pdf->SetX(1);
            $pdf->Cell(91,0.5,'WILAYAH KALSEL & KALTENG','0', 1, 'R');
           $pdf->Ln(5);
	
		    $pdf->SetX(1);
            $pdf->Cell(170,0.5,'AREA PENYALUR & PENGATUR BEBAN SISTEM KALSEL & KALTENG','0', 1, 'R');
           $pdf->Ln(4);
            $pdf->SetFont('Arial','',10);
            $pdf->SetX(1);
            $pdf->Cell(198,0.5,'JL. Mistar Cokro Kusomo km. 39 Komplek Gardu Induk Cempaka Banjarbaru 70733 Telpon : (0511) 4782594','0', 1,'R');
         
$pdf->Ln(2);
$pdf->Cell(190,1,'','B',1,'L');
$pdf->Cell(190,1,'','B',0,'L');
$pdf->Ln(2);
$pdf->SetFont('Arial','','16');
$pdf->Cell(0,20, $judul, '0', 1, 'C');
$pdf->Ln(2);
 
//Header Table
$pdf->SetFont('Arial','','8');
$pdf->SetFillColor(139, 69, 19); //warna dalam kolom header
$pdf->SetTextColor(255); //warna tulisan putih
$pdf->SetDrawColor(222, 184, 135); //warna border
foreach ($header as $kolom) {
    $pdf->Cell($kolom['length'], 9, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();
 
//menampilkan data table
$pdf->SetFillColor(245, 222, 179); //warna dalam kolom data
$pdf->SetTextColor(0); //warna tulisan hitam
$pdf->SetFont('');
$fill=false;
foreach ($data as $row) {
	
$i = 0;
foreach ($row as $cell) {
	
$pdf->Cell($header[$i]['length'], 9, $cell, 1, '0', $kolom['align'], $fill);

$i++;

}
$fill = !$fill;
$pdf->Ln();
}



$pdf->Ln(50);
$pdf->SetFont('Arial','',10);
$pdf->SetX(1);
$pdf->Cell(180,0.5, 'Mengetahui,', '0', 1, 'R');
$pdf->Ln(5);

$pdf->SetFont('Arial','',10);
$pdf->SetX(1);
$pdf->Cell(185,0.5, 'Manager Pimpinan', '0', 1, 'R');
$pdf->Ln(20);


$pdf->SetFont('Arial','U',10); 
$pdf->SetX(1); 
$pdf->Cell(195,0.8,'Ir. Muchamad Chaliq Fadli, M.Eng','0', 1,'R');
$pdf->Ln(4);

$pdf->SetFont('Arial','',10); 
$pdf->SetX(1); 
$pdf->Cell(171,0.8,'NIP : 8004004P3D','0', 1,'R');
$pdf->Ln(5);


class PDF extends FPDF
{
function Footer()
{
   //Geser posisi ke 1,5 cm dari bawah
   $this->SetY(-15);
   //Pilih font Arial italic 8
   $this->SetFont('Arial','I',8);
   //Tampilkan nomor halaman rata tengah
   $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}
}


$pdf->Ln();
$pdf->Output();
?>

