<?php
    include "/../conf/conn.php";

    $maxAset = $conn->query("SELECT COUNT(kode_aset) FROM aset_data");
    $maxAset->execute();
    $maxAset = $maxAset->fetchColumn();

    /*
        ->fetch atau ->fetch(PDO::FETCH_ASSOC) akan berupa array
        manggil = <?php print_r($maxAset[0]) ?>

        ->fetchColumn(); akan berupa string
        manggil = <?php echo $maxAset ?>
    */

    $maxUnit = $conn->query("SELECT COUNT(kode_unit) FROM aset_unit");
    $maxUnit->execute();
    $maxUnit = $maxUnit->fetchColumn();
    
    $maxJenis = $conn->query("SELECT COUNT(kode_jenis) FROM aset_jenis");
    $maxJenis->execute();
    $maxJenis = $maxJenis->fetchColumn();

    $maxSuplier = $conn->query("SELECT COUNT(kode_suplier) FROM aset_suplier");
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

        <!-- CHART-->
        <div class="col-md-4 nopadding">
            <h4>Jenis Aset</h4>
            <canvas id="jenisAset"></canvas>
        </div>
        <!--
        <div class="col-md-5">
            <h4>Pemeriksaan Aset</h4>
            <canvas id="pemeriksaanAset"></canvas>
        </div>
        -->
    </section>
</div>

<!-- ChartJs -->
<script src="plugins/chartjs/Chart.min.js"></script>
<script>
	var ctx = document.getElementById("jenisAset").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'pie',
		data: {
			labels: ["IT", "Medis", "Non-Medis", "Umum"],
			datasets: [{
				label: '',
				data: [
				<?php 
				$maxIT = $conn->query("SELECT COUNT(kode_jenis) FROM aset_data WHERE kode_jenis='JN2012190001'");
                $maxIT->execute();
                $maxIT = $maxIT->fetchColumn();
                echo $maxIT;
				?>, 
				<?php 
				$maxMedis = $conn->query("SELECT COUNT(kode_jenis) FROM aset_data WHERE kode_jenis='JN2012190002'");
                $maxMedis->execute();
                $maxMedis = $maxMedis->fetchColumn();
                echo $maxMedis;
				?>, 
				<?php 
				$maxNonMedis= $conn->query("SELECT COUNT(kode_jenis) FROM aset_data WHERE kode_jenis='JN2012190004'");
                $maxNonMedis->execute();
                $maxNonMedis = $maxNonMedis->fetchColumn();
                echo $maxNonMedis;
                ?>,
                <?php 
				$maxUmum= $conn->query("SELECT COUNT(kode_jenis) FROM aset_data WHERE kode_jenis='JN2012190003'");
                $maxUmum->execute();
                $maxUmum = $maxUmum->fetchColumn();
                echo $maxUmum;
				?>
				],
				backgroundColor: [
				'rgba(255, 99, 132, 0.2)',
				'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(4, 219, 69, 0.2)'
				],
				borderColor: [
				'rgba(255,99,132,1)',
				'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(4, 219, 69, 1)'
				],
				borderWidth: 1
            }]
            
        },
        options: {
            //cutoutPercentage: 40,
            responsive: true,

        }
    });
    
    /*
    var ctx = document.getElementById("pemeriksaanAset").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'pie',
		data: {
			labels: ["Baik", "Rusak"],
			datasets: [{
				label: '',
				data: [
				<?php 
				//$maxBaik = $conn->query("SELECT COUNT(kode_pemeriksaan_aset) FROM aset_pemeriksaan_aset WHERE status_pemeriksaan_aset='Baik'");
                //$maxBaik->execute();
                //$maxBaik = $maxBaik->fetchColumn();
                //echo $maxBaik;
				?>, 
				<?php 
				//$maxRusak = $conn->query("SELECT COUNT(kode_pemeriksaan_aset) FROM aset_pemeriksaan_aset WHERE status_pemeriksaan_aset='Rusak'");
                //$maxRusak->execute();
                //$maxRusak = $maxRusak->fetchColumn();
                //echo $maxRusak;
				?>
				],
				backgroundColor: [
				'rgba(7, 227, 43, 0.2)',
				'rgba(227, 7, 7, 0.2)'
				],
				borderColor: [
				'rgba(7, 227, 43,1)',
				'rgba(227, 7, 7, 1)'
				],
				borderWidth: 1
            }]
            
        },
        options: {
            //cutoutPercentage: 40,
            responsive: true,

        }
	});
    */
</script>