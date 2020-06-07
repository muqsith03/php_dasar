<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prepared statment</title>
    <?php include_once "../form_prosesing/bootstrap.php"; ?>
</head>
<body>
    <div class="container">
        <h3>mengenal prepared statment</h3>
        <p>
            prepared statment adalahh fitur lanjutan yang didukung mysqli extension. tujuan dari prepared statment adalah untuku memisahkan perintah query SQL dengan variable PHP. <br>
            proses pembuatan prepared statment buthu 3 langkah : <b>prepaed</b>,<b>Bind</b>, <b>Execute</b>. berikut fungsinya :
            <ul>
                <li>mysqli_prepare() : mempersiapkan quey awal (proses prepare)</li>
                <li>mysqli_stmt_bind_param(): menghubungkan data ke query awal(proses bind)</li>
                <li>mysqli_stmt_execute(): jalankan query (proses execute)</li>
            </ul>
        </p>
        <h5>peoses pertama : prepared</h5>
        <p>
        pada proses prepared, kita harus menuliskan query yang akan dijalankan tapi tanpa 'data'. bagian dimana data biasanya ditulis diganti dengan tanda tanya (?). contoh : <br>
        "SELECT * FROM mahasiswa WHERE nama = ? AND ipk = ?";<br>
        untuk menjalankan perinta diatas, gunakan fungsi mysqli_prepare():<br>
        $query = "SELECT * FROM maasiswa WHERE nama = ? AND ipk = ?";<br>
        $stmt = mysqli_prepare($koneksi, $query);<br>
        fungsi mysqli_prepare() butuh 2 argumen, berupa variable asil pemanggilan fungsi mysqli_connect() serta string query yang akan dijalankan.
        </p>
        <h5>proses kedua : Bind</h5>
        <p>
            proses bind bertujuan untuk mengisi tanda tanya "?" dari data yang sudah dibuat pada proses mysqli_prepare(). untuk ini tersedia fungsi mysqli_stmt_bind_param().<br>
            fungsi mysqli_stmt_bind_param=() butuh minimal 3 agumen:<br>
            <ul>
            <li>argumen pertama : diisi dengan variable hasil fungsi mysqli_prepare(). yang dalam contoh sebelumnya berupa variabel $stmt</li>
            <li>argumen kedua: adalah string inisial jenis tipe data argumen ketiga, yakni data yang akan diinput ke dalam query</li>
            <li>argumen ketiga: diisi dengan variable data yang akan menggantikan tanda "?". jika data yang diganti ada 2, maka ditempatkan menjadi argumen keempat, demikian seterusnya</li>
            </ul><br>
            melanjutkan contoh, berikut cara pemanggilan fungsi mysqli_stmt_bind_param(): <br>
            $nama = "riana putri";<br>
            $ipk = 3.10<br>
            $query = "SELECT * FROM mahasiswa WHERE nama ? AND ipk = ?";<br>
            $stmt = mysqli_prepare($koneksi, $query);<br>
            // menghungkan data dengan prepared statmend : binde<br>
            mysqli_stmt_bind_param($stmt, "sd", $nama, $ipk);<br>
            string "sd" di atas berarti saya menyiapkan data "String" dan "float". kenapa harus "sd" ? karena data yang diinput adalah bertipe string dan float. berikut inisial dari jenis tipe data yang digunakan:<br>
            <ul>
                <li><b>i</b> = variable bertipe integer</li>
                <li><b>d</b> = variable bertipe double</li>
                <li><b>s</b> = variable beripe string</li>
                <li><b>b</b> = variable bertipe blob(binary)</li>
            </ul>
        </p>
            <h5>proses ketiga : execute</h5>
            <p>
                setelah proses bind selesai, langka selanjutnya adala menjalankan query(execute) dengan memakai fungsi mysqli_stmt_execute(). fungsi ini butuh 1 bua argumen berupa variable hasil pemanggilan fungsi mysqli_prapare().<br>
                $suskes = mysqli_stmt_execute($stmt);<br>
                fungsi mysqli_stmt_execute() mengembalikan nilai true or false bergantung apakah query sukses dijalankan atau tidak. ini bisa dipakai sebagai patokan menampilkan pesan error: contoh <br>
                $sukses = mysqli_stmt_execute($stmt);<br>
                //cek apakah query berhasil<br>
                if(!$suskes){<br>
                    die("query error : ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));<br>
                }<br>
            </p>
            <h5>menampilakan data prepared statment</h5>
            <p>
                setelah proses prepared, bind, dan execute selesai. "kerjaan" kita belum habis. untuk menampilkan data butuh fungsi mysqli_stmt_get_result(). fungsi ini digunakan untuk mengambil data hasil query.<br>
                hasil dari fungsi mysqli_stmt_get_result() adalah variable resources yang sama seperti hasil fungsi mysqli_query(). berikut contohnya: <br>
                //ambil hasil query <br>
                $hasil_query = mysqli_stmt_get_result($stmt);<br>
                //tampilkan data<br>
                while($data = mysqli_fetch_row($hasil_query)){<br>
                    echo "data[0] $data[1] $data[2] $data[3] $data[4]"
                }
            </p>
    </div>
</body>
</html>