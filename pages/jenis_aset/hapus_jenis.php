<?php 
include "../../conf/conn.php";
$id = $_GET['id'];

try{
    $query = $conn->query("DELETE FROM aset_jenis WHERE kode_jenis='$id' ");
    echo '<script>alert("Data Berhasil Dihapus.");
    window.location.href="../../index.php?page=data_jenis"</script>';
}catch(PDOException $e){
    echo $e->getMessage();
}
?>