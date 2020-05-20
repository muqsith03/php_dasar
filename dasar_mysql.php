<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once "form_prosesing/bootstrap.php"; ?>
</head>
<body>
    <div class="container">
        <h1>Belajar Perintah Dasar Mysql</h1>
        <h4>Membuat database dan menggunakannya</h4>
        <p>untuk membuat database dapat menggunakan perintah : 'create database nama_database', dan untuk menggunakannya gunakan perintah 'use nama_database'</p>
        <h4>membuat table dan melihat deskripsi pada table</h4>
        <p>untuk membuat table dapat menggunakan perintah : 'create table nama_table (nama_column tipe_data(karakter), nama_column tipe_data(karakter)'. untuk melihat table yang sudah dibuat dapat menggunakan perinta : 'describe nama_table'.</p>
        <h4>menambahkan data kedalam table</h4>
        <p>untuk menambahkan data pada database mengguankan perintah : 'insert into nama_table (nama-nama_column) values(isi_insert_data)'. untuk menambahkan data 2 atau lebih sekaligus dapat menambahkan koma(,) pada akhiran data pertama.</p>
        <h4>untuk menghapus dan merubah column pada table</h4>
        <p>untuk menghapus column yang diinginkan dapat menggunakan perintah : 'alter table nama_table drop nama_column'.</p>
        <p>untuk menambahkan column dapat menggunakan perintah : 'alter table nama_table add column nama_column tipe_data(karakter) after nama_column'.</p>
        <p>untuk modify  column dapat menggunakan perintah : 'alter table nama_table modify nama_column tipe_data(karakter)'</p>
        <p>untuk merubah nama column dengan change contoh : 'alter table nama_table change nama_column_lama nama_column_baru tipe_data(karakter)'</p>
        <h4>menampilkan data dari database</h4>
        <p>untuk menampilkan data yang ad apada database dapat menggunakan perintah : 'select * from nama_table;. kita juga dapat mencustomisasi apa yang ingin kita tampilkan contoh kita ingin menampilkan nama, jurusan, dan ipk. : 'select nama, jurusan, ipk from mahasiswa;. <br>
        query select juga dipakai untuk membuat proses pencarian, perintah tambahannya adalah 'LIKE'. contoh : select * from nama_table where nama_column LIKE 'nama_yang_dicari';. kondisi 'LIKE' juga mendukung khusu atau wildcard untuk pencarian dengan pola. karakter tersebut adalah '_' dan '%' <br>
        <ul>
            <li>_ (underscore). karakter ganti yang cocok untuk satu karakter apa saja.</li>
            <li>%(percent). karakter ganti yang cocok untuk karakter apa saja dengan panjang karakter tidak terbatas, termasuk tdak ada karakter.</li>
            conoth untuk mencari nama dengan awalan 'R' kita dapat mengguankan query seperti berikut: select * from mahasiswa where nama like 'R%';
        </ul></p>
        <h4>mengubah data (edit) dari database</h4>
        <p>kadang kita butuh untuk mengubah atau mengupdate data yang ada didatabase, untuk merubah data yang ad di database dapat menggunakan perintah :update nama_tabel set nama_column = 'data_baru' where  kondisi. contoh kita ingin merubah nama dari budi jadi ajeng. update mahasiswa set nama ='ajeng' where nama='budi';. jika kita mengupdate query tanpa memberikan kondisi maka data semua akan berubah. maka dari itu hati'' ketika update data di database. </p>
        <h4>menghapus data dari database</h4>
        <p>untuk menghapus data yang ada di database dapat menggunakan perintah : ' delete from nama_table where kondisi'. contoh : kita ingin menghapus nama budi, berikut perintahnya : 'delete from mahasiswa where nama='budi'. berikut contohnya : delete from mahasiswa where tempat_lahir = 'tangerang'. query ini akan menghapus semua tempat_lahir yang berisi tangernag. konsep kondisi pada delete sama seperti query update, jika kita lupa menulis kondisi maka semua data akan terhapus.</p>
    </div>
</body>
</html>