<?php
include 'header.php';
include '../conn.php';?>
<div id="page-wrapper">
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">Data Pemeliharaan <small>Pemeliharaan Ayam</small><small>( <?php echo IndonesiaTgl(date('Y-m-d'));?> )</small></h1>
                <ol class="breadcrumb">
                <li class="active">
				
                <i class="fa fa-desktop"></i> Data Pemeliharaan</a></li>
                </ol>
                </div>
                </div>
				
				
<?php 
//anu koding seleksi
$data1 = mysqli_query($koneksi, "SELECT * FROM `tbpenyerahanbibit` WHERE `IDPeternak`='" . $_SESSION['IDPengguna']. "'");
$row = mysqli_num_rows($data1);
?>
 <!-- seleksi peternak yang sudah masuk akses -->
  <div class="form-group">
<?php
		if (!empty($row)) {
			?>
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="tambahph.php" class="btn btn-blue">Tambah Pemeliharaan Harian</a>
			
			<?php
		}
	?>
  </div>  
  	
     
   <div class="row">
   <?php if (empty($row)) { ?>
			<div class="alert alert-danger" role="alert">
			Anda belum masuk dalam daftar penginputan!
			</div>
	<?php
		}
		foreach($data1 as $anu):
	?>
			
		<div class="col-md-3" >
		<input name="idp" class="form-control" value="<?php echo $anu['IDProduksi'];?>" readonly>        
        </div>
		
	</div>
	
		
	
    <div class="col-lg-8" >
		<label>ID Peternak</label> :  <?php echo $anu['IDPeternak'];?>
	</div>
	<div class="col-lg-8" >
		<label>Tanggal Chick In</label> : <?php echo $anu['TanggalChickIn'];?>
    </div>
	<!--input tambah-->
	
	
  
   
   
   
   <br/><br/>
   
  <!-- untuk membuat cari 
	<div class="row">
    <div class="col-xs-8">
    <input type="text" name="s" class="form-control" placeholder="Cari.." id="isi_cari">
    </div>
    <div class="col-xs-3" align="right"><a href="#" class="btn btn-success" id="cari_reload"><span class="glyphicon glyphicon-search" > </span> Cari</a>
    </div>
	</div> -->
	

<br /> <!-- enter spasi -->
<!-- tempat reload data -->
<div id="reload_data"></div>
<?php
	 endforeach;
	 ?>
		
<!-- /.koding tambah data -->
<!-- /.penomoran otomatis -->

<!-- /.form input pada modal-->
		
				
				
	
 
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
    $("#reload_data").load('get_pemeliharaanharian.php');
    $("#isi_cari").on("keyup", function() {
      var search = $(this).val();
      
    })
    $("#isi_cari, #cari_reload").on("keyup", function() {
      var search = $(this).val();
      $.ajax({
        url: 'get_pemeliharaanharian.php',
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
