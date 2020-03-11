<?php 

    // phpinfo();

    // cek apakah ukuran file melebihi batas maximal
    if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_FILES) && empty($_POST)){
        // batas maximal terlewati, buat pesan error
        $post_max = ini_get('post_max_size');
        $pesan_error = "ukuran file melewati batas maximal ({$post_max}B)";
    } 

    if(isset($_POST["submit"])){
        // echo "<pre>";
        // echo "nama file dari kotak input text : ".$_POST["nama_file"]."<br>";
        // tampilkan informasi tentang file yang diupload
        // echo "nama file = ".$_FILES["upload_file"]["name"]."<br>";
        // echo "mime type = ".$_FILES["upload_file"]["type"]."<br>";3             
        // echo "temporari = ".$_FILES["upload_file"]["tmp_name"]."<br>";
        // echo "kode error = ".$_FILES["upload_file"]["error"]."<br>";
        // echo "ukuran file = ".$_FILES["upload_file"]["size"]."<br>";
        // echo "</pre>";

        $arr_error = [
            0 => "file berhasil diupload",
            1 => "upload gagal, ukuran file melebihi batas max 2mb",
            2 => "upload gagal, ukuran file melebihi batas max",
            3 => "upload gagal, file hanya terupload sebagian",
            4 => "upload gagal,  tidak ada file yang terupload",
            6 => "upload gagal, server error", //folder temp_dir tidak ditemukan,error ini bisa terjadi karena salah penulisan alamat folder upload_temp_dir atau folder tersebut telah dihapus
            7 => "upload gagal, server error ",  //php tidak dapat menulis ke hardisk server, ini biasa terjadi karena php tidak dapat menerima hak akses ke dalam tmp_dir
            8 => "upload gagal, server error", //proses upload dihentikan oleh extensi lain dari php, artinya terdapat kode program server yang mencegah file diupload.
        ];
        $error_upload = $_FILES["upload_file"]["error"];
        $pesan_error = $arr_error[$error_upload];        
    }

?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form upload</title>
    <?php include_once "../form_prosesing/bootstrap.php"; ?>
</head>
<body>
    <div class="container">
        <h3>super global variable $_FILES</h3>
        <p>informasi tentang file upload akan disimpan dalam superglobals $_FILES. jika didalam form terdapat inputan upload, kita harus menambahkan atribu enctype="multipart/form-data" pada form , jika tidak PHP tidak akan memproses file upload.</p>
        <p>secara sederhana atribute enctype ="multipart/form-data menginformasukan kepada web server bahwa nilai yang dikirim dari form tidak hanya berupa teks, tetapu mungkin jga file. untuk tipe input yang digunkan untuk file upload menggunakan type = "file". untuk form upload juga harus menggunakan method 6 0="post". method get tidak akan bisa dipakai untuk pemprosesan file upload. </p>
        <01h5>contoh : </h5>
        <form action="form_upload.php" method="post" enctype="multipart/form-data">
        <?php if (!empty($pesan_error)){echo "<p>$pesan_error</p>";} ?>
            <div class="form-group">
                <label for="nama-file">Nama File</label>
                <input type="text" name="nama_file" id="nama-file" class="form-control">

                <label for="upload-file">Upload File</label>
                <input type="file" name="upload_file" id="upload-file" class="form-control">

                <input type="submit" name="submit" id="submit" value="proses data">
            </div>
        </form>


        <!-- cara lengkap proses dan memindahkan file oplaod -->
        <h3>cara proses dan memindahkan file opload lengkap</h3>
        <?php
            // cek apakah form telah disubmit
            if(isset($_POST["submit_2"])){
                // form telah disubmit, cek apakah ada error ?
                $error_2 = $_FILES["upload_2"]["error"];

                if($error_2 === 0){

                    // pindahkan file kedalam folder upload
                    $nama_folder = "folder_upload";
                    $tmp = $_FILES["upload_2"]["tmp_name"];
                    $nama_file = $_FILES["upload_2"]["name"];
                    // cek jika file berhasil diupload ke folder, tampilkan pesan berhasil
                    if(is_writable(move_uploaded_file($tmp, "$nama_folder/$nama_file"))){
                    $pesan_error2 = "file sukses diupload";   
                    }else {
                    $pesan_error2 = "file gagal diupload";
                    }
                }
            }
        ?>

        <?php if(!empty($pesan_error2)) {echo "<p>$pesan_error2</p>";} ?>
        <form action="form_upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="upload_2" id="upload_2">
            <p>
            <input type="submit" name="submit_2" id="submit_2" value="upload data">
            </p>
        </form>


        <!-- validasi untuk mencegah nama yang sama -->
        <h3>validasi untuk file upload</h3>
        <p>jika anda mencoba upload file yang memilki nama sama, fungsi move_uploaded_file tetap berjalan dan tidak menampilkan error, tetapi file terakhir akan menimpa file lama ang memiliki nama sama(overwtrite). </p>
        <p>sebelum menjalankan fungsi move_uploaded_file, jika bisa periksa apakah sebuah file sudah ada atau tidak. ini dilakukan dengan fungsi file_exists. fungsi ini butuh 1 argummen berupa alamat file yang diperiksa. fungsi ini mengembalikan nilai true jika ada dan false jika tidak ada. dengan fungsi ini kita bisa membuat sebuah kode program yang menampilkan pesan error jika file yang diupload ternyata memiliki nama yang sama dengan file yang sudah ada diserver.</p>
        <?php 
            // cek apakah form disubmit
            if(isset($_POST["submit_3"])){
                // form telah disubmit cek apakah ada error
                $error_3 = $_FILES["upload_3"]["error"];
                
                // validasi nama gambar jika ada yang sama
                if($error_3 === 0){
                    // siapkan variable untuk pesan error
                    $pesan_error3 = "";

                    // siapkan variable untuk memindahkan file upload
                    $nama_folder2 = "folder_upload";
                    $tmp2 = $_FILES["upload_3"]["tmp_name"];
                    $nama_file2 = $_FILES["upload_3"]["name"];
                    $path_file = "$nama_folder2/$nama_file2";
                    $upload_gagal = false;

                    // cek apakah terdapat file yang sama
                    if(file_exists($path_file)){
                        $pesan_error3 = "file dengan nama yang sama sudah ada diserver <br>";
                        $upload_gagal = true;
                    }

                    // validasi untuk size yang diupload
                    $ukuran_file = $_FILES["upload_3"]["size"];
                    if($ukuran_file > 1000000){
                        $pesan_error3 .= "Ukuran file melebihi 3mb <br>";
                        $upload_gagal = true;
                    }

                    // validasi untuk jenis file upload
                    $file_boleh = ["jpg", "png", "pdf"];
                    $file_info = pathinfo($nama_file2);
                    $check_extension = getimagesize($tmp2);
                    if($check_extension === false){
                        $pesan_error3 .= "mohon upload file gambar <br>";
                        $upload_gagal = true;
                    }
                    // if(!in_array($file_info["extension"], $file_boleh)){
                    //     $pesan_error3 .= "mohon upload file gambar atau pdf(.jpg, .png, .pdf) <br>";
                    //     $upload_gagal = true; 
                    // }

                    // pindahkan file upload jika semuanya oke
                    if(!$upload_gagal AND move_uploaded_file($tmp2, $path_file)){
                        $pesan_error3 = "file sukses diupload";
                    } else{
                        $pesan_error3 .= "file gagal diupload";
                    }
                }


            }
        ?>
        <?php if(!empty($pesan_error3)) {echo "<p>$pesan_error3</p>"; } ?>
        <form action="form_upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="upload_3" id="upload_3">
            <p><input type="submit" name="submit_3" id="submit_3" value="upload data 3"></p>
        </form>

    </div>
</body>
</html>