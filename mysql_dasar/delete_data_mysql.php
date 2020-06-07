<?php 
    // koneksi ke database
    $koneksi = mysqli_connect("localhost", "root","","universitas");
    // cek apakah koneksi berhasil
    if(!$koneksi){
        die("gagal terhubung ke database: ".mysqli_connect_errno($koneksi). " - ".mysqli_connect_error($koneksi));
    }

    // jalankan query delete
    $query = "DELETE FROM mahasiswa WHERE nama = 'surya permata' OR nim = '140211'";
    $hasil_query = mysqli_query($koneksi, $query);

    // periksa query, tampilkan pesan kesalahan jika gagal
    if($hasil_query){
        // delete berhasil, cek apakah ada data yang dihapus
        if($hapus_data = mysqli_affected_rows($koneksi)){
            echo "qeury berhasil, terdapat $hapus_data data yang dihapus.";
        } else {
            echo "query berhasil, tidak ada data yang dihapus";
        }
    } else {
        die("query gagal dijalankan:".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
    }
?>