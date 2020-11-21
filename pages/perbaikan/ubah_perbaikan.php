<?php
include "conf/conn.php";

$kode_petugas = $_SESSION['kode_petugas'];

//'".$_GET['kode_aset']."'

$sql = "SELECT * FROM tb_perbaikan_aset as pa INNER JOIN tb_status as s ON pa.kode_status = s.kode_status WHERE kode_perbaikan_aset='".$_GET['id']."'";
$sth = $conn->prepare($sql);
$sth->execute();
$row = $sth->fetch(PDO::FETCH_ASSOC);
//print_r($row);
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Ubah Data Perbaikan</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"> Home</i></a></li>
            <li class="active">Ubah Data Perbaikan</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-primary">
                    <form role="form" method="post" action="pages/perbaikan/ubah_perbaikan_proses.php">
                        <div class="box-body">
                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                            <div class="form-group">
                                <label for="">Kode Perbaikan</label>
                                <input type="text" name="kode_perbaikan_aset" class="form-control" placeholder="Kode Perbaikan Aset, ex: fix0001" value="<?php echo $row['kode_perbaikan_aset']; ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Kode Kerusakan</label>
                                <input type="text" name="kode_kerusakan_aset" class="form-control" placeholder="Kode Perbaikan Aset, ex: fix0001" value="<?php echo $row['kode_kerusakan_aset']; ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Diterima</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="tanggal_diterima" class="form-control pull-right" id="datepicker" value="<?php echo substr($row['tanggal_diterima'], 0, 11); ?>" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="bootstrap-timepicker">
                                <div class="form-group">
                                    <label>Jam Diterima</label>
                                    <div class="input-group">
                                        <input type="text" name="jam_diterima" class="form-control timepicker" value="<?php echo $row['jam_diterima']; ?>" autocomplete="off" required>

                                        <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status Perbaikan</label>
                                <?php
                                    $statusQuery = $conn->query("SELECT * FROM tb_status");
                                ?>
                                <select id="kode_status" name="kode_status" class="form-control" required>

                                    <option value="<?php echo $row['kode_status']; ?>"><?php echo $row['nama_status'];?></option>

                                    <?php while ($rowStatus = $statusQuery->fetch(PDO::FETCH_ASSOC)){
                                    extract($rowStatus);
                                    echo "<option value='{$kode_status}'>{$nama_status}</option>";
                                    }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Diterima (Diisi setelah selesai diperbaiki)</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="tanggal_selesai" class="form-control pull-right" id="datepickerSelesai" value="<?php echo substr($row['tanggal_selesai'], 0, 11); ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="bootstrap-timepicker">
                                <div class="form-group">
                                    <label>Jam Diterima (Diisi setelah selesai diperbaiki)</label>
                                    <div class="input-group">
                                        <input type="text" name="jam_selesai" class="form-control timepickerSelesai" value="<?php echo $row['jam_selesai']; ?>" autocomplete="off">

                                        <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Uraian Perbaikan (Diisi setelah selesai diperbaiki)</label>
                                <textarea name="uraian_perbaikan" class="form-control" rows="4" class="pull-right" placeholder="Uraikan perbaikan"  value=""  autocomplete="off"><?php echo $row['uraian_perbaikan']; ?></textarea>
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