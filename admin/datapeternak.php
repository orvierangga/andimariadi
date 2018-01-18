<?php
include 'header.php';
include '../conn.php';
$id_nik = $_GET['id'];
?><div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><a href="peternak.php">Data Peternak</a> &raquo; Biodata</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

<?php
  $sql = mysqli_query($koneksi, "SELECT * FROM tbpeternak WHERE `IDPeternak` ='$id_nik'");
  if (mysqli_num_rows($sql) == 0) {
  header('location: kandang.php');
	//$cek = mysqli_query($koneksi, "select * from tbpeternak where IDPeternak='$data[0]'");
  } else {
    $data = mysqli_fetch_array($sql);
  }
  
?>
<table class="table table-striped table-condensed">
  <tr>
    <th align="left" class="col-sm-2">ID Peternak</th>
    <td ><?php echo $data[0];?></td>
  </tr>
  <tr>
    <th class="col-sm-2">Nama Peternak</th>
    <td><?php echo $data[1];?></td>
  </tr>
  <tr>
    <th class="col-sm-2">Lokasi</th>
    <td><?php echo $data[2];?></td>
  </tr>
  <tr>
    <th class="col-sm-2">Alamat</th>
    <td><?php echo $data[3];?></td>
  </tr>

  <tr>
    <th class="col-sm-2">Tanggal Lahir</th>
    <td><?php echo indonesiaTgl($data[4]);?></td>
  </tr>

  <tr>
    <th class="col-sm-2">Nomor KTP</th>
    <td><?php echo $data[5];?></td>
  </tr>

  
                         <!-- /.form input pada modal-->
			          
</table>
<a href="editpeternak.php?id=<?php echo $data[0];?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Edit Data</a> 
<a href="kandang.php" class="btn btn-default"><span class="glyphicon glyphicon-remove-circle"></span> Keluar</a>

<?php
include 'footer.php';
?>