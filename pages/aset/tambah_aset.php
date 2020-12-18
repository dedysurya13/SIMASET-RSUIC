<?php
include "conf/conn.php";


?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Tambah Aset</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Aset</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form role="form" method="post" action="pages/aset/tambah_aset_proses.php">
                        <div class="box-body">
                            <input type="hidden" name="kode_aset" value="<?php echo $_GET['id'] ?>">
                            <div class="form-group">
                                <label for="">Nama Aset</label>
                                <input type="text" name="nama_aset" class="form-control" placeholder="Nama Aset, ex,: Printer" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="">Merk Aset</label>
                                <input type="text" name="merk_aset" class="form-control" placeholder="Merk Aset, ex: Epson L310" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="">Tahun Aset</label>
                                <select name="tahun_aset" class="form-control" id="">
                                    <option value="">- Pilih Tahun -</option>
                                    <option value="2015">2011</option>
                                    <option value="2015">2012</option>
                                    <option value="2015">2013</option>
                                    <option value="2015">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nilai Aset</label>
                                <input type="text" name="nilai_aset" class="form-control" placeholder="Nilai Aset, ex: 300000" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Input Aset</label>
                                <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="tanggal_aset" class="form-control pull-right" id="datepicker" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Spesifikasi Aset</label>
                                <textarea name="spesifikasi_aset" class="form-control" rows="4" class="pull-right" placeholder="Spesifikasi aset / Serial Number / Warna / Ciri" autocomplete="off" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Jenis Aset</label>
                                <?php
                                    $jenisQuery = $conn->query("SELECT * FROM aset_jenis ORDER BY nama_jenis ASC");
                                ?>
                                <select id="jenis_aset" name="jenis_aset" class="form-control" id="">

                                    <option value=''>- Jenis Aset -</option>

                                    <?php while ($row = $jenisQuery->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
                                    echo "<option value='{$kode_jenis}'>{$nama_jenis}</option>";
                                    }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Unit</label>
                                <?php
                                    $unitQuery = $conn->query("SELECT * FROM aset_unit ORDER BY nama_unit ASC");
                                ?>
                                <select id="nama_unit" name="nama_unit" class="form-control" id="">

                                    <option value=''>- Nama Unit -</option>

                                    <?php while ($row = $unitQuery->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
                                    echo "<option value='{$kode_unit}'>{$nama_unit}</option>";
                                    }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Suplier</label>
                                <?php
                                    $suplierQuery = $conn->query("SELECT * FROM aset_suplier ORDER BY nama_suplier ASC");
                                ?>
                                <select id="nama_suplier" name="nama_suplier" class="form-control" id="">

                                    <option value=''>- Nama Suplier -</option>

                                    <?php while ($row = $suplierQuery->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
                                    echo "<option value='{$kode_suplier}'>{$nama_suplier}</option>";
                                    }?>
                                </select>
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