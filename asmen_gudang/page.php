 
<?php 
  
    $page = isset($_GET['p']) ? $_GET['p'] : "";

    if ($page == 'material') {
        include_once "material.php";
    } else if ($page=="") {
        include_once "main.php";
    } else if ($page=="datapesanan") {
        include_once "datapesanan.php";
    } else if ($page=="editpesan") {
        include_once "editpesan.php";
    } else if ($page=="tidaksetuju") {
        include_once "tidaksetuju.php";
    } else if ($page=="disetujui") {
        include_once "disetujui.php";
    } else if($page == "detil"){
        include_once "detilpesan.php";
    }
 ?>
 
