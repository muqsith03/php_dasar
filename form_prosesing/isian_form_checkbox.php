<?php

    // cek apakah form telah disubmit
    if(isset($_POST["submit"])){
        // ambil nilai dari form
        if(isset($_POST["dvd"])){
            $tambah_dvd = "+ Dvd eBook";
        } else{
            $tambah_dvd = "";
        }

        if(isset($_POST["kado"])){
            $tambah_kado = "+ bungkus kado";
        } else {
            $tambah_kado ="";
        }

        // siapkan variable pesan error
        $pesan_error = "";

        // validasi untuk test
        if(true){
            $pesan_error .= "maaf, ini hanya untuk percobaan <br>";
        }

        // jika tidak ada error, tampilkan isi form
        if($pesan_error === ""){
            echo "form berhasil diproses <br>";
            echo "tambahan : $tambah_dvd $tambah_kado <br>";
            die();

        }
        else{
            $pesan_error = "";
        }
    } 
    
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>isian form checkbox</title>
    <!-- bootstrap -->
    <?php include_once "bootstrap.php" ?>
</head>
<body>
    <div class="container">
        <h2>repopulate isian checkbox</h2>
        <span><?=$pesan_error;?></span>
        <form action="isian_form_checkbox.php" method="post">
            <label for="">Tambah : </label>
            <input type="checkbox" name="dvd" id="dvd" value="dvd eBook">
            <label for="dvd">Dvd eBook</label>
            <input type="checkbox" name="kado" id="kado" value="bungkus kado">
            <label for="kado">bungkus kado</label>
            <input type="submit" name="submit" id="submit" value="proses data">
        </form>
    </div>
</body>
</html>