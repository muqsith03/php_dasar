<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>belajar PHP</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- my css -->
    <link rel="stylesheet" href="belajar_php.css">
</head>
<body>
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-6">
                <h4>latihan 1 : logika if mencari nilai ganjil genap</h4>
                <p>menggunakan javascript</p>
                <p>masukan angka <input type="text" name="angka_1" id="angka-1"></p>
                <button id="tombol-angka-1">Cari tahu</button>
                <p>hasil : <span id="hasil-angka-1"></span></p>
                <p>menggunakan PHP</p>
                <?php
                    $latihan_1 = 2;
                    echo "apa hasil dari angka $latihan_1 ? apakah genap atau ganjil ?";
                    echo "<br>";
                    if($latihan_1 % 2 == 0){
                        echo "angka $latihan_1 adalah genap";
                    } else {
                        echo "angka $latihan_1 adalah ganjil";
                    }
                ?>
            </div>
            <div class="col-md-6 garis-vertikal">
                <h4>latihan 2 : lebih besar, lebih kecil atau sama dengan</h4>
                <p>buatlah sebuah kode program yang terdiri dari 2 variable $a dan $b. kedua variable ini berisi angka integer / float. tampilkan seperti ini :</p>
                <p>$a lebih kecil dari $b</p>
                <p>$a lebih besar dari $b</p>
                <p>$a sama dengan $b</p>
                <?php
                    $a = 10;
                    $b = 10;
                    if($a < $b){
                        echo "$a lebih kecil dari $b";
                    } else if($a > $b){
                        echo "$a lebih besar dari $b";
                    } else {
                        echo "$a sama dengan $b";
                    }
                ?>
                <h4>menggunakan javascript</h4>
                <p>angka 1 : <input type="text" name="latihan_2_1" id="latihan-besar-2"></p>
                <p>angka 2 : <input type="text" name="latihan_2_2" id="latihan-kecil-2"></p>
                <p><button id="tombol-latihan-2">Cari tahu</button></p>
                <p>hasil : <span id="hasil-latihan-2"></span></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h4>Latihan 3 : username dan password</h4>
                <p>buatlah kode program yang akan memeriksa apakah $username berisi string "admin" dan $password berisi string "qwery". jika benar keduanaya tampailkan pesan "username dan password sesuai, hak akses diberikan !"</p>
                <?php
                    $username = "admin";
                    $password = "qwerty";
                    if($username == "admin" && $password == "qwerty"){
                        echo "username dan password sesuai, hak akses diberikan !";
                    } else if($username == "admin" && $password != "qwerty"){
                        echo "password tidak sesuai";
                    } else if($username != "admin" && $password == "qwerty"){
                        echo "username tidak sesuai";
                    }
                    else {
                        echo "username dan password tidak sesuai, silahkan coba lagi";
                    }
                ?>
                <h4>menggunakan javascript</h4>
                <p>username : <input type="text" name="" id="username"></p>
                <p>password : <input type="text" name="" id="password"></p>
                <button id="tombol-latihan-3">Cek password</button>
                <p>hasil : <span id="hasil-latihan-3"></span></p>
            </div>
        </div>







    </div>
    
    <script src="belajar_php.js"></script>
</body>
</html>