<div class="content-wrapper">
    <section class="content-header">
        <h1>Data Perbaikan Aset</h1>
        <ol>
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Perbaikan Aset</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="form-group row">
                            <div class="col-sm-1">
                                <a href="index.php?page=tambah_perbaikan" class="btn btn-primary " role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                            </div>
                            <!--
                            <div class="col-sm-11">
                                <input class="form-control" id='txt_searchall' type="text" placeholder="Cari Aset" aria-label="Search">
                            </div>
                            -->
                        </div>
                        
                    </div>
                    <div class="box-body table-responsive">
                        <table id="tabelPerbaikan" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th> 
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Perbaikan</th> 
                                    <th>Kode Kerusakan</th>
                                    <th>Kode Aset</th>
                                    <th>Kategori</th>
                                    <th>Merk</th>
                                    <th>Unit</th>
                                    <th>Ruangan</th>
                                    <th>Tgl Lapor</th>
                                    <th>Jm Lapor</th>
                                    <th>Uraian Kerusakan</th>
                                    <th>Tgl Terima</th>
                                    <th>Jm Terima</th>
                                    <th>Tgl Selesai</th>
                                    <th>Jm Selesai</th>
                                    <th>Uraian Perbaikan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include "conf/conn.php";                           

                                    $sql = "SELECT * FROM aset_perbaikan_aset as pa INNER JOIN aset_kerusakan_aset as ka ON pa.kode_kerusakan_aset = ka.kode_kerusakan_aset INNER JOIN aset_data as a ON ka.kode_aset = a.kode_aset INNER JOIN aset_unit as u ON a.kode_unit = u.kode_unit INNER JOIN aset_status as s ON pa.kode_status = s.kode_status INNER JOIN aset_kategori_aset as kat ON a.kode_kategori = kat.kode_kategori LEFT JOIN aset_ruangan as ar ON a.kode_ruangan = ar.kode_ruangan ORDER BY kode_perbaikan_aset DESC";

                                    $dataKerusakan = $conn->query($sql);
                                    
                                    while ($row=$dataKerusakan->fetch()){
                                    
                                ?>
                                        <tr>
                                            <form role="form" method="post" action="pages/perbaikan/hapus_perbaikan.php">
                                                <input type="hidden" name="kode_perbaikan_aset"  class="form-control" value="<?php echo $row['kode_perbaikan_aset'];?>">
                                                <input type="hidden" name="kode_kerusakan_aset"  class="form-control" value="<?php echo $row['kode_kerusakan_aset'];?>">
                                                <td>
                                                    
                                                </td>
                                                <td><?php echo $row['kode_perbaikan_aset'];?></td>
                                                <!--<td><?php //echo '<b>Perbaikan: </b>'.$row['kode_perbaikan_aset'].'<br><b> Kerusakan: </b>'.$row['kode_kerusakan_aset'].'<br><b> Aset: </b>'.$row['kode_aset'];?></td>-->
                                                <td><?php echo $row['kode_kerusakan_aset'];?></td>
                                                <td><?php echo $row['kode_aset'];?></td>
                                                <td><?php echo $row['nama_kategori'];?></td>
                                                <td><?php echo $row['merk_aset'];?></td>
                                                <td><?php echo $row['nama_unit'];?></td>
                                                <td><?php echo $row['nama_ruangan'];?></td>
                                                <td><?php echo substr($row['tanggal_lapor'], 0, 11);?></td>
                                                <td><?php echo $row['jam_lapor'];?></td>
                                                <td><?php echo $row['uraian_kerusakan'];?></td>
                                                <td><?php echo substr($row['tanggal_diterima'], 0, 11);?></td>
                                                <td><?php echo $row['jam_diterima'];?></td>
                                                <td><?php echo substr($row['tanggal_selesai'], 0, 11);?></td>
                                                <td><?php echo $row['jam_selesai'];?></td>
                                                <td><?php echo $row['uraian_perbaikan'];?></td>
                                                <td><button type="button" class="<?php echo $row['btn_status'];?>"><?php echo $row['nama_status'];?></button></td>
                                                <td>
                                                    <a href="index.php?page=ubah_perbaikan&id=<?=$row['kode_perbaikan_aset'];?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i></a>

                                                    <?php 
                                                        if($_SESSION['kode_role']==1){
                                                    ?> 
                                                        <button type="submit" name="hapusperbaikan" class="btn btn-danger" title="Hapus Data" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></button>
                                                    <?php
                                                        }
                                                    ?>
                                                </td>
                                            </form>
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
