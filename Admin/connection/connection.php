<?php

$serverName = "DESKTOP-CI6US7C\SQLEXPRESS";
$database = "ABTC_DB";
$uid = "";
$pass = "";

try {
    $conn = new PDO("sqlsrv:Server=$serverName;Database=$database", $uid, $pass);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e){
    die("There is a problem in Connection: ".$e->getMessage());
}


