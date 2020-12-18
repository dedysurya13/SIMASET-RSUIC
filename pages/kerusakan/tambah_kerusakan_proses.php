<?php
include "../../conf/conn.php";

if(isset($_POST['simpan_data'])){
    $kode_kerusakan_aset = $_POST['kode_kerusakan_aset'];
    $kode_aset = $_POST['kode_aset'];
    $tanggal_lapor = $_POST['tanggal_lapor'];
    $jam_lapor = $_POST['jam_lapor'];
    $uraian_kerusakan = $_POST['uraian_kerusakan'];
    $kode_petugas = $_POST['kode_petugas'];

    $query = $conn->prepare("INSERT INTO aset_kerusakan_aset (kode_kerusakan_aset, kode_aset, tanggal_lapor, jam_lapor, uraian_kerusakan, kode_petugas)
    VALUES (:kode_kerusakan_aset, :kode_aset, :tanggal_lapor, :jam_lapor, :uraian_kerusakan, :kode_petugas)");

    $query->bindParam(':kode_kerusakan_aset',$kode_kerusakan_aset);
    $query->bindParam(':kode_aset',$kode_aset);
    $query->bindParam(':tanggal_lapor',$tanggal_lapor);
    $query->bindParam(':jam_lapor',$jam_lapor);
    $query->bindParam(':uraian_kerusakan',$uraian_kerusakan);
    $query->bindParam(':kode_petugas',$kode_petugas);

    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Ditambahkan.");
        window.location.href="../../index.php?page=data_kerusakan"</script>';
    } else {
        $errors = $query->errorInfo();
        print_r($errors);
    }
}
?>