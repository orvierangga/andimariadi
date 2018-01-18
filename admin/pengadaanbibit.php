<?php
include 'header.php';
include '../conn.php';?>
<div id="page-wrapper">
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">Data Pengadaan Bibit <small>Pengadaan Bibit Ayam</small><small>( <?php echo IndonesiaTgl(date('Y-m-d'));?> )</small></h1>
                <ol class="breadcrumb">
                <li class="active">
                <i class="fa fa-desktop"></i> Data Pengadaan</a>
				<i class="fa fa-desktop"></i><a href="supplier.php"> Data Supplier</a>
				<i class="fa fa-desktop"><a href="strain.php"></i> Data Strain</a>
                </ol>
                </div>
                </div>
				<div class="dataTable_wrapper">
				
<?php // Coding Hapus
if (isset($_GET['del'])) {
  $id = $_GET['del'];
  $cek = mysqli_query($koneksi, "SELECT * FROM tbpersediaanbibit WHERE `IDPersediaanBibit`='$id'");
  if (mysqli_num_rows($cek) > 0) {
    $delete = mysqli_query($koneksi, "DELETE FROM tbpersediaanbibit WHERE `IDPersediaanBibit`='$id'");
    if ($delete) {
      echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil!</strong> Data Telah dihapus.</div>';
  echo '<meta http-equiv="refresh" content="0; url=./pengadaanbibit.php" >'; //coding refresh
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
$cari = mysqli_query ($koneksi, "select max(`IDPersediaanBibit`) as kd from tbpersediaanbibit");
$tm_cari = mysqli_fetch_array ($cari);
$kode = substr($tm_cari['kd'],2,4);
$tambah = $kode+1;
if ($tambah<10){
$ed = "PB00".$tambah;
}else {
$ed ="PB".$tambah;
}
 //.koding simpan
if (isset($_POST['add'])) {
	$ipb = $_POST['ipb'];
	$bs = $_POST['bs'];
	$ts = $_POST['ts'];
	$ids = $_POST['ids'];
	$st = $_POST['st'];
	$js = $_POST['js'];
	
  if ($ipb != '') {
		$insert = mysqli_query($koneksi, "INSERT INTO tbpersediaanbibit (`IDPersediaanBibit`, `BulanSedia`,`TahunSedia`,`IDSupplier`,`Strain`,`JumlahSedia`) 
		VALUES ('$ipb','$bs','$ts','$ids','$st','$js')") or die(mysqli_error());
		
				if($insert) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./pengadaanbibit.php" >'; //coding refresh
			
		} else {
			echo '<script type="text/javascript">alert("Data gagal disimpan")
			</script>';
			
			echo '<meta http-equiv="refresh" content="0; url=./pengadaanbibit.php" >'; //coding refresh
		}
	}  else {
		echo '<script type="text/javascript">alert("Data sudah ada")
			</script>';
			echo '<meta http-equiv="refresh" content="0; url=./pengadaanbibit.php" >'; //coding refresh
  }
}
$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime('- 16 year', $now));
$minage = date("Y-m-d", strtotime('- 40 year', $now));
?>

<!-- /.form input pada modal-->
		<form  action="" method="post" class="popup-form">					
        <label>ID Pengadaan Bibit</label>
        <input  class="form-control form-white" name="ipb" placeholder="Enter text" readonly="" value="<?php echo $ed;?>" >
                        
        <label>Bulan</label>
        <select class="form-control" span="label label-success" name="bs" required="required">
		<option required="required" value="">-- Pilih Bulan --</option>
		<option value="Januari">Januari</option><option value="Februari">Februari</option><option value="Maret">Maret</option>
		<option value="April">April</option><option value="Mei">Mei</option><option value="Juni">Juni</option>
		<option value="Juli">Juli</option><option value="Agustus">Agustus</option><option value="September">September</option>
		<option value="Oktober">Oktober</option><option value="November">November</option><option value="Desember">Desember</option>
		</select>
						
        <label>Tahun</label>
		<select class="form-control" span="label label-success" name="ts" required="required">
		<option required="required" value="">-- Pilih Tahun --</option>
		<!--cari tahun-->		
		<?php 
		$tahun =  @$_GET['tahun'];
		$mulai = date('Y') - 5 ;
		for ( $i = $mulai; $i<$mulai + 20; $i++) {
		if ($i == $tahun) {
		echo' <option value="'.$i.'" selected>'.$i.'</option>'; 
		} else {
		echo' <option value="'.$i.'">'.$i.'</option>' ; 
			}
		}
		?>
		</select>
		
		<label>Data Supplier</label>
        <select class="form-control" span="label label-success" name="ids" required="required">
		<option required="required" value="">-- Pilih Supplier --</option>
		<?php
			$q = mysqli_query ($koneksi, "select * from `tbsupplier` order by `IDSupplier` ASC");
			while ($dat = mysqli_fetch_array ($q)) {
			echo '<option value="'. $dat[0].'">' . $dat[0].'. '.$dat[1].'  ('.$dat[2].')</option>';
			}
		?>
		</select>
		
		<label>Strain</label>
        <select class="form-control" span="label label-success" name="st" required="required">
		<option required="required" value="">-- Pilih Strain --</option>
		<?php
			$s = mysqli_query ($koneksi, "select * from `tbstrain` order by `IDStrain` ASC");
			while ($dat1 = mysqli_fetch_array ($s)) {
			echo '<option value="' . $dat1[1]. '">' . $dat1[0].'. Strain = '.$dat1[1].'</option>';
			}
		?>
		</select>
		
		<label>Jumlah</label>
        <input type="int" class="form-control form-white" name="js" placeholder="Masukkan Angka" required="" >
			                                
            <p></p>   <!-- /.Jarak -->
       
<!-- /.Bottom simpan pada modal -->                   
<button type="submit" class="btn btn-primary" name="add"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
<a href="pengadaanbibit.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>

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
    $("#reload_data").load('get_pengadaanbibit.php');
    $("#isi_cari").on("keyup", function() {
      var search = $(this).val();
      
    })
    $("#isi_cari, #cari_reload").on("keyup", function() {
      var search = $(this).val();
      $.ajax({
        url: 'get_pengadaanbibit.php',
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
