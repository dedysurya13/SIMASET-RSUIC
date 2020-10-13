<?php
include "conf/conn.php";

if($_SESSION['kode_role']==1){
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Tambah Petugas</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Petugas</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form role="form" method="post" action="pages/petugas/tambah_petugas_proses.php">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Kode Petugas</label>
                                <input type="text" name="kode_petugas" class="form-control" placeholder="Kode Petugas" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="">Username </label>
                                <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" name="password" class="form-control" placeholder="Password" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Petugas</label>
                                <input type="text" name="nama_petugas" class="form-control" placeholder="Nama Petugas" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="">Telepon</label>
                                <input type="number" name="telp_petugas" class="form-control" placeholder="Telepon Petugas" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label>Role Petugas</label>
                                <?php
                                    $roleQuery = $conn->query("SELECT * FROM tb_role_petugas");
                                ?>
                                <select id="kode_role" name="kode_role" class="form-control" id="">

                                    <option value=''>- Pilih Role -</option>

                                    <?php while ($row = $roleQuery->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
                                    echo "<option value='{$kode_role}'>{$nama_role}</option>";
                                    }?>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="simpan_data" class="btn btn-primary" title="Simpan Data"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php }else{?>
    <script>window.location.href="index.php?page=401"</script> 
<?php } ?>