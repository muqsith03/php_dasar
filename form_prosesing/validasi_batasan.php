<?php 

    // cek apakah form disubmit atau tidak
    if(isset($_POST["submit"])){

        // ambil data dari form
        $nama = htmlentities(strip_tags(trim($_POST["nama"])));
        $email = htmlentities(strip_tags(trim($_POST["email"])));

        //siapkan variable pesan error
        $pesan_error = ""; 

        // nama harus 5 digit atau lebih
        if(empty($nama)){
            $pesan_error .= "nama minimal 5 digit <br>";
        } else if(strlen($nama) <= 5){
            // jika nama kosong
            $pesan_error .= "silahkan isi form nama <br>";
        }
        // jika email kosong
        if(empty($email)){
            $pesan_error .= "silahkan isi form email <br>";
        } else if(stripos($email, "@") === false){
            $pesan_error .= "format penulisan email salah <br>";
        }

        // jika tidka ada error, tampilkan isi form
        if($pesan_error == ""){
            echo "<h3>Form berhasil diproses</h3> <br>";
            echo "nama : $nama <br>";
            echo "email : $email <br>";
            die();
        }
    } else {
        $pesan_error = "";
        $nama = "";
        $email = "";

    }

    // contoh kasus 2
    if(isset($_POST["submit_2"])){
        // form disubmit, proses data

        // ambil nilai form
        $buku = htmlspecialchars(strip_tags(trim($_POST["buku"])));
        $jumlah = htmlentities(strip_tags(trim($_POST["jumlah"])));
        $ongkir = htmlentities(strip_tags(trim($_POST["ongkir"])));
        // siapkan variable error
        $pesan_error2 = "";
        // membuat daftar buku
        $daftar_buku = ["html uncover", "css uncover", "php uncover"];
        $buku = strtolower($buku);
        // cek apakah buku ada di daftar buku
        if(!in_array($buku, $daftar_buku)){
            $pesan_error2 .= "bku tidak tersedia <br>"; 
        }
        // jumlah pesanan harus berupa angka
        if(!is_numeric($jumlah)){
            $pesan_error2 .= "jumlah buku harus dalam satuan angka <br>";
        }
        // jumlah harus antara 1 sampai 10
        else if($jumlah <= 0 OR $jumlah >10 ){
            $pesan_error2 .= "jumlah buku antara 1-10 <br>";
        }
        // jumlah pesanan harus angka bulat
        else if($jumlah != round($jumlah)){
            $pesan_error2 .= "jumlah buku harus dalam bilangan bulat <br>";
        }

        // ongkos kirim harus berupa angka
        if(!is_numeric($ongkir) OR ($ongkir < 5000) OR (($ongkir % 1000) != 0)){
            $pesan_error2 .= "ongkos kirim haru dalam kelipatan 1000 (minimal 5000)";
        }

        // jika tidak ada error tampilkan isi form
        if($pesan_error2 === ""){
            echo "<h2>form berhaisl diproses</h2> <br>";
            echo "nama buku : $buku <br>";
            echo "jumlah buku : $jumlah <br>";
            echo "ongkos kirim : $ongkir <br>";
            die();            
        }

    } else {
        $pesan_error2 = "";
        $buku = "";
        $jumlah = "";
        $ongkir = "";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>validasi membuat batasan form</title>
    <?php include_once "bootstrap.php"; ?>
</head>
<body>
    <div class="container">
        <h2>membuat batasan untuk validasi form</h2>
        <form action="validasi_batasan.php" method="post">
            <span><?=$pesan_error ?></span>
            <p>nama : <input type="text" name="nama" id="nama" value="<?=$nama; ?>"></p>
            <p>email : <input type="text" name="email" id="email" value="<?=$email; ?>"></p>
            <p><input type="submit" name="submit" id="submit" value="Proses Data"></p>
        </form>

        <h2>contoh kasus ke 2 </h2>
        <form action="validasi_batasan.php" method="post">
            <span><?=$pesan_error2; ?></span>
            <p>nama buku : <input type="text" name="buku" id="buku" value="<?php echo $buku; ?>"></p>
            <p>jumlah pesanan : <input type="text" name="jumlah" id="jumlah" value="<?php echo $jumlah; ?>"></p>
            <p>ongkos kirim : <input type="text" name="ongkir" id="ongkir" value="<?php echo $ongkir; ?>"></p>
            <p><input type="submit" name="submit_2" id="submit_2" value="proses data"></p>
        </form>
    </div>
</body>
</html>