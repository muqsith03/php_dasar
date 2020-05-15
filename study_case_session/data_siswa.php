<!-- periksa apakah user sudah login. cek kehadiran cookie username, jika tidak ada redirect ke login.php -->
<?php
    if(!isset($_COOKIE["username"])) {
        header("Location: login.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data siswa</title>
</head>
<body>
    <h1>data siswa</h1>
</body>
</html>