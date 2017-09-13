<?php  

	include "../fungsi/koneksi.php";

	$id = $_POST['jenis'];

	$query = mysqli_query($koneksi,"select * from stokbarang WHERE id_jenis='$id'");
 
    
    if (mysqli_num_rows($query)) {
    	echo "<option>--Pilih Barang--</option>";
        while($row=mysqli_fetch_assoc($query)){

        	echo "<option value=$row[nama_brg]>$row[nama_brg]</option>\n";
    	}                                                    
    }
?>