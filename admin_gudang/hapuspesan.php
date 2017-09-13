<?php  
    
    include "../fungsi/koneksi.php";

    if(isset($_GET['aksi']) && isset($_GET['id']) && isset($_GET['tgl']) && isset($_GET['unit']) ) {
        $aksi = $_GET['aksi'];
        $id = $_GET['id'];
        $unit = $_GET['unit'];
        $tgl = $_GET['tgl'];

        if ($aksi == 'hapus') {
            $query2 = mysqli_query($koneksi, "DELETE FROM pemesanan WHERE id='$id' ");
            if ($query2) {
                header("location:index.php?p=detil&tgl=$tgl&unit=$unit");
            } else {
                echo 'gagal';
            }
        }
    }


?>