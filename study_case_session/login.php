<?php 
// cek apakah form telah disubmit
if(isset($_POST["submit"])) {
    // form telah disubmit, proses data
    // ambil nilai form
    $username = htmlentities(strip_tags(trim($_POST["username"])));
    $password = htmlentities(strip_tags(trim($_POST["password"])));

    // siapkan variable untuk menampung pesan error
    $pesan_error = "";

    // cek apakah username sudah diisi atau tidak
    if(empty($username)) {
        $pesan_error .= "username belum diisi <br>";
    }
    // cek apakah password sudah diisi atau tidak
    if(empty($password)) {
        $pesan_error .= "password belum diisi <br>";
    }
    // username harus "admin" dan password harus "rahasia"
    if($username!= "admin" OR $password!= "rahasia") {
        $pesan_error .= "username dan/atau password tidak sesuai";
    }
    // jika lolos validasi, set cookie
    if($pesan_error === "") {
        setcookie("username", "admin");
        setcookie("nama", "fajar");
        header("Location: data_siswa.php");
    }
} else {
    // form belum disubmit atau halaman ini tampil untuk pertama kali, berikan nilai awal untuk semua isian form
    $pesan_error = "";
    $username    = "";
    $password    = "";


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>studi casus : form login dengan session & cookie</title>
    <style>
        body{
            background-color: #f8f8f8;

        }
        div.container{
            width: 380px;
            padding: 10px 50px 80px;
            background-color: white;
            margin: 20px auto;
            box-shadow: 1px 0px 10px, -1px 0px 10px;
        }
        h1, h3{
            text-align: center;
            font-family: Cambria, "Times New Roman", serif;
        }
        p{
            margin: 0;
        }
        fieldset{
            padding: 20px;
            width: 240px;
            margin: auto;
        }
        input{
            margin-bottom: 10px;
        }
        input[type=submit] {
            float: right;
        }
        label{
            width: 80px;
            float: left;
            margin-right: 10px;
        }
        .error{
            background-color: #FFECEC;
            padding: 10px 15px;
            margin: 0 0 20px 0;
            border: 1px solid red;
            box-shadow: 1px, 0px 3px red;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>selamat datang</h1>
        <h3>website sekolah sma islamic village</h3>
        <?php
        // tampilkan error jika ada
            if($pesan_error !== ""){
                echo "<div class=\"error\">$pesan_error</div>";
            }
        ?>
        <!-- form -->
        <form action="login.php" method="post">
            <fieldset>
                <legend>Login</legend>
                <p>
                    <label for="username">Username :</label>
                    <input type="text" name="username" id="username" value="<?=$username; ?>">
                </p>
                <p>
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password" value="<?=$password?>">
                </p>
                <p>
                    <input type="submit" name="submit" id="submit" value="Log In">
                </p>
            </fieldset>
        </form>
    </div>
</body>
</html>