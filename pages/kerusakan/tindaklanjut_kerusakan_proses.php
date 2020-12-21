<?php
include "../../conf/conn.php";
$sqlID = "SELECT MAX(kode_perbaikan_aset) FROM aset_perbaikan_aset";
$incrementID = $conn->prepare($sqlID);
$incrementID->execute();
$kodeTerakhir = $incrementID->fetchColumn();

$tglSekarang = date("ymd");

$kodeHuruf=substr($kodeTerakhir,0,2);
$kodeTanggal=substr($kodeTerakhir,2,6);
$kodeAngka=substr($kodeTerakhir,8);

if ($kodeTanggal==$tglSekarang){
    $kodeAngka=(int)$kodeAngka;
    $kodeAngka=$kodeAngka + 10001;
    $kodeAngka=substr($kodeAngka,1);
    $kodeBaru = $kodeHuruf.$kodeTanggal.$kodeAngka;
}else{
    $kodeAngka=10001;
    $kodeAngka=substr($kodeAngka,1);
    $kodeBaru="PB".$tglSekarang.$kodeAngka;;
}


if(isset($_POST['tindaklanjut'])){
    $kode_perbaikan_aset = $kodeBaru;
    $kode_kerusakan_aset = $_POST['kode_kerusakan_aset'];
    $tanggal_diterima = $_POST['tanggal_lapor'];
    $jam_diterima = $_POST['jam_lapor'];
    $kode_status = NULL;
    $tanggal_selesai = NULL;
    $jam_selesai = NULL;
    $uraian_perbaikan = NULL;


    $query = $conn->prepare("INSERT INTO aset_perbaikan_aset (kode_perbaikan_aset, kode_kerusakan_aset, tanggal_diterima, jam_diterima, tanggal_selesai, jam_selesai, uraian_perbaikan, kode_status)
    VALUES (:kode_perbaikan_aset, :kode_kerusakan_aset, :tanggal_diterima, :jam_diterima, :tanggal_selesai, :jam_selesai, :uraian_perbaikan, :kode_status)");

    $query->bindParam(':kode_perbaikan_aset',$kode_perbaikan_aset);
    $query->bindParam(':kode_kerusakan_aset',$kode_kerusakan_aset);
    $query->bindParam(':tanggal_diterima',$tanggal_diterima);
    $query->bindParam(':jam_diterima',$jam_diterima);
    $query->bindParam(':kode_status',$kode_status);
    $query->bindParam(':tanggal_selesai',$tanggal_selesai);
    $query->bindParam(':jam_selesai',$jam_selesai);
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