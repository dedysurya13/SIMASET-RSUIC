<?php
include "conf/conn.php";

$kode_petugas = $_SESSION['kode_petugas'];

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Tambah Pemeriksaan</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Pemeriksaan</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form role="form" method="post" action="pages/pemeriksaan/tambah_pemeriksaan_proses.php">
                        <div class="box-body">
                            <input type="hidden" name="kode_pemeriksaan_aset" value="<?php echo $_GET['id'] ?>">
                            <div class="form-group">
                                <label>Kode Aset</label>
                                <?php
                                    $asetQuery = $conn->query("SELECT * FROM aset_data ORDER BY kode_aset ASC");
                                ?>
                                <select id="kode_aset" name="kode_aset" class="form-control">

                                    <option value=''>- Kode Aset -</option>

                                    <?php while ($row = $asetQuery->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
                                    echo "<option value='{$kode_aset}'>{$kode_aset}</option>";
                                    }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pemeriksaan Aset</label>
                                <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="tanggal_pemeriksaan_aset" class="form-control pull-right" id="datepicker" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Status Pemeriksaan Aset</label>
                                <select name="status_pemeriksaan_aset" class="form-control" id="">
                                    <option value="">- Pilih Status -</option>
                                    <option value="Baik">Baik</option>
                                    <option value="Rusak">Rusak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Hasil Pemeriksaan Aset</label>
                                <textarea name="hasil_pemeriksaan_aset" class="form-control" rows="4" class="pull-right" placeholder="Deskripsikan kondisi aset" autocomplete="off" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="kode_petugas" class="form-control" placeholder="" value="<?php echo $kode_petugas;?>" autocomplete="off" >
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