<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>case studi menghitung selisih tanggal</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h4>Case Studi : menghitung selisih tanggal</h4>
        <p>kita akan menghitung slisih antara dua buah tanggal. contoh tanggal pertama adalah 2-05-2020, dan tanggal kedua : 7-05-2020. berapa hari selisih antara kedua tanggal tersebut ?</p>
        <?php 
            $tgl_1 = strtotime("2-05-2020");
            $tgl_2 = strtotime("7-05-2020");

            $tgl_selisih = $tgl_2 - $tgl_1;
            echo $tgl_selisih;
            echo "<br>";

            $satu_hari = 24*60*60;
            $selisih_hari = $tgl_selisih/$satu_hari;

            echo " dari tanggal 2 ke tanggal 7 selisih  : $selisih_hari hari";
            echo "<h4>selisih tahunan</h4>";
            $tgl_3 = strtotime("15-04-2020");
            $tgl_4 = strtotime("30-02-2020");
            $selisih_bulan = $tgl_3 - $tgl_4;
            echo $selisih_bulan;

            $satu_bulan = 30*24*60*60;
            $hasil_bulan = $selisih_bulan/$satu_bulan;
            echo " ulang tahun tinggal : $hasil_bulan"
        ?>
        <h4>Contoh dalam 3 satuan : hari, bulan, Tahun</h4>
        <?php 
        $case2_tgl_1 = strtotime("12-10-2020");
        $case2_tgl_2 = strtotime("9-6-2019");

        $selisih_case2 = $case2_tgl_1 - $case2_tgl_2;

        $hari = 24*60*60;
        $bulan = 30*24*60*60;
        $tahun = 365*24*60*60;

        $selisih_tahun = floor($selisih_case2 / $tahun);
        $selisih_bulan_case2 = floor(($selisih_case2 - ($selisih_tahun * $tahun)) / $bulan);
        $selisih_hari_case2 = floor(($selisih_case2 - ($selisih_tahun * $tahun) - ($selisih_bulan_case2 * $bulan)) / $hari);

        echo "Selisih tanggal adalah $selisih_tahun tahun, $selisih_bulan_case2 bulan, $selisih_hari_case2 hari";
        
        ?>
        <h4>contoh dengan function yang mengembalikan 3 nilai ? Jawabannya dengan array. </h4>
        <?php 
            function cari_selisih_tanggal($tanggal_1, $tanggal_2){
                $tgl_case3_tgl1 = strtotime($tanggal_1);
                $tgl_case3_tgl2 = strtotime($tanggal_2);

                $selisih_tanggal = abs($tgl_case3_tgl1 - $tgl_case3_tgl2);
                $hari_case3 = 24*60*60;
                $bulan_case3 = 30*24*60*60;
                $tahun_case3 = 365*24*60*60;

                $selisih_case3["tahun"] = floor($selisih_tanggal / $tahun_case3);
                $selisih_case3["bulan"] = floor(($selisih_tanggal - ($selisih_case3["tahun"] * $tahun_case3)) /  $bulan_case3);
                $selisih_case3["hari"] = floor(($selisih_tanggal - ($selisih_case3["tahun"] * $tahun_case3) - ($selisih_case3["bulan"] * $bulan_case3)) / $hari_case3);
                return $selisih_case3;
            }

            $cari_tanggal1 = cari_selisih_tanggal("12-10-2016", "27-10-2016");
            echo "selisih tanggal adalah = {$cari_tanggal1['tahun']} tahun, {$cari_tanggal1['bulan']} bulan, {$cari_tanggal1['hari']} hari";
            echo "<br>";
            $cari_tanggal2 = cari_selisih_tanggal("15-04-1995", "28-02-2020");
            echo "selsisih tanggal adalah = {$cari_tanggal2['tahun']} tahun, {$cari_tanggal2['bulan']} bulan, {$cari_tanggal2['hari']} hari";
            echo "<br>";
            
            
        ?>

        <h4>dateTime object</h4>
        <p>fungsi date_careate tidak bisa di tampilkan dengan echo saja, untuk menampilkannya bisa menggunakan fungsi date_format(). fungsi date format butuh 2 argumen, argumen pertama berupa variable yang berisi datetime object haisl pemanggilan fungsi date_create. sedangkan argumen kedua beurpa format yang ingin ditampilkan</p>
        <?php
            $tanggal_object1 = date_create("17-08-2020");
            echo date_format($tanggal_object1, "d-m-Y")."<br>";

            $tanggal_object2 = date_create("21-4-20 10:30:59");
            echo date_format($tanggal_object2, "d-M-Y, H:i:s")."<br>";
        ?>

        <h4>cari selisih tanggal versi 2. dengan refactoring code (menyerdehanakan code tampa merubah input/output nya)</h4>
        <?php
            function cari_selisih_tanggal_v2($tanggal1, $tanggal2){
                $tgl1_v2 = date_create($tanggal1);
                $tgl2_v2 = date_create($tanggal2);

                $selisih_tanggal = date_diff($tgl1_v2, $tgl2_v2);

                $selisih_v2["tahun"] = $selisih_tanggal->y;
                $selisih_v2["bulan"] = $selisih_tanggal->m;
                $selisih_v2["hari"] = $selisih_tanggal->d;
                return $selisih_v2;


            }

            $refactor_tgl = cari_selisih_tanggal_v2("15-04-1995", "today");
            echo "sekarang umur anda adalah {$refactor_tgl['tahun']} tahun, {$refactor_tgl['bulan']} bulan, {$refactor_tgl['hari']} hari";

        ?>





    </div>
</body>
</html>