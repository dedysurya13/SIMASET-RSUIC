<?php 
include "../../conf/conn.php";
$id = $_GET['id'];

try{
    $query = $conn->query("DELETE FROM tb_petugas WHERE kode_petugas='$id' ");
    echo '<script>alert("Data Berhasil Dihapus.");
    window.location.href="../../index.php?page=data_petugas"</script>';
}catch(PDOException $e){
    echo $e->getMessage();
}

?>