<?php
include "conf/conn.php";

$kode_petugas = $_SESSION['kode_petugas'];

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Tambah Data Perbaikan</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Data Perbaikan</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form role="form" method="post" action="pages/perbaikan/tambah_perbaikan_proses.php">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Kode Perbaikan</label>
                                <input type="text" name="kode_perbaikan_aset" class="form-control" placeholder="Kode Perbaikan Aset, ex: fix0001" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label>Kode Kerusakan</label>
                                <?php
                                    $asetQuery = $conn->query("SELECT * FROM tb_kerusakan_aset ORDER BY kode_kerusakan_aset ASC");
                                ?>
                                <select id="kode_kerusakan_aset" name="kode_kerusakan_aset" class="form-control" autocomplete="off" required>

                                    <option value=''>- Kode Kerusakan -</option>

                                    <?php while ($row = $asetQuery->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
                                    echo "<option value='{$kode_kerusakan_aset}'>{$kode_kerusakan_aset}</option>";
                                    }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Diterima</label>
                                <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="tanggal_diterima" class="form-control pull-right" id="datepicker" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="bootstrap-timepicker">
                                <div class="form-group">
                                    <label>Jam Diterima</label>
                                    <div class="input-group">
                                        <input type="text" name="jam_diterima" class="form-control timepicker" autocomplete="off" required>

                                        <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status Perbaikan</label>
                                <?php
                                    $asetQuery = $conn->query("SELECT * FROM tb_status ORDER BY kode_status ASC");
                                ?>
                                <select id="kode_status" name="kode_status" class="form-control" required>

                                    <option value=''>- Status Perbaikan -</option>

                                    <?php while ($row = $asetQuery->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
                                    echo "<option value='{$kode_status}'>{$nama_status}</option>";
                                    }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Selesai (Diisi setelah selesai diperbaiki)</label>
                                <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="tanggal_selesai" class="form-control pull-right" id="datepicker_selesai" autocomplete="off">
                                </div>
                            </div>
                            <div class="bootstrap-timepicker">
                                <div class="form-group">
                                    <label>Jam Selesai (Diisi setelah selesai diperbaiki)</label>
                                    <div class="input-group">
                                        <input type="text" name="jam_selesai" class="form-control timepicker_selesai" autocomplete="off">

                                        <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Uraian Perbaikan (Diisi setelah selesai diperbaiki)</label>
                                <textarea name="uraian_perbaikan" class="form-control" rows="4" class="pull-right" placeholder="Uraikan kerusakan aset" autocomplete="off"></textarea>
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