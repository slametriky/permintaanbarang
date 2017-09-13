<?php  

session_start();

if (!isset($_SESSION['login'])) {
	header("location:../index.php");
}

if ($_SESSION['level'] != "manager"){
	header("location:../index.php");	
}


?>