<?php  

	include "../fungsi/koneksi.php";
	$tgl = date('Y-m-d');

	

	$query =  "INSERT INTO permintaan SELECT * FROM sementara";
	$query2 = "DELETE FROM sementara WHERE tgl_permintaan='$tgl'";

	

	if(mysqli_query($koneksi, $query)){
			mysqli_query($koneksi, $query2);
			header("Location:index.php?p=datapesanan");
	} else {
		echo "gagal euy" . mysqli_error($koneksi);
	}


?>