<?php  

include "../fungsi/koneksi.php";

if(isset($_POST['update'])) {
	$id = $_POST['id'];
	$id_jenis = $_POST['id_jenis'];
	$kode_brg = $_POST['kode_brg'];
	$keterangan = $_POST['keterangan'];
	$unit = $_POST['unit'];
	$nama_brg = $_POST['nama_brg'];
	$jumlah = $_POST['jumlah'];

	$query = mysqli_query($koneksi, "UPDATE pemesanan SET kode_brg='$kode_brg', jumlah='$jumlah', id_jenis='$id_jenis', keterangan='$keterangan' WHERE id ='$id' ");
	if ($query) {
		header("location:index.php?p=datapesanan");
	} else {
		echo 'error' . mysqli_error($koneksi);
	}

}



?>