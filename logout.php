<?php
session_start();
unset($_SESSION['$uname']);
session_destroy();
// $_SESSION = [''];
header('location:login.php');
?>