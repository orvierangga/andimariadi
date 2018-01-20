	<!--.// kotak pintasan-----------
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-archive fa-5x"></i>
                                    </div>	
									
									<div class="col-xs-9 text-right">
                                        
	
									<div class="huge" value="">
									<?php
$sql = mysqli_query($koneksi, "SELECT *,SUM(`status_perm`='Diterima') AS `total_semua` FROM `permintaan_barang` GROUP BY `status_perm`= 'Diterima'" );	  
   
if (mysqli_num_rows($sql) == 0) {
echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
} else {
while ($data = mysqli_fetch_array ($sql)) {
echo $data[8];
}
 }
?>   
										   
 			   						   </div>
									   
									   
                                        <div>Permintaan Diterima</div>
                                    </div>
                                </div>
                            </div>
                            <a href="baru_perm.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Lihat Data</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
					
					
					
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-th-list fa-5x"></i>
                                    </div>
							        <div class="col-xs-9 text-right">
                                        <div class="huge" value="">
									<?php
		$sql = mysqli_query($koneksi, "SELECT *,SUM(`jumlah_msk`) AS `total_semua` FROM `barang_masuk` ");  
   	  
   
   if (mysqli_num_rows($sql) == 0) {
        echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
      } else {


   while ($data = mysqli_fetch_array ($sql)) {
			
		echo $data['total_semua'];
		
		}
	  }
		?>   
							</div>			
										
										
										
										
                                        <div>Persediaan Barang</div>
                                    </div>
                                </div>
                            </div>
                            <a href="persed_barang.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Lihat Data</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
					
					
					
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                  <div class="huge">
<?php
$sql = mysqli_query($koneksi, "SELECT count(*) AS jumlah FROM `barang_masuk` WHERE `tanggal_msk` >= NOW() - INTERVAL 3 DAY");  
 if (mysqli_num_rows($sql) == 0) {
  echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
 } else {
  while ($data = mysqli_fetch_array ($sql)) {
echo $data['jumlah'];
	}
  }
?>   
																				
										</div>
										
										
										
                                        <div>Barang Masuk Terbaru</div>
                                    </div>
                                </div>
                            </div>
                            <a href="barang_masuk.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Lihat Data</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
					
					
					
					
					
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
		<?php
$sql = mysqli_query($koneksi, "SELECT *,SUM(`status_perm`='menunggu') AS `total_semua` FROM `permintaan_barang` GROUP BY `status_perm`= 'menunggu'" );	  
   
if (mysqli_num_rows($sql) == 0) {
echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
} else {
while ($data = mysqli_fetch_array ($sql)) {
echo $data[8];
}
 }
?>   								</div>			
                                        <div>Permintaan Terbaru</div>
                                    </div>
                                </div>
                            </div>
                            <a href="baru_perm.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Lihat Data</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>    --->