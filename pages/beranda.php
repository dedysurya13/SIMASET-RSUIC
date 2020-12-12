<?php
    include "/../conf/conn.php";

    $maxAset = $conn->query("SELECT COUNT(kode_aset) FROM tb_aset");
    $maxAset->execute();
    $maxAset = $maxAset->fetchColumn();

    /*
        ->fetch atau ->fetch(PDO::FETCH_ASSOC) akan berupa array
        manggil = <?php print_r($maxAset[0]) ?>

        ->fetchColumn(); akan berupa string
        manggil = <?php echo $maxAset ?>
    */

    $maxUnit = $conn->query("SELECT COUNT(kode_unit) FROM tb_unit");
    $maxUnit->execute();
    $maxUnit = $maxUnit->fetchColumn();
    
    $maxJenis = $conn->query("SELECT COUNT(kode_jenis) FROM tb_jenis");
    $maxJenis->execute();
    $maxJenis = $maxJenis->fetchColumn();

    $maxSuplier = $conn->query("SELECT COUNT(kode_suplier) FROM tb_suplier");
    $maxSuplier->execute();
    $maxSuplier = $maxSuplier->fetchColumn();
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Beranda <small>Halaman Admin</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> HOME</a></li>
            <li class="active">BERANDA</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $maxAset ?></h3>
                        <p>Aset</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-list"></i>
                    </div>
                    <a href="index.php?page=data_aset" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $maxUnit ?></h3>
                        <p>Unit</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-home"></i>
                    </div>
                    <a href="index.php?page=data_unit" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $maxJenis ?></h3>
                        <p>Jenis Aset</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-pricetags"></i>
                    </div>
                    <a href="index.php?page=data_jenis" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $maxSuplier ?></h3>
                        <p>Suplier</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-cart"></i>
                    </div>
                    <a href="index.php?page=data_suplier" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </section>
</div>