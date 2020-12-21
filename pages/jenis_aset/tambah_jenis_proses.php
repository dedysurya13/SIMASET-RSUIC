<?php
include "../../conf/conn.php";


$sqlID = "SELECT MAX(kode_jenis) FROM aset_jenis";
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
    $kodeBaru="JN".$tglSekarang.$kodeAngka;;
}

if(isset($_POST['simpan_data'])){
    $kode_jenis = $kodeBaru;
    $nama_jenis = $_POST['nama_jenis'];

    $query = $conn->prepare("INSERT INTO aset_jenis (kode_jenis, nama_jenis)
    VALUES (:kode_jenis, :nama_jenis)");

    $query->bindParam(':kode_jenis',$kode_jenis);
    $query->bindParam(':nama_jenis',$nama_jenis);

    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Ditambahkan.");
        window.location.href="../../index.php?page=data_jenis"</script>';
    } else {
        $errors = $query->errorInfo();
        print_r($errors);
    }
}
?>