<?php  
		
	include "../fungsi/koneksi.php";

	if(isset($_POST['update'])){
		$unit = $_POST['unit'];
		$tgl_pemesanan = $_POST['tgl_permintaan'];
		$id = $_POST['id'];
		$jumlah = $_POST['jumlah'];
		
		$query = mysqli_query($koneksi, "UPDATE permintaan SET jumlah ='$jumlah' WHERE id_permintaan='$id' ");

		if($query) {
			header("location:index.php?p=detil&unit=$unit&tgl=$tgl_pemesanan");
		} else {
			echo 'gagal';
		}
		
	}

?>