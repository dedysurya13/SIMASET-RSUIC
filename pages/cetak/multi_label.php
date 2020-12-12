<?php
    include "/../../conf/conn.php";
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Cetak Label</h1>
        <ol>
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Cetak Label</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="form-group row">
                            <form action="pages/cetak/multi_label_cetak.php" method="post">
                                <div class="col-sm-6">
                                    <?php
                                        $asetQuery = $conn->query("SELECT * FROM tb_aset ORDER BY kode_aset ASC");
                                    ?>
                                    <select id="multi_label" name="kode_aset[]" class="kode_aset form-control" multiple="multiple">
                                        <?php while ($row = $asetQuery->fetch(PDO::FETCH_ASSOC)){
                                        extract($row);
                                        echo "<option value='{$kode_aset}'>{$kode_aset}</option>";
                                        }?>
                                    </select>
                                    <br><br>
                                    <h4>*Sekali cetak maksimal 12 label.</h4>
                                </div>
                                <div class="col-sm-1">
                                    <button type="submit" name="cetak_label" onclick="$('form').attr('target', '_blank');" class="btn btn-primary btn-block btn-flat"><i class="glyphicon glyphicon-print"></i> Cetak Label</button>
                                </div>
                                <!--
                                <div class="col-sm-11">
                                    <input class="form-control" id='txt_searchall' type="text" placeholder="Cari Aset" aria-label="Search">
                                </div>
                                -->
                            </form>
                        </div>
                        
                    </div>
                </div> <!-- /.box -->
            </div> <!-- /.col -->
        </div> <!-- /.row -->
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->