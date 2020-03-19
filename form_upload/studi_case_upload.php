<?php

    // cek jika form telah disubmit
    if(isset($_POST["submit"])){

        // ambil nilai form kecuali file upload
        $nama = htmlentities(strip_tags(trim($_POST["nama"])));
        $email = htmlentities(strip_tags(trim($_POST["email"])));
        $komentar = htmlentities(strip_tags(trim($_POST["komentar"])));

        // siapkan variable error
        $pesan_error = "";

        // cek apakah nama sudah diisi atau tidak
        if(empty($nama)){
            $pesan_error .= "Nama belum diisi <br>";
        }
        // cek apakah email sudah diisi
        if(empty($email)){
            $pesan_error .= "Email belum diisi <br>";
        } else if(!preg_match("/.+@.+\..+/", $email)){
            $pesan_error .= "format email tidak sesuai <br>";
        }

        // cek apakah gambar berhasil diupload
        $upload_error = $_FILES["gambar"]["error"];
        if($upload_error !== 0){
            // gambar gagal diupload siapkan pesan error
            $arr_upload_error = [
                1 => "ukuran file melewati batas maximal",
                2 => "ukuran fie melewati batas maximal 4mb",
                3 => "file hanya ter-upload sebagian",
                4 => "tidak ada file yang terupload",
                6 => "server error",
                7 => "server error",
                8 => "server error",
            ];
            $pesan_error .= $arr_upload_error[$upload_error];
        } else {
            // tidak ada error, masukan ke validasi file upload berikutnya
            // file apakah ada dengan nama yang sama
            $nama_folder = "folder_upload";
            $nama_file = $_FILES["gambar"]["name"];
            $path_file = "$nama_folder/$nama_file";

            if(file_exists($path_file)){
                $pesan_error .= "file dengan nama yang sama sudah ada di server <br>";
            }
            // cek apakah ukuran file tidak melebihi 4mb
            $ukuran_file = $_FILES["gambar"]["size"];
            if($ukuran_file > 4048576){
                $pesan_error .= "ukuran file melebihi 4mb <br>";
            }
            // cek apakah extensi gambar
            $check = getimagesize($_FILES["gambar"]["tmp_name"]);
            if($check === false){
                $pesan_error .= "mohon upload file dengan extensi gambar <br>";
            }
        }

        // jika validasi lolos, proses data
        if($pesan_error === ""){
            // pindahkan file ke folder upload
            $nama_folder = "folder_upload";
            $tmp = $_FILES["gambar"]["tmp_name"];
            $nama_file = $_FILES["gambar"]["name"];
            move_uploaded_file($tmp, "$nama_folder/$nama_file");

            // semua ok, tampilkan hasil form dan bye-bye
            include "buku_tamu.php";
            die();
        }

    } else {
        // form belum disubmit atau halaman ini tampil untuk pertama kali
        // berikan nilai awal untuk semua isian form
        $pesan_error = "";
        $nama = "";
        $email = "";
        $komentar = "";
    }
    // cek apakah ukuran file melewati batas post_max_size
    // ditempatkan disini agar variable $pesan_error tidak ter-reset
    if($_SERVER['REQUEST_METHOD'] == "POST" && empty($_FILES) && empty($_POST)){
        $post_max = ini_get('post_max_sise');
        $pesan_error .= "ukuran file melewati batas maximal ({$post_max}B)";
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>studi case buku tamu</title>

    <?php include_once "../form_prosesing/bootstrap.php" ?>

    <style>
        .error{
            background-color: #ffecec;
            padding: 10px 15px;
            margin: 0 0 20px 0;
            border: 1px solid red;
            box-shadow: 1px 0px 3px red;
        }
        body{
            background-color: #f8f8f8;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>studi case buku tamu </h1>
    <legend>buku tamu</legend>
    <?php 
        if($pesan_error != ""){
            echo "<div class='error'>$pesan_error</div>";
        }
    ?>
    <form action="studi_case_upload.php" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control col-sm-9">
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control col-sm-9">
        </div>
        <div class="form-group row">
            <label for="komentar" class="col-sm-2 col-form-label">Komentar</label>
            <textarea name="komentar" id="komentar" cols="1" rows="2" class="form-control col-sm-9" ></textarea>
        </div>
        <div class="form-group row">
            <label for="gambar" class="col-sm-2 col-form-label">Display Picture</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
            <input type="file" name="gambar" id="gambar" class="custome-file-input" accept="image/*">
        </div>
        <div class="form-group row">
            <input type="submit" name="submit" id="submit" value="Simpan Data" class="btn btn-primary btn-sm">
        </div>
    </form>

</div>
    
</body>
</html>