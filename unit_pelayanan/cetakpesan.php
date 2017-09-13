<?php  
    include "../fungsi/koneksi.php";
    include "../fungsi/fungsi.php";

    if (isset($_GET['aksi']) && isset($_GET['tgl'])) {
        //die($id = $_GET['id']);
        $tgl = $_GET['tgl'];
        echo $tgl;

        if ($_GET['aksi'] == 'detil') {
            header("location:?p=detil&tgl=$tgl");
        } 
    }
    
    $query = mysqli_query($koneksi, "SELECT unit, tgl_permintaan, count(kode_brg)  FROM permintaan WHERE unit= '$_SESSION[username]' AND status=1  GROUP BY tgl_permintaan  ");   
    
?>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12">
             <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Cetak Bukti Pengeluaran Permintaan Barang (BPP)</h3>
                </div>                
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead  > 
                                <tr>
                                    <th>No</th>                                                                                             
                                    <th>Tanggal Permintaan</th>
                                    <th>Jumlah Permintaan</th>                                   
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php 
                                        $no =1 ;
                                        if (mysqli_num_rows($query)) {
                                            while($row=mysqli_fetch_assoc($query)):

                                     ?>
                                        <td> <?= $no; ?> </td>                                      
                                        <td> <?= tanggal_indo($row['tgl_permintaan']); ?> </td>  
                                        <td> <?= $row['count(kode_brg)']; ?> </td>    
                                        <td>        
										<a target="_blank" href="cetakpesanan.php?&tgl=<?= $row['tgl_permintaan']; ?>&unit=<?= $row['unit']; ?>"><span data-placement='top' data-toggle='tooltip' title='Cetak BPP'><button class="btn btn-success"><i class="fa fa-print"> Cetak BPP</i></button></span></a>                  
                                        </td>
								</tr>        
								
                            <?php $no++; endwhile; }else {echo "<tr><td colspan=9>Belum ada BPP yang akan dicetak</td></tr>";} ?>

                            </tbody>
                        </table>
                    </div>                  
                </div>
            </div>
        </div>
    </div>


</section>

