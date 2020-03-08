<?php

    // cek apakah form telah disubmit
    if(isset($_POST["submit"])){
        // ambil nilai dari form
        if(isset($_POST["dvd"])){
            $checked_dvd = "checked";
            $tambah_dvd = "+ Dvd eBook";
        } else{
            $checked_dvd = "";
            $tambah_dvd = "";
        }

        if(isset($_POST["kado"])){
            $tambah_kado = "+ bungkus kado";
            $checked_kado = "checked";
        } else {
            $checked_kado = "";
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
    } else {
        $pesan_error = "";
        $checked_dvd ="";
        $checked_kado = "";
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
            <input type="checkbox" name="dvd" id="dvd" value="dvd eBook" <?=$checked_dvd;?>>
            <label for="dvd">Dvd eBook</label>
            <input type="checkbox" name="kado" id="kado" value="bungkus kado" <?=$checked_kado;?>>
            <label for="kado">bungkus kado</label>
            <input type="submit" name="submit" id="submit" value="proses data">
        </form>

        <!-- repopulate isian radio button -->
        <h2>Repopulate isian Form radio button</h2>
        <?php 
            if(isset($_POST["submit_2"])){
                // ambil nilai dari form
                $kurir = htmlentities(strip_tags(trim($_POST["kurir"])));
                
                // siapkan pesan error
                $pesan_error2 = "";

                // validasi untuk tes
                if(true){
                    $pesan_error2 .= "maaf, ini hanya percobaan <br>";
                }

                // siapkan variabel untuk repopulate pilihan kurir
                $checked_jne = ""; $checked_tiki=""; $checked_pos="";

                switch($kurir){
                    case "jne" : $checked_jne = "checked"; break;
                    case "tiki" : $checked_tiki = "checked"; break;
                    case "pos" : $checked_pos = "checked"; break;
                }

                // jika tidak ada error proses form
                if($pesan_error2 == ""){
                    echo "form berhasil diproses <br>";
                    echo "tambah : $tambahan_dvd $tambah_kado <br>"; 
                    die();
                }
            } else{
                $pesan_error2 = "";
                $checked_jne = "checked";
                $checked_tiki = "";
                $checked_pos = "";
            }
        ?>

        <form action="isian_form_checkbox.php" method="post">
            <p>
                kurir pengiriman : 
                <label for="jne"><input type="radio" name="kurir" id="jne" value="jne"<?=$checked_jne;?>>jne</label>
                <label for="tiki"><input type="radio" name="kurir" id="tiki" value="tiki"<?=$checked_tiki;?>>tiki</label>
                <label for="pos"><input type="radio" name="kurir" id="pos" value="pos"<?=$checked_pos;?>>pos</label>
                <input type="submit" name="submit_2" id="submit_2">

            </p>
        </form>

    </div>
</body>
</html>