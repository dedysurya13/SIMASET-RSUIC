<?php
include "conf/conn.php";

$kode_petugas = $_SESSION['kode_petugas'];

//'".$_GET['kode_aset']."'

$sql = "SELECT * FROM aset_kerusakan_aset WHERE kode_kerusakan_aset='".$_GET['id']."'";
$sth = $conn->prepare($sql);
$sth->execute();
$row = $sth->fetch(PDO::FETCH_ASSOC);
//print_r($row);
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Ubah Data Kerusakan</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"> Home</i></a></li>
            <li class="active">Ubah Data Kerusakan</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-primary">
                    <form role="form" method="post" action="pages/kerusakan/ubah_kerusakan_proses.php">
                        <div class="box-body">
                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                            <div class="form-group">
                                <label for="">Kode Kerusakan</label>
                                <input type="text" name="kode_kerusakan_aset" class="form-control" placeholder="Kode Pemeriksaan Aset" value="<?php echo $row['kode_kerusakan_aset']; ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Kode Aset</label>
                                <input type="text" name="kode_aset" class="form-control" placeholder="Kode Aset, ex: poli1-0001" value="<?php echo $row['kode_aset']; ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lapor</label>
                                <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                    <input type="text" name="tanggal_lapor" class="form-control pull-right" id="datepicker" value="<?php echo substr($row['tanggal_lapor'], 0, 11); ?>" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="bootstrap-timepicker">
                                <div class="form-group">
                                    <label>Jam Lapor</label>
                                    <div class="input-group">
                                        <input type="text" name="jam_lapor" class="form-control timepicker" value="<?php echo $row['jam_lapor']; ?>" autocomplete="off">

                                        <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Uaraian Kerusakan Aset</label>
                                <textarea name="uraian_kerusakan" class="form-control" rows="4" class="pull-right" placeholder="Uraikan kerusakan aset"  value=""  autocomplete="off" required><?php echo $row['uraian_kerusakan']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="kode_petugas" class="form-control" placeholder="" value="<?php echo $kode_petugas;?>" autocomplete="off" >
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