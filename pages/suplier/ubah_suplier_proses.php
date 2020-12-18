<?php 
include "../../conf/conn.php";

if(isset($_POST['simpan_data'])){
    $kode_suplier = $_POST['id'];
    $nama_suplier = $_POST['nama_suplier'];
    $alamat_suplier = $_POST['alamat_suplier'];
    $telp_suplier = $_POST['telp_suplier'];

    $sql = "UPDATE aset_suplier SET nama_suplier=:nama_suplier, alamat_suplier=:alamat_suplier, telp_suplier=:telp_suplier WHERE kode_suplier=:id";

    $query = $conn->prepare($sql);

    $query->bindParam(':id',$kode_suplier, PDO::PARAM_STR);
    $query->bindParam(':nama_suplier',$nama_suplier, PDO::PARAM_STR);
    $query->bindParam(':alamat_suplier',$alamat_suplier, PDO::PARAM_STR);
    $query->bindParam(':telp_suplier',$telp_suplier, PDO::PARAM_STR);
    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Diubah.");
        window.location.href="../../index.php?page=data_suplier"</script>';

    } else {
        print_r($query->errorInfo());
    }
}
?>