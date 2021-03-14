<?php
session_start();

session_destroy();

session_start();
$_SESSION['login_error'] = "Silahkan Login Untuk Mengakses Sistem!";

header('location:login.php');
?>