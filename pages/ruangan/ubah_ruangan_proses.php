<?php 
include "../../conf/conn.php";



if(isset($_POST['simpan_data'])){
    $kode_ruangan = $_POST['id'];
    $kode_unit = $_POST['kode_unit'];
    $nama_ruangan = $_POST['nama_ruangan'];

    $sql = "UPDATE aset_ruangan SET kode_unit=:kode_unit, nama_ruangan=:nama_ruangan WHERE kode_ruangan=:id";

    $query = $conn->prepare($sql);

    $query->bindParam(':id',$kode_ruangan, PDO::PARAM_STR);
    $query->bindParam(':kode_unit',$kode_unit, PDO::PARAM_STR);
    $query->bindParam(':nama_ruangan',$nama_ruangan, PDO::PARAM_STR);
    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Diubah.");
        window.location.href="../../index.php?page=data_ruangan"</script>';

    } else {
        print_r($query->errorInfo());
    }
}
?>