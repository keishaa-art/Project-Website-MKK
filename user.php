<?php
include 'koneksi1.php';
session_start();
if(!isset($_SESSION['user'])){
    header('location: login-user.php');
}

$query = "SELECT * FROM pelanggan where username='$_SESSION[user]'";
$result = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($result);
?>

