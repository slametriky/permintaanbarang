 
<?php 
  
    $page = isset($_GET['p']) ? $_GET['p'] : "";

    if ($page == 'formpesan') {
        include_once "formpesan.php";
    } else if ($page=="") {
        include_once "main.php";
    } else if ($page=="datapesanan") {
        include_once "datapesanan.php";
    }  else if ($page=="edit") {
        include_once "editpesan.php";
    } else if ($page=="hapus") {
        include_once "hapuspesan.php";
    } else if($page == "cetakpesanan"){
        include_once "cetakpesan.php";
    } else if($page == "detil"){
        include_once "detilpesan.php";
    } else if($page == "material"){
        include_once "material.php";
    }
 ?>
 
