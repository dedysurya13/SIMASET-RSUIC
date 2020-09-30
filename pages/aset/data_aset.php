<div class="content-wrapper">
    <section class="content-header">
        <h1>Data Aset</h1>
        <ol>
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Aset</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <a href="index.php?page=tambah_aset" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="mahasiswa" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Aset</th>
                                    <th>Nama Aset</th>
                                    <th>Merk</th>
                                    <th>Tahun</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include "conf/conn.php";
                                    $no=0;
                                    
                                    $sql = "SELECT * FROM tb_aset ORDER BY kode_aset ASC";

                                    $dataAset = $conn->query($sql);

                                    while ($row=$dataAset->fetch()){
                                ?>
                                        <tr>
                                            <td><?php echo $no=$no+1;?></td>
                                            <td><?php echo $row['kode_aset'];?></td>
                                            <td><?php echo $row['nama_aset'];?></td>
                                            <td><?php echo $row['merk_aset'];?></td>
                                            <td><?php echo $row['tahun_aset'];?></td>
                                            <td>
                                                <a href="index.php?page=ubah_aset&id=<?=$row['kode_aset'];?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i></a>
                                                <a href="pages/aset/hapus_aset.php?id=<?=$row['kode_aset'];?>" class="btn btn-danger" role="button" title="Hapus Data" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
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

<!-- Javascript Datatable -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#aset').DataTable();
  });
</script>