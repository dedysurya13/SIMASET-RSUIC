<?php
include "../../conf/conn.php";

if(isset($_POST['simpan_data'])){
    $kode_unit = $_POST['kode_unit'];
    $nama_unit = $_POST['nama_unit'];
    $nama_pj = $_POST['nama_pj'];

    $query = $conn->prepare("INSERT INTO aset_unit (kode_unit, nama_unit, nama_pj)
    VALUES (:kode_unit, :nama_unit, :nama_pj)");

    $query->bindParam(':kode_unit',$kode_unit);
    $query->bindParam(':nama_unit',$nama_unit);
    $query->bindParam(':nama_pj',$nama_pj);

    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Ditambahkan.");
        window.location.href="../../index.php?page=data_unit"</script>';
    } else {
        $errors = $query->errorInfo();
        print_r($errors);
    }
}
?>