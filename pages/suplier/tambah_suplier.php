<?php
include "conf/conn.php";


?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Tambah Suplier</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Suplier</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form role="form" method="post" action="pages/suplier/tambah_suplier_proses.php">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Kode</label>
                                <input type="text" name="kode_suplier" class="form-control" placeholder="Kode Suplier" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Suplier</label>
                                <input type="text" name="nama_suplier" class="form-control" placeholder="Nama Suplier" required>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat_suplier" class="form-control" placeholder="Alamat Suplier" required>
                            </div>
                            <div class="form-group">
                                <label for="">Telepon</label>
                                <input type="number" name="telp_suplier" class="form-control" placeholder="Telepon Suplier" required>
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