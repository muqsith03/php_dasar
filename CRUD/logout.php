<?php
    session_start();

    // hapus session
    unset($_SESSION["nama"]);

    // redirect ke halaman login
    header("Location: halaman_login.php");
?>