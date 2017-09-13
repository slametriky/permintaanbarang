<?php  

    include "../fungsi/koneksi.php";
    $query = mysqli_query($koneksi, "SELECT MAX(kode_brg) from stokbarang");
    $kode_brg = mysqli_fetch_array($query);    
    if ($kode_brg) {
            
            $nilaikode = substr($kode_brg[0], 2);
            
            $kode = (int) $nilaikode;

            //setiap kode ditambah 1
            $kode = $kode + 1;
            $kode_otomatis = "BR".str_pad($kode, 3, "0", STR_PAD_LEFT);                   
            
        
    } else {
         $kode_otomatis = "BR001";
    }

?>

<section class="content">
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Tambah Data Stok Material Teknik</h3>
                </div>
                <form method="post"  action="add-proses.php" class="form-horizontal">
                    <div class="box-body">
						<div class="form-group">
                            <label for="jumlah" class="col-sm-offset-1 col-sm-3 control-label">Tanggal Masuk</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control tanggal" name="tgl_masuk">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="nama_brg" class="col-sm-offset-1 col-sm-3 control-label">Kode Barang</label>
                            <div class="col-sm-4">
                                <input type="text" value="<?= $kode_otomatis; ?>" class="form-control" name="kode_brg" readonly>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="jenis_brg" class="col-sm-offset-1 col-sm-3 control-label">Jenis Material Teknik</label>
                            <div class="col-sm-4">
                                <select id="jenis_brg" required="isikan dulu" class="form-control" name="id_jenis">
                                <option value="">--Pilih Jenis Material Teknik--</option>
                                <?php  
                                    
                                    $queryJenis = mysqli_query($koneksi, "select * from jenis_barang");
                                    if (mysqli_num_rows($queryJenis)) {
                                        while($row=mysqli_fetch_assoc($queryJenis)):
                                    ?>                                        
                                        <option value="<?= $row['id_jenis']; ?>"><?= $row['jenis_brg']; ?></option>
                                    <?php endwhile; } ?>                                      
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label id="tes"for="nama_brg" class="col-sm-offset-1 col-sm-3 control-label">Nama Material Teknik</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="nama_brg">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="jumlah" class="col-sm-offset-1 col-sm-3 control-label">Satuan</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="satuan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jumlah" class="col-sm-offset-1 col-sm-3 control-label">Jumlah</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="jumlah">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="suplier" class="col-sm-offset-1 col-sm-3 control-label">Nama Suplier</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="suplier">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="simpan" class="btn btn-primary col-sm-offset-4 " value="Simpan" > 
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
        $('.tanggal').datepicker({
            format:"yyyy-mm-dd",
            autoclose:true
        });
    });
</script>