<?php
    // cek apakah form submit di submit
    if(isset($_POST["submit"])){
        // form telah disubmit

        // ambil nilai form
        $buku = htmlentities(strip_tags(trim($_POST["buku"])));
        
        // siapkan pesan error
        $pesan_error = "";

        // cek buku apakah sudah dipilih atau tidak
        if(empty($buku)){
            $pesan_error = " buku belum dipilih <br>";
        }

        // cek buku = javascript atau mysql
        if($buku == "javascript" OR $buku == "mysql"){
            $pesan_error = "maaf, buku belum tersedia <br>";
        }

        // siapkan variable untuk re-populate pilihan buku. agar ketika erorr masih menunjukan elemen yang dipilih
        $select_html= ""; $select_css = ""; $select_php = ""; $select_mysql = ""; $select_javascript = "";

        switch($buku){
            case "html" : $select_html = "selected"; break;
            case "css" : $select_css = "selected"; break;
            case "php" : $select_php = "selected"; break;
            case "mysql" : $select_mysql = "selected"; break;
            case "javascript" : $select_javascript = "selected"; break;
        }

        // jika tidak ada error, tampilkan isi form
        if($pesan_error == ""){
            echo "<h4>form berhasil di proses</h4> <br>";
            echo "buku : $buku <br>";
            die();
        }
    } else {
        $pesan_error = "";
        $select_html = "selected";
        $select_css = ""; $select_php = ""; $select_mysql = ""; $select_javascript = "";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form re-populate</title>
    <?php include_once "bootstrap.php" ?>
</head>
<body>
    <div class="container">
        <h2>repopulate isian form select</h2>
        <p>cara mengisi kembali isian form dengan jenis select, checkbox, dan radio button. contoh :</p>
        <span><?=$pesan_error; ?></span>
        <form action="isian_form_select.php" method="post">
            <p>jenis buku  : 
            <select name="buku" id="id_buku">
                <option value="html"<?=$select_html; ?>>html</option>
                <option value="css"<?=$select_css; ?>>css</option>
                <option value="php"<?=$select_php; ?>>php</option>
                <option value="mysql"<?=$select_mysql; ?>>mysql</option>
                <option value="javascript"<?=$select_javascript; ?>>javascript</option>
            </select></p>
            <p><input type="submit" name="submit" id="submit"></p>
        </form>
    </div>
</body>
</html>