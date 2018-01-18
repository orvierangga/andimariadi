<?php
include 'header.php';?>

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Master Data <small>Persediaan Barang</small><small>( <?php echo IndonesiaTgl(date('Y-m-d'));?> )</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-desktop"></i> Data Persediaan
                            </li>
                        </ol>
                    </div>
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
	
<script type="text/javascript">
function confirm_delete() {
  return confirm('Hapus data ini?');
}
</script>
<!-- jQuery -->
<script src="js/jquery.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#reload_data").load('get_persed.php');
    $("#isi_cari").on("keyup", function() {
      var search = $(this).val();
      
    })
    $("#isi_cari, #cari_reload").on("keyup", function() {
      var search = $(this).val();
      $.ajax({
        url: 'get_persed.php',
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
