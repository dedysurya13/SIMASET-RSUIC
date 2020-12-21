<?php
include "../../conf/conn.php";

$sqlID = "SELECT MAX(kode_suplier) FROM aset_suplier";
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
    $kodeBaru="SP".$tglSekarang.$kodeAngka;;
}


if(isset($_POST['simpan_data'])){
    $kode_suplier = $kodeBaru;
    $nama_suplier = $_POST['nama_suplier'];
    $alamat_suplier = $_POST['alamat_suplier'];
    $telp_suplier = $_POST['telp_suplier'];

    $query = $conn->prepare("INSERT INTO aset_suplier (kode_suplier, nama_suplier, alamat_Suplier, telp_suplier)
    VALUES (:kode_suplier, :nama_suplier, :alamat_suplier, :telp_suplier)");

    $query->bindParam(':kode_suplier',$kode_suplier);
    $query->bindParam(':nama_suplier',$nama_suplier);
    $query->bindParam(':alamat_suplier',$alamat_suplier);
    $query->bindParam(':telp_suplier',$telp_suplier);

    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Ditambahkan.");
        window.location.href="../../index.php?page=data_suplier"</script>';
    } else {
        $errors = $query->errorInfo();
        print_r($errors);
    }
}
?>