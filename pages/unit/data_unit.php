<?php
    $sqlID = "SELECT MAX(kode_unit) FROM tb_unit";
    $incrementID = $conn->prepare($sqlID);
    $incrementID->execute();
    $ambilID = $incrementID->fetch(PDO::FETCH_ASSOC);
    $kodeID = strtok($ambilID[''], '-');
    $potongID = substr($ambilID[''], 4);
    $angkaID = (int)$potongID;
    $angkaID = $angkaID + 100000001;
    $hurufID = substr((string)$angkaID,1);
    $hurufID = $kodeID."-".$hurufID;
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Data Unit</h1>
        <ol>
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Unit</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="form-group row">
                            <div class="col-sm-1">
                                <a href="index.php?page=tambah_unit&id=<?php echo $hurufID ?>" class="btn btn-primary " role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                            </div>
                            <!--
                            <div class="col-sm-11">
                                <input class="form-control" id='txt_searchall' type="text" placeholder="Cari Aset" aria-label="Search">
                            </div>
                            -->
                        </div>
                        
                    </div>
                    <div class="box-body table-responsive">
                        <table id="tabelUnit" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Nama Unit</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include "conf/conn.php";
                                    $no=0;                            

                                    $sql = "SELECT * FROM tb_unit ORDER BY kode_unit ASC";

                                    $dataUnit = $conn->query($sql);
                                    
                                    while ($row=$dataUnit->fetch()){
                                    
                                ?>
                                        <tr>
                                            <td><?php echo $no=$no+1;?></td>
                                            <td><?php echo $row['kode_unit'];?></td>
                                            <td><?php echo $row['nama_unit'];?></td>
                                            <td><?php echo $row['nama_pj'];?></td>
                                            <td>
                                                <a href="index.php?page=ubah_unit&id=<?=$row['kode_unit'];?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i></a>

                                                <?php 
                                                    if($_SESSION['kode_role']==1){
                                                ?> 
                                                    
                                                    <a href="pages/unit/hapus_unit.php?id=<?=$row['kode_unit'];?>" class="btn btn-danger" role="button" title="Hapus Data" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
                                                <?php
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                <?php
                                    }    
                                ?>
                            </tbody>
                        </table>
                    </div> <!-- /.box-body -->
                </div> <!-- /.box -->
            </div> <!-- /.col -->
        </div> <!-- /.row -->
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->