<?php 
    include("header.php");
    include("function.php");
?>

<article class="pt-5">
    <h4>fungsi Include()</h4>
    <p>fungsi include() bisa dipakai untuk memasukan kode dari file lain ke dalam halaman saat ini. file yang akan diinput tidak harus file .php, tetapi bisa juga file lainnya. dengan memecah belah file html akan menjadi lebih efisien daripada harus mencopy seluruh bagian header dan footer ke tiap-tiap halaman. php tidak membatasi berapa banyak file yang di include. </p>
    <p><?=salam("fajar"); "<br>";?></p>
    <p><?=koneksi("root"); ?></p>

    <h4>fungsi include_once()</h4>
    <p>selain fungsi include, php juga menyediakan fungsi include_once(). perbedaannya adalah include_once adalah fungsi yang memastikan file yang di include hanya 1 kali. fungsi incliud_once akan memeriksa apakah file yang sama sebeumnya telah di include ? jika sudah tidak perlu di include lagi, artinya fille yang sama tidak akan di include lebih dari 1 kali.</p>

    <h4>fungsi required dan required_once</h4>
    <p>php memiliki fungsi lain yang mirip dengan include, yaitu required dan required_once. keduanya sama-sama berfungsi untuk menginput file lain ke dalam kode php saat ini. perbedaannya adalah fungsi required akan mengeluarkan pesan fatal error jika file yang diinput tidak bisa diakses (atau filenya memang belum ada), sedangkan fungsi include hanya akan mengeluarkan warning saja. </p>
    <p>fungsi include akan menampilkan pesan error "WARNING" jika ada kesalahan,  artinya kode akan tetap dijalankan walaupun ada error. </p>
    <p>fungsi required akan menampilkan pesan error "FATAL ERROR" jika ada kesalahan, artinya kode akan diberhentikan jika ada error. fungsi ini cocok untuk diakai untuk menginput file yang memang sangat penting, jika tidak ditemukan php harus berhenti.</p>

    <h4>redirect dengan fungsi header</h4>
    <p>redirect adalah istilah web yang berarti mengalihkan pengunjung ke halaman lain. fitus ini umum dijumpai pada halaman login. fitur redirect ini bisa dibnuat memlalui fungsi header(). caranya dengan mengubah label "Location" dari HTTP header seperti contoh berikut :</p>
    <?php
        //echo "teks";
        //header("Location: http://www.google.com");
    ?>

    <h4>fungsi date dan time</h4>
    <p>untuk memproses tanggal kita menggunakan fungsi date dan time. di dalam php manual, date and time function bisa diakses dari function reference-> date and time related extentions-> date and time-> date/time function. fungsi time() akan mengembalikan nilai angka integer yang disebut dengan unix timestamp. unix timestamp adalah angka dalam satuan detik sejak tanggal 1 januari 1970, pukul 00:00:00 GMT. dengan sistem perhitungn ini, kita bisa mencari waktu untuk minggu depan, kmarein, besok atau lusa. caranya dengan tambah atau kurangkan nilai unix timestamp seperti contoh : </p>
    <?php 
        $minggu_depan = time() + (7 * 24 * 60 * 60);
        echo $minggu_depan;
        echo "<br>";
        $kemarin = time() - (1*24*60*60);
        echo $kemarin;
    ?>
    <h5>fungsi date</h5>
    <p>format penulisan date(string$format[,int $timestamp = time()]) : string</p>
    <p>hasil dari time diatas belum berbentuk sebuah "tanggal". untuk menampilkan dan memformat tanggal php menyediakan fungsi date()</p>
    <p>fungsi date butuh 1 argumen utama dan 1 opsional, argumen peertama diisi dengan format tampilan tanggal, dan argumen kedua diisi dengan anga unix timestamp. apabila tidak ditulis secara default akan diapaki tanggal sekarang. berikut contohnya</p>
    <p><?php 
        echo date("d-m-Y", $minggu_depan);
        echo "<br>";
        echo date("d-m-Y");
        echo "<h4>membuat tanggal format indonesia</h4> <br>";
        $nama_hari = ["ahad", "senin", "selasa", "rabu", "kamis", "jum'at", "sabtu"];
        $nama_bulan = ["Januari", "Februari", "Maret", "april", "mei", "juni", "juli", "agustus", "september", "oktober", "november", "desember"];

        $hari    = date("w");
        $tanggal = date("j");
        $bulan   = date("n");
        $tahun = date("Y");

        echo "tanggal hari ini adalah : $nama_hari[$hari]-$tanggal-$nama_bulan[$bulan]-$tahun";
        
    ?></p>
    
</article>

<?php 
    include("footer.php");
?>