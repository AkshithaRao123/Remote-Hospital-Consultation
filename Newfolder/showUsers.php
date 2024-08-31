<?php
// session_start();
include 'config.php';

// $_SESSION['username'] = $_POST['username'];
// $_SESSION['pass'] = $_POST['password'];
// print_r($_SESSION);
$a = "Vijaya";
// if(isset($_SESSION['username'])){
$sql = "SELECT paswd FROM UsAuth WHERE Username='$a'";
$stmt = sqlsrv_query($conn, $sql);
    
$data = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

print_r($data);
?>