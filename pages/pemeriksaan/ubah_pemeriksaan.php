<?php
include "conf/conn.php";

$kode_petugas = $_SESSION['kode_petugas'];

//'".$_GET['kode_aset']."'

$sql = "SELECT * FROM tb_pemeriksaan_aset WHERE kode_pemeriksaan_aset='".$_GET['id']."'";
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
                    <form role="form" method="post" action="pages/pemeriksaan/ubah_pemeriksaan_proses.php">
                        <div class="box-body">
                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                            <div class="form-group">
                                <label for="">Kode Pemeriksaan</label>
                                <input type="text" name="kode_pemeriksaan_aset" class="form-control" placeholder="Kode Pemeriksaan Aset" value="<?php echo $row['kode_pemeriksaan_aset']; ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Kode Aset</label>
                                <input type="text" name="kode_aset" class="form-control" placeholder="Kode Aset, ex: poli1-0001" value="<?php echo $row['kode_aset']; ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pemeriksaan Aset</label>
                                <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                    <input type="text" name="tanggal_pemeriksaan_aset" class="form-control pull-right" id="datepicker" value="<?php echo substr($row['tanggal_pemeriksaan_aset'], 0, 11); ?>" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Status Pemeriksaan Aset</label>
                                <select name="status_pemeriksaan_aset" class="form-control" id="">
                                    <option value="<?php echo $row['status_pemeriksaan_aset']; ?>"><?php echo $row['status_pemeriksaan_aset'];?></option>
                                    <option value="Baik">Baik</option>
                                    <option value="Rusak">Rusak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Hasil Pemeriksaan Aset</label>
                                <textarea name="hasil_pemeriksaan_aset" class="form-control" rows="4" class="pull-right" placeholder="Deskripsikan kondisi aset"  value=""  autocomplete="off" required><?php echo $row['hasil_pemeriksaan_aset']; ?></textarea>
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