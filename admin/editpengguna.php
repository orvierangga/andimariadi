<?php include "header.php";
include '../conn.php';
$ud = $_GET['id'];?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Data Pengguna Website
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-pencil"></i> Edit Data
                            </li>
                        </ol>
                    </div>
                </div>
				
				<?php $ubah = mysqli_query ($koneksi, "select * from pengguna where IDuser='$ud'");
				$data = mysqli_fetch_array ($ubah);
				?>
				
	<?php			
	if (isset($_POST['edt'])) {
	
	$un = $_POST['un'];
	$cek = mysqli_query($koneksi, "select * from pengguna where IDuser='$data[0]'"); //cek data yg mau diedit
	 
  if (mysqli_num_rows($cek) !=0) {
		$edit = mysqli_query($koneksi, "UPDATE `pengguna` set `username` ='$un' where `IDuser`='$ud'") 
		or die (mysqli_error());
		
				if($edit) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./pengguna.php" >'; //coding refresh
			
		} else {
			echo '<script type="text/javascript">alert("Data gagal disimpan")
			</script>';
		}
	} 
}

$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime('- 16 year', $now));
$minage = date("Y-m-d", strtotime('- 40 year', $now));
?>        

                        <form  action="" method="post" class="popup-form col-lg-4">
                       
								<label>ID Pengguna</label>
                                <input  class="form-control form-white"   name="u" value="<?php echo $data[0];?>" disabled>
                            
                           
                                <label>Nama Pengguna</label>
                                <input  class="form-control form-white"  name="un"  value="<?php echo $data[1];?>" > 
								 
                            

								<label>ID Status Pengguna</label>
                                <input  class="form-control form-white"   name="kdpt" value="<?php echo $data[3];?>" disabled>
							
                                    
                          
							
								 <p></p>
								 
						 
                                
                            <p></p>
                          
                             <button type="submit" class="btn btn-primary" name="edt"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
								

								<a href="pengguna.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>


                        </form>
						
						<?php include "footer.php";?>