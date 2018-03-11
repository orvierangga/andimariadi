<?php //include "head1.php";
include "library.php";
include "../conn.php";
$ud1 = $_GET['id'];?> 
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/sb-admin2.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
		var s5_taf_parent = windows.location;
		function popup_print(){
		window.open('cetakmatiper.php', 'page','toolbar=0, scrollbars=1,location=0,statusbar=0,menubar=0,risizable=0,width=750,height=700,left=50,top=50,titlebar=NO')
		}
	</script>


  <table cellspacing="0" cellpadding="0" width="100%" border="0">
  <tr>
    <td valign="bottom" align="CENTER"><font size="5px"><b>USAHA KEMITRAAN TERNAK AYAM BROILER CV. REHOBOT</b></font></td>
   </tr>
   
    </br> </br>
   <tr>
	<td valign="top" align="CENTER"><font size="3px"><b> Komplek Belimbing Raya Telp.021-(5520 0876) Kel.Pembataan Kec.Murung Pudak, Tabalong, Kal-Sel Kode Pos 71571</b></font></td>
	</tr>
	<tr>
	<td valign="top" align="CENTER"><font size="3px"><b>Laporan Total Bibit Masuk Perdata Produksi</b></font></td>
	</tr>
	</table>
	
	 </br>
<?php 
$data1 = mysqli_query($koneksi, "SELECT * FROM `tbpenyerahanbibit` WHERE `Periode`='$ud1'");
$row = mysqli_num_rows($data1);
?>
<div class="col-lg-12">
  <ol class="breadcrumb form-control"><li class="active ">
<i class="fa fa-paste"></i> Periode : <?php echo $ud1;?>,    Tanggal Cetak ( <?php echo IndonesiaTgl(date('Y-m-d'));?> )</li>
   </ol>            
</div>

                  
<div class="table-responsive">
	<table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
       <th>No</th>
	  <th>ID Produksi</th>
	  <th>Peternak</th>
	  <th>Strain</th>
	  <th>Tanggal Chick In</th>
	
	  <th>Jumlah Bibit Masuk</th>
	  <th>Harga Satuan Bibit</th>
	  <th>Total Harga Bibit</th>	  
	 
	 
	 </tr>
	 </thead>
        <tbody>
		<!--/.tampil-->
    <?php
      $tanggal = date('Y-m-d');
      $id = $_GET['id'];
       //$sql = mysqli_query($koneksi, "SELECT `tbpenyerahanbibit`.`IDPeternak`,`tbpenyerahanbibit`.`Strain`,`tbpenyerahanbibit`.`TanggalChickIn`,`tbpemeliharaanharian`.`IDPakan`, `tbpakan`.`JenisPakan`,`tbpakan`.`Merek`,`tbpemeliharaanharian`.`IDProduksi`,COUNT(`tbpemeliharaanharian`.`PakanStd`+`tbpemeliharaanharian`.`PakanAct`) as `total` FROM `tbpenyerahanbibit` LEFT JOIN `tbpemeliharaanharian` ON `tbpenyerahanbibit`.`IDProduksi` = `tbpemeliharaanharian`.`IDProduksi`LEFT JOIN `tbpakan` ON `tbpakan`.`IDPakan`= `tbpemeliharaanharian`.`IDPakan` WHERE `tbpenyerahanbibit`.`Periode`='$id' order by `tbpemeliharaanharian`.`IDProduksi` asc");
      $sql = mysqli_query($koneksi, "select `IDProduksi`,`IDPeternak`,`Strain`,`TanggalChickIn`, `JumlahChickIn`,`Harga`,`JumlahChickIn`*`Harga` AS `total` FROM `tbpenyerahanbibit` WHERE `Periode`='$id' GROUP BY `IDProduksi` ASC");
      
      if (mysqli_num_rows($sql) == 0) {
        echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
      } else {
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
          $no++;
          echo '
        <tr align="center" bgcolor="#CCCCCC">
          <td>'.$no.'</td> 
          <td>'.$data[0].'</td>
          <td >'.$data[1].'</td>
		  <td >'.$data[2].'</td>
		 <td >'.$data[3].'</td>
		  <td >'.$data[4].' Ekor</td>
		  <td >Rp. '.number_format($data[5]).'</td>	
			 <td >Rp. '.number_format($data[6]).'</td>		   
		</tr>';
		}
      }
    ?>
	</table>
	
	

</div>	                 
<br><br/><br><br/><br><br/>

         
<div>
<div style ="width:900px;float:center">
<p align="center"> Staff PPL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pimpinan </p>
<br/><br/><br/> <p align="center">(.....................)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(.....................)</p>        
 
         
 </div>
 </div>     

				
                
     
<script>
var restorepage = document.body.innerHTML;{
window.print();
}
</script>

<?php include "footer.php";?>