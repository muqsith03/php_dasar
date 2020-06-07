<?php
    // koneksi ke database 
    $koneksi = mysqli_connect("localhost", "root","","universitas");

    // jalankan query update
    $query = "UPDATE mahasiswa SET ipk=4.0 WHERE nama = 'fajar ali'";
    $hasil_query = mysqli_query($koneksi, $query);

    // periksa query, tampilkan pesan kesalahan jika gagal
    if($hasil_query){
        // update berhasil, cek apakah ada data yang diupdate
        if($jumlah_update = mysqli_affected_rows($koneksi)){
            echo "query berhasil, terdapat $jumlah_update data yang diupdate.";
        } else {
            echo "query berhasil, tidak ada data yang diupdate";
        }
    }else{
        die("query gagal dijalankan: ".mysqli_error($koneksi). " - ".mysqli_errno($koneksi));
    }
?>