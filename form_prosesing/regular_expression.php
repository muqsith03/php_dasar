<?php 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>regular expressions</title>
    <?php include_once "bootstrap.php" ?>
</head>
<body>
    <div class="container">
        <h2>regular expression </h2>
        <p>regular expression adalah kumpulan furuf atau karakter yang digunakan untuk pencocokan pola(pattern matching). untuk membuat proses validasi menggunakan regular expression dengan fungsi preg_match(). contoh :</p>
        <p><?php 
            $hasil = preg_match("/[0-9]{5}/", "abcde");
            echo $hasil."<br>";

            $hasil = preg_match("/^[0-9]{5}$/", "12345");
            echo $hasil."<br";
        ?></p>
        <p>pertama, string regular expression harus dibatasi dengan dua buah karakter. dalam contoh diatas menggunakan karakter '/' sebagai pembatas. kita juga bisa menggunakan karakter lain seperti '#' atau '|' namun yang sering dugunakan php adalah '/'</p>
        
    </div>
</body>
</html>