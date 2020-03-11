<?php

$nama_bulan = [
    "1" => "januari",
    "2" => "februari",
    "3" => "maret",
    "4" => "april",
    "5" => "mei",
    "6" => "juni",
    "7" => "juli",
    "8" => "agustus",
    "9" => "september",
    "10" => "oktober",
    "11" => "november",
    "12" => "desember"
];

if(isset($_POST["submit"])){

    $nama = htmlentities(strip_tags(trim($_POST["nama"])));
    $email = htmlentities(strip_tags(trim($_POST["email"])));
    $buku = htmlentities(strip_tags(trim($_POST["buku"])));
    $jumlah = htmlentities(strip_tags(trim($_POST["jumlah"])));
    $alamat = htmlentities(strip_tags(trim($_POST["alamat"])));
    $kurir = htmlentities(strip_tags(trim($_POST["kurir"])));
    $ongkir = htmlentities(strip_tags(trim($_POST["ongkir"])));
    $tgl = htmlentities(strip_tags(trim($_POST["tgl"])));
    $bln = htmlentities(strip_tags(trim($_POST["bln"])));
    $thn = htmlentities(strip_tags(trim($_POST["thn"])));

    // siapkan variable untuk menampung pesan error
    $pesan_error = "";

    // cek apakah nama sudah diisi
    if(empty($nama)){
        $pesan_error .= "nama belum diisi <br>";
    }

    // cek apakah email sudah diisi
    if(empty($email)){
        $pesan_error .= "email belum diisi <br>";
    }
    // email harus dalam format email
    else if(!preg_match("/.+@.+\..+/", $email)){
        $pesan_error .= "format email tidak sesuai <br>";
    }

    // siapkan variable untuk mengenerate pilihan buku
    $select_html=""; $select_css=""; $select_php = ""; $select_mysql =""; $select_javascript = "";

    switch($buku){
        case "html uncover" : $select_html = "selected"; break;
        case "css uncover" : $select_css = "selected"; break;
        case "php uncover" : $select_php = "selected"; break;
        case "javascript uncover" : $select_javascript = "selected"; break;
        case "mysql uncover" : $select_mysql = "selected"; break;
    }

    // cek apakah alamat dudah diisi 
    if(empty($alamat)){
        $pesan_error .= "alamat pengiriman belum diisi <br>";
    }

    // siapkan variable untuk mengenerate pilhan kurir
    $checked_jne=""; $checked_tiki = ""; $checked_pos="";

    switch($kurir){
        case "jne" : $checked_jne = "checked"; break;
        case "tiki" : $checked_tiki = "checked"; break;
        case "pos" : $checked_pos = "checked"; break;
    }

    // ongkos kirim harus berupa angka dan kelipatan 1rb
    if(!is_numeric($ongkir) OR ($ongkir <= 0 ) OR (($ongkir % 1000) !=0)){
        $pesan_error .= "ongkos kirim harus kelipatan 1000"; 
    }
    
    // checkbox
    if(isset($_POST["dvd"])){
        $checked_dvd = "checked";
        $tambahan_dvd = "+ dvd eBook";
    } else{
        $checked_dvd = "";
        $tambahan_dvd = "";
    }

    if(isset($_POST["kado"])){
        $checked_kado = "checked";
        $tambahan_kado = "+ bungkus kado";
    } else{
        $checked_kado = "";
        $tambahan_kado = "";
    }

    // jika tidak ada error tampilkan isi form
    if($pesan_error == ""){
        // panggil halaman proses studi untuk menampilkan 
        include_once "proses_studi.php";
        die();
    }
    
} else {
    // form belum disubmit atau halaman ini tampil untuk pertama kali
    // berikan nilai awal untuk semua isian form
    $pesan_error = "";
    $nama = "";
    $email = "";
    $select_html = "selected";
    $select_css=""; $select_php=""; $select_javascript=""; $select_mysql="";
    $jumlah = 0;
    $alamat = "";
    $checked_jne = "checked";
    $checked_tiki=""; $checked_pos="";
    $ongkir ="";
    $tgl=1;$bln="1";$thn=2019;
    $checked_dvd = ""; $checked_kado="";
    $tambahan_dvd=""; $tambahan_kado="";

}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>studi kasus :sebuah form utuh</title>
    <?php include_once "bootstrap.php"; ?>
    <style>
        .error{
            background-color: #ffecec;
            padding: 10px 15px;
            margin: 0 0 20px 0;
            border: 1px solid red;
            box-shadow: 1px 0px 3px red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Pembelian buku duniailkom</h3>
        <?php
            // tampilkan error jika ada
            if($pesan_error !== ""){
                echo "<div class='error'>$pesan_error</div>";
            }
        ?>
        <form action="study_case.php" method="post">
            <legend>Form Order</legend>
            <form>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?=$nama; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" id="email" value="<?=$email; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="buku" class="col-sm-2 col-form-label">Jenis Buku</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="buku" name="buku">
                            <?php 
                                $daftar_buku = ["html uncover", "css uncover", "php uncover", "javascript uncover", "mysql uncvoer"];
                                foreach($daftar_buku as $value){
                                    if($value == $buku){
                                        echo "<option value='$value' selected>";
                                    }else{
                                        echo "<option value='$value'>";
                                    }
                                    echo "{$value}";
                                    echo "</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah Buku</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="jumlah" name="jumlah">
                            <?php 
                                for($i=1; $i<=10; $i++){
                                    if($i == $jumlah){
                                        echo "<option value='$i'selected>";
                                    }else{
                                        echo "<option value='$i'>";
                                    }
                                    echo $i;
                                    echo "</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                    <textarea name="alamat" id="alamat" cols="" rows="2" class="form-control"><?=$alamat; ?></textarea>
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Jenis Kurir</legend>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kurir" id="jne" value="jne" <?=$checked_jne?>>
                        <label class="form-check-label" for="jne">
                            JNE
                        </label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kurir" id="tiki" value="tiki" <?=$checked_tiki; ?>>
                        <label class="form-check-label" for="tiki">
                            TIKI
                        </label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kurir" id="pos" value="pos" <?=$checked_pos; ?>>
                        <label class="form-check-label" for="pos">
                            POS
                        </label>
                        </div>
                    </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <label for="ongkir" class="col-sm-2 col-form-label">Ongkos Kirim</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="ongkir" name="ongkir" value="<?=$ongkir;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jumlah" class="col-sm-2 col-form-label">Tanggal Kirim</label>
                    <div class="col-sm-1">
                        <select class="form-control" id="jumlah" name="tgl">
                            <?php 
                                for($i=1; $i<=31; $i++){
                                    if($i==$tgl){
                                        echo "<option value='$i' selected>";
                                    } else{
                                        echo "<option value='$i'>";
                                    }
                                    echo str_pad($i,2,"0", STR_PAD_LEFT);
                                    echo "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select name="bln" id="bln" class="form-control">
                        <?php
                            foreach($nama_bulan as $key => $bulan){
                                if($key==$bln){
                                    echo "<option value='{$key}' selected>{$bulan}</option>";
                                }else{
                                    echo "<option value='{$key}'>{$bulan}</option>";
                                }
                            }
                        ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select name="thn" id="thn" class="form-control">
                            <?php
                                for($i=2019; $i<=2025; $i++){
                                    if($i==$thn){
                                        echo "<option value= $i selected>";
                                    } else{
                                        echo "<option value=$i>";
                                    }
                                    echo "$i </option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Tambahan</div>
                    <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="dvd" <?=$checked_dvd;?>>
                        <label class="form-check-label" for="gridCheck1">
                            DVD eBook
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="kado" <?=$checked_kado; ?>>
                        <label class="form-check-label" for="gridCheck1">
                            Bungkus Kado
                        </label>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" name="submit" id="submit" class="btn btn-primary btn-sm" value="Pesan Buku">
                    </div>
                </div>
                </form>
        </form>
    </div>
</body>
</html>