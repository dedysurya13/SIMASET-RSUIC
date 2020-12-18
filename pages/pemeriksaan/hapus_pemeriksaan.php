<?php 
include "../../conf/conn.php";
$id = $_GET['id'];

try{
    $query = $conn->query("DELETE FROM aset_pemeriksaan_aset WHERE kode_pemeriksaan_aset='$id' ");
    echo '<script>alert("Data Berhasil Dihapus.");
    window.location.href="../../index.php?page=data_pemeriksaan"</script>';
}catch(PDOException $e){
    echo $e->getMessage();
}
?>