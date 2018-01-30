<?php
include 'header.php';
include '../conn.php';
$ud1 = $_GET['id'];?>
<div id="page-wrapper">
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">Data Pemeliharaan <small>Pemeliharaan Ayam</small><small>( <?php echo IndonesiaTgl(date('Y-m-d'));?> )</small></h1>
                <ol class="breadcrumb">
                <li class="active">
				
                <i class="fa fa-user"></i> Data Pemelihara : ID peternak, nama peternak ,alamat</li></ol>
				  <ol class="breadcrumb"><li class="active">
				
                <i class="fa fa-paste"></i> Nomor Produksi : <?php echo $ud1;?></li>
                </ol>
                </div>
                </div>
				<div class="dataTable_wrapper">
				
<?php 
//anu koding seleksi
$data1 = mysqli_query($koneksi, "SELECT * FROM `tbpenyerahanbibit` WHERE `IDProduksi`='$ud1'");
$row = mysqli_num_rows($data1);
?>
   
  <!-- untuk membuat cari -->
	<div class="row">
    <div class="col-xs-7">
    <input type="text" name="s" class="form-control" placeholder="Cari.." id="isi_cari">
    </div>
    <div class="col-xs-2" align="right"><a href="#" class="btn btn-success" id="cari_reload"><span class="glyphicon glyphicon-search" > </span> Cari</a>
    </div>
	</div> 
	

<br /> <!-- enter spasi -->
<!-- tempat reload data -->
<div id="reload_data"></div>
		
 
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
    $("#reload_data").load('get_pemeliharaanharian.php?id=<?php echo $ud1;?>');
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
