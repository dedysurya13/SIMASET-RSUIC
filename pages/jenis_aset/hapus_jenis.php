<?php 
include "../../conf/conn.php";
$id = $_GET['id'];

try{
    $query = $conn->query("DELETE FROM tb_unit WHERE kode_unit='$id' ");
    echo '<script>alert("Data Berhasil Dihapus.");
    window.location.href="../../index.php?page=data_unit"</script>';
}catch(PDOException $e){
    echo $e->getMessage();
}
?>