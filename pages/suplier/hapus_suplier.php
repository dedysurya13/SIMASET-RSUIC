<?php 
include "../../conf/conn.php";
$id = $_GET['id'];

try{
    $query = $conn->query("DELETE FROM aset_suplier WHERE kode_suplier='$id' ");
    echo '<script>alert("Data Berhasil Dihapus.");
    window.location.href="../../index.php?page=data_suplier"</script>';
}catch(PDOException $e){
    echo $e->getMessage();
}
?>