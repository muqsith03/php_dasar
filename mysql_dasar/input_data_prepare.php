<?php 
// buat koneksi kedatabase
$koneksi = mysqli_connect("localhost","root","","universitas");
// cek apakah berhasil terhubung ke database
if(!$koneksi){
    die("koneksi gagal:".mysqli_connect_errno($koneksi)."- ".mysqli_connect_error($koneksi));
}

// siapkan data
$nim = "143138";
$nama = "fajar";
$tempat_lahir = "tangerang";
$tanggal_lahir = "1995-04-15";
$fakultas = "teknik informatika";
$jurusan = "system architecture";
$ipk = 3.80;

// buat query prepare
$query = "INSERT INTO mahasiswa VALUES (?,?,?,?,?,?,?)";
$stmt = mysqli_prepare($koneksi,$query);

// hubungkan data dengan prepared statmend :bind
mysqli_stmt_bind_param($stmt,"ssssssi",$nim,$nama,$tempat_lahir,$tanggal_lahir,$fakultas,$jurusan,$ipk);

// jalankan query execute
$sukses = mysqli_stmt_execute($stmt);
// cek apakah berhaisl errornya


?>