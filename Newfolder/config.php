<?php
$serverName = "SOME-PC"; 
$database = "p1";
$dbuid = "";
$dbpassword = "";
$connectionOptions = array(
    "Database" => $database,
    "Uid" => $dbuid,
    "PWD" => $dbpassword
);
$conn = sqlsrv_connect($serverName, $connectionOptions);
?>