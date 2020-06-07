<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "universitas";

    //koneksi ke database
    $koneksi = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
    // jika gagal tampilkan pesan
    if(!$koneksi){
        die("koneksi gagal terhubung ". mysqli_connect_errno($koneksi). " - ". mysqli_connect_error($koneksi));
    }

    // jalankan query 
    $query = "SELECT * FROM mahasiswa";
    $hasil_query = mysqli_query($koneksi, $query);
    // periksa query, tmpilkan pesan kesalahan
    if(!$hasil_query){
        die("query gagal ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
    }

    // tampilkan isi table
    // menampilkan data dengan perulangan for
    // for($i=1; $i<= 5; $i++){
    //     $data = mysqli_fetch_row($hasil_query);
    //     echo "$data[0] $data[1] $data[2] $data[3] $data[4] $data[5]";
    //     echo "<br>";
    // }

    // menampilkan data dengan perulangan while
    while($data = mysqli_fetch_row($hasil_query)){
        echo "$data[0] - $data[1] - $data[2] - $data[3] - $data[4] - $data[5]";
        echo "<br>";
    }
    $jumlah_data = mysqli_num_rows($hasil_query);
    echo "total data yang ada di database adalah : ".$jumlah_data;
?>

