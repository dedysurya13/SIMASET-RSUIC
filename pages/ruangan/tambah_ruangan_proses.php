<?php
include "../../conf/conn.php";

$sqlID = "SELECT MAX(kode_ruangan) FROM aset_ruangan";
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
    $kodeBaru="RU".$tglSekarang.$kodeAngka;;
}

if(isset($_POST['simpan_data'])){
    $kode_ruangan = $kodeBaru;
    $kode_unit = $_POST['kode_unit'];
    $nama_ruangan = $_POST['nama_ruangan'];

    $query = $conn->prepare("INSERT INTO aset_ruangan (kode_ruangan, kode_unit, nama_ruangan)
    VALUES (:kode_ruangan, :kode_unit, :nama_ruangan)");

    $query->bindParam(':kode_ruangan',$kode_ruangan);
    $query->bindParam(':kode_unit',$kode_unit);
    $query->bindParam(':nama_ruangan',$nama_ruangan);

    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Ditambahkan.");
        window.location.href="../../index.php?page=data_ruangan"</script>';
    } else {
        $errors = $query->errorInfo();
        print_r($errors);
    }
}
?>