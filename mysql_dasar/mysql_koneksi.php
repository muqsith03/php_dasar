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
        <h4>function mysqli_connect_errno() dan mysqli_connect_error()</h4>
        <p>
            kedua fungsi ini dipakai untuk menampilkan pesan error jika koneksi antara php dengan mysql mengalami masalah. mysqli_connect_errno() akan menampilkan empat digit angka kode error mysql, sedangkan mysqli_connect_error() akan menampilkan pesan errornya.<br>
            contoh : <br>
            $dbhost = "localhost";<br>
            $dbuser = "root";<br>
            $dbpass = "";<br>
            $dbname = "belumada";<br>
            $koneksi = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);<br>
            
            note:periksa koneksi, tampilkan pesan kesalahan jika gagal<br>
            if(!$koneksi){
                die("koneksi dengan database gagal : ".mysqli_connect_errno(). " - ".mysqli_connect_error());
            }<br>
            walaupun pesan error ini sangat membantu selama perencangan kode program, untuk site "live" sebaiknya tidak melakukan hal ini. karena pesan error dapat dipelajari oleh orang yang tidak bertanggung jawab.
        </p>
        <h4>function mysqli_close()</h4>
        <p>
            fungsi ini kebalikan dari mysqli_connect, fungsi in akan menutup koneksi antara php dengan mysql dan membebaskan memory yang dipakai untuk proses koneksi tersebut. fungsi ini diletakan dibaris paling akhir atau dimana kita tidak membutuhkan lagi mengakses database.
            fungsi ini hanya membutuhkan 1 argumen yakni variable handle yg digunakan ketika memanggil fungsi mysqli_connect(). 
        </p>
        <h4>function mysqli_query()</h4>
        <p>
            fungsi ini digunakan untuk menjalakan perintah query(perintah sQL). fungsi ini butuh 2 argumen, argumen pertama variable handle yang didapat dari hasil pemanggilan fungsi mysqli_connect(), dan argumen kedua adalah perintah query dalam bentuk string.<br>
            tips untuk menghindari kesalahan penulisan pada saat query : <br>
            <ul>
                <li>pisahkan penulisan query kedalam sebuah variable. variable ini nantinya kita input sebagai argumen. contoh : $query = "SELECT * FROM mahasiswa"<br>
                hasil_query = mysqli_query($koneksi, $query);</li>
                <li>periksa query dengan menjalankan perintah echo ke variable query</li>
                <li>copy hasil dari echo dan jalankan di cmd mysql atau phpmyadmin. langkah ini sangat penting, pastikan query berjalan seperti yang diharapkan</li>
            </ul>
        </p>
        <h4>funciton mysqli_free_result()</h4>
        <p>
            fungsi ini berguna untuk mengosongkan memory ketika hasil query sudah selesai dijalankan. dengan kata lain, fungsi ini akan menghapus memory yang digunakan oleh mysqli_query(). sama seperti mysqli_close(), fungsi ini juga bersifat opsional, apabila tidak ditulis php secara otomatis mengosongkan memory pada saat halaman selesai diproses.
        </p>
    </div>
</body>
</html>