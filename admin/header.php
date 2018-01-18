<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TeraBOt</title>
	<link rel="shortcut icon" href="img/favicon.ico">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
	
	<link href="data_tables/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
	
	<link href="datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="datatables-responsive/js/dataTables.responsive.js" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
 <script type="text/javascript">
	<?php  date_default_timezone_set('Asia/jakarta');?>
 function displayTime(){
	 var time= new Date ();
	 var sh = time.getHours() +"";
	 var sm = time.getMinutes()+"";
	 var ss = time.getSeconds()+"";
	 document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh+sh)+":"+(sm.length==1?"0"+sm+sm)+":"+(ss.length==1?"0"+ss+ss);
	 }
</script>
<body >
<?php include "conn.php";
include "library.php";
include "seslogin.php";?>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><i class="glyphicon glyphicon-hand-right"></i>  HOME ADMIN TERABOT</a>
            </div>
		
			
            <!-- Top Menu Items / Menu Atas-->
            <ul class="nav navbar-right top-nav">
            <li class="dropdown"></li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu alert-dropdown">      
                <li><a href="#">Permintaan Terbaru <span class="label label-danger" align="center"> </span></a></li>
                <li class="divider"></li>
                <li>  <a href="baru_perm.php">Lihat Semua</a> </li></ul>
                </li>
				
				
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username'];?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-fw fa-gear"></i> Pengaturan</a></li>
					<li class="divider"></li>
					
                    <li><a href="logout.php"><i class="fa fa-fw fa-sign-out"></i> Keluar</a></li>
                    </ul>
                </li>
            </ul>
			
			
			
            <!-- Menu Samping/Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
            <li>
            <a href="index.php"><i class="fa fa-lg fa-home"></i> Beranda</a>
            </li>
                   
				  
            <li>
            <a  href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-list-alt fa-lg"></i> Master Data<i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
            <li><a href="strain.php"><i class="fa fa-list fa-fw"></i> Strain Ayam</a></li>
			<li><a href="pakan.php"><i class="fa fa-list fa-fw"></i> Pakan Ayam</a></li>
			<li><a href="ovk.php"><i class="fa fa-list fa-fw"></i> Obat Vaksin Kimia</a></li>
			<li><a href="peternak.php"><i class="fa fa-list fa-fw"></i> Peternak</a></li>
			<li><a href="supplier.php"><i class="fa fa-list fa-fw"></i> Supplier</a></li>
			<li><a href="kandang.php"><i class="fa fa-list fa-fw"></i> Data Kandang</a></li>
			<li><a href="panen.php"><i class="fa fa-bar-chart fa-fw"></i> Data Panen</a></li>
			<li><a href="pemeliharaan.php"><i class="fa fa-list fa-fw"></i> Pemeliharaan</a></li>
			<li><a href="pem_harian.php"><i class="fa fa-calendar fa-fw"></i> Pemeliharaan Harian</a></li>
			</ul>
			</li>
             
			<li>
			<a  href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-calculator fa-lg"></i> Transaksi<i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo1" class="collapse">
			<li><a href="pengadaanbibit.php"><i class="fa fa-list fa-fw"></i> Pengadaan Bibit</a></li>
			<li><a href="penyerahanbibit.php"><i class="fa fa-list fa-fw"></i> Penyerahan Bibit</a></li>
			<li><a href="data_petugas.php"><i class="fa fa-list fa-fw"></i> Penyerahan Pakan</a></li>
			<li><a href="data_petugas.php"><i class="fa fa-list fa-fw"></i> Pengadaan OVK</a></li>
			</ul>
			</li>
			<li><a href="javascript:;"><i class="fa fa-lg fa-info-circle"></i> Bantuan </a></li>		
			
		     
            </div>
            <!-- /.navbar-collapse/ navigasi buka tutup-->
        </nav>
