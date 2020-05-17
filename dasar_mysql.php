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
        
    </div>
</body>
</html>