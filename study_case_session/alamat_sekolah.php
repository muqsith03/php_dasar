<!-- cek apakah sudah ada user login, cek kehadiran cookie, jika tidak ada, redirect ke login.php -->
<?php
    // menggunakan cookie
    // if(!isset($_COOKIE["username"])) {
    //     header("Location: login.php");
    // }

    // menggunkaan session
    session_start();
    
    if(!isset($_SESSION["nama"])){
        header("Location: login.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alamat Sekolah</title>
    <link rel="stylesheet" href="study_case.css">
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="data_siswa.php">Data siswa</a></li>
                <li><a href="nilai_siswa.php">Nilai siswa</a></li>
                <li><a href="alamat_sekolah.php">Alamat Sekolah</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>

        <h1>Selamat Datang <?=$_COOKIE["nama"] ?></h1>
        <h3>Alamat Sekolah SMK Islamic Village</h3>
        <p style="text-align: center;"><i>Islamic Village karawaci Tangerang</i></p>
    </div>
</body>
</html>