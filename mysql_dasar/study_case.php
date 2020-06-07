<?php 
    // koneksi ke database
    $koneksi = mysqli_connect("localhost","root","","universitas");
    // cek apakah berhasil terhubung
    if(!$koneksi){
        die("gagal terhubung ke database:".mysqli_connect_errno($koneksi). " - ".mysqli_connect_error($koneksi));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>studi kasus mysql dasar</title>
    <?php include_once "../form_prosesing/bootstrap.php"; ?>
</head>
<body>
    <div class="container">
        <h4>studi kasus mysql dasar</h4>
        <table class="table table-bordered table-hover ">
            <tr>
                <th>nim</th>
                <th>nama</th>
                <th>tempat lahir</th>
                <th>tanggal lahir</th>
                <th>fakultas</th>
                <th>jurusan</th>
                <th>ipk</th>
                <th>Action</th>
            </tr>
            <tr>
                <?php
                    $query_select= "SELECT * FROM mahasiswa";
                    $hasil_select= mysqli_query($koneksi, $query_select);
                    while($data_mahasiswa = mysqli_fetch_assoc($hasil_select)) :
                        echo "<tr>";
                        echo "<td>$data_mahasiswa[nim]</td>";
                        echo "<td>$data_mahasiswa[nama]</td>";
                        echo "<td>$data_mahasiswa[tempat_lahir]</td>";
                        echo "<td>$data_mahasiswa[tanggal_lahir]</td>";
                        echo "<td>$data_mahasiswa[fakultas]</td>";
                        echo "<td>$data_mahasiswa[jurusan]</td>";
                        echo "<td>$data_mahasiswa[ipk]</td>";
                        echo "<td>
                                <a href='Update_data_case.php?nama=$data_mahasiswa[nama]' class='btn btn-warning btn-sm'>Update Data</a>
                                <a href='delete_data_case.php?nama=$data_mahasiswa[nama]' class='btn btn-danger btn-sm'>Delete Data</a>
                            </td>";
                        echo "</tr>";
                    endwhile;
                    ?>
            </tr>
        </table>

        <a href="add_data_case.php" class="btn btn-primary btn-sm">Add Data</a>
    </div>
</body>
</html>

<?php 
    // hapus memori query
    mysqli_free_result($hasil_select);

    // tutup query
    mysqli_close($koneksi);

?>