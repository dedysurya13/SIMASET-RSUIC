<?php 
/*
include "../conf/conn.php";

$username=mysql_real_escape_string(htmlentities($_POST['username']));
$password=mysql_real_escape_string(htmlentities($_POST['password']));

//md5
//$check=mysql_query("SELECT * FROM admin where username='$username' AND password=md5('$password')") or die(mysql_error());

$check=mysql_query("SELECT * FROM admin where username='$username' AND password='$password'") or die(mysql_error());

if(mysql_num_rows($check)>=1){
    while($row=mysql_fetch_array($check)){
        session_start();
        $_SESSION['id_admin']=$row['id_admin'];
?>      
        <script>alert("Selamat Datang <?= $row['username']; ?> Kamu Telah Login Ke Halaman Admin.");
        window.location.href="../index.php"</script>
<?php
    }
}else{
    echo '<script>alert("Username atau password salah!");
    window.location.href="login.php"</script>';
}
*/


include "../conf/conn.php";

$sql = "SELECT * FROM aset_petugas where username=:username AND password=:password";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
$stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
$stmt->execute();

if(($row = $stmt->fetch(PDO::FETCH_ASSOC))){
    session_start();
    $_SESSION['kode_role']=$row['kode_role'];
    $_SESSION['kode_petugas']=$row['kode_petugas'];
    $_SESSION['nama_petugas']=$row['nama_petugas'];
?>
    <script>//alert("Selamat Datang <?= $row['nama_petugas']; ?> Kamu Telah Login Ke Halaman Admin.");
        window.location.href="../index.php"</script>
<?php
}else{
    echo '<script>alert("Username atau password salah!");
    window.location.href="login.php"</script>';
}
?>