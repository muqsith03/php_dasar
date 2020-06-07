<?php 
    // koneksi ke database
    $koneksi = mysqli_connect("localhost", "root", "", "universitas");
    // cek apakah berhasil terhubung
    if(!$koneksi){
        die("gagal terhubung ke datasbse: ". mysqli_connect_errno($koneksi). " - ".mysqli_connect_error($koneksi));
    }

    // jika tombol simpan ditekan
    if(isset($_POST["submit"])){
        // ambil elemen dari form
        $nim           = htmlentities(strip_tags(trim($_POST["nim"]))) ;
        $nama          = htmlentities(strip_tags(trim($_POST["nama"])));
        $tempat_lahir  = htmlentities(strip_tags(trim($_POST["tempat_lahir"])));
        $tanggal_lahir = htmlentities(strip_tags(trim($_POST["tanggal_lahir"])));
        $fakultas      = htmlentities(strip_tags(trim($_POST["fakultas"])));
        $jurusan       = htmlentities(strip_tags(trim($_POST["jurusan"])));
        $ipk           = htmlentities(strip_tags(trim($_POST["ipk"])));
        
        // buat variable pesan error
        $pesan_error = "";
        
        // validasi form
        if(empty($nim) && empty($nama) && empty($tempat_lahir) && empty($tanggal_lahir) && empty($fakultas) && empty($jurusan) && empty($ipk)){
            $pesan_error .= "form harus terisi semua ";
        }

        // proses query input data
        $query = "INSERT INTO mahasiswa (nim, nama, tempat_lahir, tanggal_lahir, fakultas, jurusan, ipk) VALUES ('$nim','$nama','$tempat_lahir','$tanggal_lahir','$fakultas','$jurusan','$ipk')";
        $hasil_query = mysqli_query($koneksi,$query);

        // cek query, tampilkan kesalahan jika ada
        if($hasil_query){
            echo "<script>alert('data berhasil ditambah')</script>";
            header("Location: study_case.php");
        } else{
            $pesan_error .= "query gagal: ".mysqli_errno($koneksi). " = ".mysqli_error($koneksi);
        }
    } else{
        $pesan_error = "";
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data Case</title>
    <?php include_once "../form_prosesing/bootstrap.php"; ?>
</head>
<body>
    <div class="container">
        <h3>Tambah Data Mahasiswa</h3>
        <form action="add_data_case.php" method="post">
            <span><?=$pesan_error ?></span>
            <div class="form-group">
                <label for="nim">Nim</label>
                <input type="text" name="nim" id="nim" class="form-control">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control">
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control">
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
            </div>
            <div class="form-group">
                <label for="fakultas">Fakultas</label>
                <input type="text" name="fakultas" id="fakultas" class="form-control">
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" class="form-control">
            </div>
            <div class="form-group">
                <label for="ipk">IPK</label>
                <input type="text" name="ipk" id="ipk" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" id="submit" value="Simpan Data" class="btn btn-primary btn-sm">
            </div>
        </form>
    </div>
</body>
</html> 