
<?php
include "../../conf/conn.php";

if(isset($_POST['hapusperbaikan'])){
    $kode_perbaikan_aset = $_POST['kode_perbaikan_aset'];
    $kode_kerusakan_aset = $_POST['kode_kerusakan_aset'];



    $query = $conn->prepare("DELETE FROM aset_perbaikan_aset WHERE kode_perbaikan_aset=:kode_perbaikan_aset");

    $query->bindParam(':kode_perbaikan_aset',$kode_perbaikan_aset);

    if($query->execute()){
        //ubah flag tidak lanjuti kerusakan aset
        $query = $conn->prepare("UPDATE aset_kerusakan_aset SET kode_flag='0' WHERE kode_kerusakan_aset=:kode_kerusakan_aset2");
        $query->bindParam(':kode_kerusakan_aset2',$kode_kerusakan_aset);
        $query->execute();
        
        if($query->errorCode() == 0) {

            echo '<script>alert("Data Berhasil Dihapus.");
            window.location.href="../../index.php?page=data_perbaikan"</script>';
        } else {
            $errors = $query->errorInfo();
            print_r($errors);
        }
    }


    //var_dump($tanggal_selesai);
    //var_dump($tanggal_selesai1);
}
?>