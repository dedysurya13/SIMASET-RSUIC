<?php 
include "../../conf/conn.php";

if(isset($_POST['simpan_data'])){
    $kode_kategori = $_POST['id'];
    $nama_kategori = $_POST['nama_kategori'];

    $sql = "UPDATE aset_kategori_aset SET nama_kategori=:nama_kategori WHERE kode_kategori=:id";

    $query = $conn->prepare($sql);

    $query->bindParam(':id',$kode_kategori, PDO::PARAM_STR);
    $query->bindParam(':nama_kategori',$nama_kategori, PDO::PARAM_STR);
    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Diubah.");
        window.location.href="../../index.php?page=data_kategori"</script>';

    } else {
        print_r($query->errorInfo());
    }
}
?>