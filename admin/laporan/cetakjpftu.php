<?php include "header.php";
include "koneksi.php";
include"library.php"?>


   

 
      


        <div class="modal-header">
			

    
    <table class="aktifitas" cellspacing="0" cellpadding="0" width="100%" border="0"><tr>
    <td rowspan="2" width="40px" height="10px" align="center" valign="middle"><img width="90" height="70" style="transparent" src="images/tjg.png" /></td>
    <td valign="bottom" align="left"><font size="3px"> &nbsp &nbsp &nbsp &nbsp &nbsp <b>PEMERINTAH KABUPATEN TABALONG<br /> &nbsp &nbsp &nbsp DINAS PERINDUSTRIAN DAN PERDAGANGAN</b></font></td></tr>
    <tr><td valign="top" align="left"><font size="1px"><b> &nbsp Jalan P.H.M Noor Rt.04 No.16B Telp.(0526)Kel.Pembataan Kec.Murung Pudak Provinsi Kal-Sel Kode Pos 71571</b></font></td></tr></table>
			</div>
			 <hr/><br/> 
           <h2 align="center">Laporan Data Karyawan</h2>
     
    
                  
                  
				  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                     
                        <tr color="dark">
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Jenis</th>
						  <th>Penyewa</th>
						  <th>Blok</th>
						  <th>Bulan Pembayaran</th>
						  <th>Retribusi</th>
						  <th>Denda</th>
						  <th>Total</th>
						 
                        </tr>
                      
                     
                        <?php
      $tanggal = date('Y-m-d');

        $sql = mysqli_query($koneksi, "SELECT `jpftu`.`id`,`jpftu`.`tgl`,`jpftu`.`jenis_jpftu`,`jpftu`.`id_`,`jpftu`.`idindeks`,`jpftu`.`bulan`,`jpftu`.`retribusi`,`jpftu`.`denda`,`jpftu`.`total`,`toko`.`id_penyewa`,`los`.`id_penyewa`,`bak`.`id_penyewa` FROM `jpftu` LEFT JOIN `toko` ON `jpftu`.`id_` = `toko`.`id_toko`
LEFT JOIN `los` ON `jpftu`.`id_` = `los`.`id_los`
LEFT JOIN `bak` ON `jpftu`.`id_` = `bak`.`id_peti`");
      
      if (mysqli_num_rows($sql) == 0) {
       
      } else {
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
          $no++;
          echo '
        <tr bgcolor="#fff">
           
          <td>'.$data[0].'</td>
          <td>'.$data[1].'</td>
		  <td>'.$data[2].'</td>
		  <td>';
		  if (substr($data[3], 0, 1) == 'L') {
			echo $data[10];
		  } elseif(substr($data[3], 0, 1) == 'T') {
			echo $data[9];
		  } else {
			 echo $data[11];
		  }
		  echo '</td>
		  <td>'.$data[4].'</td>
		  <td>'.$data[5].'</td>
		  <td>'.$data[6].'</td>
		  <td>'.$data[7].'</td>
		  <td>'.$data[8].'</td>

        </tr>';
		}
      }
    ?>
                 
                    </table>
                  </div>
				  <div style="col-md-4">
				  <tr>
          <td>  <p align="right"></p></td>
        <td><p align="right">&nbsp;</p>
        </td></tr>
		 <tr >
		  <td colspan="6">  <p align="right">Tanjung , <b> &nbsp <?php echo date(' d-m-y');?></p></td>
		  </tr><tr>
		  </tr><tr>
		  </tr><tr>
		  <tr>
          <td>  <p align="right"></p></td>
        <td><p align="right">&nbsp;</p>
        </td></tr>
		  <td colspan="8"></td>
        <td colspan="2"><p align="right">Yusup M Mandala</p>
    
		
        </td></tr>
         
          <tr>
          <td>  <p align="right"></p></td>
        <td><p align="right">&nbsp;</p>
        </td></tr>
          <tr>
          <td>        <td><p align="right">&nbsp;</p>
        </td></tr>
          <tr>
		  <td colspan="4"></td>
          <td colspan="2">  <p align="center"></p></td>
       
        </td></tr>
        </table><p>&nbsp;</p>
        
		 </div>
                </div>

     


