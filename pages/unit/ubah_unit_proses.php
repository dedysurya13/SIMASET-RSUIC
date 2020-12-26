<?php 
include "../../conf/conn.php";



if(isset($_POST['simpan_data'])){
    $kode_unit = $_POST['id'];
    $nama_unit = $_POST['nama_unit'];
    $nama_pj = $_POST['nama_pj'];

    $sql = "UPDATE aset_unit SET nama_unit=:nama_unit, nama_pj=:nama_pj WHERE kode_unit=:id";

    $query = $conn->prepare($sql);

    $query->bindParam(':id',$kode_unit, PDO::PARAM_STR);
    $query->bindParam(':nama_unit',$nama_unit, PDO::PARAM_STR);
    $query->bindParam(':nama_pj',$nama_pj, PDO::PARAM_STR);
    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Diubah.");
        window.location.href="../../index.php?page=data_unit"</script>';

    } else {
        print_r($query->errorInfo());
    }
}
?>