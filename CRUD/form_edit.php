<?php 
    // periksa apakah user sudah login, cek kehadiran session name
    // jika tidak ada header ke login
    session_start();
    if(!isset($_SESSION["nama"])){
        header("Location: halaman_login.php");
    }

    // buka koneksi dengan mysql
    include_once "koneksi.php";


    // cek apakah form telah disubmit
    if(isset($_POST["submit"])){
        // form telah disubmit, cek apakah berasal dari edit_mahasiswa.php
        // atau dari update dari form_edit.php

        if($_POST['submit']=="Edit"){
            // niali form berasal dari halaman edit_mahasiswa.php

            // ambil data nilai nim
            $nim = htmlentities(strip_tags(trim(($_POST["nim"]))));
            // filter data agar tidak di inject sql
            $nim = mysqli_real_escape_string($koneksi, $nim);

            // ambil semua data dari database untuk menjadi nilai awal form
            $query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
            $result = mysqli_query($koneksi,$query);

            if(!$result){
                die("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
            }

            // tidak perlu pakai perulangan while, karena hanya ada 1 data record
            $data = mysqli_fetch_assoc($result);

            $nama = $data["nama"];
            $tempat_lahir = $data["tempat_lahir"];
            $tanggal_lahir = $data["tanggal_lahir"];
            $fakultas = $data["fakultas"];
            $jurusan = $data["jurusan"];
            $ipk = $data["ipk"];

            // bebask memory
            mysqli_free_result($result);

        } else if($_POST["submit"]=="Update Data"){
            // nilai form berasal dari halaman form_edit.php
            // ambil semua niali form
            $nim           = htmlentities(strip_tags(trim($_POST["nim"])));
            $nama          = htmlentities(strip_tags(trim($_POST["nama"])));
            $tempat_lahir  = htmlentities(strip_tags(trim($_POST["tempat_lahir"])));
            $tanggal_lahir = htmlentities(strip_tags(trim($_POST["tanggal_lahir"])));
            $fakultas      = htmlentities(strip_tags(trim($_POST["fakultas"])));
            $jurusan       = htmlentities(strip_tags(trim($_POST["jurusan"])));
            $ipk           = htmlentities(strip_tags(trim($_POST["ipk"])));
            
        }

        // proses validasi form
        // siapkan variable untuk menampung pesan error
        $pesan_error = "";

        // cek apakah nim sudah diisi atau tidak
        if (empty($nim)) {
            $pesan_error .= "NIM belum diisi <br>";
            }
        // nim harus angka dengan 8 digit
        else if(!preg_match("/^[0-9]{8}$/",$nim)) {
            $pesan_error .= "Nim harus berupa 8 digit angka <br>";
        }

        // cek apakah nama sudah diisi atau tidak
        if(empty($nama)){
            $pesan_error .= "Nama belum diisi <br>";
        }

        // cek apakah tempat lahir sudah diisi atau tidak
        if(empty($tempat_lahir)){
            $pesan_error .= "Tempat lahir belum diisi <br>";
        }
        // cek apakah tanggal lahir sudah diisi
        if(empty($tanggal_lahir)){
            $pesan_error .= "Tanggal Lahir belum diisi <br>";
        }
        // cek apakah jurusan sudah diisi atau tidak
        if(empty($jurusan)){
            $pesan_error .= "Jurusan belum diisi <br>";
        }

        // siapkan variable untuk menggenerate pilihan fakultas
        $select_kedokteran = ""; $select_fmipa ="";
        $select_ekonomi = ""; $select_teknik=""; $select_sastra=""; $select_fasilkom="";

        switch($fakultas){
            case "kedokteran" : $select_kedokteran = "selected";
            break;
            case "FMIPA" : $select_fmipa = "selected";
            break;
            case "ekonomi" : $select_ekonomi = "selected";
            break;
            case "teknik" : $select_teknik = "Selected";
            break;
            case "sastra" : $select_sastra = "selected";
            break;
            case "fasilkom" : $select_fasilkom = "selected";
            break;  
        }

        // ipk harus berupa angka dan tidak boleh negatif
        if(!is_numeric($ipk) OR ($ipk <=0)){
            $pesan_error .= "Ipk harus diisi dengan angka dan tidak boleh mines";
        }

        // jika tidak ada error input ke database
        if(($pesan_error === "") AND ($_POST["submit"]=="Update Data")){

            // buka koneksi dengan Mysql
            include("koneksi.php");

            // filter semua data
            $nim           = mysqli_real_escape_string($koneksi, $nim);
            $nama          = mysqli_real_escape_string($koneksi,$nama);
            $tempat_lahir  = mysqli_real_escape_string($koneksi,$tempat_lahir);
            $fakultas      = mysqli_real_escape_string($koneksi,$fakultas);
            $tanggal_lahir = mysqli_real_escape_string($koneksi,$tanggal_lahir);
            $jurusan       = mysqli_real_escape_string($koneksi,$jurusan);
            $ipk           = (float) $ipk;

            // buat dan jalankan query insert
            $query = "UPDATE mahasiswa SET nama = '$nama', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', fakultas = '$fakultas', jurusan = '$jurusan', ipk = '$ipk' WHERE nim = '$nim'";

            $result = mysqli_query($koneksi,$query);

            // periksa hasil query
            if($result){
                // insert berhasil, redirect ke tampil_mahasiswa.php + pesan
                $pesan = "mahasiswa dengan nama = '<b>$nama</b>' berhasil diupdate ";
                $pesan = urldecode($pesan);
                header("Location: tampil_mahasiswa.php?pesan={$pesan}");
            } else {
                die("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
            }
        }
        
    } else{
        // form diakses secara langsung!
        // redirect ke edit_mahasiswa.php
        header("Location: edit_mahasiswa.php");

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem informasi Mahasiswa</title>
    <?php include_once "../form_prosesing/bootstrap.php"; ?>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Sistem Informasi <span class="text-success">Kampusku</span></h1>
            <p><?php echo date("d-m-Y"); ?></p>
        </div>
        <hr>
        <div class="navbar">
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <ul class="navbar-nav">
                    <li class="nav-item-active mr-5"><a href="tampil_mahasiswa.php" class="nav-link">Tampil</a></li>
                    <li class="nav-item-active mr-5"><a href="menambahkan_data.php" class="nav-link">Tambah</a></li>
                    <li class="nav-item-active mr-5"><a href="edit_mahasiswa.php" class="nav-link">Edit</a></li>
                    <li class="nav-item-active mr-5"><a href="hapus_mahasiswa.php" class="nav-link">Hapus</a></li>
                    <li class="nav-item-active mr-5"><a href="logout.php" class="nav-link">Logout</a></li>
                </ul>
                <!-- search bar -->
                <nav class="navbar navbar-light bg-light ml-5">
                    <form action="tampil_mahasiswa.php" method="get" class="form-inline">
                        Cari Data<input type="search" name="nama" id="nama" class="form-control">
                        <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit" value="Search">
                    </form>
                </nav>
            </nav>
        </div>
        <div class="main">
            <h2>Tambah Data Mahasiswa</h2>
                    <?php 
                        if($pesan_error !== ""){
                            echo "<span>$pesan_error</span>";
                        }
                    ?>
            <form action="form_edit.php" method="post" id="form_mahasiswa">
                <fieldset>
                    <legend>Mahasiswa Baru</legend>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="nim">Nim</label>
                            <input type="text" name="nim" id="nim" class="form-control" value="<?= $nim;?>" readonly>
                        </div>
                    </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="<?=$nama; ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?=$tempat_lahir; ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="tgl">Tanggal Lahir :</label>
                                <input type="date" name="tanggal_lahir" id="tgl" class="form-control" value="<?=$tanggal_lahir;?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="fakultas">Fakultas :</label>
                                <select name="fakultas" id="fakultas" class="form-control">
                                    <option value="kedokteran" <?= $select_kedokteran; ?>>Kedokteran</option>
                                    <option value="FMIPA" <?= $select_fmipa; ?>>FMIPA</option>
                                    <option value="ekonomi" <?= $select_ekonomi; ?>>Ekonomi</option>
                                    <option value="teknik" <?= $select_teknik; ?>>Teknik</option>
                                    <option value="sastra" <?= $select_sastra; ?>>Satra</option>
                                    <option value="fasilkom" <?= $select_fasilkom; ?>>FASILKOM</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="jurusan">Jurusan</label>
                                <input type="text"  class="form-control" name="jurusan" id="jurusan" value="<?php echo $jurusan; ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="">IPK : </label>
                                <input type="text" name="ipk" id="ipk" value="<?php echo $ipk; ?>" class="form-control" placeholder="contoh: 2.75">(angka desimal dipisah dengan karakter titik ".")
                            </div>
                        </div>
                </fieldset>
                        <div class="form-row">
                            <div class="form-group">
                                <input type="submit" name="submit" id="submit" value="Update Data" class="btn btn-primary btn-sm">
                            </div>
                        </div>
            </form>
        </div>
        <div id="footer"> 
            copyright @<?php echo date("Y"); ?> Fajar Ali
        </div>
    </div>
</body>
</html>


<?php mysqli_close($koneksi); ?>