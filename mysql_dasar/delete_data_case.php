<?php 
    // koneksi ke database;
    $koneksi = mysqli_connect("localhost","root","","universitas");
    // cek apakah berhasil terhubung
    if(!$koneksi){
        die("gagal terhubung ke database:" .mysqli_connect_errno($koneksi). " - ".mysqli_connect_error($koneksi));
    }
    // ambil data dari get
    $nama = $_GET["nama"];

    // jalankan query hapus
    $query = "DELETE FROM mahasiswa WHERE nama = '$nama'";
    $hasil_query = mysqli_query($koneksi, $query);

    // jika berhasil direct ke study case
    if($hasil_query){
        // jika berhasil dan ada data yang terhapus
        if($hapus_data = mysqli_affected_rows($koneksi)){
            echo "<script>alert('data berhasil dihapus')</script>";
            header("Location: study_case.php");
        } else {
            echo "<script>alert('query berhasil, tidak ada data yang terhapus')</script>";
            header("location: study_case.php");
        }
    } else {
        echo "<script>alert('query gagal : '".mysqli_error($koneksi)." - ".mysqli_erorr($koneksi).")"."</script>";
    }

?>