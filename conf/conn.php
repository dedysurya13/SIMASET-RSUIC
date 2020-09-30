<?php
/*
$serverName = "DEDYSURYAPC\SQLEXPRESS"; //serverName\instanceName
$connectionInfo = array( "Database"=>"asetrsuic", "UID"=>"sa", "PWD"=>"admin1");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
*/

$servername = "DEDYSURYAPC\SQLEXPRESS";
$username = "sa";
$password = "admin1";
$database = "asetrsuic";

try {
    $conn = new PDO("sqlsrv:server=$servername;Database=$database;ConnectionPooling=0", $username, $password);
} catch (PDOException $e) {
    echo ("Error connecting to SQL Server: " . $e->getMessage());
}



?>