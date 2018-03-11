<?php //include "head1.php";
include "library.php";
include "../conn.php";?> 
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/sb-admin2.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
		var s5_taf_parent = windows.location;
		function popup_print(){
		window.open('cetakpegawai.php', 'page','toolbar=0, scrollbars=1,location=0,statusbar=0,menubar=0,risizable=0,width=750,height=700,left=50,top=50,titlebar=yes')
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
	<td valign="top" align="CENTER"><font size="3px"><b>Cetak Data Seluruh Pegawai</b></font></td>
	</tr>
	</table>
	
	 </br>

<div class="col-lg-12">
  <ol class="breadcrumb form-control"><li class="active ">
<i class="fa fa-paste"></i> Tanggal Cetak ( <?php echo IndonesiaTgl(date('Y-m-d'));?> )</li>
   </ol>            
</div>

                  
<div class="table-responsive">
  <table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr align="center">
 
     <th>ID Pegawai</th>
      <th>Nama Pegawai</th>
      <th>Status</th>
	  <th>Alamat</th>
	  <th>Tanggal Lahir</th>
	  <th>Nomor Telpon/HP</th>
	 </tr>
	 </thead>
        <tbody>
		<!--/.tampil-->
    <?php
      $tanggal = date('d-m-y');
          $sql = mysqli_query($koneksi, "SELECT * FROM `tbpegawai` order by `IDPegawai` asc");
        
      if (mysqli_num_rows($sql) == 0) {
        echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
      } else {
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
          $no++;
          echo '
        <tr align="center" bgcolor="#CCCCCC">
           
          <td>'.$data[0].'</td>
          <td align="left">'.$data[1].'</td>
		  <td>'.$data[2].'</td>
		  <td>'.$data[3].'</td>
		  <td>'.$data[4].'</td>
		  <td>'.$data[5].'</td>

		    </tr>';
		}
      }
    ?>
	</table>

</div>                  
<br><br/><br><br/><br><br/>
 
         
<div>
<div style ="width:900px;float:center">
<p align="right"> Pimpinan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<br/><br/><br/> <p align="right">(.....................)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>        
 
         
 </div>
 </div>     

				
                
     
<script>
var restorepage = document.body.innerHTML;{
window.print();
}
</script>

<?php include "footer.php";?>