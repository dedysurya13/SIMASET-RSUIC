<style>
.form-control[disabled] {
    background-color: #fff !important;
    border-style: none;
    cursor: default;
}
.form-control[disabled]:hover {
    background-color: #f6f6f6 !important;
}
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

                                    $sql = "SELECT * FROM aset_kerusakan_aset as ke INNER JOIN aset_data as a ON  ke.kode_aset = a.kode_aset INNER JOIN aset_unit as u ON a.kode_unit = u.kode_unit INNER JOIN aset_petugas as pe ON ke.kode_petugas = pe.kode_petugas ORDER BY kode_kerusakan_aset DESC";

                                    $dataKerusakan = $conn->query($sql);
                                    
                                    while ($row=$dataKerusakan->fetch()){
                                    
                                ?>
                                        <tr>
                                            <form role="form" method="post" action="pages/kerusakan/tindaklanjut_kerusakan_proses.php">
                                                <td><?php echo $no=$no+1;?></td>
                                                <td><input type="text" name="kode_kerusakan_aset"  class="form-control" disabled value="<?php echo $row['kode_kerusakan_aset'];?>"></td>
                                                <td><?php echo $row['kode_aset'];?></td>
                                                <td><?php echo $row['nama_aset'];?></td>
                                                <td><?php echo $row['merk_aset'];?></td>
                                                <td><?php echo $row['nama_unit'];?></td>
                                                <td><input type="text" name="tanggal_lapor"  class="form-control" disabled value="<?php echo substr($row['tanggal_lapor'], 0, 11);?>"></td>
                                                <td><input type="text" name="jam_lapor"  class="form-control" disabled value="<?php echo $row['jam_lapor'];?>"></td>
                                                <td><?php echo $row['uraian_kerusakan'];?></td>
                                                <td><?php echo $row['nama_petugas'];?></td>
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
<script src="plugins/jQuery/jquery-3.5.1.js"></script>
<script>
    $('.table tbody').on('clik','.btn',function(){
        var currow = $(this).closest('tr');
        var kode_kerusakan_aset = currow.find('td:eq(1)').text();
        var tanggal_diterima = currow.find('td:eq(6)').text();
        var jam_diterima = currow.find('td:eq(7)').text();

        var result = kode_kerusakan_aset + '\n' + tanggal_diterima + '\n' + jam_diterima;
        alert(result);
    })
</script>