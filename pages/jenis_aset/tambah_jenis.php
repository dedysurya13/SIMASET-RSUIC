<?php
include "conf/conn.php";


?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Tambah Unit</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Unit</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form role="form" method="post" action="pages/unit/tambah_unit_proses.php">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Kode Unit</label>
                                <input type="text" name="kode_unit" class="form-control" placeholder="Kode Unit" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Unit</label>
                                <input type="text" name="nama_unit" class="form-control" placeholder="Nama Unit" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Penanggung Jawab</label>
                                <input type="text" name="nama_pj" class="form-control" placeholder="Penanggung Jawab" required>
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