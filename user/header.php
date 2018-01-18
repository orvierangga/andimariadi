<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INVENTORY WORKSHOP AP2B WSKT</title>
	<link rel="shortcut icon" href="img/favicon.ico">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
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

<body >
<?php include "conn.php";
include "library.php";
include "seslogin.php";?>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div align="center" class="navbar-header">
               <tr align="center">
			   <button type="button" align="center" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex4-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" align="center" >WELCOME IN INVENTORY WORKSHOP PT. PLN AP2B</a>
            </tr></div>
			
			
			
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        
                        <li>
                            <a href="#">Barang Terbaru <span class="label label-danger" align="center"><?php
$sql = mysqli_query($koneksi, "SELECT count(*) AS jumlah FROM `barang_masuk` WHERE `tanggal_msk` >= NOW() - INTERVAL 3 DAY" );	  
   
if (mysqli_num_rows($sql) == 0) {
echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
} else {
while ($data = mysqli_fetch_array ($sql)) {
echo $data[0];

}
 }
?> </span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="barang_masuk.php">Lihat Semua</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['nama_petugas'];?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="data_petugas.php"><i class="fa fa-fw fa-gear"></i> Pengaturan</a>
                        </li>
                        
                        
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
			
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
           
			
			
			
			
		   <div class="collapse navbar-collapse navbar-ex1-collapse">
                
				
				<ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.PHP"><i class="fa fa-fw fa-flash"></i> Beranda</a>
                    </li>
                   
				  
                  <li class="active">
                      
					   <a  href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-home"></i> Master Data <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="baru_perm.php"><i class="fa fa-fw fa-comments" ></i> Request Barang</a>
                            </li>
							<li>
                                <a href="persed_barang.php"><i class="fa fa-fw fa-list-alt"></i> Persediaan Barang</a>
                            </li>
													
							</ul></li>
                   
                      
                  
				  <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-dashboard"></i> Target Persediaan <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="tampil_brg.php"><i class="fa fa-fw fa-desktop"></i> Daftar Target Barang</a>
                            </li>
											
						
                           </ul> </li>
				  
				  <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="fa fa-fw fa-shopping-cart"></i> Permintaan Barang <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo4" class="collapse">
                          
						   <li>
                                <a href="permintaan.php"><i class="fa fa-fw fa-list"></i>Data Semua Permintaan</a>
                            </li>
						   
                            
                           </ul> </li>
			
                  
					
                   
            </div>
            <!-- /.navbar-collapse -->
        </nav>
