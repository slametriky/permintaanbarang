<?php  

	include "../fungsi/koneksi.php";

	if(isset($_POST['simpan'])) {

		$unit = $_POST['unit'];
		$kode_brg = $_POST['kode_brg'];
		$jumlah = $_POST['jumlah'];		
		$tgl_pemesanan = date('Y-m-d');
		$id_jenis = $_POST['id_jenis'];
		$nama_tukang = $_POST['nama_tukang'];
		

		$query = "INSERT into sementara (unit, kode_brg, id_jenis,  jumlah, tgl_permintaan, nama_tukang ) VALUES 
										('$unit', '$kode_brg', '$id_jenis', '$jumlah', '$tgl_pemesanan', '$nama_tukang')

			";
		$hasil = mysqli_query($koneksi, $query);
		if ($hasil) {
			header("location:index.php?p=formpesan");
		} else {
			die("ada kesalahan : " . mysqli_error($koneksi));
		}
	}
?>