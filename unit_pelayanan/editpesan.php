<?php  

	include "../fungsi/koneksi.php";
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE id = $id ");
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
                    <h3 class="text-center">Edit Data Pemesanan</h3>
                </div>
                <form method="post"  action="edit_proses.php" class="form-horizontal">
                    <div class="box-body">
                    	<input type="hidden" name="id" value="<?= $row2['id']; ?>">
                        <div class="form-group ">
                            <label for="nama_brg" class="col-sm-offset-1 col-sm-3 control-label">Unit Pelayanan</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="<?= $row2['unit']; ?>" name="unit">
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
                                        while($row=mysqli_fetch_assoc($queryJenis)):
                                    ?>                                        
                                        <option <?php if($row2['id_jenis'] == $row['id_jenis']) echo "selected" ?>  value="<?= $row['id_jenis']; ?>"><?= $row['jenis_brg']; ?></option>
                                    <?php endwhile; } ?>                                      
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_brg" class="col-sm-offset-1 col-sm-3 control-label">Nama Barang</label>
                            <div class="col-sm-4">
                                <select id="nama_brg" required="isikan dulu" class="form-control" name="nama_brg">
                                <option value="">--Pilih Barang--</option>
                                <?php  
                                    
                                    $queryBarang = mysqli_query($koneksi, "select * from stokbarang");
                                    if (mysqli_num_rows($queryBarang)) {
                                        while($row=mysqli_fetch_assoc($queryBarang)):
                                    ?>                                        
                                        <option <?php if($row2['kode_brg'] == $row['kode_brg']) echo "selected" ?> value="<?= $row2['kode_brg']; ?>"><?= $row['nama_brg']; ?></option>
                                    <?php endwhile; } ?>                                      
                                </select>
                            </div>
                        </div>
                                                    
                            
                                <input id="kode_brg" type="hidden" value="<?= $row2['kode_brg'] ?>"class="form-control" name="kode_brg">
                            
                        
                         <div class="form-group">
                            <label for="jumlah" class="col-sm-offset-1 col-sm-3 control-label">Jumlah</label>
                            <div class="col-sm-2">
                                <input type="text" value="<?= $row2['jumlah'] ?>"class="form-control" name="jumlah">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="col-sm-offset-1 col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-4">
                                <textarea cols=40 rows=3 name="keterangan"><?= $row2['keterangan']; ?></textarea>
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

<script>
    $(document).ready(function(){
        $("#jenis_brg").change(function(){
            var jenis = $(this).val();
            var dataString = 'jenis='+jenis;
            $.ajax({
                type:"POST",
                url:"getdata.php",
                data:dataString,
                success:function(html){
                    $("#nama_brg").html(html);                    
                }
            });
        });    

        $("#nama_brg").change(function(){
            var kode = $(this).val();
            var dataString = 'kode='+kode;
            $.ajax({
                type:"POST",
                url:"getkode2.php",
                data:dataString,
                success:function(html){
                    $("#kode_brg").val(html);        
                }
            });
        });
    });
</script>