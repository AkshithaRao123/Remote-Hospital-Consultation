<?php
session_start();

include 'config.php';

$_SESSION['username'] = $_POST['username'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['pno'] = $_POST['phone'];
$_SESSION['pass'] = $_POST['password'];
$_SESSION['role'] = $_POST['role'];
print_r($_SESSION);

if(isset($_SESSION['username'])){
    $sql = "INSERT INTO UsAuth VALUES('".$_SESSION['username']."','".$_SESSION['pass']."','".$_SESSION['email']."','".$_SESSION['pno']."','".$_SESSION['role'] = $_POST['role']."')";
	$stmt = sqlsrv_query($conn, $sql);

    echo '<script language="javascript">document.location="dashboard.php"; </script>';
    
    $data = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if($_SESSION['pass'] !== $data['paswd'])
        {
        echo '<script language="javascript">document.location="login.html"; alert("Incorrect username/password. Please try again.");</script>';
        exit;
        }
    else
        {
        $_SESSION['login'] = $_SESSION['username'];
        $_SESSION['phoneNo'] = $data['phoneNo'];
        echo '<script language="javascript">document.location="dashboard.php";</script>';
        }
}
?>