<!-- cek apakah sudah ada user login, cek kehadiran cookie username. jika tidak ada, redirect ke login.php -->
<?php 
    if(!isset($_COOKIE["username"])) {
        header("Location: login.php");
    }
?>