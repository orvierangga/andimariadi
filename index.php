<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Terabot</title>
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
<body background ="img/slide.jpg">
		
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

  
<div class="container" background="img/image_5.jpg">
        <div class="row">
            <div background="img/image_5.jpg" class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default" background="img/image_5.jpg">
                    <div class="panel-heading" background="img/image_5.jpg">
                        <h3 align="center"  class="panel-title">Masuk Sistem</h3>
                    </div>
                    <div class="panel-body" background="img/image_5.jpg">
                        <form image="img/image_5.jpg" role="form" action="" method="post">
    
					 <fieldset>
                    
					<div class="form-group" background="img/image_5.jpg">
						<input type="text" name="username" class="form-control" placeholder="Isi Username" required autofocus />
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Isi Password" required autofocus />
					</div>
					
					<div class="form-group" bgcolor="black">
						<input type="submit" name="login" class="btn btn-success btn-block" value="Login" />
					</div>
				 </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="bootstrap.min.js"></script>

</body>

</html>
