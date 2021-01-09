<?php 
    if($_SESSION['kode_role']==1){
?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Kelola Petugas</h1>
            <ol>
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Kelola Petugas</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <div class="form-group row">
                                <div class="col-sm-1">
                                    <a href="index.php?page=tambah_petugas" class="btn btn-primary " role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                                </div>
                                <!--
                                <div class="col-sm-11">
                                    <input class="form-control" id='txt_searchall' type="text" placeholder="Cari Aset" aria-label="Search">
                                </div>
                                -->
                            </div>
                            
                        </div>
                        <div class="box-body table-responsive">
                            <table id="tabelPetugas" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Nama petugas</th>
                                        <th>Telepon</th>
                                        <th>Role</th>
                                        <th></th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include "conf/conn.php";
                                        $no=0;
                                    
                                        $sql = "SELECT * FROM aset_petugas as p INNER JOIN aset_role_petugas as r ON p.kode_role = r.kode_role INNER JOIN aset_unit as u ON p.kode_unit=u.kode_unit ORDER BY kode_petugas ASC";

                                        $dataPetugas = $conn->query($sql);
                                        
                                        while ($row=$dataPetugas->fetch()){
                                        
                                    ?>
                                            <tr>
                                                <td><?php echo $no=$no+1;?></td>
                                                <td><?php echo $row['kode_petugas'];?></td>
                                                <td><?php echo $row['username'];?></td>
                                                <td><?php echo $row['password'];?></td>
                                                <td><?php echo $row['nama_petugas'];?></td>
                                                <td><?php echo $row['telp_petugas'];?></td>
                                                <td><?php echo $row['nama_role'];?></td>
                                                <td><?php echo $row['nama_unit'];?></td>
                                                <td>
                                                    <a href="index.php?page=ubah_petugas&id=<?=$row['kode_petugas'];?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i></a>

                                                    <a href="pages/petugas/hapus_petugas.php?id=<?=$row['kode_petugas'];?>" class="btn btn-danger" role="button" title="Hapus Data" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
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
<?php }else{?>
    <script>window.location.href="index.php?page=401"</script> 
<?php } ?>