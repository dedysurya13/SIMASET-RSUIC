<?php
$query = mysql_query("SELECT * FROM mahasiswa WHERE id_mahasiswa='".$_GET['id']."'");
$row = mysql_fetch_array($query);
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Ubah Mahasiswa</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"> Home</i></a></li>
            <li class="active">Ubah Mahasiswa</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-primary">
                    <form role="form" method="post" action="pages/mahasiswa/ubah_mahasiswa_proses.php">
                        <div class="box-body">
                            <input type="hidden" name="id" value="<?php echo $row['id_mahasiswa']; ?>">
                            <div class="form-group">
                                <label for="">NIM</label>
                                <input type="text" name="nim" class="form-control" placeholder="NIM" value="<?php echo $row['nim']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $row['nama']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <select class="form-control" name="kelas">
                                    <option value="<?php echo $row['kelas']; ?>">- <?php echo $row['kelas']; ?> -</option>
                                    <option value="Pagi">Pagi</option>
                                    <option value="Siang">Siang</option>
                                    <option value="Malam">Malam</option>
                                    <option value="Karyawan">Karyawan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jurusan</label>
                                <select class="form-control" name="jurusan">
                                    <option value="<?php echo $row['jurusan']; ?>">- <?php echo $row['jurusan']; ?> -</option>
                                    <option value="Manajemen Informatika">Manajemen Informatika</option>
                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Sistem Komputer">Sistem Komputer</option>
                                    <option value="Akutansi">Akutansi</option>
                                </select>   
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>