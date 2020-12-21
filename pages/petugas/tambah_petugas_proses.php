<?php
include "../../conf/conn.php";

$sqlID = "SELECT MAX(kode_petugas) FROM aset_petugas";
$incrementID = $conn->prepare($sqlID);
$incrementID->execute();
$kodeTerakhir = $incrementID->fetchColumn();

$tglSekarang = date("ymd");

$kodeHuruf=substr($kodeTerakhir,0,3);
$kodeTanggal=substr($kodeTerakhir,3,6);
$kodeAngka=substr($kodeTerakhir,9);

if ($kodeTanggal==$tglSekarang){
    $kodeAngka=(int)$kodeAngka;
    $kodeAngka=$kodeAngka + 1001;
    $kodeAngka=substr($kodeAngka,1);
    $kodeBaru = $kodeHuruf.$kodeTanggal.$kodeAngka;
}else{
    $kodeAngka=1001;
    $kodeAngka=substr($kodeAngka,1);
    $kodeBaru="PTG".$tglSekarang.$kodeAngka;
}

if(isset($_POST['simpan_data'])){
    $kode_petugas = $kodeBaru;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_petugas = $_POST['nama_petugas'];
    $telp_petugas = $_POST['telp_petugas'];
    $kode_role = $_POST['kode_role'];
    $kode_unit = $_POST['kode_unit'];

    $query = $conn->prepare("INSERT INTO aset_petugas (kode_petugas, username, password, nama_petugas, telp_petugas, kode_role, kode_unit)
    VALUES (:kode_petugas, :username, :password, :nama_petugas, :telp_petugas, :kode_role, :kode_unit)");

    $query->bindParam(':kode_petugas',$kode_petugas);
    $query->bindParam(':username',$username);
    $query->bindParam(':password',$password);
    $query->bindParam(':nama_petugas',$nama_petugas);
    $query->bindParam(':telp_petugas',$telp_petugas);
    $query->bindParam(':kode_role',$kode_role);
    $query->bindParam(':kode_unit',$kode_unit);
    $query->execute();

    if($query->errorCode() == 0) {
        echo '<script>alert("Data Berhasil Ditambahkan.");
        window.location.href="../../index.php?page=data_petugas"</script>';
    } else {
        $errors = $query->errorInfo();
        print_r($errors) ;
    }
}
?>