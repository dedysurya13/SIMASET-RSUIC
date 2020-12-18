<?php
include "../../conf/conn.php";
//'".$_GET['kode_aset']."'

    $kode_aset = $_GET['kode_aset'];

    $sql = "SELECT * FROM aset_data as a INNER JOIN aset_jenis as j ON a.kode_jenis = j.kode_jenis INNER JOIN aset_unit as u ON a.kode_unit = u.kode_unit INNER JOIN aset_suplier as s ON a.kode_suplier = s.kode_suplier WHERE kode_aset='".$kode_aset."'";

    $sth = $conn->prepare($sql);
    $sth->execute();
    $row = $sth->fetch(PDO::FETCH_ASSOC);

function buatRupiah($angka){
    $hasil = "Rp " . number_format($angka,0,'','.');
    return $hasil;
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Informasi Aset</h1>
        <ol class="breadcrumb">
            <li><a href="../../index.php"><i class="fa fa-dashboard"> Home</i></a></li>
            <li class="active">Informasi Aset</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12 no-padding">
                <div class="box-primary">
                    <form role="form" method="post" action="pages/aset/ubah_aset_proses.php">
                        <div class="box-body">
                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="">Kode Aset</label>
                                    <input type="text" name="kode_aset" class="form-control" placeholder="Kode Aset, ex: poli1-0001" value="<?php echo $row['kode_aset']; ?>" autocomplete="off" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="">Nama Aset</label>
                                    <input type="text" name="nama_aset" class="form-control" placeholder="Nama Aset, ex: Printer" value="<?php echo $row['nama_aset']; ?>" autocomplete="off" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="">Merk Aset</label>
                                    <input type="text" name="merk_aset" class="form-control" placeholder="Merk Aset, ex: Epson L310" value="<?php echo $row['merk_aset']; ?>" autocomplete="off" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="">Tahun Aset</label>
                                    <input type="text" name="tahun_aset" class="form-control" placeholder="" value="<?php echo $row['tahun_aset']; ?>" autocomplete="off" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tanggal Input Aset</label>
                                    <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                        <input type="text" name="tanggal_aset" class="form-control pull-right" id="datepicker" value="<?php echo substr($row['tanggal_aset'], 0, 11); ?>" autocomplete="off" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nilai Aset</label>
                                    <input type="text" name="nilai_aset" class="form-control" placeholder="Nilai Aset, ex: 300000" value="<?php echo buatRupiah($row['nilai_aset']); ?>" autocomplete="off" disabled>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="">Spesifikasi Aset</label>
                                <textarea name="spesifikasi_aset" class="form-control" rows="4" class="pull-right" placeholder="Spesifikasi aset"  value=""  autocomplete="off" disabled><?php echo $row['spesifikasi_aset']; ?></textarea>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                            <label for="">Jenis Aset</label>
                                <input type="text" name="nama_jenis" class="form-control" placeholder="Merk Aset, ex: Epson L310" value="<?php echo $row['nama_jenis']; ?>" autocomplete="off" disabled>
                            </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="">Unit</label>
                                    <input type="text" name="nama_unit" class="form-control" placeholder="Merk Aset, ex: Epson L310" value="<?php echo $row['nama_unit']; ?>" autocomplete="off" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="">Suplier</label>
                                    <input type="text" name="nama_suplier" class="form-control" placeholder="Merk Aset, ex: Epson L310" value="<?php echo $row['nama_suplier']; ?>" autocomplete="off" disabled>
                                </div>
                            </div>
                        </div>
                        <!--
                        <div class="box-footer">
                            <button type="submit" name="simpan_data" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                        </div>
                        -->
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
    <!-- PEMERIKSAAN ASET -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="content-header">
                        <h1>Riwayat Pemeriksaan Aset</h1>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="tabelPemeriksaanAset" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Pemeriksaan</th>
                                    <th>Tanggal Pemeriksaan</th>
                                    <th>Status</th>
                                    <th>Hasil Pemeriksaan</th>
                                    <th>Petugas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no=0;                            

                                    $sqlPemeriksaanAset = "SELECT * FROM aset_pemeriksaan_aset As per INNER JOIN aset_petugas AS pet ON per.kode_petugas=pet.kode_petugas WHERE per.kode_aset='".$kode_aset."'";

                                    $dataPemeriksaanAset = $conn->query($sqlPemeriksaanAset);
                                    
                                    while ($row=$dataPemeriksaanAset->fetch()){
                                    
                                ?>
                                        <tr>
                                            <td><?php echo $no=$no+1;?></td>
                                            <td><?php echo $row['kode_pemeriksaan_aset'];?></td>
                                            <td><?php echo substr($row['tanggal_pemeriksaan_aset'], 0, 11);?></td>
                                            <td><?php echo $row['status_pemeriksaan_aset'];?></td>
                                            <td><?php echo $row['hasil_pemeriksaan_aset'];?></td>
                                            <td><?php echo $row['nama_petugas'];?></td>
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
        
        <!-- KERUSAKAN ASET -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="content-header">
                        <h1>Riwayat Kerusakan Aset</h1>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="tabelPemeriksaanAset" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Kerusakan</th>
                                    <th>Tanggal Lapor</th>
                                    <th>Jam Lapor</th>
                                    <th>Uraian Kerusakan</th>
                                    <th>Petugas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no=0;
                                    
                                    $sqlKerusakanAset = "SELECT * FROM aset_kerusakan_aset As ker INNER JOIN aset_petugas AS pet ON ker.kode_petugas=pet.kode_petugas WHERE ker.kode_aset='".$kode_aset."'";

                                    $dataKerusakanAset = $conn->query($sqlKerusakanAset);
                                    
                                    while ($row=$dataKerusakanAset->fetch()){
                                    
                                ?>
                                        <tr>
                                            <td><?php echo $no=$no+1;?></td>
                                            <td><?php echo $row['kode_kerusakan_aset'];?></td>
                                            <td><?php echo substr($row['tanggal_lapor'], 0, 11);?></td>
                                            <td><?php echo $row['jam_lapor'];?></td>
                                            <td><?php echo $row['uraian_kerusakan'];?></td>
                                            <td><?php echo $row['nama_petugas'];?></td>
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

        <!-- PERBAIKAN ASET -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="content-header">
                        <h1>Riwayat Perbaikan Aset</h1>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="tabelPemeriksaanAset" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Perbaikan</th>
                                    <th>Kode Kerusakan</th>
                                    <th>Tanggal Diterima</th>
                                    <th>Jam Diterima</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Jam Selesai</th>
                                    <th>Uraian Perbaikan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no=0;                            

                                    $sqlKerusakanAset = "SELECT * FROM aset_kerusakan_aset As ker INNER JOIN aset_perbaikan_aset as per on ker.kode_kerusakan_aset=per.kode_kerusakan_aset INNER JOIN aset_status as sts ON per.kode_status=sts.kode_status WHERE ker.kode_aset='".$kode_aset."'";

                                    $dataKerusakanAset = $conn->query($sqlKerusakanAset);
                                    
                                    while ($row=$dataKerusakanAset->fetch()){
                                    
                                ?>
                                        <tr>
                                            <td><?php echo $no=$no+1;?></td>
                                            <td><?php echo $row['kode_perbaikan_aset'];?></td>
                                            <td><?php echo $row['kode_kerusakan_aset'];?></td>
                                            <td><?php echo substr($row['tanggal_diterima'], 0, 11);?></td>
                                            <td><?php echo $row['jam_diterima'];?></td>
                                            <td><?php echo substr($row['tanggal_selesai'], 0, 11);?></td>
                                            <td><?php echo $row['jam_selesai'];?></td>
                                            <td><?php echo $row['uraian_perbaikan'];?></td>
                                            <td><button type="button" class="<?php echo $row['btn_status'];?>"><?php echo $row['nama_status'];?></button></td>
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
</div>