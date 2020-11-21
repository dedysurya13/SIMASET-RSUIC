<?php
include "../../conf/conn.php";

if(isset($_POST['simpan_data'])){
    $kode_perbaikan_aset = $_POST['kode_perbaikan_aset'];
    $kode_kerusakan_aset = $_POST['kode_kerusakan_aset'];
    $tanggal_diterima = $_POST['tanggal_diterima'];
    $jam_diterima = $_POST['jam_diterima'];
    $kode_status = $_POST['kode_status'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    $jam_selesai = $_POST['jam_selesai'];
    $uraian_perbaikan = $_POST['uraian_perbaikan'];

    if ($tanggal_selesai == ""){
        $tanggal_selesai1 = NULL;
    }else{
        $tanggal_selesai1=$_POST['tanggal_selesai'];
    }

    if ($jam_selesai == "" || $jam_selesai == "00:00" ){
        $jam_selesai1 = NULL;
    }else{
        $jam_selesai1=$_POST['jam_selesai'];
    }

    $query = $conn->prepare("INSERT INTO tb_perbaikan_aset (kode_perbaikan_aset, kode_kerusakan_aset, tanggal_diterima, jam_diterima, tanggal_selesai, jam_selesai, uraian_perbaikan, kode_status)
    VALUES (:kode_perbaikan_aset, :kode_kerusakan_aset, :tanggal_diterima, :jam_diterima, :tanggal_selesai, :jam_selesai, :uraian_perbaikan, :kode_status)");

    $query->bindParam(':kode_perbaikan_aset',$kode_perbaikan_aset);
    $query->bindParam(':kode_kerusakan_aset',$kode_kerusakan_aset);
    $query->bindParam(':tanggal_diterima',$tanggal_diterima);
    $query->bindParam(':jam_diterima',$jam_diterima);
    $query->bindParam(':kode_status',$kode_status);
    $query->bindParam(':tanggal_selesai',$tanggal_selesai1);
    $query->bindParam(':jam_selesai',$jam_selesai1);
    $query->bindParam(':uraian_perbaikan',$uraian_perbaikan);

    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Ditambahkan.");
        window.location.href="../../index.php?page=data_perbaikan"</script>';
    } else {
        $errors = $query->errorInfo();
        print_r($errors);
    }
    //var_dump($tanggal_selesai);
    //var_dump($tanggal_selesai1);
}
?>