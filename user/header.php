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
              <a class="navbar-brand" href="index.php"><i class="glyphicon glyphicon-hand-right"></i>  HOME  USER TERABOT</a>
            </div>
		
			
            <!-- Top Menu Items / Menu Atas-->
            <ul class="nav navbar-right top-nav">
            <li class="dropdown"></li>
               
				
				
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username'];?></a>
                    <!--<ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-fw fa-gear"></i> Pengaturan</a></li>
					<li class="divider"></li>
					
                    <li><a href="logout.php"><i class="fa fa-fw fa-sign-out"></i> Keluar</a></li>
                    </ul>-->
                </li>
            </ul>
			
			
			
            <!-- Menu Samping/Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
            <li>
            <a href="index.php"><i class="fa fa-lg fa-home"></i> Beranda</a>
            </li>
                   	  
			<li><a href="laporan.php"><i class="fa fa-bar-chart fa-fw"></i> Data Panen</a></li>
			<li><a href="pemeliharaanharian.php"><i class="fa fa-list fa-fw"></i> Pemeliharaan</a></li>
			
			<li><a href="gantipass.php"><i class="fa fa-list fa-fw"></i> Ganti Password</a></li>

			<li><a href="logout.php"><i class="fa fa-lg fa-sign-out"></i> Keluar</a></li>		
			</ul>
            </div>
            <!-- /.navbar-collapse/ navigasi buka tutup-->
        </nav>
