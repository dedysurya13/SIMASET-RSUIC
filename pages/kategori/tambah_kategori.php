<?php
include "conf/conn.php";

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Tambah Kategori</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Kategori</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form role="form" method="post" action="pages/kategori/tambah_kategori_proses.php">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Nama Kategori</label>
                                <input type="text" name="nama_unit" class="form-control" placeholder="Nama Unit" autocomplete="off" required>
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