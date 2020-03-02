<?php 

    if(!isset($_POST["submit"])){
        header("Location: form_1.php");

    }
    // ambil nilai dari POST
    $nama = trim($_POST["nama"]);
    $email = trim($_POST["email"]);

    // siapkan nilai untuk dikirim kembali
    $query_nama = "nama=".urlencode($nama);
    $query_email = "email=".urlencode($email);
    $isi_form = "&$query_nama&$query_email";

    // cek apakah form nama kosong atau tidak
    // if(empty($email) AND empty($nama)){
    //     $pesan= urlencode("nama dan email masih kosong");
    //     header("Location: form_1.php?pesan={$pesan}{$isi_form}");
    //     die();
    // }
    if(empty($nama)){
        $pesan = urlencode("form nama harus diisi");
        header("Location: form_1.php?pesan={$pesan}{$isi_form}");
        die();
    }
    // cek apakah form email kosong atau tidak
    if(empty($email)){
        $pesan = urlencode("form email harus diisi");
        header("Location: form_1.php?pesan={$pesan}{$isi_form}");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>proses form_1</title>
</head>
<body>
    <?php 
        echo "nama : $nama <br>";
        echo "email : $email <br>";
        if(isset($_POST["belajar"])){
            echo "belajar ".$_POST["belajar"]."<br>";
        }
    ?>
</body>
</html>