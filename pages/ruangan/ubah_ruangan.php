<?php
include "conf/conn.php";

//'".$_GET['kode_aset']."'

$sql = "SELECT * FROM aset_ruangan as ar RIGHT JOIN aset_unit as au ON ar.kode_unit = au.kode_unit WHERE ar.kode_ruangan='".$_GET['id']."'";
$sth = $conn->prepare($sql);
$sth->execute();
$row = $sth->fetch(PDO::FETCH_ASSOC);
//print_r($row);
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Ubah Ruangan</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"> Home</i></a></li>
            <li class="active">Ubah Ruangan</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-primary">
                    <form role="form" method="post" action="pages/ruangan/ubah_ruangan_proses.php">
                        <div class="box-body">
                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                            <div class="form-group">
                            <label for="">Kode Ruangan</label>
                                <input type="text" name="kode_ruangan" class="form-control" placeholder="Kode Ruangan" value="<?php echo $row['kode_ruangan']; ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group">
                                <label>Nama Unit</label>
                                <?php
                                    $unitQuery = $conn->query("SELECT * FROM aset_unit ORDER BY nama_unit ASC");
                                ?>
                                <select id="kode_unit" name="kode_unit" class="form-control unit_ruangan" required onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>

                                    <option value='<?php echo $row['kode_unit']; ?>'><?php echo $row['nama_unit']; ?></option>
                                    
                                    <?php while ($rowUnit = $unitQuery->fetch(PDO::FETCH_ASSOC)){
                                    extract($rowUnit);
                                    echo "<option value='{$kode_unit}'>{$nama_unit}</option>";
                                    }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Ruangan</label>
                                <input type="text" name="nama_ruangan" class="form-control" placeholder="Nama Ruangan" value="<?php echo $row['nama_ruangan']; ?>" autocomplete="off" required>
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