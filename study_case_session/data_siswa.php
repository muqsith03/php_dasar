<!-- periksa apakah user sudah login. cek kehadiran cookie username, jika tidak ada redirect ke login.php -->
<?php
    // menggunaakn cookie
    // if(!isset($_COOKIE["username"])) {
    //     header("Location: login.php");
    // }

    // menggunakn session
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
    <title>Data siswa</title>
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

        <h1>Selamat Datang, <?php if(isset($_SESSION["nama"])){
            echo $_SESSION["nama"];
        } 
        else if(isset($_COOKIE["nama"])) {
            echo $_COOKIE["nama"];
        }
        ?></h1>
        <h3>Data Siswa Islamic Village</h3>
        <table>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Tempat Lahir</th>
            </tr>
            <tr>
                <td>01</td>
                <td>andika sitepu</td>
                <td>16</td>
                <td>Medan</td>
            </tr>
            <tr>
                <td>02</td>
                <td>Joko Susboyo</td>
                <td>17</td>
                <td>Bogor</td>
            </tr>
            <tr>
                <td>03</td>
                <td>Stephani Aleza</td>
                <td>17</td>
                <td>Jakarta</td>
            </tr>
            <tr>
                <td>04</td>
                <td>Sheila Pratiwi</td>
                <td>18</td>
                <td>Bandung</td>
            </tr>
        </table>
    </div>
</body>
</html>