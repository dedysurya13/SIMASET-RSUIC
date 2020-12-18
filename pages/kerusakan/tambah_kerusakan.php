<?php
include "conf/conn.php";

$kode_petugas = $_SESSION['kode_petugas'];

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Tambah Data Kerusakan</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Data Kerusakan</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form role="form" method="post" action="pages/kerusakan/tambah_kerusakan_proses.php">
                        <div class="box-body">
                                <input type="hidden" name="kode_kerusakan_aset" value="<?php echo $_GET['id'] ?>">
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
                                <label>Tanggal Lapor</label>
                                <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="tanggal_lapor" class="form-control pull-right" id="datepicker" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="bootstrap-timepicker">
                                <div class="form-group">
                                    <label>Jam Lapor</label>
                                    <div class="input-group">
                                        <input type="text" name="jam_lapor" class="form-control timepicker" autocomplete="off">

                                        <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Uraian Kerusakan Aset</label>
                                <textarea name="uraian_kerusakan" class="form-control" rows="4" class="pull-right" placeholder="Uraikan kerusakan aset" autocomplete="off" required></textarea>
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