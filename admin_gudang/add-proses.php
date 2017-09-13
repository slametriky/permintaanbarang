<?php  

	include "../fungsi/koneksi.php";

	if(isset($_POST['simpan'])) {

		$kode_brg = $_POST['kode_brg'];
		$id_jenis = $_POST['id_jenis'];
		$nama_brg = $_POST['nama_brg'];
		$stok = $_POST['jumlah'];
		$satuan = $_POST['satuan'];
		$suplier = $_POST['suplier'];
		$tgl_masuk = $_POST['tgl_masuk'];		

		//die($stok);

		$query = "INSERT into stokbarang (kode_brg, id_jenis, nama_brg, stok, tgl_masuk, satuan, sisa, suplier) VALUES 
										('$kode_brg', '$id_jenis', '$nama_brg', '$stok', '$tgl_masuk', '$satuan', '$stok', '$suplier');

			";
		$hasil = mysqli_query($koneksi, $query);
		if ($hasil) {
			header("location:index.php?p=material");
		} else {
			die("ada kesalahan : " . mysqli_error($koneksi));
		}

	}

?>