<?php
include "../../conf/conn.php";
//'".$_GET['kode_aset']."'

if(isset($_POST['submit_aset'])){
    $kode_aset = $_POST['kode_aset'];

    $sql = "SELECT * FROM tb_aset as a INNER JOIN tb_jenis as j ON a.kode_jenis = j.kode_jenis INNER JOIN tb_unit as u ON a.kode_unit = u.kode_unit INNER JOIN tb_suplier as s ON a.kode_suplier = s.kode_suplier WHERE kode_aset='".$kode_aset."'";

    $sth = $conn->prepare($sql);
    $sth->execute();
    $row = $sth->fetch(PDO::FETCH_ASSOC);
}

function buatRupiah($angka){
    $hasil = "Rp " . number_format($angka,0,'','.');
    return $hasil;
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Informasi Aset</h1>
        <ol class="breadcrumb">
            <li><a href="../../index.php"><i class="fa fa-dashboard"> Home</i></a></li>
            <li class="active">Informasi Aset</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12 no-padding">
                <div class="box-primary">
                    <form role="form" method="post" action="pages/aset/ubah_aset_proses.php">
                        <div class="box-body">
                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="">Kode Aset</label>
                                    <input type="text" name="kode_aset" class="form-control" placeholder="Kode Aset, ex: poli1-0001" value="<?php echo $row['kode_aset']; ?>" autocomplete="off" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="">Nama Aset</label>
                                    <input type="text" name="nama_aset" class="form-control" placeholder="Nama Aset, ex: Printer" value="<?php echo $row['nama_aset']; ?>" autocomplete="off" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="">Merk Aset</label>
                                    <input type="text" name="merk_aset" class="form-control" placeholder="Merk Aset, ex: Epson L310" value="<?php echo $row['merk_aset']; ?>" autocomplete="off" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="">Tahun Aset</label>
                                    <input type="text" name="tahun_aset" class="form-control" placeholder="" value="<?php echo $row['tahun_aset']; ?>" autocomplete="off" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tanggal Input Aset</label>
                                    <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                        <input type="text" name="tanggal_aset" class="form-control pull-right" id="datepicker" value="<?php echo substr($row['tanggal_aset'], 0, 11); ?>" autocomplete="off" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nilai Aset</label>
                                    <input type="text" name="nilai_aset" class="form-control" placeholder="Nilai Aset, ex: 300000" value="<?php echo buatRupiah($row['nilai_aset']); ?>" autocomplete="off" disabled>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="">Spesifikasi Aset</label>
                                <textarea name="spesifikasi_aset" class="form-control" rows="4" class="pull-right" placeholder="Spesifikasi aset"  value=""  autocomplete="off" disabled><?php echo $row['spesifikasi_aset']; ?></textarea>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                            <label for="">Jenis Aset</label>
                                <input type="text" name="nama_jenis" class="form-control" placeholder="Merk Aset, ex: Epson L310" value="<?php echo $row['nama_jenis']; ?>" autocomplete="off" disabled>
                            </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="">Unit</label>
                                    <input type="text" name="nama_unit" class="form-control" placeholder="Merk Aset, ex: Epson L310" value="<?php echo $row['nama_unit']; ?>" autocomplete="off" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="">Suplier</label>
                                    <input type="text" name="nama_suplier" class="form-control" placeholder="Merk Aset, ex: Epson L310" value="<?php echo $row['nama_suplier']; ?>" autocomplete="off" disabled>
                                </div>
                            </div>
                        </div>
                        <!--
                        <div class="box-footer">
                            <button type="submit" name="simpan_data" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                        </div>
                        -->
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>