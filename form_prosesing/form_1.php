<?php 
    if(isset($_GET["pesan"])){
        $pesan = "<p>{$_GET["pesan"]}</p>";
    } else{
        $pesan = "";
    }

    // ambil nilai nama jika ada
    if(isset($_GET["nama"])){
        $nilai_nama = $_GET["nama"];
    }else{
        $nilai_nama = "";
    }

    // ambil nilai email jika ada
    if(isset($_GET["email"])){
        $nilai_email = $_GET["email"];
    } else{
        $nilai_email = "";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form prosesing 1</title>
    <!-- bootrstap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
</head>
<body>
    <div class="container">
        <h4>Latihan Form : menampilkan pesan kesalahan form</h4>
        <form action="proses_1.php" method="POST">
            <?=$pesan; ?>
            <p>Nama : <input type="text" name="nama" id="nama" value="<?=$nilai_nama ?>"></p>
            <p>email : <input type="text" name="email" id="email" value="<?=$nilai_email ?>"></p>
            <p><input type="submit" name="submit" id="submit" value="Submit"></p>
        </form>

    </div>
</body>
</html>