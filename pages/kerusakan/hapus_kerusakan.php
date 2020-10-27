<?php 
include "../../conf/conn.php";
$id = $_GET['id'];

try{
    $query = $conn->query("DELETE FROM tb_kerusakan_aset WHERE kode_kerusakan_aset='$id' ");
    echo '<script>alert("Data Berhasil Dihapus.");
    window.location.href="../../index.php?page=data_kerusakan"</script>';
}catch(PDOException $e){
    echo $e->getMessage();
}
?>