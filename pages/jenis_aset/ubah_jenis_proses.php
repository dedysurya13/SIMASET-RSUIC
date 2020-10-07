<?php 
include "../../conf/conn.php";

if(isset($_POST['simpan_data'])){
    $kode_jenis = $_POST['id'];
    $nama_jenis = $_POST['nama_jenis'];

    $sql = "UPDATE tb_jenis SET nama_jenis=:nama_jenis WHERE kode_jenis=:id";

    $query = $conn->prepare($sql);

    $query->bindParam(':id',$kode_jenis, PDO::PARAM_STR);
    $query->bindParam(':nama_jenis',$nama_jenis, PDO::PARAM_STR);
    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Diubah.");
        window.location.href="../../index.php?page=data_jenis"</script>';

    } else {
        print_r($query->errorInfo());
    }
}
?>