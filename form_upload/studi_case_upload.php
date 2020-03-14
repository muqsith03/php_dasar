<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>studi case buku tamu</title>

    <?php include_once "../form_prosesing/bootstrap.php" ?>

    <style>
        .error{
            background-color: #ffecec;
            padding: 10px 15px;
            margin: 0 0 20px 0;
            border: 1px solid red;
            box-shadow: 1px 0px 3px red;
        }
        body{
            background-color: #f8f8f8;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>studi case buku tamu </h1>
    <legend>buku tamu</legend>
    <form action="studi_case_uplaod.php" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control col-sm-9">
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control col-sm-9">
        </div>
        <div class="form-group row">
            <label for="komentar" class="col-sm-2 col-form-label">Komentar</label>
            <textarea name="komentar" id="komentar" cols="1" rows="2" class="form-control col-sm-9" ></textarea>
        </div>
        <div class="form-group row">
            <label for="gambar" class="col-sm-2 col-form-label">Display Picture</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
            <input type="file" name="gambar" id="gambar" class="custome-file-input" accept="image/*">
        </div>
        <div class="form-group row">
            <input type="submit" name="submit" id="submit" value="Simpan Data" class="btn btn-primary btn-sm">
        </div>
    </form>

</div>
    
</body>
</html>