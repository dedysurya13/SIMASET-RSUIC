<?php 
include "../../conf/conn.php";
$id = $_GET['id'];

try{
    $query = $conn->query("DELETE FROM aset_ruangan WHERE kode_ruangan='$id' ");
    echo '<script>alert("Data Berhasil Dihapus.");
    window.location.href="../../index.php?page=data_unit"</script>';
}catch(PDOException $e){
    echo $e->getMessage();
}
?>