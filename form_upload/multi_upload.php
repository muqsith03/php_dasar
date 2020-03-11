<?php 

    // cek apakah form telah disubmit
    if(isset($_POST["submit"])){

        // tampilkan isi form
        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi Upload File</title>
    <?php include_once "../form_prosesing/bootstrap.php" ?>

</head>
<body>
    <div class="container">
        <h3>multiple upload: dengan banyak element</h3>
        <form action="multi_upload.php" method="post" enctype="multipart/form-data">
        <p><input type="file" name="upload1" id="upload1"></p>
        <p><input type="file" name="upload2" id="upload2"></p>
        <p><input type="file" name="upload3" id="upload3"></p>
        <p><input type="submit" name="submit" id="submit" value="upload gambar"></p>
        </form>

        <!-- multiple upload dengan 1 element -->
        <?php 
            if(isset($_POST["submit_2"])){

                // buat variable error
                $pesan_error = "";
                $upload_gagal = false;
                
                // jumlah file upload
                $jumlah_file = count($_FILES["upload4"]["name"]);
                
                // pindahkan seluruh file ke folder upload
                $nama_folder = "folder_upload";
                for($i=0; $i < $jumlah_file; $i++){
                    $tmp = $_FILES["upload4"]["tmp_name"][$i];
                    $nama_file = $_FILES["upload4"]["name"][$i];
                    $error = $_FILES["upload4"]["error"][$i];
                    $path_file = "$nama_folder/$nama_file";

                    // jika tidak ada file yang dipilih
                    if($error == 4){
                        $pesan_error = "silahkan pilih file untuk diupload <br>";
                    }

                    //jika file sudah ada
                    if(file_exists($path_file)){
                        $pesan_error .= "nama file sudah ada diserver <br>";
                        $upload_gagal =true;
                    }

                    // jika ukuran file melebihi batas
                    $ukuran_file = $_FILES["upload4"]["size"][$i];
                    if($ukuran_file > 1500000){
                        $pesan_error .= "ukuran file melebihi 1.5Mb <br>";
                        $upload_gagal = true;
                    }

                    // validasi untuk jenis file
                    $check_extension = getimagesize($tmp);
                    if($check_extension === false ){
                        $pesan_error .= "file bukan berextensi gambar <br>";
                        $upload_gagal = true;
                    }

                    // jika semuanya sudah oke
                    if(!$upload_gagal AND move_uploaded_file($tmp, $path_file)){
                        $pesan_error = "file berhasil diupload <br>";
                    }else {
                        $pesan_error .= "file gagal diupload <br>";
                    }

                }
                echo "<pre>";
                print_r($_FILES);
                echo $error;
                echo "</pre>";
            }
        ?>
        <h3>multiple upload : dengan satu element </h3>
        <?php if(!empty($pesan_error)) {echo "<p>$pesan_error</p>"; } ?>
        <form action="multi_upload.php" method="post" enctype="multipart/form-data">
        <p><input type="file" name="upload4[]" id="upload4" multiple></p>
        <p><input type="submit" name="submit_2" id="submit_2" value="simpan gambar"></p>
        </form>
    </div>
</body>
</html>