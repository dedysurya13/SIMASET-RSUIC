<?php 
include "../../conf/conn.php";


if(isset($_POST['simpan_data'])){
    $kode_kerusakan_aset = $_POST['id'];
    $tanggal_lapor = $_POST['tanggal_lapor'];
    $jam_lapor = $_POST['jam_lapor'];
    $uraian_kerusakan = $_POST['uraian_kerusakan'];
    $kode_petugas = $_POST['kode_petugas'];

    $sql = "UPDATE tb_kerusakan_aset SET tanggal_lapor=:tanggal_lapor, jam_lapor=:jam_lapor, uraian_kerusakan=:uraian_kerusakan, kode_petugas=:kode_petugas WHERE kode_kerusakan_aset=:id";

    $query = $conn->prepare($sql);

    $query->bindParam(':id',$kode_kerusakan_aset, PDO::PARAM_STR);
    $query->bindParam(':tanggal_lapor',$tanggal_lapor, PDO::PARAM_STR);
    $query->bindParam(':jam_lapor',$jam_lapor, PDO::PARAM_STR);
    $query->bindParam(':uraian_kerusakan',$uraian_kerusakan, PDO::PARAM_STR);
    $query->bindParam(':kode_petugas',$kode_petugas, PDO::PARAM_STR);
    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Diubah.");
        window.location.href="../../index.php?page=data_kerusakan"</script>';

    } else {
        print_r($query->errorInfo());
    }
}
?>