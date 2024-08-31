<?php
session_start();
$logout = $_POST["logout"];

if(isset($logout))
{
    // remove all session variables
    session_unset();
    // destroy the session
    session_destroy();

    echo '<script language="javascript">document.location="index.html";</script>';
}
?>