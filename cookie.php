<?php 
    setcookie("nama", "fajar");
    setcookie("kota", "jakarta");
    echo "cookie berhasil di set";

    // hapus cookie
    unset($_COOKIE["nama"]);
    unset($_COOKIE["kota"]);
    
    // include file header
    include_once("header.php");
    
?>

<h4 class="pt-5">Cookie</h4>
<?php 
    if(isset($_COOKIE["nama"])){
        echo "isi dari cookie nama adalah : ".$_COOKIE["nama"];
        echo "</br>";
    } else {
        echo "cookie 'nama' belum ada </br>";
        
    }
    if(isset($_COOKIE["kota"])){
        echo "isi dari cookie kota adalah : ".$_COOKIE["kota"];
        echo "</br>";
    } else{
        echo "cookie kota belum di ada </br>";
    }
?>


<!-- include file footer -->
<?php include_once("footer.php"); ?>