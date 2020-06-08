<?php
    // buaut koneksi ke database
    $koneksi = mysqli_connect("localhost","root","","universitas");
    // cek apakah berasil terhubung ke database
    if(!$koneksi){
        die("gagal terhubuung database: ".mysqli_connect_errno($koneksi)." - ".mysqli_error($koneksi));
    }

    // buat data untuk diinput
    $nim = "143138";
    $nama = "fajar";
    $tempat_lahir = "tangerang";
    $tanggal_laihr = "1995-04-15";
    $fakultas = "teknik informatika";
    $jurusan = "system arcitecture";
    $ipk = "3.50";

    // buat query prepare
    $quey = "INSERT INTO mahasiswa VALUE(?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($koneksi,$quey);
    // hubungkan data dengan prepare statment :bind
    mysqli_stmt_bind_param($stmt, "ssssssi", $nim,$nama,$tempat_lahir,$tanggal_laihr,$fakultas,$jurusan,$ipk);
    // jalankan quey execute
    $sukses = mysqli_stmt_execute($stmt);
    // cek apakah query berasil
    if(!$sukses){
        die("query gagal: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    } else{
        echo "penambaan ".mysqli_stmt_affected_rows($stmt)." data berasil<br>";
    }
    // tutup statment
    mysqli_stmt_close($stmt);
    // tutup koneksi ke database
    mysqli_close($koneksi);
?>