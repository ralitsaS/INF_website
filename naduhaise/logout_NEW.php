<?php 
session_start();


$_SESSION = array(); 
session_destroy(); 

header("Location: http://localhost/naduhaise/index.php"); /* Redirect browser */
		exit();

 ?>
 