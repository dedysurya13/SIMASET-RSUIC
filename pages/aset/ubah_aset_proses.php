<?php 
include "../../conf/conn.php";

if(isset($_POST['simpan_data'])){
    $kode_aset = $_POST['id'];
    $nama_aset = $_POST['nama_aset'];
    $merk_aset = $_POST['merk_aset'];
    $tahun_aset = $_POST['tahun_aset'];
    $nilai_aset = $_POST['nilai_aset'];
    $tanggal_aset = $_POST['tanggal_aset'];
    $spesifikasi_aset = $_POST['spesifikasi_aset'];
    $jenis_aset = $_POST['jenis_aset'];
    $nama_unit = $_POST['nama_unit'];
    $nama_suplier = $_POST['nama_suplier'];

    $sql = "UPDATE tb_aset SET nama_aset=:nama_aset, merk_aset=:merk_aset, tahun_aset=:tahun_aset, nilai_aset=:nilai_aset, tanggal_aset=:tanggal_aset, spesifikasi_aset=:spesifikasi_aset, kode_jenis=:jenis_aset, kode_unit=:nama_unit, kode_suplier=:nama_suplier WHERE kode_aset=:id";

    $query = $conn->prepare($sql);

    $query->bindParam(':id',$kode_aset, PDO::PARAM_STR);
    $query->bindParam(':nama_aset',$nama_aset, PDO::PARAM_STR);
    $query->bindParam(':merk_aset',$merk_aset, PDO::PARAM_STR);
    $query->bindParam(':tahun_aset',$tahun_aset, PDO::PARAM_STR);
    $query->bindParam(':nilai_aset',$nilai_aset, PDO::PARAM_STR);
    $query->bindParam(':tanggal_aset',$tanggal_aset, PDO::PARAM_STR);
    $query->bindParam(':spesifikasi_aset',$spesifikasi_aset, PDO::PARAM_STR);
    $query->bindParam(':jenis_aset',$jenis_aset, PDO::PARAM_STR);
    $query->bindParam(':nama_unit',$nama_unit, PDO::PARAM_STR);
    $query->bindParam(':nama_suplier',$nama_suplier, PDO::PARAM_STR);
    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Diubah.");
        window.location.href="../../index.php?page=data_aset"</script>';

    } else {
        print_r($query->errorInfo());
    }
}


/*
if($_POST){
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $query = ("UPDATE mahasiswa SET nim='$nim',nama='$nama',kelas='$kelas',jurusan='$jurusan' WHERE id_mahasiswa ='$id'");
    if(!mysql_query($query)){
        die(mysql_error);
    }else{
        echo '<script>alert("Data Berhasil Diubah.");
        window.location.href="../../index.php?page=data_mahasiswa"</script>';
    }    
}
*/
?>