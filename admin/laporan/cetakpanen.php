<?php include "header.php";
include "../conn.php";?>
<script type="text/javascript">
		var s5_taf_parent = windows.location;
		function popup_print(){
		window.open('cetakpanen.php', 'page','toolbar=0, scrollbars=1,location=0,statusbar=0,menubar=0,risizable=0,width=750,height=600,left=50,top=50,titlebar=yes')
		}
	</script>

    <!-- partial:partials/_navbar.html -->

 
      


          <h2>Laporan Data Panen</h2>
   <hr/>
    <br/>
           
                  
                  
				  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                     
                        <tr >
                          <th>No</th>
                          <th>ID Panen</th>
                          <th>Tanggal</th>
						  <th>ID Produksi</th>
						  
						  <th>Umur</th>
						  <th>Jumlah</th>
						  <th>Total</th>
						  <th>Berat Rata</th>
						  <th>Nama Pembeli</th>
						 
                        </tr>
                      
                     
                        <?php
      $tanggal = date('Y-m-d');

        $sql = mysqli_query($koneksi, "SELECT * FROM `tbpanen` order by `IDPanen` ASC");
      
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
			echo $data[7];
		  } elseif(substr($data[3], 0, 1) == 'T') {
			echo $data[6];
		  } else {
			 echo $data[0];
		  }
		  echo '</td>
		  <td>'.$data[4].'</td>
		  <td>'.$data[5].'</td>
		  <td>'.$data[6].'</td>
		  <td>'.$data[3].'</td>
		  <td>'.$data[7].'</td>

        </tr>';
		}
      }
    ?>
                     
                    </table>
                  </div>
                </div>

     
<script>
var restorepage = document.body.innerHTML;{
window.print();
}
</script>

