<?php
session_start();
include '../conf/conn.php';

$sess_admin = $_SESSION['kode_role'];

if (isset($sess_admin)){
    session_destroy();
    echo '<script>alert("Anda Telah Logout.");
    window.location.href="login.php"</script>';
}
?>