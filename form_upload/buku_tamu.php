<?php 




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu</title>
    <?php include_once "../form_prosesing/bootstrap.php" ?>
</head>
<body>
<div class="container">

    <h1>buku tamu </h1>
    <table>
    <img src="folder_upload\pp.jpg" class="img-fluid" width="900px" height="20%">
    <tr>
        <td>Nama</td>
        <td><?=$nama; ?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?=$email; ?></td>
    </tr>
    <tr>
        <td>Komentar</td>
        <td><?= $komentar; ?></td>
    </tr>
    </table>
</div> 
</body>
</html>