<?php  

	include "../fungsi/koneksi.php";


	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = mysqli_query($koneksi, "SELECT * FROM stokbarang WHERE kode_brg = '$id' ");
		if (mysqli_num_rows($query)) {
			while($row2 = mysqli_fetch_assoc($query)):

?>

<section class="content">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Update Data Stok Material Teknik</h3>
                </div>
                <form method="post"  action="edit_proses.php" class="form-horizontal">
                    <div class="box-body">
                    	<input type="hidden" name="id" value="<?= $row2['id_brg']; ?>">
						<div class="form-group">
                            <label for="jumlah" class="col-sm-offset-1 col-sm-3 control-label">Tanggal Masuk</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control tanggal" value="<?= $row2['tgl_masuk']; ?>" name="tgl_masuk">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="kode_brg" class="col-sm-offset-1 col-sm-3 control-label">Kode Barang</label>
                            <div class="col-sm-4">
                                <input type="text" readonly  value="<?= $row2['kode_brg']; ?>" class="form-control" name="kode_brg">
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="jenis_brg" class="col-sm-offset-1 col-sm-3 control-label">Jenis Material</label>
                            <div class="col-sm-4">
                                <select id="jenis_brg" required="isikan dulu" class="form-control" name="id_jenis">
                                <option value="">--Pilih Jenis Material--</option>
                                <?php  
                                    
                                    $queryJenis = mysqli_query($koneksi, "select * from jenis_barang");
                                    if (mysqli_num_rows($queryJenis)) {
                                        $selected = "";
                                        while($row=mysqli_fetch_assoc($queryJenis)):
                                           
                                    ?>                                        
                                        <option <?php if($row2['id_jenis']==$row['id_jenis']) echo "selected"; ?>  value="<?= $row['id_jenis']; ?>"><?= $row['jenis_brg']; ?></option>
                                    <?php endwhile; } ?>                                      
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label id="tes"for="nama_brg" class="col-sm-offset-1 col-sm-3 control-label">Nama Material</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="<?= $row2['nama_brg']; ?>" name="nama_brg">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="jumlah" class="col-sm-offset-1 col-sm-3 control-label">Satuan</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="<?= $row2['satuan']; ?>" name="satuan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jumlah" class="col-sm-offset-1 col-sm-3 control-label">Jumlah</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" value="<?= $row2['stok']; ?>" name="jumlah">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="update" class="btn btn-primary col-sm-offset-4 " value="Simpan" > 
                            &nbsp;
                            <input type="reset" class="btn btn-danger" value="Batal">                                                                              
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php endwhile; } }  ?>

<script>
    $(document).ready(function(){
        $('.tanggal').datepicker({
            format:"yyyy-mm-dd",
            autoclose:true
        });
    });
</script>