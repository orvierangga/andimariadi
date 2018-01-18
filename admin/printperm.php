    <?php ob_start(); ?>
    <html>
    <head>
    <title>Cetak PDF</title>
    <style> table {border-collapse:collapse; table-layout:fixed;width: 630px;}
    table td {word-wrap:break-word;width: 20%;}
    </style>
    </head>
    <body>
    <h1 style="text-align: center;">Data Siswa</h1>
    <table border="1" width="100%">
    <tr>
    <th>NIS</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>Telepon</th>
    <th>Alamat</th>
    </tr>
    <?php
    // Load file koneksi.php
    include "conn.php";
    $query = mysqli_query($koneksi,"SELECT * FROM permintaan_barang"); // Tampilkan semua data gambar
    $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
    $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
    if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
    while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    echo "<tr>";
    echo "<td>".$data[0]."</td>";
    echo "<td>".$data[1]."</td>";
    echo "<td>".$data[2]."</td>";
    echo "<td>".$data[3]."</td>";
    echo "<td>".$data[4]."</td>";
	 echo "<td>".$data[5]."</td>";
	  echo "<td>".$data[6]."</td>";
	   echo "<td>".$data[7]."</td>";
    echo "</tr>";
    }
    }else{ // Jika data tidak ada
    echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
    }
    ?>
    </table>
    </body>
    </html>
    <?php
    $html = ob_get_contents();
    ob_end_clean();
    require_once('html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->WriteHTML($html);
    $pdf->Output('Data barang.pdf', 'D');
    ?>