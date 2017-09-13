<?php  
    include "../fungsi/koneksi.php";
    include "../fungsi/fungsi.php";
       
    $query = mysqli_query($koneksi, "SELECT distinct(unit), tgl_permintaan FROM permintaan");  
    
?>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12">
             <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Data Permintaan Material Teknik</h3>
                </div>                
                
                    <div class="table-responsive">
                        <table id="datapesanan" class="table text-center">
                            <thead  > 
                                <tr>
                                    <th>No</th> 
                                    <th>Unit Pelayanan</th>
                                    <th>Tanggal Permintaan</th>
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
                                        <td> <?= $row['unit']; ?> </td>
                                        <td> <?= tanggal_indo($row['tgl_permintaan']); ?> </td>                                        
                                        <td>                                                                                                                                                                                                          
											<a href="?p=detil&unit=<?= $row['unit'];?>&tgl=<?= $row['tgl_permintaan']; ?>"><span data-placement='top' data-toggle='tooltip' title='Detail Permintaan'><button class="btn btn-info">Detail</button></span></a>                  
                                        </td>                                                                                            
                            </tr>
                            <?php $no++; endwhile; }else {echo "<tr><td colspan=9>Belum ada permintaan material teknik hari ini</td></tr>";} ?>
                            </tbody>
                        </table>
                    </div>                  
                </div>
            </div>
        </div>
    </div>


</section>

    
