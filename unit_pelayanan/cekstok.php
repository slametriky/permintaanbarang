<?php  

	include "../fungsi/koneksi.php";

	$kode_brg = $_GET['kode_brg'];
	$jumlah = $_GET['jumlah'];
	
	$query = mysqli_query($koneksi,"select * from stokbarang WHERE kode_brg='$kode_brg' ");
     
	 
    	$row = mysqli_fetch_assoc($query);
    	if ($jumlah > $row['stok']){
    	$data = array(
	            'hasil'      =>  1,
	            'pesan' => 'Permintaan Melebihi Persediaan Stok'
	             );
	 			echo json_encode($data);
		}
    

  
?>