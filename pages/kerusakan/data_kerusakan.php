<div class="content-wrapper">
    <section class="content-header">
        <h1>Data Kerusakan Aset</h1>
        <ol>
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Kerusakan Aset</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="form-group row">
                            <div class="col-sm-1">
                                <a href="index.php?page=tambah_kerusakan" class="btn btn-primary " role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                            </div>
                            <!--
                            <div class="col-sm-11">
                                <input class="form-control" id='txt_searchall' type="text" placeholder="Cari Aset" aria-label="Search">
                            </div>
                            -->
                        </div>
                        
                    </div>
                    <div class="box-body table-responsive">
                        <table id="tabelKerusakan" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Kerusakan</th>
                                    <th>Kode Aset</th>
                                    <th>Nama Aset</th>
                                    <th>Merk Aset</th>
                                    <th>Unit</th>
                                    <th>Tanggal Lapor</th>
                                    <th>Jam Lapor</th>
                                    <th>Uraian Kerusakan</th>
                                    <th>Petugas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include "conf/conn.php";
                                    $no=0;                           

                                    $sql = "SELECT * FROM tb_kerusakan_aset as ke INNER JOIN tb_aset as a ON  ke.kode_aset = a.kode_aset INNER JOIN tb_unit as u ON a.kode_unit = u.kode_unit INNER JOIN tb_petugas as pe ON ke.kode_petugas = pe.kode_petugas ORDER BY tanggal_lapor DESC";

                                    $dataKerusakan = $conn->query($sql);
                                    
                                    while ($row=$dataKerusakan->fetch()){
                                    
                                ?>
                                        <tr>
                                            <td><?php echo $no=$no+1;?></td>
                                            <td><?php echo $row['kode_kerusakan_aset'];?></td>
                                            <td><?php echo $row['kode_aset'];?></td>
                                            <td><?php echo $row['nama_aset'];?></td>
                                            <td><?php echo $row['merk_aset'];?></td>
                                            <td><?php echo $row['nama_unit'];?></td>
                                            <td><?php echo substr($row['tanggal_lapor'], 0, 11);?></td>
                                            <td><?php echo $row['jam_lapor'];?></td>
                                            <td><?php echo $row['uraian_kerusakan'];?></td>
                                            <td><?php echo $row['nama_petugas'];?></td>
                                            <td>
                                                <a href="index.php?page=ubah_kerusakan&id=<?=$row['kode_kerusakan_aset'];?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i></a>

                                                <?php 
                                                    if($_SESSION['kode_role']==1){
                                                ?> 

                                                    <a href="pages/kerusakan/hapus_kerusakan.php?id=<?=$row['kode_kerusakan_aset'];?>" class="btn btn-danger" role="button" title="Hapus Data" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
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
