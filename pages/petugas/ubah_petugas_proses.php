<?php 
include "../../conf/conn.php";

if(isset($_POST['simpan_data'])){
    $kode_petugas = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_petugas = $_POST['nama_petugas'];
    $telp_petugas = $_POST['telp_petugas'];
    $kode_role = $_POST['kode_role'];

    $sql = "UPDATE tb_petugas SET username=:username, password=:password, nama_petugas=:nama_petugas, telp_petugas=:telp_petugas, kode_role=:kode_role WHERE kode_petugas=:id";

    $query = $conn->prepare($sql);

    $query->bindParam(':id',$kode_petugas, PDO::PARAM_STR);
    $query->bindParam(':username',$username, PDO::PARAM_STR);
    $query->bindParam(':password',$password, PDO::PARAM_STR);
    $query->bindParam(':nama_petugas',$nama_petugas, PDO::PARAM_STR);
    $query->bindParam(':telp_petugas',$telp_petugas, PDO::PARAM_STR);
    $query->bindParam(':kode_role',$kode_role, PDO::PARAM_STR);
    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Diubah.");
        window.location.href="../../index.php?page=data_petugas"</script>';

    } else {
        print_r($query->errorInfo());
    }
}
?>