



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>studi kasus :sebuah form utuh</title>
    <?php include_once "bootstrap.php"; ?>

</head>
<body>
    <div class="container">
        <h3>Pembelian buku duniailkom</h3>
        <form action="proses_studi.php" method="post">
            <legend>Form Order</legend>
            <form>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" id="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="buku" class="col-sm-2 col-form-label">Jenis Buku</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="buku" name="buku">
                            <?php 
                                $daftar_buku = ["html uncover", "css uncover", "php uncover", "javascript uncover", "mysql uncvoer"];
                                foreach($daftar_buku as $value){
                                    echo "<option value='{$value}'>{$value}</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah Buku</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="jumlah" name="jumlah">
                            <?php 
                                for($i=1; $i<=10; $i++){
                                    echo "<option value='$i'>$i</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                    <textarea name="alamat" id="alamat" cols="" rows="2" class="form-control"></textarea>
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Jenis Kurir</legend>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kurir" id="jne" value="jne">
                        <label class="form-check-label" for="jne">
                            JNE
                        </label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kurir" id="tiki" value="tiki">
                        <label class="form-check-label" for="tiki">
                            TIKI
                        </label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kurir" id="pos" value="pos" >
                        <label class="form-check-label" for="pos">
                            POS
                        </label>
                        </div>
                    </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <label for="ongkir" class="col-sm-2 col-form-label">Ongkos Kirim</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="ongkir" name="ongkir">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jumlah" class="col-sm-2 col-form-label">Tanggal Kirim</label>
                    <div class="col-sm-1">
                        <select class="form-control" id="jumlah" name="tgl">
                            <?php 
                                for($i=1; $i<=31; $i++){
                                    echo "<option value='$i'>$i</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select name="bln" id="bln" class="form-control">
                        <?php
                            $nama_bulan = [
                                "1" => "januari",
                                "2" => "februari",
                                "3" => "maret",
                                "4" => "april",
                                "5" => "mei",
                                "6" => "juni",
                                "7" => "juli",
                                "8" => "agustus",
                                "9" => "september",
                                "10" => "oktober",
                                "11" => "november",
                                "12" => "desember"
                            ];
                            
                            foreach($nama_bulan as $key => $bulan){
                                echo "<option value='{$key}'>{$bulan}</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select name="thn" id="thn" class="form-control">
                            <?php
                                for($i=2019; $i<=2025; $i++){
                                    echo "<option value='$i'>$i</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Tambahan</div>
                    <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="dvd">
                        <label class="form-check-label" for="gridCheck1">
                            DVD eBook
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="kado">
                        <label class="form-check-label" for="gridCheck1">
                            Bungkus Kado
                        </label>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" name="submit" id="submit" class="btn btn-primary btn-sm" value="Pesan Buku">
                    </div>
                </div>
                </form>
        </form>
    </div>
</body>
</html>