<?php 
    // buat koneksi dengan database
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $link = mysqli_connect($dbhost,$dbuser,$dbpass);

    // cek koneksi, tampilkan kesalahan jika gagal
    if(!$link){
        die("koneksi dengan database gagal: ".mysqli_connect_errno($link)." - ".mysqli_connect_error($link));
    }

    // buat database kampusku jika belum ada
    $query = "CREATE DATABASE IF NOT EXISTS kampusku";
    $result = mysqli_query($link, $query);
    // cek apakah query berhasil
    if(!$result){
        die("Query Error: ".mysqli_errno($link)." - ".mysqli_error($link));
    } else {
        echo "database <b>'kampusku'</b> berhasil dibuat...<br>";
    }
    // pilih database kampusku
    $result = mysqli_select_db($link,"kampusku");
    if(!$result){
        die("Quey Error: ".mysqli_errno($link)." - ".mysqli_error($link));
    } else {
        echo "Database 'kampusku' berhasil dipilih... <br>";
    }

    // cek apakah tabel mahasiswa sudah ada, jika ada hapus table 
    $query = "DROP TABLE IF EXISTS mahasiswa";
    $hasil_query = mysqli_query($link, $query);

    if(!$hasil_query){
        die("query error: ".mysqli_errno($link)." - ".mysqli_error($link));
    } else {
        echo "tabel <b>'mahasiswa'</b> berhasil dihapus...<br>";
    }

    // buat query untuk create table mahasiswa
    $query = "CREATE TABLE mahasiswa (nim char(8), nama varchar(60), tempat_lahir varchar(70), tanggal_lahir DATE, fakultas varchar(60), jurusan varchar(70), ipk decimal(3,2), PRIMARY KEY (nim))";
    $hasil_query = mysqli_query($link,$query);

    if(!$hasil_query){
        die("Query error: ".mysqli_errno($link). " - ".mysqli_error($link));
    } else {
        echo "tabel <b>'mahasiswa'</b> berhasil dibuat...<br>";
    }

    //buat query untuk insert data ke tabel mahasiswa
    $query = "INSERT INTO mahasiswa VALUES('1400501','riana putria','padang','1996-11-23','FMIPA','kimia',3.1),('150210','rudi permana','bandung','1994-08-22','FASILKOM','ilmu komputere',2.9), ('15003036','sari citra lestari','jakarta','1997-12-31','ekonomi','manajemen',3.5), ('15002032','rina kumala sari','jakarta','1997-06-28','ekonomi','akuntansi',3.4), ('13012012','james situmoang','medan','1995-04-02','kedokteran','kedokteran gigi',2.7)";

    $hasil_query =mysqli_query($link,$query);

    if(!$hasil_query){
        die("query error :".mysqli_errno($link)." - ".mysqli_error($link));
    } else {
        echo "table <b>'mahasiswa' berhasil diisii...</b> <br>";
    }

    // membuat tabel admin
    // cek apakah tabel admin sudah ada ? jika ada hapus tabel
    $query = "DROP TABLE IF EXISTS admins";
    $hasil_query = mysqli_query($link,$query);

    if(!$hasil_query){
        die("Query Error: ".mysqli_errno($link)." - ").mysqli_error($link);
    }else{
        echo "tabel <b>'admin'</b> berhasil dihapus...<br>";
    }

    // buat query untuk create table admin
    $query = "CREATE TABLE admins(username varchar(50),pass char(40))";
    $hasil_query = mysqli_query($link,$query);

    if(!$hasil_query){
        die("Query Error: ".mysqli_errno($link)." - ".mysqli_error($link));
    } else{
        echo "tabel <b>'admin'</b> berhasil dibuat...<br>";
    }

    // buat usenrame dan password untuk admin
    $username = "admin";
    $password = hash("sha1", "rahasia");

    // buat query insert data ke tabel admin
    $query = "INSERT INTO admins VALUES ('$username','$password')";
    $hasil_query = mysqli_query($link,$query);

    if(!$hasil_query){
        die("Query error: ".mysqli_errno($link)." - ".mysqli_error($link));
    } else{
        echo "tabel<b>'admin'</b> berhasil diisi... <br>";
    }



?>