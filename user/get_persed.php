<?php include '../conn.php';?>

<div class="table-responsive">
  <table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
      <th align="center">Nomor</th>
    <th align="center">Kode Barang</th>
      <th align="center">Deskripsi Barang</th>
      <th>Jumlah Barang Tersedia</th>
      <th>Pilihan</th>
    </tr>
    <?php
      $tanggal = date('Y-m-d');
      if (isset($_GET['s'])) {
        $search = $_GET['s'];
     
  //harusnya kaini om
  $sql = mysqli_query($koneksi, "SELECT * , SUM(`jumlah_msk`) AS `total_semua` FROM `barang_masuk` LEFT JOIN `data_barang` ON `barang_masuk`.`kd_barang` = `data_barang`.`kd_barang` WHERE `barang_masuk`.`kd_barang` OR `data_barang`.`ket` LIKE '%{$search}%' GROUP BY `barang_masuk`.`kd_barang` order by `barang_masuk`.`kd_barang` ASC");
    } else {
  $sql = mysqli_query($koneksi, "SELECT * , SUM(`jumlah_msk`) AS `total_semua` FROM `barang_masuk` LEFT JOIN `data_barang` ON `barang_masuk`.`kd_barang` = `data_barang`.`kd_barang` GROUP BY `barang_masuk`.`kd_barang` order by `barang_masuk`.`kd_barang` ASC");
    }
    if (mysqli_num_rows($sql) == 0) {
        echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
      } else {
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
          $no++;
          echo '
        <tr bgcolor="#CCCCCC">
          <td align="center">'.$no.'</td>  
          <td align="center">'.$data[1].'</td>
          <td>'.$data[7].'('.$data[8].')'.$data[9].'</td>
          <td align="center">'.$data[10].'</td>
           
		   
		   <td align="center"> <a href="#modal1" class="btn-primary btn-sm" id="req" data-toggle="modal" id-data="'.$data[1].'" ><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Request Barang</a> 
		
		   
		     <a href="print_persed.php?id='.$data[0].'"  class="btn-primary btn-sm"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a> 
        </td>
        </tr>';
        }
      }
    ?>
  </table>
</div>

</div>
</div>
</div>


<div class="modal fade" id="modal1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Request Barang</h4>
                </div>
                <div class="modal-body">
                    <div class="hasil-data"></div>
			
                <div class="modal-footer">
                    <!--<a href="tes.php"><button type="button" class="btn btn-default" data-dismiss="modal">Minta</button></a>
					<a href="persed_barang.php"><button type="button" class="btn btn-default" data-dismiss="modal">Batal</button></a>-->
                </div>
            </div>
        </div>
    </div>

 <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script type="text/javascript">
  
    $(document).on("click", "#req", function(e) {
      var data = $(this).attr('id-data');
      $.ajax({
        url: 'userminta.php',
        data: 'ud='+data,
        success:function(data) {
        $(".hasil-data").html(data);
        },
        error:function(data) {
        alert('Tidak Ada Data');
        }
      })
    });
  </script>