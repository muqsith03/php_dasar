<?php 
    // buat koneksi dengan database mysql
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "kampusku";

    $koneksi = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    // pereiksa apakah koneksi berhaisl atau tidak
    if(!$koneksi) {
        die("Koneksi dengan database gagal: ".mysqli_connect_errno($koneksi)." - ".mysqli_connect_error($koneksi));
    }
    
?>