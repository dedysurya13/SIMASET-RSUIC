<?php 
include "../../conf/conn.php";


if(isset($_POST['simpan_data'])){
    $kode_perbaikan_aset = $_POST['id'];
    $tanggal_diterima = $_POST['tanggal_diterima'];
    $jam_diterima = $_POST['jam_diterima'];
    $kode_status = $_POST['kode_status'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    $jam_selesai = $_POST['jam_selesai'];
    $uraian_perbaikan = $_POST['uraian_perbaikan'];

    $sql = "UPDATE tb_perbaikan_aset SET tanggal_diterima=:tanggal_diterima, jam_diterima=:jam_diterima, tanggal_selesai=:tanggal_selesai, jam_selesai=:jam_selesai, uraian_perbaikan=:uraian_perbaikan, kode_status=:kode_status WHERE kode_perbaikan_aset=:id";

    $query = $conn->prepare($sql);

    $query->bindParam(':id',$kode_perbaikan_aset, PDO::PARAM_STR);
    $query->bindParam(':tanggal_diterima',$tanggal_diterima, PDO::PARAM_STR);
    $query->bindParam(':jam_diterima',$jam_diterima, PDO::PARAM_STR);
    $query->bindParam(':kode_status',$kode_status, PDO::PARAM_STR);
    $query->bindParam(':tanggal_selesai',$tanggal_selesai, PDO::PARAM_STR);
    $query->bindParam(':jam_selesai',$jam_selesai, PDO::PARAM_STR);
    $query->bindParam(':uraian_perbaikan',$uraian_perbaikan, PDO::PARAM_STR);
    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Diubah.");
        window.location.href="../../index.php?page=data_perbaikan"</script>';

    } else {
        print_r($query->errorInfo());
    }
}
?>