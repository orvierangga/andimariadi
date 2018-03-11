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
		window.open('cetakpemeliharaanhar.php', 'page','toolbar=0, scrollbars=1,location=0,statusbar=0,menubar=0,risizable=0,width=750,height=700,left=50,top=50,titlebar=NO')
		}
	</script>


<?php 
//anu koding seleksi
$data1 = mysqli_query($koneksi, "SELECT `tbpenyerahanbibit`.*,`tbpenyerahanbibit`.`IDPeternak`,`tbpeternak`.`NamaPeternak`,`tbpeternak`.`Alamat` FROM `tbpenyerahanbibit` LEFT JOIN `tbpeternak` ON `tbpenyerahanbibit`.`IDPeternak` = `tbpeternak`.`IDPeternak` WHERE `tbpenyerahanbibit`.`IDProduksi` ='$ud1' ORDER BY `tbpenyerahanbibit`.`IDProduksi` asc");
          
$row = mysqli_fetch_array($data1);
?>

    

  <table cellspacing="0" cellpadding="0" width="100%" border="0">
  <tr>
    <td valign="bottom" align="CENTER"><font size="5px"><b>USAHA KEMITRAAN TERNAK AYAM BROILER CV. REHOBOT</b></font></td>
   </tr>
   
    </br> </br>
   <tr>
	<td valign="top" align="CENTER"><font size="3px"><b> Komplek Belimbing Raya Telp.021-(5520 0876) Kel.Pembataan Kec.Murung Pudak, Tabalong, Kal-Sel Kode Pos 71571</b></font></td>
	</tr>
	<tr>
	<td valign="top" align="CENTER"><font size="3px"><b>Lembar Penyerahan Bibit</b></font></td>
	</tr>
	<tr>
	<td valign="top" align="CENTER"><font size="3px"><b>Periode : <?php echo $row[7];?> </b></font></td>
	</tr>
	<tr>
	<td valign="top" align="CENTER"><font size="3px"><b>Tanggal Cetak : <?php echo IndonesiaTgl(date('Y-m-d'));?> </b></font></td>
	</tr>
	</table>
	
	 </br>


<div class="col-lg-4" >
  <ol class="breadcrumb form-control col-lg-4"><li class="active ">
<i class="fa fa-plus-square"></i> ID Produksi : &nbsp;&nbsp;<?php echo $ud1;?>,  &nbsp;&nbsp;&nbsp;&nbsp;   Kode Supplier : &nbsp;&nbsp;<?php echo $row[2];?>  </li>
   </ol> 
<ol class="breadcrumb form-control"><li class="active ">
<i class="fa fa-plus-square"></i> ID Peternak : &nbsp;&nbsp;<?php echo $row[1];?>,  &nbsp;&nbsp;&nbsp;&nbsp;    Nama Peternak : &nbsp;&nbsp;<?php echo $row[11];?> </li>
   </ol> 
   <ol class="breadcrumb form-control"><li class="active ">
<i class="fa fa-plus-square"></i> Alamat :&nbsp;&nbsp; <?php echo $row[12];?></li>
   </ol> 
<ol class="breadcrumb form-control"><li class="active ">
<i class="fa fa-plus-square"></i> Jenis Strain : &nbsp;&nbsp;<?php echo $row[3];?> </li>
   </ol> 
<ol class="breadcrumb form-control"><li class="active ">
<i class="fa fa-plus-square"></i> Tanggal Chick In : &nbsp;&nbsp;<?php echo $row[4];?> </li>
   </ol> 
<ol class="breadcrumb form-control"><li class="active ">
<i class="fa fa-plus-square"></i> Jumlah Chick In : &nbsp;&nbsp;<?php echo $row[5];?> Ekor</li>
   </ol> 
<ol class="breadcrumb form-control"><li class="active ">
<i class="fa fa-plus-square"></i> Kondisi Chick In : &nbsp;&nbsp;<?php echo $row[8];?> </li>
   </ol> 
<ol class="breadcrumb form-control"><li class="active ">
<i class="fa fa-plus-square"></i> Kode Kandang : &nbsp;&nbsp;<?php echo $row[9];?> </li>
   </ol>    
</div>

                  
         
<br><br/><br><br/><br><br/><br><br/>

         
<div>
<div style ="width:900px;float:center">
<p align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Peternak &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Staff PPL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pimpinan </p>
<br/><br/><br/> <p align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(.....................)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(.....................)
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(.....................)</p>        
 
         
 </div>
 </div>     

				
                
     
<script>
var restorepage = document.body.innerHTML;{
window.print();
}
</script>

<?php include "footer.php";?>