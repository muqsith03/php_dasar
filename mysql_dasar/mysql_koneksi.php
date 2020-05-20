<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>koneksi ke mysql</title>
    <?php include_once "../form_prosesing/bootstrap.php" ?>
</head>
<body>
    <div class="container">
        <h4>Koneksi ke Databse</h4>
        <p>
        untuk berkomunikasi dengan mysql dari php idealnya ada 5 langkah:
        <ul>
            <li>buat koneksi dengan MSQL. untuk koneksi ke mysql diperlukan menginput alamat server, nama username, serta password dari user mysql</li>
            <li>jalankan Query(SQL). menjalankan query apakah menambahkan data baru, tampilkan data, update data atau hapus data.</li>
            <li>proses hasil query dengan php(jika ada). dalam tahap ini hasil query masih didalam memeory web server. agar bisa diakses harus memprosesnya dari php. </li>
            <li>kosongkan memory web server(optional). menghapus data hasil query dari memory web server. </li>
            <li>tutup koneksi dengan mysql(optional). memutuskan sambungan ke mysql, tepat setelah halaman selesai diproses. </li>
        </ul>
        langkah pertama dan kelima umumnya hanya cukup dilakukan sekali, yakni diawal dan diakhir kode program, untuk langkah ke-2,3 dan 4 bisa dijalankan berulang-ulang selama diperlukan. secara default komunikasi antara php dan mysql dijalankan per-halaman, ketika 1 halaman php selsai diproses, koneksi langsung diputus. saat membuka halaman baru, koneksi akan kembali dibuka dan akan terputus setelah halaman selesai diproses. begitu seterusnya.
        </p>
        <h4>fungsi mysqli_connect()</h4>
        <p>
        fungsi ini dipakai untuk membuat koneksi dari php ke mysql server. fungsi ini membutuhkan beberapa argumen dengan format dasar sebagai berikut : <br>
        $koneksi = mysqli_connect("alamat host(localhost)", "nama_user(root)", "password_user", "nama_database").<br>
        contoh : <br>
        buat koneksi dengan database mysql.<br>
        $dbhost = "localhost"; <br>
        $dbuser = "root"; <br>
        $dbpass = ""l <br>
        $dbname = "universitas"; <br>
        $koneksi = mysqli_connect($dbhost, $dbname, $dbuser, $dbname);
        </p>
    </div>
</body>
</html>