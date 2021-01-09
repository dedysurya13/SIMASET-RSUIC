<style>
    .form-control[readonly] {
        background-color: #fff !important;
        border-style: none;
        cursor: default;
    }
    .form-control[readonly]:hover {
        background-color: #f6f6f6 !important;
    }
</style>
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
                                    <th>Kode Kerusakan</th>
                                    <th>Kode Aset</th>
                                    <th>Kategori Aset</th>
                                    <th>Merk/Tipe Aset</th>
                                    <th>Unit</th>
                                    <th>Ruangan</th>
                                    <th>Tanggal Lapor</th>
                                    <th>Jam Lapor</th>
                                    <th>Uraian Kerusakan</th>
                                    <th>Petugas</th>
                                    <th>Tindak Lanjut</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include "conf/conn.php";                           

                                    $sql = "SELECT * FROM aset_kerusakan_aset as ke INNER JOIN aset_data as a ON  ke.kode_aset = a.kode_aset INNER JOIN aset_unit as u ON a.kode_unit = u.kode_unit INNER JOIN aset_petugas as pe ON ke.kode_petugas = pe.kode_petugas INNER JOIN aset_kategori_aset as kat ON a.kode_kategori = kat.kode_kategori INNER JOIN aset_flag_kerusakan as flk ON ke.kode_flag = flk.kode_flag LEFT JOIN aset_ruangan as ar ON a.kode_ruangan = ar.kode_ruangan ORDER BY kode_kerusakan_aset DESC";

                                    $dataKerusakan = $conn->query($sql);
                                    
                                    while ($row=$dataKerusakan->fetch()){
                                    
                                ?>
                                        <tr>
                                            <form role="form" method="post" action="pages/kerusakan/tindaklanjut_kerusakan_proses.php">
                                                <td></td>
                                                <td><input type="hidden" name="kode_kerusakan_aset"  class="form-control" value="<?php echo $row['kode_kerusakan_aset'];?>"><?php echo $row['kode_kerusakan_aset'];?></td>
                                                <td><?php echo $row['kode_aset'];?></td>
                                                <td><?php echo $row['nama_kategori'];?></td>
                                                <td><?php echo $row['merk_aset'];?></td>
                                                <td><?php echo $row['nama_unit'];?></td>
                                                <td><?php echo $row['nama_ruangan'];?></td>
                                                <td><?php echo substr($row['tanggal_lapor'], 0, 11);?></td>
                                                <td><?php echo $row['jam_lapor'];?></td>
                                                <td><?php echo $row['uraian_kerusakan'];?></td>
                                                <td><?php echo $row['nama_petugas'];?></td>
                                                <td style="text-align: center"><span class="<?php echo $row['nama_flag'];?>" style="<?php echo $row['warna_flag'];?>; font-size: 20px;"></span></td>
                                                <td>
                                                <?php 
                                                        if($_SESSION['kode_role']==1 || $_SESSION['kode_role']==3){
                                                    ?> 
                                                        <a href="index.php?page=ubah_kerusakan&id=<?=$row['kode_kerusakan_aset'];?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i></a>

                                                    

                                                        <a href="pages/kerusakan/hapus_kerusakan.php?id=<?=$row['kode_kerusakan_aset'];?>" class="btn btn-danger" role="button" title="Hapus Data" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
                                                    <?php
                                                        }
                                                    ?>
                                                    <?php 
                                                        if($_SESSION['kode_role']==2 || $_SESSION['kode_role']==1){
                                                    ?> 
                                                        <button type="submit" name="tindaklanjut" class="btn btn-info"><i class="glyphicon glyphicon-ok"></i> Tindak Lanjuti</button>
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