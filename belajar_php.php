<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>belajar PHP</title>
</head>
<body>
    <h3>Daftar nama peserta</h3>
    <table border="1">
        <tr>
            <th>No</th>
            <th>nama peserta</th>
        </tr>
        <tr>
            <?php 
            for($i = 0; $i < 10; $i++){
                echo "<tr><td>$i</td><td>nama peserta - $i</td></tr>";
            }
            
            ?>
        </tr>
    </table>
</body>
</html>