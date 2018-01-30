<!DOCTYPE html>
<html >

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css.css" type="text/css">
  
    <title>Terabot</title>
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

<?php
date_default_timezone_set('Asia/Jakarta');
include 'library.php';
				if(isset($_POST['login'])){

					include"conn.php";
					$username	= $_POST['username'];
					$password	= md5($_POST['password']);
					
					
					$login=mysqli_query($koneksi,"SELECT * FROM `pengguna` WHERE `username`='$username'  AND `password` ='$password'");


// Apabila username dan password ditemukan
if(mysqli_num_rows($login) == 0){
	echo '<div class="alert alert-danger" align="center" >Login gagal !!! Silahkan Coba Lagi..</div>';
	}else{
$ketemu =mysqli_num_rows($login);
$r=mysqli_fetch_array($login);					 
session_start();				
$_SESSION['username']     = $r['username'];
$_SESSION['password']     = $r['password'];
$_SESSION['IDuser']=$r['IDuser'];
$_SESSION['IDPengguna']=$r['IDPengguna'];
//$_SESSION['status']=$r['status'];


  $jam = date("H:i:s");
  $tgl = date("Y-m-d");

 	
						if($r['status'] == 'ADMIN'){
						
							$_SESSION['username']=$username;
							$_SESSION['status']='ADMIN';
							$_SESSION['IDuser']=$ketemu['IDuser'];
							
							 mysqli_query($koneksi, "INSERT INTO `log_login`(`username`,`jam_msk`,`jam_klr`,`tgl_msk`,`tgl_klr`,`status_log`)
                           VALUES('$_SESSION[username]','$jam','logged','$tgl','---','online')");	
						   header("Location: /terabot/admin/index.php");
						}else {
							
								
								
							$_SESSION['username']=$username;
							$_SESSION['status']='<?php echo $data[3];?>';
						$_SESSION['IDuser']=$ketemu['IDuser'];							
							  mysqli_query($koneksi, "INSERT INTO `log_login`(`username`,`jam_msk`,`jam_klr`,`tgl_msk`,`tgl_klr`,`status_log`)
                           VALUES('$_SESSION[username]','$jam','logged','$tgl','---','online')");	
						   header("Location: /terabot/user/index.php");
						}
					}
				}
				?>
				
<!--<H1 align ="center">
  <span class="glyphicon glyphicon-user" aria-hidden="true"></span><a font="50px" href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue"><STRONG>LOGIN</STRONG></a>
  </H1>-->
  
  
  <!--<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>-->

 <body background="img11.jpg">
  <nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#"><i class="fa d-inline fa-lg fa-cloud"></i><b>  TeraBOt</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false"
        aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
     

	 <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa d-inline fa-lg fa-bookmark-o"></i> Bookmarks</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa d-inline fa-lg fa-envelope-o"></i> Contacts</a>
          </li>
        </ul>
        <a class="btn navbar-btn ml-2 text-white btn-secondary"><i class="fa d-inline fa-lg fa-user-circle-o"></i> Daftar</a>
      </div>
    </div>
  </nav>
  
  
  <div class="py-5 text-white gradient-overlay bg-secondary">
    <div class="container">
      <div class="row">
        <div class="col-md-7 text-md-left text-center align-self-center my-5">
          <div class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item">
                <img class="d-block img-fluid" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg" data-holder-rendered="true">
                <div class="carousel-caption">
                  <h3>First slide label</h3>
                  <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
              </div>
              <div class="carousel-item active">
                <img class="d-block img-fluid img-thumbnail" src="img11.jpg" data-holder-rendered="true"> </div>
            </div>
            <a class="carousel-control-prev" href="" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
          </div>
        </div>
        <div class="col-md-5">
          <form class="" method="post" action="https://formspree.io/">
            <div class="form-group"> <label>Email</label>
              <input type="email" name="email" class="form-control" placeholder="Enter email"> </div>
            <div class="form-group"> <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password"> </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="p-4 col-md-3">
          <h2 class="mb-4">CV. Rehobot</h2>
          <p class="text-white">A company for whatever you may need, from website prototyping to publishing</p>
        </div>
        <div class="p-4 col-md-3">
          <h2 class="mb-4">Mapsite</h2>
          <ul class="list-unstyled">
            <a href="#" class="text-white">Home</a>
            <br>
            <a href="#" class="text-white">About us</a>
            <br>
            <a href="#" class="text-white">Our services</a>
            <br>
            <a href="#" class="text-white">Stories</a>
          </ul>
        </div>
        <div class="p-4 col-md-3">
          <h2 class="mb-4">Contact</h2>
          <p>
            <a href="tel:+246 - 542 550 5462" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-phone"></i>+246 - 542 550 5462</a>
          </p>
          <p>
            <a href="mailto:info@pingendo.com" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-envelope-o"></i>info@pingendo.com</a>
          </p>
          <p>
            <a href="https://goo.gl/maps/AUq7b9W7yYJ2" class="text-white" target="_blank"><i class="fa d-inline mr-3 fa-map-marker text-secondary"></i>365 Park Street, NY</a>
          </p>
        </div>
        <div class="p-4 col-md-3">
          <h2 class="mb-4 text-light">Subscribe</h2>
          <form>
            <fieldset class="form-group text-white"> <label for="exampleInputEmail1">Get our newsletter</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> </fieldset>
            <button type="submit" class="btn btn-outline-secondary">Submit</button>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3">
          <p class="text-center text-white">© Copyright 2018 TerABot - All rights reserved. </p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
 
</body>

</html>
