<?php
	include "../fungsi/koneksi.php";

	if(isset($_GET['id'])){
		$id=$_GET['id'];
		
	    $query = mysqli_query($koneksi,"delete from stokbarang where kode_brg='$id'");
	    if ($query) {
	    	header("location:index.php?p=material");
	    } else {
	    	echo 'gagal';
	    }
	
	}
?>