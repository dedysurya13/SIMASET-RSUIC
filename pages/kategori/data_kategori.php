<div class="content-wrapper">
    <section class="content-header">
        <h1>Data Kategori</h1>
        <ol>
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Kategori</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="form-group row">
                            <div class="col-sm-1">
                                <a href="index.php?page=tambah_kategori" class="btn btn-primary " role="button" title="Tambah Kategori"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                            </div>
                            <!--
                            <div class="col-sm-11">
                                <input class="form-control" id='txt_searchall' type="text" placeholder="Cari Aset" aria-label="Search">
                            </div>
                            -->
                        </div>
                        
                    </div>
                    <div class="box-body table-responsive">
                        <table id="tabelKategori" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include "conf/conn.php";                         

                                    $sql = "SELECT * FROM aset_kategori_aset ORDER BY kode_kategori ASC";

                                    $dataKategori = $conn->query($sql);
                                    
                                    while ($row=$dataKategori->fetch()){
                                    
                                ?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo $row['kode_kategori'];?></td>
                                            <td><?php echo $row['nama_kategori'];?></td>
                                           <td>
                                                <a href="index.php?page=ubah_kategori&id=<?=$row['kode_kategori'];?>" class="btn btn-success" role="button" title="Ubah Kategori"><i class="glyphicon glyphicon-edit"></i></a>

                                                <?php 
                                                    if($_SESSION['kode_role']==1){
                                                ?> 
                                                    
                                                    <a href="pages/kategori/hapus_kategori.php?id=<?=$row['kode_kategori'];?>" class="btn btn-danger" role="button" title="Hapus Kategori" onclick="return confirm('Yakin ingin menghapus kategori ini?')"><i class="glyphicon glyphicon-trash"></i></a>
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