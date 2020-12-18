<?php 
include "../../conf/conn.php";
$id = $_GET['id'];

try{
    $query = $conn->query("DELETE FROM aset_perbaikan_aset WHERE kode_perbaikan_aset='$id' ");
    echo '<script>alert("Data Berhasil Dihapus.");
    window.location.href="../../index.php?page=data_perbaikan"</script>';
}catch(PDOException $e){
    echo $e->getMessage();
}
?>