<?php 

    if(isset($_POST["submit"])){
        echo "<pre>";
        echo "nama file dari kotak input text : ".$_POST["nama_file"]."<br>";
        // tampilkan informasi tentang file yang diupload
        echo "nama file = ".$_FILES["upload_file"]["name"]."<br>";
        echo "mime type = ".$_FILES["upload_file"]["type"]."<br>";
        echo "temporari = ".$_FILES["upload_file"]["tmp_name"]."<br>";
        echo "kode error = ".$_FILES["upload_file"]["error"]."<br>";
        echo "ukuran file = ".$_FILES["upload_file"]["size"]."<br>";
        echo "</pre>";
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
        <p>secara sederhana atribute enctype ="multipart/form-data menginformasukan kepada web server bahwa nilai yang dikirim dari form tidak hanya berupa teks, tetapu mungkin jga file. untuk tipe input yang digunkan untuk file upload menggunakan type = "file". untuk form upload juga harus menggunakan method ="post". method get tidak akan bisa dipakai untuk pemprosesan file upload. </p>
        <h5>contoh : </h5>
        <form action="form_upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama-file">Nama File</label>
                <input type="text" name="nama_file" id="nama-file" class="form-control">

                <label for="upload-file">Upload File</label>
                <input type="file" name="upload_file" id="upload-file" class="form-control">

                <input type="submit" name="submit" id="submit" value="proses data">
            </div>
        </form>
    </div>
</body>
</html>