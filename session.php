<?php
    session_start();

    // membuat session
    $_SESSION["nama"] = "fajar";
    $_SESSION["id"] = "007";
    $_SESSION["hak_akses"] = "admin";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>session</title>
</head>
<body>
    <h4>SESSION</h4>
    <p>untuk menggunakan session harus menjalankan fungsi session_start() terlebih dahulu, session_start juga harus diletakan dipaling atas. </p>
    <p>contoh menampilkan session </br>
    <?php 
        echo "nama = ".$_SESSION["nama"]."</br>";
        echo "id = ".$_SESSION["id"]."</br>";
        echo "hak akses = ".$_SESSION["hak_akses"]."</br>";
    ?></p>
    <p>cara menghapus session </br>
    ada 3 cara menghapus session. </p>
    <ol>
        <li>jika ingin menghapus data cookie secara individual bisa menggunakan fungsi unset()</li>
        <li>menghapus seluruh variable session. dapat menggunakan fungsi session_unset()</li>
        <li>menghapus fisik file session. menggunakan fungsi session_destroy(). dengan menggunakan fungsi session_destroy akan menghapus file session dari temporari</li>
    </ol>
        
</body>
</html>