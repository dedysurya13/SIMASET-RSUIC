<?php
    function buatRupiah($angka){
        $hasil = "Rp " . number_format($angka,0,'','.');
        return $hasil;
    }
?>

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
                        <div class="form-group row">
                            <div class="col-sm-1">
                                <a href="index.php?page=tambah_aset" class="btn btn-primary " role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                            </div>
                            <div class="col-sm-7">
                                
                            </div>
                            <!--
                            <div class="col-sm-1 text-right">
                                <h4>Filter :</h4>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <?php
                                        //$jenisQuery = $conn->query("SELECT * FROM aset_jenis ORDER BY kode_jenis ASC");
                                    ?>
                                    <select id="kode_jenis" name="kode_jenis" class="form-control" required>

                                        <option value=''>- Jenis -</option>

                                        <?php //while ($rowJenis = $jenisQuery->fetch(PDO::FETCH_ASSOC)){
                                        //extract($rowJenis);
                                        //echo "<option value='{$kode_jenis}'>{$nama_jenis}</option>";
                                        //}?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <?php
                                        //$unitQuery = $conn->query("SELECT * FROM aset_unit ORDER BY kode_unit ASC");
                                    ?>
                                    <select id="kode_unit" name="kode_unit" class="form-control" required>

                                        <option value=''>- Unit -</option>

                                        <?php //while ($rowUnit = $unitQuery->fetch(PDO::FETCH_ASSOC)){
                                        //extract($rowUnit);
                                        //echo "<option value='{$kode_unit}'>{$nama_unit}</option>";
                                        //}?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <?php
                                        //$suplierQuery = $conn->query("SELECT * FROM aset_suplier ORDER BY kode_suplier ASC");
                                    ?>
                                    <select id="kode_suplier" name="kode_suplier" class="form-control" required>

                                        <option value=''>- Suplier -</option>

                                        <?php //while ($rowSuplier = $suplierQuery->fetch(PDO::FETCH_ASSOC)){
                                        //extract($rowSuplier);
                                        //echo "<option value='{$kode_suplier}'>{$nama_suplier}</option>";
                                        //}?>
                                    </select>
                                </div>
                            </div>
                            -->
                        </div>
                        
                    </div>
                    <div class="box-body table-responsive">
                        <table id="tabelAset" class="datatable table table-bordered table-striped table-hover" data-table-source="" data-table-filter-target>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Kategori</th>
                                    <th>Merk</th>
                                    <th>Tahun</th>
                                    <th>Nilai Aset</th>
                                    <th>Tanggal Aset</th>
                                    <th>Spesifikasi</th>
                                    <th>Jenis</th>
                                    <th>Unit</th>
                                    <th>Suplier</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include "conf/conn.php";
                                    
                                    
                                    //a.kode_aset, a.nama_aset, a.merk_aset, a.tahun_aset, a.nilai_aset, date_format(a.tanggal_aset,'%d %m %Y'), a.spesifikasi_aset, j.nama_jenis, u.nama_unit, s.nama_suplier

                                    //echo $row['tanggal_aset']->format('d/m/Y');
                                    //echo substr($row['tanggal_aset'], 0, 11);                                

                                    $sql = "SELECT * FROM aset_data as a INNER JOIN aset_jenis as j ON a.kode_jenis = j.kode_jenis INNER JOIN aset_unit as u ON a.kode_unit = u.kode_unit INNER JOIN aset_suplier as s ON a.kode_suplier = s.kode_suplier INNER JOIN aset_kategori_aset AS kat ON a.kode_kategori = kat.kode_kategori ORDER BY kode_aset ASC";

                                    $dataAset = $conn->query($sql);
                                    
                                    while ($row=$dataAset->fetch()){
                                    
                                ?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo $row['kode_aset'];?></td>
                                            <td><?php echo $row['nama_kategori'];?></td>
                                            <td><?php echo $row['merk_aset'];?></td>
                                            <td><?php echo $row['tahun_aset'];?></td>
                                            <td><?php echo buatRupiah($row['nilai_aset']);?></td>
                                            <td><?php echo substr($row['tanggal_aset'], 0, 11);?></td>
                                            <td><?php echo $row['spesifikasi_aset'];?></td>
                                            <td><?php echo $row['nama_jenis'];?></td>
                                            <td><?php echo $row['nama_unit'];?></td>
                                            <td><?php echo $row['nama_suplier'];?></td>
                                            <td>
                                                <a href="index.php?page=ubah_aset&id=<?=$row['kode_aset'];?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i></a>

                                                <a href="pages/cetak/single_label.php?id=<?=$row['kode_aset'];?>" target="_blank" class="btn btn-info" role="button" title="Cetak Label"><i class="glyphicon glyphicon-qrcode"></i></a>

                                                <?php 
                                                    if($_SESSION['kode_role']==1){
                                                ?>        
                                                        <a href="pages/aset/hapus_aset.php?id=<?=$row['kode_aset'];?>" class="btn btn-danger" role="button" title="Hapus Data" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
                                                <?php
                                                    }
                                                ?>
                                                
                                                
                                            </td>
                                        </tr>
                                <?php
                                    }    
                                ?>
                            </tbody>
                            <tfoot>
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
                                </tr>
                            </tfoot>
                        </table>
                    </div> <!-- /.box-body -->
                </div> <!-- /.box -->
            </div> <!-- /.col -->
        </div> <!-- /.row -->
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
