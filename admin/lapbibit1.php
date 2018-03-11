<?php
include 'header.php';
include '../conn.php';
$ud1 = $_GET['id'];?>
<div id="page-wrapper">
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">Rincian Bibit Masuk <small> Jumlah Bibit Masuk</small><small>( <?php echo IndonesiaTgl(date('Y-m-d'));?> )</small></h1>
               
				  <ol class="breadcrumb"><li class="active">
				
                <i class="fa fa-paste"></i> Periode : <?php echo $ud1;?></li>
                </ol>
                </div>
                </div>
				<div class="dataTable_wrapper">
				
<?php 
//anu koding seleksi
$data1 = mysqli_query($koneksi, "SELECT * FROM `tbpenyerahanbibit` WHERE `Periode`='$ud1'");
$row = mysqli_num_rows($data1);
?>
   
  
	

<br /> <!-- enter spasi -->
<!-- tempat reload data -->
<div id="reload_data"></div>
		
 
</div>
</div>
</div>
	
	

<!-- jQuery -->
<script src="js/jquery.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#reload_data").load('get_lapbibit1.php?id=<?php echo $ud1;?>');
    $("#isi_cari").on("keyup", function() {
      var search = $(this).val();
      
    })
    $("#isi_cari, #cari_reload").on("keyup", function() {
      var search = $(this).val();
      $.ajax({
        url: 'get_lapbibit1.php',
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
