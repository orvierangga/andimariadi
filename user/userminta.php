<?php
    include '../conn.php';
	include 'library.php';
	
	$kd = $_GET['ud'];?>
<?php	
    $sql = mysqli_query($koneksi,"SELECT * , SUM(`jumlah_msk`) AS `total_semua` FROM `barang_masuk` LEFT JOIN `data_barang` ON `barang_masuk`.`kd_barang` = `data_barang`.`kd_barang` where `barang_masuk`.`kd_barang` = '{$kd}'");
     // foreach ($cek as $data){   
        //$sql = mysqli_query($koneksi,"SELECT * , SUM(`jumlah_msk`) AS `total_semua` FROM `barang_masuk` LEFT JOIN `data_barang` ON `barang_masuk`.`kd_barang` = `data_barang`.`kd_barang` where `barang_masuk`.`kd_barang` = '{$ud}'");

		//$sql = mysql_query("SELECT * FROM siswa WHERE id = $id");
        while ($data = mysqli_fetch_array($sql)){
		?>
        <form action="tes.php" method="post">
            <div class="form-group">
                 <tr>
                    <td>Kode Barang</td>
                    <td>:</td>
                    <td>
                        <input  class="form-control form-white"  name="kd" placeholder="Enter text" value="<?php echo $data['kd_barang']; ?>" readonly>
                    </td>
                </tr>
				 </div><div class="form-group">    
                <tr>
                    <td>Deskripsi Barang</td>
                    <td>:</td>
                    <td name="desbar"><?php echo $data['nama_brg'] . ' (' . $data['jenis_brg'] . ') ' . $data['ket']; ?></td>
                </tr>
             </div><div class="form-group">
                 <tr>
                    <td>jumlah Tersedia</td>
                    <td>:</td>
                    <td name="jumlah"><?php echo $data['total_semua']; ?></td>
                </tr>
            </div> <div class="form-group">
                 <tr>
                   <label>Input Jumlah Diperlukan</label>
                   <input  class="form-control form-white"  name="jumlahp" placeholder="Input Jumlah" required>
                </tr>
            
                 <tr>
                   <label>Keperluan</label>
                   <input  class="form-control form-white"  name="kep" placeholder="Input Keperluan" required>  
                </tr>

                 <tr>
                     <label>Tanggal</label>
                     <input  class="form-control form-white"  name="tanggal" placeholder="Enter text" value="<?php echo IndonesiaTgl(date('Y-m-d')); ?>" readonly>
                </tr>
            </div><p></p>
              <button class="btn btn-primary" type="submit">simpan</button>
        </form>     
        <?php } 
?>
  
 <!-- <button type="submit" class="btn btn-primary" name="simpan"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
	-->					
