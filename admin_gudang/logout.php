<?php  

session_start();

session_unset($_SESSION['username']);
session_unset($_SESSION['level']);

header("location:../index.php");


?>