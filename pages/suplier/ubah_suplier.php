<?php
include "conf/conn.php";

//'".$_GET['kode_aset']."'

$sql = "SELECT * FROM tb_suplier WHERE kode_suplier='".$_GET['id']."'";
$sth = $conn->prepare($sql);
$sth->execute();
$row = $sth->fetch(PDO::FETCH_ASSOC);
//print_r($row);
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Ubah Suplier</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"> Home</i></a></li>
            <li class="active">Ubah Suplier</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-primary">
                    <form role="form" method="post" action="pages/suplier/ubah_suplier_proses.php">
                        <div class="box-body">
                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                            <div class="form-group">
                                <label for="">Kode</label>
                                <input type="text" name="kode_suplier" class="form-control" placeholder="Kode Suplier" value="<?php echo $row['kode_suplier']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Suplier</label>
                                <input type="text" name="nama_suplier" class="form-control" placeholder="Nama Suplier" value="<?php echo $row['nama_suplier']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat_suplier" class="form-control" placeholder="Alamat Suplier" value="<?php echo $row['alamat_suplier']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Telepon</label>
                                <input type="text" name="telp_suplier" class="form-control" placeholder="Telepon" value="<?php echo $row['telp_suplier']; ?>" required>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="simpan_data" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>