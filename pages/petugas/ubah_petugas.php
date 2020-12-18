<?php
include "conf/conn.php";

//'".$_GET['kode_aset']."'

$sql = "SELECT * FROM aset_petugas as p INNER JOIN aset_role_petugas as r ON p.kode_role = r.kode_role WHERE kode_petugas='".$_GET['id']."'";
$sth = $conn->prepare($sql);
$sth->execute();
$row = $sth->fetch(PDO::FETCH_ASSOC);
//print_r($row);
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Ubah Petugas</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"> Home</i></a></li>
            <li class="active">Ubah Petugas</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-primary">
                    <form role="form" method="post" action="pages/petugas/ubah_petugas_proses.php">
                        <div class="box-body">
                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                            <div class="form-group">
                            <label for="">Kode Petugas</label>
                                <input type="text" name="kode_petugas" class="form-control" placeholder="Kode Petugas" value="<?php echo $row['kode_petugas']; ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group">
                            <label for="">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $row['username']; ?>" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                            <label for="">Password</label>
                                <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo $row['password']; ?>" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Petugas</label>
                                <input type="text" name="nama_petugas" class="form-control" placeholder="Nama Petugas" value="<?php echo $row['nama_petugas']; ?>" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="">Telepon Petugas</label>
                                <input type="number" name="telp_petugas" class="form-control" placeholder="Telepon Petugas"  value="<?php echo $row['telp_petugas']; ?>" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <?php
                                    $roleQuery = $conn->query("SELECT * FROM aset_role_petugas");
                                ?>
                                <select id="kode_role" name="kode_role" class="form-control" id="">

                                    <option value="<?php echo $row['kode_role']; ?>"><?php echo $row['nama_role'];?></option>

                                    <?php while ($rowRole = $roleQuery->fetch(PDO::FETCH_ASSOC)){
                                    extract($rowRole);
                                    echo "<option value='{$kode_role}'>{$nama_role}</option>";
                                    }?>
                                </select>
                            </div>
                            
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="simpan_data" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>