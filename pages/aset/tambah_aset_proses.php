<?php
include "../../conf/conn.php";

if(isset($_POST['simpan_data'])){
    $kode_aset = $_POST['kode_aset'];
    $nama_aset = $_POST['nama_aset'];
    $merk_aset = $_POST['merk_aset'];
    $tahun_aset = $_POST['tahun_aset'];
    $nilai_aset = $_POST['nilai_aset'];
    $tanggal_aset = $_POST['tanggal_aset'];
    $spesifikasi_aset = $_POST['spesifikasi_aset'];
    $jenis_aset = $_POST['jenis_aset'];
    $nama_unit = $_POST['nama_unit'];
    $nama_suplier = $_POST['nama_suplier'];

    $query = $conn->prepare("INSERT INTO tb_aset (kode_aset, nama_aset, merk_aset, tahun_aset, nilai_aset, tanggal_aset, spesifikasi_aset, kode_jenis, kode_unit, kode_suplier)
    VALUES (:kode_aset, :nama_aset, :merk_aset, :tahun_aset, :nilai_aset, :tanggal_aset, :spesifikasi_aset, :jenis_aset, :nama_unit, :nama_suplier)");

    $query->bindParam(':kode_aset',$kode_aset);
    $query->bindParam(':nama_aset',$nama_aset);
    $query->bindParam(':merk_aset',$merk_aset);
    $query->bindParam(':tahun_aset',$tahun_aset);
    $query->bindParam(':nilai_aset',$nilai_aset);
    $query->bindParam(':tanggal_aset',$tanggal_aset);
    $query->bindParam(':spesifikasi_aset',$spesifikasi_aset);
    $query->bindParam(':jenis_aset',$jenis_aset);
    $query->bindParam(':nama_unit',$nama_unit);
    $query->bindParam(':nama_suplier',$nama_suplier);
    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Ditambahkan.");
        window.location.href="../../index.php?page=data_aset"</script>';
    } else {
        $errors = $query->errorInfo();
        echo $errors;
    }
}

/*
if(isset($_POST['kode_aset'], $_POST['nama_aset'], $_POST['merk_aset'], $_POST['tahun_aset'], $_POST['nilai_aset'], $_POST['tanggal_aset'], $_POST['spesifikasi_aset'], $_POST['jenis_aset'], $_POST['nama_unit'], $_POST['nama_suplier'])){

    $query = $conn->query("INSERT INTO dbo.tb_aset (kode_aset, nama_aset, merk_aset, tahun_aset, nilai_aset, tanggal_aset, spesifikasi_aset, kode_jenis, kode_unit, kode_suplier)
    VALUES (:kode_aset, :nama_aset, :merk_aset, :tahun_aset, :nilai_aset, :tanggal_aset, :spesifikasi_aset, :jenis_aset, :nama_unit, :nama_suplier)");

    $query->bindParam(':kode_aset',$_POST['kode_aset']);
    $query->bindParam(':nama_aset',$_POST['nama_aset']);
    $query->bindParam(':merk_aset',$_POST['merk_aset']);
    $query->bindParam(':tahun_aset',$_POST['tahun_aset']);
    $query->bindParam(':nilai_aset',$_POST['nilai_aset']);
    $query->bindParam(':tanggal_aset',$_POST['tanggal_aset']);
    $query->bindParam(':spesifikasi_aset',$_POST['spesifikasi_aset']);
    $query->bindParam(':jenis_aset',$_POST['jenis_aset']);
    $query->bindParam(':nama_unit',$_POST['nama_unit']);
    $query->bindParam(':nama_suplier',$_POST['nama_suplier']);

    $kode_aset = $_POST['kode_aset'];
    $nama_aset = $_POST['nama_aset'];
    $merk_aset = $_POST['merk_aset'];
    $tahun_aset = $_POST['tahun_aset'];
    $nilai_aset = $_POST['nilai_aset'];
    $tanggal_aset = $_POST['tanggal_aset'];
    $spesifikasi_aset = $_POST['spesifikasi_aset'];
    $jenis_aset = $_POST['jenis_aset'];
    $nama_unit = $_POST['nama_unit'];
    $nama_suplier = $_POST['nama_suplier'];

    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Ditambahkan.");
        window.location.href="../../index.php?page=data_aset"</script>';
    } else {
        $errors = $squery->errorInfo();
        echo $errors;
    }
}
*/
?>