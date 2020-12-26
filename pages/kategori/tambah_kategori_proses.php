<?php
include "../../conf/conn.php";

$sqlID = "SELECT MAX(kode_kategori) FROM aset_kategori_aset";
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
    $kodeBaru="KT".$tglSekarang.$kodeAngka;;
}

if(isset($_POST['simpan_data'])){
    $kode_kategori = $kodeBaru;
    $nama_kategori = $_POST['nama_unit'];

    $query = $conn->prepare("INSERT INTO aset_kategori_aset (kode_kategori, nama_kategori)
    VALUES (:kode_kategori, :nama_kategori)");

    $query->bindParam(':kode_kategori',$kode_kategori);
    $query->bindParam(':nama_kategori',$nama_kategori);

    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Ditambahkan.");
        window.location.href="../../index.php?page=data_kategori"</script>';
    } else {
        $errors = $query->errorInfo();
        print_r($errors);
    }
}
?> 