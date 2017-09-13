<?php
	include "../fungsi/koneksi.php";

	if(isset($_GET['id'])){
		$id=$_GET['id'];
		
	    $query = mysqli_query($koneksi,"delete from user where id_user='$id'");
	    if ($query) {
	    	header("location:index.php?p=user");
	    } else {
	    	echo 'gagal';
	    }
	
	}
?>