<?php
include "../../conf/conn.php";

$sqlID = "SELECT MAX(kode_pemeriksaan_aset) FROM aset_pemeriksaan_aset";
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
    $kodeBaru="PR".$tglSekarang.$kodeAngka;;
}

if(isset($_POST['simpan_data'])){
    $kode_pemeriksaan_aset = $kodeBaru;
    $kode_aset = $_POST['kode_aset'];
    $tanggal_pemeriksaan_aset = $_POST['tanggal_pemeriksaan_aset'];
    $status_pemeriksaan_aset = $_POST['status_pemeriksaan_aset'];
    $hasil_pemeriksaan_aset = $_POST['hasil_pemeriksaan_aset'];
    $kode_petugas = $_POST['kode_petugas'];

    $query = $conn->prepare("INSERT INTO aset_pemeriksaan_aset (kode_pemeriksaan_aset, kode_aset, tanggal_pemeriksaan_aset, status_pemeriksaan_aset, hasil_pemeriksaan_aset, kode_petugas)
    VALUES (:kode_pemeriksaan_aset, :kode_aset, :tanggal_pemeriksaan_aset, :status_pemeriksaan_aset, :hasil_pemeriksaan_aset, :kode_petugas)");

    $query->bindParam(':kode_pemeriksaan_aset',$kode_pemeriksaan_aset);
    $query->bindParam(':kode_aset',$kode_aset);
    $query->bindParam(':tanggal_pemeriksaan_aset',$tanggal_pemeriksaan_aset);
    $query->bindParam(':status_pemeriksaan_aset',$status_pemeriksaan_aset);
    $query->bindParam(':hasil_pemeriksaan_aset',$hasil_pemeriksaan_aset);
    $query->bindParam(':kode_petugas',$kode_petugas);

    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Ditambahkan.");
        window.location.href="../../index.php?page=data_pemeriksaan"</script>';
    } else {
        $errors = $query->errorInfo();
        print_r($errors);
    }
}
?>