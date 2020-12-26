<div class="content-wrapper">
    <section class="content-header">
        <h1>Pemeriksaan Aset</h1>
        <ol>
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pemeriksaan Aset</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="form-group row">
                            <div class="col-sm-1">
                                <a href="index.php?page=tambah_pemeriksaan" class="btn btn-primary " role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                            </div>
                            <!--
                            <div class="col-sm-11">
                                <input class="form-control" id='txt_searchall' type="text" placeholder="Cari Aset" aria-label="Search">
                            </div>
                            -->
                        </div>
                        
                    </div>
                    <div class="box-body table-responsive">
                        <table id="tabelPemeriksaan" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Pemeriksaan</th>
                                    <th>Kode Aset</th>
                                    <th>Kategori Aset</th>
                                    <th>Merk Aset</th>
                                    <th>Unit</th>
                                    <th>Tanggal Pemeriksaan</th>
                                    <th>Status Pemeriksaan</th>
                                    <th>Hasil Pemeriksaan</th>
                                    <th>Petugas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include "conf/conn.php";                           

                                    $sql = "SELECT * FROM aset_pemeriksaan_aset as pa INNER JOIN aset_data as a ON  pa.kode_aset = a.kode_aset INNER JOIN aset_unit as u ON a.kode_unit = u.kode_unit INNER JOIN aset_petugas as pe ON pa.kode_petugas = pe.kode_petugas INNER JOIN aset_kategori_aset as kat ON a.kode_kategori = kat.kode_kategori ORDER BY kode_pemeriksaan_aset DESC";

                                    $dataPemeriksaan = $conn->query($sql);
                                    
                                    while ($row=$dataPemeriksaan->fetch()){
                                    
                                ?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo $row['kode_pemeriksaan_aset'];?></td>
                                            <td><?php echo $row['kode_aset'];?></td>
                                            <td><?php echo $row['nama_kategori'];?></td>
                                            <td><?php echo $row['merk_aset'];?></td>
                                            <td><?php echo $row['nama_unit'];?></td>
                                            <td><?php echo substr($row['tanggal_pemeriksaan_aset'], 0, 11);?></td>
                                            <td><?php echo $row['status_pemeriksaan_aset'];?></td>
                                            <td><?php echo $row['hasil_pemeriksaan_aset'];?></td>
                                            <td><?php echo $row['nama_petugas'];?></td>
                                            <td>
                                                <a href="index.php?page=ubah_pemeriksaan&id=<?=$row['kode_pemeriksaan_aset'];?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i></a>

                                                <?php 
                                                    if($_SESSION['kode_role']==1){
                                                ?> 

                                                    <a href="pages/pemeriksaan/hapus_pemeriksaan.php?id=<?=$row['kode_pemeriksaan_aset'];?>" class="btn btn-danger" role="button" title="Hapus Data" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
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
