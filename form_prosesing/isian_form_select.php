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


        <h4>contoh kasus 2 dengan banyak data</h4>
        <?php 
            $array_bin = [
                "1" => "Januari",
                "2" => "Februari",
                "3" => "Maret",
                "4" => "April",
                "5" => "Mei",
                "6" => "Juni",
                "7" => "Juli",
                "8" => "Agustus",
                "9" => "September",
                "10" => "Oktober",
                "11" => "November",
                "12" => "Desember",
            ];

            // cek apakah form telah disubmit
            if(isset($_POST["submit_2"])){
                // ambil nilai form
                $tgl = htmlentities(strip_tags(trim($_POST["tgl"])));
                $bln = htmlentities(strip_tags(trim($_POST["bln"])));
                $thn = htmlentities(strip_tags(trim($_POST["thn"])));

                // siapkan variale untuk error
                $pesan_error2 = "";

                // cek apakah tgl < 10
                if($tgl <= 10){
                    $pesan_error2 = "maaf, tanggal harus  > 10 <br>";
                }

                // jika tidak ada error 
                if($pesan_error2 == ""){
                    echo "form berhasil diproses <br>";
                    echo "tanggal dikirm : $tgl - $bln - $thn <br>";
                    die();
                }
            } else {
                $pesan_error2 ="";
            }

        ?>
        <span><?=$pesan_error2?></span>
        <form action="isian_form_select.php" method="post">
            <label for="tanggal">tanggal dikirim</label>
            <select name="tgl" id="id_tgl">
                <?php 
                    for($i=1; $i<= 31; $i++){
                        if($i == $tgl){
                            echo "<option value='$i' selected>";

                        } else{
                            echo "<option value ='$i'>";
                        }
                        echo str_pad($i,2,"0", STR_PAD_LEFT);
                        echo "</option>";
                    }
                ?>
            </select>
            <select name="bln" id="id_bln">
                <?php
                    foreach($array_bin as $key => $value ){
                        if($key==$bln){
                            echo "<option value='{$key}' selected>{$value}</option>";
                        }else{
                            echo "<option value='{$key}'>{$value}</option>";
                        }
                    }
                ?>
            </select>
            <select name="thn" id="id_thn">
                <?php
                    for($i=2020; $i<=2025; $i++ ){
                        if($i==$thn){
                            echo "<option value='$i' selected>";
                        }else{
                            echo "<option value='$i'>";
                        }
                        echo "$i</option>";
                    }
                ?>
            </select>
            <input type="submit" name="submit_2" id="" value="proses Data">
        </form>
    </div>
</body>
</html>