<!-- cek apakah sudah ada user login, cek kehadiran cookie username. jika tidak ada, redirect ke login.php -->
<?php 
    // menggunakan cookie
    // if(!isset($_COOKIE["username"])) {
    //     header("Location: login.php");
    // }

    // menggunakan session
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
    <title>Nilai Siswa</title>
    <link rel="stylesheet" href="study_case.css">
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="data_siswa.php">Data Siswa</a></li>
                <li><a href="nilai_siswa.php">Nilai Siswa</a></li>
                <li><a href="alamat_sekolah.php">Alamat Sekolah</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <h1>Selamat Datang <?php if(isset($_SESSION["nama"])){
            echo $_SESSION["nama"];
        } ?></h1>
        <h3>Rekap Nilai Siswa SMK Islamic Village</h3>
        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nilai Ujian</th>
                <th>Grade</th>
            </tr>
            <tr>
                <td>01</td>
                <td>Andika Sitepu</td>
                <td>80</td>
                <td>B</td>
            </tr>
            <tr>
                <td>02</td>
                <td>Joko Susboyo</td>
                <td>90</td>
                <td>A</td>
            </tr>
            <tr>
                <td>03</td>
                <td>Stephani Aleza</td>
                <td>75</td>
                <td>C</td>
            </tr>
            <tr>
                <td>04</td>
                <td>Sheila Pratiwi</td>
                <td>95</td>
                <td>A</td>
            </tr>
        </table>
    </div>
</body>
</html>