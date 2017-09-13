<?php  

	include "../fungsi/koneksi.php";
	
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = mysqli_query($koneksi, "DELETE FROM sementara WHERE id_sementara='$id' ");

		if($query) {
			header("Location:index.php?p=formpesan");
		}
	}


?>