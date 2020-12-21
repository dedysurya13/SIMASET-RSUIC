<?php
include "../../conf/conn.php";

$sqlID = "SELECT MAX(kode_kerusakan_aset) FROM aset_kerusakan_aset";
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
    $kodeBaru="RS".$tglSekarang.$kodeAngka;;
}

if(isset($_POST['simpan_data'])){
    $kode_kerusakan_aset = $kodeBaru;
    $kode_aset = $_POST['kode_aset'];
    $tanggal_lapor = $_POST['tanggal_lapor'];
    $jam_lapor = $_POST['jam_lapor'];
    $uraian_kerusakan = $_POST['uraian_kerusakan'];
    $kode_petugas = $_POST['kode_petugas'];

    $query = $conn->prepare("INSERT INTO aset_kerusakan_aset (kode_kerusakan_aset, kode_aset, tanggal_lapor, jam_lapor, uraian_kerusakan, kode_petugas)
    VALUES (:kode_kerusakan_aset, :kode_aset, :tanggal_lapor, :jam_lapor, :uraian_kerusakan, :kode_petugas)");

    $query->bindParam(':kode_kerusakan_aset',$kode_kerusakan_aset);
    $query->bindParam(':kode_aset',$kode_aset);
    $query->bindParam(':tanggal_lapor',$tanggal_lapor);
    $query->bindParam(':jam_lapor',$jam_lapor);
    $query->bindParam(':uraian_kerusakan',$uraian_kerusakan);
    $query->bindParam(':kode_petugas',$kode_petugas);

    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Ditambahkan.");
        window.location.href="../../index.php?page=data_kerusakan"</script>';
    } else {
        $errors = $query->errorInfo();
        print_r($errors);
    }
}
?>