<?php
include "../../conf/conn.php";

if(isset($_POST['simpan_data'])){
    $kode_jenis = $_POST['kode_jenis'];
    $nama_jenis = $_POST['nama_jenis'];

    $query = $conn->prepare("INSERT INTO aset_jenis (kode_jenis, nama_jenis)
    VALUES (:kode_jenis, :nama_jenis)");

    $query->bindParam(':kode_jenis',$kode_jenis);
    $query->bindParam(':nama_jenis',$nama_jenis);

    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Ditambahkan.");
        window.location.href="../../index.php?page=data_jenis"</script>';
    } else {
        $errors = $query->errorInfo();
        print_r($errors);
    }
}
?>