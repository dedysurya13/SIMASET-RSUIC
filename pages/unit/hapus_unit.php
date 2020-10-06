<?php 
include "../../conf/conn.php";
$id = $_GET['id'];

try{
    $query = $conn->query("DELETE FROM tb_aset WHERE kode_aset='$id' ");
    echo '<script>alert("Data Berhasil Dihapus.");
    window.location.href="../../index.php?page=data_aset"</script>';
}catch(PDOException $e){
    echo $e->getMessage();
}


/*
$query = ("DELETE FROM tb_aset WHERE kode_aset='$id' ");

if(!mysql_query($query)){
    die(mysql_error);
}else{
    echo '<script>alert("Data Berhasil Dihapus.");
    window.location.href="../../index.php?page=data_aset"</script>';
}
*/
?>