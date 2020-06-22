<?php 
    // cek apakah user sudah login, cek kehadiran session name
    // jika tidak ada, redirect ke login.php
    session_start();
    if(!isset($_SESSION["nama"])){
        header("Location: halaman_login.php");
    }
    // buka koneksi dengan mysql, include file koneksi.php
    include_once "koneksi.php";

    // ambil pesan jika ada
    if(isset($_GET["pesan"])){
        $pesan = $_GET["pesan"];
    }

    // cek apakah form telah disubmit
    // berasal dari form pencarian, siapkan query
    if(isset($_GET["cari"])){
        // ambil nilai nama
        $nama = htmlentities(strip_tags(trim($_GET["nama"])));
        // filter agar tidak sql inject
        $nama = mysqli_real_escape_string($koneksi,$nama);
        // siapkan query  untuk cari
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$nama%' ORDER BY nama ASC";
        // buat pesan
        $pesan = "hasil pencarian untuk nama <b>'$nama'</b>";
    } else {
        // bukan dari form pencarian
        // siapkan query untuk menampilkan seluruh data dari tabel mahasiswa
        $query = "SELECT * FROM mahasiswa ORDER BY nama ASC";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil mahasiswa</title>
    <?php include_once "../form_prosesing/bootstrap.php" ?>
</head>
<body>
    <div class="container">
    <div class="header">
        <h2>Sistem Informasi <b class="text-success">Kampusku</b></h2>
        <p><?php echo date("d-m-Y"); ?></p>
    </div>
        <hr>
        <div class="navbar">
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <ul class="navbar-nav">
                    <li class="nav-item-active mr-5"><a href="tampil_mahasiswa.php" class="nav-link">Tampil</a></li>
                    <li class="nav-item-active mr-5"><a href="menambahkan_data.php" class="nav-link">Tambah</a></li>
                    <li class="nav-item-active mr-5"><a href="" class="nav-link">Edit</a></li>
                    <li class="nav-item-active mr-5"><a href="hapus_mahasiswa.php" class="nav-link">Hapus</a></li>
                    <li class="nav-item-active mr-5"><a href="" class="nav-link">Logout</a></li>
                </ul>
                <!-- search bar -->
                <nav class="navbar navbar-light bg-light ml-5">
                    <form action="tampil_mahasiswa.php" method="get" class="form-inline">
                        Cari Data<input type="search" name="nama" id="nama" class="form-control">
                        <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="cari" value="Search">
                    </form>
                </nav>
            </nav>
        </div>
        <h3 class="align-middle text-center mt-5">Data Mahasiswa</h3>
        <?php 
            if(isset($pesan)){
                echo "<div class=\"pesan\">$pesan</div>";
            }
        ?>
        <table class="table table-hover">
            <tr class="thead-light">
                <th>NIM</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Fakultas</th>
                <th>Jurusan</th>
                <th>IPK</th>
                <th>Action</th>
            </tr>
                <?php
                    $result = mysqli_query($koneksi,$query);

                    if(!$result){
                        die("Query Error: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
                    }

                    // buat perulangan untuk element tabel dari data mahasiswa
                    while($hasil_query = mysqli_fetch_assoc($result)):
                        // konversi date mysql (yyyy-mm-dd) menjadi (dd-mm-yyy)
                        $tanggal_lahir_mhs = new DateTime($hasil_query['tanggal_lahir']);
                        $format_tanggal_lahir = date_format($tanggal_lahir_mhs,"d-m-Y");

                        echo "<tr>";
                        echo "<td>$hasil_query[nim]</td>";
                        echo "<td>$hasil_query[nama]</td>";
                        echo "<td>$hasil_query[tempat_lahir]</td>";
                        echo "<td>$format_tanggal_lahir</td>";
                        echo "<td>$hasil_query[fakultas]</td>";
                        echo "<td>$hasil_query[jurusan]</td>";
                        echo "<td>$hasil_query[ipk]</td>";
                        echo "<td>"; ?>
                        <form action="form_edit.php" method="post">
                            <input type="hidden" name="nim" id="nim" value="<?=$hasil_query["nim"]?>">
                            <input type="submit" name="edit" id="edit" value="Edit">
                        </form>
                        <?php 
                        echo "</td>";
                        echo"</tr>";
                    endwhile;

                    // bebaskan memory
                    mysqli_free_result($result);

                    // tutup koneksi dengan database mysql
                    mysqli_close($koneksi);
                ?>
        </table>
    </div>
</body>
</html>