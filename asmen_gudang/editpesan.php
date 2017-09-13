<?php  

	include "../fungsi/koneksi.php";
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = mysqli_query($koneksi, "SELECT permintaan.id_permintaan, permintaan.tgl_permintaan,permintaan.status, permintaan.kode_brg, unit, permintaan.jumlah, stokbarang.nama_brg FROM permintaan INNER JOIN stokbarang ON permintaan.kode_brg=stokbarang.kode_brg WHERE id_permintaan = $id ");
		if (mysqli_num_rows($query)) {
			$row2=mysqli_fetch_assoc($query);
        }
    }
?>

<section class="content">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Edit Data Permintaan Barang</h3>
                </div>
                <form method="post"  action="edit_proses.php" class="form-horizontal">
                    <div class="box-body">
                    	<input type="hidden" name="id" value="<?= $row2['id_permintaan']; ?>">
                    	<input type="hidden" name="tgl_permintaan" value="<?= $row2['tgl_permintaan']; ?>">                    	
                        <div class="form-group ">
                            <label for="nama_brg" class="col-sm-offset-1 col-sm-3 control-label">Unit Pelayanan</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="<?= $row2['unit']; ?>" readonly name="unit">
                            </div>
                        </div>                         
                        <div class="form-group">
                            <label for="nama_brg" class="col-sm-offset-1 col-sm-3 control-label">Nama Barang</label>
                            
                            <div class="col-sm-4">
                            	<input class="form-control" type="text" name="nama_brg" value="<?= $row2['nama_brg']; ?>" readonly>
                                
                            </div>
                        </div>                                                                                                                                                                   
                         <div class="form-group">
                            <label for="jumlah" class="col-sm-offset-1 col-sm-3 control-label">Jumlah</label>
                            <div class="col-sm-2">
                                <input type="number" value="<?= $row2['jumlah'] ?>"class="form-control" name="jumlah">
                            </div>
                        </div>                        
                        <div class="form-group">
                            <input type="submit" name="update" class="btn btn-primary col-sm-offset-4 " value="Update" > 
                            &nbsp;
                            <input type="reset" class="btn btn-danger" value="Batal">				                                                                              
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>