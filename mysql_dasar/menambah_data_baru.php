<?php
    // buat koneksi ke database
    $koneksi = mysqli_connect("localhost", "root", "", "universitas");

    // jika gagal terhubung tampilkan error
    if(!$koneksi){
        die("koneksi dengan database gagal : ". mysqli_connect_errno(). " - ".mysqli_connect_error());
    }
    // jalankan query tambah data
    $query = "INSERT INTO mahasiswa VALUES ('140212', 'abad', 'tangerang', '2000-06-20' , 'Mafib', 3.8)";
    $hasil_query = mysqli_query($koneksi, $query);



    // periksa query, tampilkan pesan kesalahan jika gagal
    if($hasil_query){
        // berhasil dijalankan
        echo "data berhasil di tambah";
    } else{
        die("query gagal dijalankan : ". mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>belajar mysql dasar</title>
    <?php include_once "../form_prosesing/bootstrap.php"; ?>
</head>
<body>
    <div class="container">
        <h4>menambahkan data baru ke database </h4>
        
    </div>
</body>
</html>

<?php
    

    // tutup koneksi dengan database
    mysqli_close($koneksi);
?>