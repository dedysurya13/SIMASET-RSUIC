<?php
include "conf/conn.php";

//'".$_GET['kode_aset']."'

$sql = "SELECT * FROM aset_data as a INNER JOIN aset_jenis as j ON a.kode_jenis = j.kode_jenis INNER JOIN aset_unit as u ON a.kode_unit = u.kode_unit INNER JOIN aset_suplier as s ON a.kode_suplier = s.kode_suplier INNER JOIN aset_kategori_aset as kat ON a.kode_kategori = kat.kode_kategori WHERE kode_aset='".$_GET['id']."'";
$sth = $conn->prepare($sql);
$sth->execute();
$row = $sth->fetch(PDO::FETCH_ASSOC);
//print_r($row);
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Ubah Aset</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"> Home</i></a></li>
            <li class="active">Ubah Aset</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-primary">
                    <form role="form" method="post" action="pages/aset/ubah_aset_proses.php">
                        <div class="box-body">
                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                            <div class="form-group">
                            <label for="">Kode Aset</label>
                                <input type="text" name="kode_aset" class="form-control" placeholder="Kode Aset, ex: poli1-0001" value="<?php echo $row['kode_aset']; ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group">
                                <label>Kategori Aset</label>
                                <?php
                                    $kategoriQuery = $conn->query("SELECT * FROM aset_kategori_aset ORDER BY nama_kategori ASC");
                                ?>
                                <select id="kode_kategori" name="kode_kategori" class="form-control" id="" required>

                                    <option value="<?php echo $row['kode_kategori']; ?>"><?php echo $row['nama_kategori'];?></option>

                                    <?php while ($rowKategori = $kategoriQuery->fetch(PDO::FETCH_ASSOC)){
                                    extract($rowKategori);
                                    echo "<option value='{$kode_kategori}'>{$nama_kategori}</option>";
                                    }?>
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="">Merk Aset</label>
                                <input type="text" name="merk_aset" class="form-control" placeholder="Merk Aset, ex: Epson L310" value="<?php echo $row['merk_aset']; ?>" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="">Tahun Aset</label>
                                <select name="tahun_aset" class="form-control" id="">
                                    <option value="<?php echo $row['tahun_aset']; ?>"><?php echo $row['tahun_aset'];?></option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nilai Aset</label>
                                <input type="text" name="nilai_aset" class="form-control" placeholder="Nilai Aset, ex: 300000" value="<?php echo $row['nilai_aset']; ?>" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Aset</label>
                                <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                    <input type="text" name="tanggal_aset" class="form-control pull-right" id="datepicker" value="<?php echo substr($row['tanggal_aset'], 0, 11); ?>" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Spesifikasi Aset</label>
                                <textarea name="spesifikasi_aset" class="form-control" rows="4" class="pull-right" placeholder="Spesifikasi aset"  value=""  autocomplete="off" required><?php echo $row['spesifikasi_aset']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Jenis Aset</label>
                                <?php
                                    $jenisQuery = $conn->query("SELECT * FROM aset_jenis");
                                ?>
                                <select id="jenis_aset" name="jenis_aset" class="form-control" id="">

                                    <option value="<?php echo $row['kode_jenis']; ?>"><?php echo $row['nama_jenis'];?></option>

                                    <?php while ($rowJenis = $jenisQuery->fetch(PDO::FETCH_ASSOC)){
                                    extract($rowJenis);
                                    echo "<option value='{$kode_jenis}'>{$nama_jenis}</option>";
                                    }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Unit</label>
                                <?php
                                    $unitQuery = $conn->query("SELECT * FROM aset_unit");
                                ?>
                                <select id="nama_unit" name="nama_unit" class="form-control" id="">

                                    <option value="<?php echo $row['kode_unit']; ?>"><?php echo $row['nama_unit'];?></option>

                                    <?php while ($rowUnit = $unitQuery->fetch(PDO::FETCH_ASSOC)){
                                    extract($rowUnit);
                                    echo "<option value='{$kode_unit}'>{$nama_unit}</option>";
                                    }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Suplier</label>
                                <?php
                                    $suplierQuery = $conn->query("SELECT * FROM aset_suplier");
                                ?>
                                <select id="nama_suplier" name="nama_suplier" class="form-control" id="">

                                    <option value="<?php echo $row['kode_suplier']; ?>"><?php echo $row['nama_suplier'];?></option>

                                    <?php while ($rowSuplier = $suplierQuery->fetch(PDO::FETCH_ASSOC)){
                                    extract($rowSuplier);
                                    echo "<option value='{$kode_suplier}'>{$nama_suplier}</option>";
                                    }?>
                                </select>
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