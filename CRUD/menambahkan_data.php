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
        // form telah disubmit, proses data

        // ambil semua nilai form
        $nim = htmlentities(strip_tags(trim($_POST["nim"])));
        $nama = htmlentities(strip_tags(trim($_POST["nama"])));
        $tempat_lahir = htmlentities(strip_tags(trim($_POST["tempat_lahir"])));
        $tanggal_lahir = htmlentities(strip_tags(trim($_POST["tanggal_lahir"])));
        $fakultas = htmlentities(strip_tags(trim($_POST["fakultas"])));
        $jurusan = htmlentities(strip_tags(trim($_POST["jurusan"])));
        $ipk = htmlentities(strip_tags(trim($_POST["ipk"])));

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

        // cek ke database apakah nim ada yang sama
        // filter data $nim
        $nim = mysqli_real_escape_string($koneksi,$nim);
        $query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
        $hasil_query = mysqli_query($koneksi,$query);

        // cek jumlah record(baris), jika ada, $nim tidak bisa diproses
        $jumlah_data = mysqli_num_rows($hasil_query);
        if($jumlah_data >= 1){
            $pesan_error .= "Nim sudah digunakan <br>";
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
        if($pesan_error === ""){
            // filter semua data
            $nim = mysqli_real_escape_string($koneksi, $nim);
            $nama = mysqli_real_escape_string($koneksi,$nama);
            $tempat_lahir = mysqli_real_escape_string($koneksi,$tempat_lahir);
            $fakultas = mysqli_real_escape_string($koneksi,$fakultas);
            $tanggal_lahir = mysqli_real_escape_string($koneksi,$tanggal_lahir);
            $jurusan = mysqli_real_escape_string($koneksi,$jurusan);
            $ipk = mysqli_real_escape_string($koneksi,$ipk);

            // buat dan jalankan query insert
            $query = "INSERT INTO mahasiswa VALUES('$nim','$nama','$tempat_lahir','$tanggal_lahir','$fakultas','$jurusan','$ipk')";
            $result = mysqli_query($koneksi,$query);

            // periksa hasil query
            if($result){
                // insert berhasil, redirect ke tampil_mahasiswa.php + pesan
                $pesan = "mahasiswa dengan nama = '<b>$nama</b>' berhasil ditambah ";
                $pesan = urldecode($pesan);
                header("Location: tampil_mahasiswa.php?pesan={$pesan}");
            } else {
                die("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
            }
        }
        
    } else{
        // form belum disubmit atau halaman ini tampil untuk pertama kali
        // berikan nilai awal untuk semua isian form
        $pesan_error = "";
        $nim = "";
        $nama = "";
        $tempat_lahir = "";
        $select_kedokteran = "selected";
        $select_fmipa = ""; 
        $select_ekonomi = "";
        $select_teknik = "";
        $select_sastra = "";
        $select_fasilkom = "";
        $jurusan = "";
        $ipk = "";
        $tanggal_lahir = "";
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
            <form action="menambahkan_data.php" method="post" id="form_mahasiswa">
                <fieldset>
                    <legend>Mahasiswa Baru</legend>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="nim">Nim</label>
                            <input type="text" name="nim" id="nim" class="form-control" placeholder="Conto: 12345678" value="<?= $nim;?>">(8 digit angka)
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
                                    <option value="kedokteran" <?php echo $select_kedokteran; ?>>Kedokteran</option>
                                    <option value="FMIPA" <?php $select_fmipa; ?>>FMIPA</option>
                                    <option value="ekonomi" <?php $select_ekonomi; ?>>Ekonomi</option>
                                    <option value="teknik" <?php $select_teknik; ?>>Teknik</option>
                                    <option value="sastra" <?php $select_sastra; ?>>Satra</option>
                                    <option value="fasilkom" <?php $select_fasilkom; ?>>FASILKOM</option>
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
                                <input type="submit" name="submit" id="submit" value="Tambah Data" class="btn btn-primary btn-sm">
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