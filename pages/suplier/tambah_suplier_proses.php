<?php
include "../../conf/conn.php";

if(isset($_POST['simpan_data'])){
    $kode_suplier = $_POST['kode_suplier'];
    $nama_suplier = $_POST['nama_suplier'];
    $alamat_suplier = $_POST['alamat_suplier'];
    $telp_suplier = $_POST['telp_suplier'];

    $query = $conn->prepare("INSERT INTO aset_suplier (kode_suplier, nama_suplier, alamat_Suplier, telp_suplier)
    VALUES (:kode_suplier, :nama_suplier, :alamat_suplier, :telp_suplier)");

    $query->bindParam(':kode_suplier',$kode_suplier);
    $query->bindParam(':nama_suplier',$nama_suplier);
    $query->bindParam(':alamat_suplier',$alamat_suplier);
    $query->bindParam(':telp_suplier',$telp_suplier);

    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Ditambahkan.");
        window.location.href="../../index.php?page=data_suplier"</script>';
    } else {
        $errors = $query->errorInfo();
        print_r($errors);
    }
}
?>