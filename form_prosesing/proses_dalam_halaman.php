<?php 
// cek apakah form telah disubmit 
if(isset($_POST["submit_2"])){
    // form telah disubmit, proses data
    // ambil data
    $nama_2 = htmlspecialchars(strip_tags(trim($_POST["nama_2"])));
    $email_2 = htmlentities(strip_tags(trim($_POST["email_2"])));

    // siapkan variable pesan error
    $pesan_error = "";

    // cek apakah nama sudah diisi
    if(empty($nama_2)){
        $pesan_error = "nama belum diisi <br>";
    }
    // cek apakah email sudah diisi
    if(empty($email_2)){
        $pesan_error = "email belum diisi <br>";
    }
    // jika tidak ada error, tampilkan isi form
    if($pesan_error ==""){
        echo "<h3>Form berhasil di proses</h3>";
        echo "nama : $nama_2 <br>";
        echo "email : $email_2 <br>";
    }
    if(empty($nama_2) & empty($email_2)){
        $pesan_error = "nama dan email belum di isi <br>";
    }
} else {
    $pesan_error = "";
    $nama_2 = "";
    $email_2 = "";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form prosesing : memproses form dalam halaman yang sama</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>memproses form dalam halaman yang sama</h2>
        <p>kita bisa membuat kode program dimana tampilkan form dan pemrosesan form dilakukan pada halaman yang sama. triknya adalah dengan mengisi atribut action di tag <\form\>.  namun kita perlu suatu cara untuk memisahkan kapan proses form dilakukan, dan kapan halaman index tampil tertama kali. teknik ini bisa dengan memeriksa kondisi variable $_POST["submit"]. jika ada jalankan pemrosesan form. jika tidak atrinya halman diakses pertama kali, maka cukup tampilkan form kosong </p>
        <form action="proses_dalam_halaman.php" method="post">
            <?=$pesan_error; ?>
            <p>nama : <input type="text" name="nama_2" id="nama_2" value="<?=$nama_2; ?>"></p>
            <p>email : <input type="text" name="email_2" id="email_2" value="<?=$email_2; ?>"></p>
            <p><input type="submit" name="submit_2" id="submit_2" value="Proses data"></p>
        </form>
        










    </div>

</body>
</html>