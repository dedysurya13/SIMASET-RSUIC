<?php
include "conf/conn.php";

//'".$_GET['kode_aset']."'

$sql = "SELECT * FROM aset_kategori_aset WHERE kode_kategori='".$_GET['id']."'";
$sth = $conn->prepare($sql);
$sth->execute();
$row = $sth->fetch(PDO::FETCH_ASSOC);
//print_r($row);
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Ubah Kategori</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"> Home</i></a></li>
            <li class="active">Ubah Kategori</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-primary">
                    <form role="form" method="post" action="pages/kategori/ubah_kategori_proses.php">
                        <div class="box-body">
                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                            <div class="form-group">
                            <label for="">Kode Kategori</label>
                                <input type="text" name="kode_kategori" class="form-control" placeholder="Kode Kategori" value="<?php echo $row['kode_kategori']; ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group">
                            <label for="">Nama Kategori</label>
                                <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" value="<?php echo $row['nama_kategori']; ?>" autocomplete="off" required>
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