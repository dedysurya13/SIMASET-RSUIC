<?php
include "conf/conn.php";

//'".$_GET['kode_aset']."'

$sql = "SELECT * FROM aset_jenis WHERE kode_jenis='".$_GET['id']."'";
$sth = $conn->prepare($sql);
$sth->execute();
$row = $sth->fetch(PDO::FETCH_ASSOC);
//print_r($row);
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Ubah Jenis Aset</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"> Home</i></a></li>
            <li class="active">Ubah Jenis Aset</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-primary">
                    <form role="form" method="post" action="pages/jenis_aset/ubah_jenis_proses.php">
                        <div class="box-body">
                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                            <div class="form-group">
                            <label for="">Kode</label>
                                <input type="text" name="kode_jenis" class="form-control" placeholder="Kode Jenis Aset" value="<?php echo $row['kode_jenis']; ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group">
                            <label for="">Jenis Aset</label>
                                <input type="text" name="nama_jenis" class="form-control" placeholder="Nama Jenis Aset" value="<?php echo $row['nama_jenis']; ?>" autocomplete="off" required>
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