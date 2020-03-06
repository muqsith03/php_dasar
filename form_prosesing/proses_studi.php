
<?php

    $nama = htmlentities(strip_tags(trim($_POST["nama"])));
    $email = htmlentities(strip_tags(trim($_POST["email"])));
    $buku = htmlentities(strip_tags(trim($_POST["buku"])));
    $jumlah = htmlentities(strip_tags(trim($_POST["jumlah"])));
    $alamat = htmlentities(strip_tags(trim($_POST["alamat"])));
    $kurir = htmlentities(strip_tags(trim($_POST["kurir"])));
    $ongkir = htmlentities(strip_tags(trim($_POST["ongkir"])));
    $tgl = htmlentities(strip_tags(trim($_POST["tgl"])));
    $bln = htmlentities(strip_tags(trim($_POST["bln"])));
    $thn = htmlentities(strip_tags(trim($_POST["thn"])));
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>proses studi kasus</title>
    <style>
        body{
            background-color: #f8f8f8;
        }
        div.container{
            width: 500px;
            padding: 10px 80px 30px;
            background-color: white;
            margin: 20px auto;
            box-shadow: 1px 0px 10px, -1px 0px 10px;
        }
        h1{
            text-align: center;
            font-family: cambria, "Times New Roman", serif;
        }
        table{
            border-collapse: collapse;
            border-spacing: 0;
            border: 1px black solid;
            width: 100%;
        }
        th, td{
            padding: 8px 15px;
            border: 1px black solid;

        }
        td:first-child{
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>pembelian buku</h1>
        <table>
            <tr>
                <td><?=$nama; ?></td>
            </tr>
            <tr>
                <td><?=$email; ?></td>
            </tr>
            <tr>
                <td><?=$buku; ?></td>
            </tr>
            <tr>
                <td><?=$jumlah. "buah buku"; ?></td>
            </tr>
            <tr>
                <td><?=$alamat; ?></td>
            </tr>
            <tr>
                <td><?=$kurir; ?></td>
            </tr>
            <tr>
                <td><?php echo "Rp. ".number_format($ongkir,2,",","."); ?></td>
            </tr>
            <tr>
                <td><?php echo "$tgl - $bln - $thn"; ?></td>
            </tr>
            <tr>
                <td><?php echo "$tambahan_dvd $tambahan_kado"; ?></td>
            </tr>
            <tr>
                <td><?php $total = ($jumlah*100000) + $ongkir; 
                echo "Rp.".number_format($total,2,",","."); ?></td>
            </tr>
        </table>
    </div>
</body>
</html>