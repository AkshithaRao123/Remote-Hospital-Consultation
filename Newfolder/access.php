<?php
session_start();
include 'config.php';

if(isset($_SESSION['username']))
{
    echo '<script language="javascript">document.location="dashboard.php"; alert("You are already logged in as '.$_SESSION['username'].'. Destroying the previous session.");</script>';
    // remove all session variables
    session_unset();
    // destroy the session
    session_destroy();

    session_start();
}

$_SESSION['username'] = $_POST['username'];
$_SESSION['pass'] = $_POST['password'];
// print_r($_SESSION);

if(isset($_SESSION['username'])){
    $sql = "SELECT * FROM UsAuth WHERE Username='".$_SESSION['username']."'";
	$stmt = sqlsrv_query($conn, $sql);
    $data = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if($_SESSION['pass'] !== $data['paswd'])
        {
        echo '<script language="javascript">document.location="login.html"; alert("Incorrect username/password. Please try again.");</script>';
        session_destroy();
        exit;
        }
    else
        {
        $_SESSION['login'] = $_SESSION['username'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['phoneNo'] = $data['phoneNo'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['role'] = $data['UserType'];
        echo '<script language="javascript">document.location="dashboard.php";</script>';
        }
}

// $sql = "SELECT * FROM UsAuth WHERE Username='".$_SESSION['username']."'";
// $result = sqlsrv_query($conn, $sql);
// $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
// print_r($data);

// if($result){
//     while($row = sqlsrv_fetch_array($result)) {
//         $_SESSION = $row;
//         print_r($_SESSION);
//         }    
//     }
?>