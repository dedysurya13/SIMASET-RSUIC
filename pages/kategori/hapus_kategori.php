<?php 
include "../../conf/conn.php";
$id = $_GET['id'];

try{
    $query = $conn->query("DELETE FROM aset_kategori_aset WHERE kode_kategori='$id' ");
    echo '<script>alert("Data Berhasil Dihapus.");
    window.location.href="../../index.php?page=data_kategori"</script>';
}catch(PDOException $e){
    echo $e->getMessage();
}
?>