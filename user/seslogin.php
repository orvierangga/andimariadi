
<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']) AND empty ($_SESSION['status'])AND empty ($_SESSION['IDuser']))
{


	
	 header('Location: ../index.php');
	 }
?>