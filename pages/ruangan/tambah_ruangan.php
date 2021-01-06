<?php
include "conf/conn.php";

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Tambah Ruangan</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Unit</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form role="form" method="post" action="pages/ruangan/tambah_ruangan_proses.php">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nama Unit</label>
                                <?php
                                    $unitQuery = $conn->query("SELECT * FROM aset_unit ORDER BY nama_unit ASC");
                                ?>
                                <select id="kode_unit" name="kode_unit" class="form-control unit_ruangan" required onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>

                                    <option value=''>- Nama Unit -</option>
                                    
                                    <?php while ($row = $unitQuery->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
                                    echo "<option value='{$kode_unit}'>{$nama_unit}</option>";
                                    }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Ruangan</label>
                                <input type="text" name="nama_ruangan" class="form-control" placeholder="Nama Ruangan" autocomplete="off" required>
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