<?php
include "../../conf/conn.php";

if(isset($_POST['simpan_data'])){
    $kode_petugas = $_POST['kode_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_petugas = $_POST['nama_petugas'];
    $telp_petugas = $_POST['telp_petugas'];
    $kode_role = $_POST['kode_role'];

    $query = $conn->prepare("INSERT INTO aset_petugas (kode_petugas, username, password, nama_petugas, telp_petugas, kode_role)
    VALUES (:kode_petugas, :username, :password, :nama_petugas, :telp_petugas, :kode_role)");

    $query->bindParam(':kode_petugas',$kode_petugas);
    $query->bindParam(':username',$username);
    $query->bindParam(':password',$password);
    $query->bindParam(':nama_petugas',$nama_petugas);
    $query->bindParam(':telp_petugas',$telp_petugas);
    $query->bindParam(':kode_role',$kode_role);
    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Ditambahkan.");
        window.location.href="../../index.php?page=data_petugas"</script>';
    } else {
        $errors = $query->errorInfo();
        echo $errors;
    }
}
?>