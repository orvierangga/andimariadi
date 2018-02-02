<?php
include 'header.php';
include '../conn.php';?>
<div id="page-wrapper">
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">Data Panen<small>Panen Ayam</small><small>( <?php echo IndonesiaTgl(date('Y-m-d'));?> )</small></h1>
                <ol class="breadcrumb">
                <li class="active">
                <i class="fa fa-desktop"></i> Data Hasil Panen</a></li>
                </ol>
                </div>
                </div>
				<div class="dataTable_wrapper">
				
<?php // Coding Hapus
if (isset($_GET['del'])) {
  $id = $_GET['del'];
  $cek = mysqli_query($koneksi, "SELECT * FROM tbpanen WHERE `IDPanen`='$id'");
  if (mysqli_num_rows($cek) > 0) {
    $delete = mysqli_query($koneksi, "DELETE FROM tbpanen WHERE `IDPanen`='$id'");
    if ($delete) {
      echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil!</strong> Data Telah dihapus.</div>';
  echo '<meta http-equiv="refresh" content="0; url=./panen.php" >'; //coding refresh
    } else {
      echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Kesalahan!</strong> Tidak dapat menghapus data.</div>';
    }
  }
}
?>
 <!-- form grup dan modal -->
  <div class="form-group">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Tambah Data</a>
    
  </div>  
   
  <!-- untuk membuat cari -->
	<div class="row">
    <div class="col-xs-8">
    <input type="text" name="s" class="form-control" placeholder="Cari.." id="isi_cari">
    </div>
    <div class="col-xs-4"><a href="#" class="btn btn-success" id="cari_reload"><span class="glyphicon glyphicon-search" > </span> Cari</a>
    </div>
	</div>

<br /> <!-- enter spasi -->
<!-- tempat reload data -->
<div id="reload_data"></div>

		<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content modal-popup">
		<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
		
<!-- /.koding tambah data -->
<!-- /.penomoran otomatis -->
<?php
$cari = mysqli_query ($koneksi, "select max(`IDPanen`) as kd from tbpanen");
$tm_cari = mysqli_fetch_array ($cari);
$kode = substr($tm_cari['kd'],2,4);
$tambah = $kode+1;
if ($tambah<10){
$ed = "PN00".$tambah;
}else {
$ed ="PN".$tambah;
}
 //.koding simpan
if (isset($_POST['add'])) {
	$ip = $_POST['ip'];
	$idp = $_POST['idp'];
	$tp = $_POST['tp'];
	$u = $_POST['u'];
	$ja = $_POST['ja'];
	$tb = $_POST['tb'];
	$br = $_POST['br'];
	$np = $_POST['np'];
	
  if ($ip != '') {
		$insert = mysqli_query($koneksi, "INSERT INTO tbpanen (`IDPanen`, `IDProduksi`,`TanggalPengiriman`,`Umur`,`JumlahAyam`,`TotalBerat`,`BeratRata`,`NamaPembeli`) 
		VALUES ('$ip','$idp','$tp','$u','$ja','$tb','$br','$np')") or die(mysqli_error());
		
				if($insert) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./panen.php" >'; //coding refresh
			
		} else {
			echo '<script type="text/javascript">alert("Data gagal disimpan")
			</script>';
			
			echo '<meta http-equiv="refresh" content="0; url=./panen.php" >'; //coding refresh
		}
	}  else {
		echo '<script type="text/javascript">alert("Data sudah ada")
			</script>';
			echo '<meta http-equiv="refresh" content="0; url=./panen.php" >'; //coding refresh
  }
}
$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime('- 16 year', $now));
$minage = date("Y-m-d", strtotime('- 40 year', $now));
?>

<!-- /.form input pada modal-->
		<form  action="" method="post" class="form-group">
		 <label>ID Panen</label>
        <input  class="form-control form-white" name="ip" placeholder="Enter text" readonly="" value="<?php echo $ed;?>" >
       	
        <label>ID Produksi</label>        
         <select class="form-control" span="label label-success" name="idp" required="required">
		<option required="required" value="">-- Pilih ID Produksi --</option>
		<?php
			$q = mysqli_query ($koneksi, "SELECT * FROM `tbpeternak` WHERE `IDPeternak` NOT IN (SELECT `IDPeternak` FROM `tbpenyerahanbibit` WHERE MONTH(`TanggalChickIn`)='" . DATE('m') . "' AND YEAR(`TanggalChickIn`)='" . DATE('Y') . "')");
			while ($dat = mysqli_fetch_array ($q)) {
			echo '<option value="'. $dat['IDPeternak'].'">'.$dat['NamaPeternak'].' - '.$dat['Alamat'].'  ('.$dat[4].')</option>';
			}
		?>
		</select>
					
		<label>Tanggal Pengiriman</label>
		<input  class="form-control"  name="tp" required="Tidak Boleh Kosong" type="date" placeholder="dd/mm/yyyy">

		<label>Jumlah Ayam</label>
        <input type="text" class="form-control form-white" name="ja" pattern="[0-9]*" title="Hanya Angka" placeholder="Masukkan Angka" required="" >
		
		<label>Umur</label>
        <input type="text" class="form-control form-white" name="u" pattern="[0-9]*" title="Hanya Angka" placeholder="Masukkan Angka" required="" >
							
		<label>Total Berat</label>
       <input type="text" class="form-control" name="tb" pattern="[0-9]*" title="Hanya Angka" placeholder="Masukkan Angka" required="" >
       
        <label>Berat Rata</label>
       <input type="text" class="form-control" name="br" pattern="[0-9]*" title="Hanya Angka" placeholder="Masukkan Angka" required="" >
   
		<label>Nama Pembeli</label>
       <input type="text" class="form-control" name="np" pattern="[A-Z a-z]*" title="Hanya Huruf" placeholder="kosong" required >
        
	
	
            <p></p>   <!-- /.Jarak -->
       
<!-- /.Bottom simpan pada modal -->                   
<button type="submit" class="btn btn-primary" name="add"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
<a href="panen.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>

		</form>
				</div>
				</div>
				</div>	
	
 
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
	   $('#demo1').collapse('show');
    $("#reload_data").load('get_panen.php');
    $("#isi_cari").on("keyup", function() {
      var search = $(this).val();
      
    })
    $("#isi_cari, #cari_reload").on("keyup", function() {
      var search = $(this).val();
      $.ajax({
        url: 'get_panen.php',
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



<!--//.koding js query pemanggilan data pada combo-->
<script type="text/javascript">
  $(document).ready(function(){
    $("#jenis").on("change", function() {
      var kandang = $("#nama_anu").val();
      var data = $(this).val();
      $.ajax({
        type: 'POST',
        url: 'combopeternakdata.php',
        data: 'data=' + data,
        success:function(data) {
          $("#nama_anu").val(data);
          //alert(data);
        }
      });
    });

  })
</script>
<?php include 'footer.php';?>