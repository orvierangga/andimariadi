<?php
include 'header.php';?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Data Barang <small>Daftar Target Persediaan</small><small>( <?php echo IndonesiaTgl(date('Y-m-d'));?> )</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-desktop"></i> Daftar Barang
                            </li>
                        </ol>
                    </div>
                </div>
				<div class="dataTable_wrapper">
				
<?php // Coding Hapus
if (isset($_GET['del'])) {
  $nik = $_GET['del'];
  $cek = mysqli_query($koneksi, "SELECT * FROM data_barang WHERE `kd_barang`='$nik'");
  if (mysqli_num_rows($cek) > 0) {
    $delete = mysqli_query($koneksi, "DELETE FROM data_barang WHERE `kd_barang`='$nik'");
    if ($delete) {
      echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil!</strong> Data Barang Telah dihapus.</div>';
  echo '<meta http-equiv="refresh" content="0; url=./tampil_brg.php" >'; //coding refresh
    } else {
      echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Kesalahan!</strong> Tidak dapat menghapus data.</div>';
    }
  }
}

?>
<div class="form-group">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Tambah Data</a>
  
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="#" data-toggle="modal" data-target="#modal2" class="btn btn-blue">Tambah Jenis Barang</a>
  
  </div>  
   
  <!-- untuk membuat cari -->
<div class="row">
    <div class="col-xs-8">
      <input type="text" name="s" class="form-control" placeholder="Cari.." id="isi_cari">
    </div>
    <div class="col-xs-4">
      <a href="#" class="btn btn-success" id="cari_reload"><span class="glyphicon glyphicon-search" > </span> Cari</a>
    </div>
</div>

<br />
<!-- tempat reload data -->
<div id="reload_data"></div>


<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				                <!-- /.row -->

<?php
$cari = mysqli_query ($koneksi, "select max(`kd_barang`) as kd from data_barang");
$tm_cari = mysqli_fetch_array ($cari);
$kode = substr($tm_cari['kd'],1,4);
$tambah = $kode+1;
if ($tambah<10){
$ed = "P000".$tambah;
}else {
$ed ="PO".$tambah;
}

if (isset($_POST['add'])) {
	$kd1 = $_POST['kd1'];
	$nama = $_POST['nama'];
	$jenis = $_POST['jenis'];
	$deskrip = $_POST['deskrip'];	
  if ($kd1 != '') {
		$insert = mysqli_query($koneksi, "INSERT INTO data_barang(`kd_barang`, `nama_brg`, `jenis_brg`,`ket`) 
		VALUES ('$kd1','$nama','$jenis','$deskrip')") or die(mysqli_error());
		
				if($insert) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./tampil_brg.php" >'; //coding refresh
			
		} else {
			echo '<script type="text/javascript">alert("Data gagal disimpan")
			</script>';
			
			echo '<meta http-equiv="refresh" content="0; url=./tampil_brg.php" >'; //coding refresh
		}
	}  else {
		echo '<script type="text/javascript">alert("Data sudah ada")
			</script>';
			echo '<meta http-equiv="refresh" content="0; url=./tampil_brg.php" >'; //coding refresh
  }
}
$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime('- 16 year', $now));
$minage = date("Y-m-d", strtotime('- 40 year', $now));
?>
                <form  action="" method="post" class="popup-form">					
                        <label>Kode Barang</label>
                        <input  class="form-control form-white" name="kd1" placeholder="Enter text" readonly="" value="<?php echo $ed;?>" >
                           
                        <label>Nama Barang</label>
                        <input  class="form-control form-white"  name="nama" placeholder="Enter text">    

						<label>Jenis Barang</label>                                								
						<select class="form-control" name="jenis">
						<option value="">Pilih</option>
						<?php
						$q = mysqli_query ($koneksi, "select * from `jenis_barang` order by `nama_jenis` ASC");
						while ($data = mysqli_fetch_array ($q)) {
						echo '<option value="' . $data[1]. '">'. $data[0] .' - ' . $data[1] . '</option>';
							}
						?>
						</select>						
                        <label>Deskripsi Barang</label>
                        <input  class="form-control form-white"  name="deskrip" placeholder="Enter text">
			                                
                            <p></p>
                          
<button type="submit" class="btn btn-primary" name="add"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
<a href="tampil_brg.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>

 </form>
</div>
</div>
</div>	
	 <!-- /.status Petugas -->
		<div class="modal fade" id="modal2" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content modal-popup">
		<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				                <!-- /.row -->
<?php // Coding Hapus
if (isset($_GET['del'])) {
  $nik = $_GET['del'];
  $cek = mysqli_query($koneksi, "SELECT * FROM jenis_barang WHERE `kd_jenis`='$nik'");
  if (mysqli_num_rows($cek) > 0) {
    $delete = mysqli_query($koneksi, "DELETE FROM jenis_barang WHERE `kd_jenis`='$nik'");
    if ($delete) {
      echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil!</strong> 1 Data Telah dihapus.</div>';
  echo '<meta http-equiv="refresh" content="0; url=./tampil_brg.php" >'; //coding refresh
    } else {
      echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Kesalahan!</strong> Tidak dapat menghapus data.</div>';
    }
  }
}

?>
<div class="-col-lg-4">
 
<?php
$cari = mysqli_query ($koneksi, "select max(`kd_jenis`) as kd from jenis_barang");
$tm_cari = mysqli_fetch_array ($cari);
$kode = substr($tm_cari['kd'],1);
$tambah = $kode+1;
if ($tambah<10){
$edj = "J".$tambah;
}else {
$edj ="0".$tambah;
}		
if (isset($_POST['addj'])) {
$kd = $_POST['kd'];
$nm = $_POST['nm'];
  if ($kd != '') {
		$insert = mysqli_query($koneksi, "INSERT INTO jenis_barang( `kd_jenis`,`nama_jenis` ) 
		VALUES ('$kd','$nm')") or die(mysqli_error());
		
		if($insert) {
		echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
		echo '<meta http-equiv="refresh" content="0; url=./tampil_brg.php" >'; //coding refresh
			
		} else {
			echo '<script type="text/javascript">alert("Data gagal disimpan")
			</script>';
			}
		}  else {
			echo '<script type="text/javascript">alert("Pilih Data Barang")
			</script>';
  }
}
$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime('- 16 year', $now));
$minage = date("Y-m-d", strtotime('- 40 year', $now));
?>
<form  action="" method="post" class="popup-form">         
<label>Kode Jenis</label>
<input class="form-control form-white align-right " name="kd" readonly="" value="<?php echo $edj;?>">                                 
<label>Input Nama Jenis</label>
<input  class="form-control form-white align-right " name="nm" value="">           
                                
								 <p></p>
    <button type="submit" class="btn btn-primary" name="addj"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
	<a href="tampil_brg.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>
<p></p>
			       
</div>			
<p></p>
						 
<div class="table-responsive">
<table class="table table-striped table-hover" bgcolor="#CCCCCC">
   <tr >
    <th>Kode Jenis</th>
    <th>Nama Jenis</th>
    <th>Hapus</th>
    </tr>
    <?php
      $tanggal = date('Y-m-d');
      $sql = mysqli_query($koneksi, "SELECT * from jenis_barang ORDER BY `kd_jenis` ASC");
   
      if (mysqli_num_rows($sql) == 0) {
        echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
		} else {
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
        $no++;
          echo '
        <tr align="center" bgcolor="#CCCCCC">
           
          <td>'.$data[0].'</td>
          <td>'.$data[1].'</td>
		<td> 
		<a href="?del='.$data[0].'" class="btn-danger btn-sm" ><span class="glyphicon glyphicon-trash" aria-hidden="true" onclick="return confirm(\'Hapus data ini?\')"></span></a></td>
        </tr>';
		}
      }
    ?>
  </table>
</div>

 </form>
</div>
</div>
	</div>
	
	
<script type="text/javascript">
function confirm_delete() {
  return confirm('Hapus data ini?');
}
</script>
<!-- jQuery -->
<script src="js/jquery.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#reload_data").load('get_brg.php');
    $("#isi_cari").on("keyup", function() {
      var search = $(this).val();
      
    })
    $("#isi_cari, #cari_reload").on("keyup", function() {
      var search = $(this).val();
      $.ajax({
        url: 'get_brg.php',
        data: 's='+search,
        success:function(data) {
          $("#reload_data").html(data);
        },
        error:function(data) {
          alert('Tidak Ada Data');
        }
      }) 
    });
  })
</script>
<?php include 'footer.php';?>
