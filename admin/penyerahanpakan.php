<?php
include 'header.php';
include '../conn.php';?>
<div id="page-wrapper">
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">Data Penyerahan Pakan <small>Penyerahan Pakan Ayam</small><small>( <?php echo IndonesiaTgl(date('Y-m-d'));?> )</small></h1>
                <ol class="breadcrumb">
                <li class="active">
                <i class="fa fa-desktop"></i> Data Penyerahan</a></li>
                </ol>
                </div>
                </div>
				<div class="dataTable_wrapper">
				
<?php // Coding Hapus
if (isset($_GET['del'])) {
  $id = $_GET['del'];
  $cek = mysqli_query($koneksi, "SELECT * FROM tbpenyerahanbibit WHERE `IDProduksi`='$id'");
  if (mysqli_num_rows($cek) > 0) {
    $delete = mysqli_query($koneksi, "DELETE FROM tbpenyerahanbibit WHERE `IDProduksi`='$id'");
    if ($delete) {
      echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil!</strong> Data Telah dihapus.</div>';
  echo '<meta http-equiv="refresh" content="0; url=./penyerahanbibit.php" >'; //coding refresh
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
$cari = mysqli_query ($koneksi, "select max(`IDProduksi`) as kd from tbpenyerahanbibit");
$tm_cari = mysqli_fetch_array ($cari);
$kode = substr($tm_cari['kd'],2,4);
$tambah = $kode+1;
if ($tambah<10){
$ed = "PR00".$tambah;
}else {
$ed ="PR".$tambah;
}
 //.koding simpan
if (isset($_POST['add'])) {
	$ip = $_POST['ip'];
	$idp = $_POST['idp'];
	$ids = $_POST['ids'];
	$s = $_POST['s'];
	$tc = $_POST['tc'];
	$jc = $_POST['jc'];
	$hrg = $_POST['hrg'];
	$p = $_POST['p'];
	$k = $_POST['k'];
	$idk = $_POST['idk'];
	
  if ($ip != '') {
		$insert = mysqli_query($koneksi, "INSERT INTO tbpenyerahanbibit (`IDProduksi`, `IDPeternak`,`IDSupplier`,`Strain`,`TanggalChickIn`,`JumlahChickIn`,`Harga`,`Periode`,`KondisiChickIn`,`IDDataKandang`) 
		VALUES ('$ip','$idp','$ids','$s','$tc','$jc','$hrg','$p','$k','$idk')") or die(mysqli_error());
		
				if($insert) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./penyerahanbibit.php" >'; //coding refresh
			
		} else {
			echo '<script type="text/javascript">alert("Data gagal disimpan")
			</script>';
			
			echo '<meta http-equiv="refresh" content="0; url=./penyerahanbibit.php" >'; //coding refresh
		}
	}  else {
		echo '<script type="text/javascript">alert("Data sudah ada")
			</script>';
			echo '<meta http-equiv="refresh" content="0; url=./penyerahanbibit.php" >'; //coding refresh
  }
}
$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime('- 16 year', $now));
$minage = date("Y-m-d", strtotime('- 40 year', $now));
?>

<!-- /.form input pada modal-->
		<form  action="" method="post" class="form-group">
			
        <label>ID Produksi</label>
        <input  class="form-control form-white" name="ip" placeholder="Enter text" readonly="" value="<?php echo $ed;?>" >
        
         <select class="form-control" span="label label-success" name="idp" required="required">
		<option required="required" value="">-- Pilih Data Peternak --</option>
		<?php
			$q = mysqli_query ($koneksi, "select * from `tbpeternak` order by `IDPeternak` ASC");
			while ($dat = mysqli_fetch_array ($q)) {
			echo '<option value="' . $dat[0]. '">' . $dat[0].'. Nama Peternak = '.$dat[1].' - Lokasi = '.$dat[2].'</option>';
			}	
		?>
		</select>

		<select class="form-control" span="label label-success" name="ids" required="required">
		<option required="required" value="">-- Pilih Supplier --</option>
		<?php
			$w = mysqli_query ($koneksi, "select * from `tbsupplier` order by `IDSupplier` ASC");
			while ($dat1 = mysqli_fetch_array ($w)) {
			echo '<option value="'. $dat1[0].'">' . $dat1[0].'. '.$dat1[1].'  ('.$dat1[2].')</option>';
			}
		?>
		</select>

		 <select class="form-control" span="label label-success" name="s" required="required">
		<option required="required" value="">-- Pilih Strain --</option>
		<?php
			$s = mysqli_query ($koneksi, "select * from `tbstrain` order by `IDStrain` ASC");
			while ($dat2 = mysqli_fetch_array ($s)) {
			echo '<option value="' . $dat2[1]. '">' . $dat2[0].'. Strain = '.$dat2[1].'</option>';
			}
		?>
		</select> 

					
		<label>Tanggal Chick In</label>
		<input  class="form-control"  name="tc" required="Tidak Boleh Kosong" type="date" placeholder="dd/mm/yyyy">

		<label>Jumlah Chick In</label>
        <input type="int" class="form-control form-white" name="jc" placeholder="Masukkan Angka" required="" >
		
		<label>Harga</label>
        <input type="int" class="form-control form-white" name="hrg" placeholder="Masukkan Angka" required="" >	
						
		<label>Periode</label>
       <input type="int" class="form-control" name="p" placeholder="Masukkan Angka" required="" >
       
        </br>
	
		<label>Kondisi Chick In</label>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="radio" name="k" value="Normal" checked> Normal &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="radio" name="k" value="Tidak Normal"> Tidak Normal <br/>
		 </br>
		
        <select class="form-control " span="label label-success" name="idk" required="required">
		<option required="required" value="">-- Pilih Data Kandang --</option>
		<?php
			$k = mysqli_query ($koneksi, "select * from `tbdatakandang` order by `IDDataKandang` ASC");
			while ($dat3 = mysqli_fetch_array ($k)) {
			echo '<option value="' . $dat3[0]. '">' . $dat3[0].'. Pemilik : '.$dat3[1].'</option>';
			}
		?>
		</select>
	
	
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
    $("#reload_data").load('get_penyerahanbibit.php');
    $("#isi_cari").on("keyup", function() {
      var search = $(this).val();
      
    })
    $("#isi_cari, #cari_reload").on("keyup", function() {
      var search = $(this).val();
      $.ajax({
        url: 'get_penyerahanbibit.php',
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

