<?php 
    // buat koneksi kedatabase
    $koneksi = mysqli_connect("localhost","root","","universitas");

    // cek apakah datbase berhasil terhubung
    if(!$koneksi){
        die("gagal terhubung ke database: ".mysqli_connect_errno($koneksi)." - ". mysqli_connect_error($koneksi));
    }

    // siapkan data prepare
    $nama = "ria";
    $ipk = 3.10;

    // buat query prepare
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%?%' OR ipk LIKE '%?%'";
    $stmt = mysqli_prepare($koneksi,$query);

    // hubungkan data prepare statment :bind
    mysqli_stmt_bind_param($stmt, "sd",$nama,$ipk);

    // jalankan execute
    $sukses = mysqli_stmt_execute($stmt);
    // cek apakah query berhasil
    if(!$sukses){
        die("query error: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
    }
    // ambil hasil query
    $hasil_query = mysqli_stmt_get_result($stmt);
    // tampilakan data
    while($data = mysqli_fetch_row($hasil_query)){
        echo "$data[0] $data[1] $data[2] $data[3] $data[4] $data[5]";
    }
    // bebaskan memory
    mysqli_stmt_free_result($stmt);
    // tutup statment 
    mysqli_stmt_close($stmt);
    // tutup koneksi database
    mysqli_close($koneksi);
?>