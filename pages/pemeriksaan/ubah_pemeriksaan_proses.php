<?php 
include "../../conf/conn.php";


if(isset($_POST['simpan_data'])){
    $kode_pemeriksaan_aset = $_POST['id'];
    $tanggal_pemeriksaan_aset = $_POST['tanggal_pemeriksaan_aset'];
    $status_pemeriksaan_aset = $_POST['status_pemeriksaan_aset'];
    $hasil_pemeriksaan_aset = $_POST['hasil_pemeriksaan_aset'];
    $kode_petugas = $_POST['kode_petugas'];

    $sql = "UPDATE tb_pemeriksaan_aset SET tanggal_pemeriksaan_aset=:tanggal_pemeriksaan_aset, status_pemeriksaan_aset=:status_pemeriksaan_aset, hasil_pemeriksaan_aset=:hasil_pemeriksaan_aset, kode_petugas=:kode_petugas WHERE kode_pemeriksaan_aset=:id";

    $query = $conn->prepare($sql);

    $query->bindParam(':id',$kode_pemeriksaan_aset, PDO::PARAM_STR);
    $query->bindParam(':tanggal_pemeriksaan_aset',$tanggal_pemeriksaan_aset, PDO::PARAM_STR);
    $query->bindParam(':status_pemeriksaan_aset',$status_pemeriksaan_aset, PDO::PARAM_STR);
    $query->bindParam(':hasil_pemeriksaan_aset',$hasil_pemeriksaan_aset, PDO::PARAM_STR);
    $query->bindParam(':kode_petugas',$kode_petugas, PDO::PARAM_STR);
    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Diubah.");
        window.location.href="../../index.php?page=data_pemeriksaan"</script>';

    } else {
        print_r($query->errorInfo());
    }
}
?>