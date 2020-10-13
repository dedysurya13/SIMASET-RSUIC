<?php
include "conf/conn.php";

//'".$_GET['kode_aset']."'

$sql = "SELECT * FROM tb_unit WHERE kode_unit='".$_GET['id']."'";
$sth = $conn->prepare($sql);
$sth->execute();
$row = $sth->fetch(PDO::FETCH_ASSOC);
//print_r($row);
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Ubah Unit</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"> Home</i></a></li>
            <li class="active">Ubah Unit</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-primary">
                    <form role="form" method="post" action="pages/unit/ubah_unit_proses.php">
                        <div class="box-body">
                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                            <div class="form-group">
                            <label for="">Kode Unit</label>
                                <input type="text" name="kode_unit" class="form-control" placeholder="Kode Unit" value="<?php echo $row['kode_unit']; ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group">
                            <label for="">Nama Unit</label>
                                <input type="text" name="nama_unit" class="form-control" placeholder="Nama Unit" value="<?php echo $row['nama_unit']; ?>" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                            <label for="">Penanggung Jawab</label>
                                <input type="text" name="nama_pj" class="form-control" placeholder="Penanggung Jawab" value="<?php echo $row['nama_pj']; ?>" required>
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