// latihan mencari angka ganjil genap
const formAngka = document.getElementById("angka-1");
const tombolAngka = document.getElementById("tombol-angka-1");
const hasilAngka = document.getElementById("hasil-angka-1");

function genapGanjil(){
    // let hasilHitung;
    if(formAngka.value === ""){
        hasilAngka.innerHTML = "silahkan masukan angka terlebih dahulu";
    } else if(formAngka.value % 2 == 0 ){
        hasilAngka.innerHTML = "angka " + formAngka.value + " adalah genap";
    } else {
        hasilAngka.innerHTML = "angka " + formAngka.value + " adalah ganjil";
    }
}

tombolAngka.addEventListener("click", genapGanjil);

// latihan 2 : mencari nilai mana yang lebih besar
const angkaPertama = document.getElementById("latihan-besar-2");
const angkaKedua = document.getElementById("latihan-kecil-2");
const tombolLat2 = document.getElementById("tombol-latihan-2");
const hasilLat2 = document.getElementById("hasil-latihan-2");

function cariLebihBesar(){
    if(angkaPertama.value < angkaKedua.value){
        hasilLat2.innerHTML = angkaPertama.value + " lebih kecil dari " + angkaKedua.value; 
    } else if(angkaPertama.value > angkaKedua.value){
        hasilLat2.innerHTML = angkaPertama.value + " lebi besar dari " + angkaKedua.value;
    } else {
        hasilLat2.innerHTML = angkaPertama.value + " sama dengan " + angkaKedua.value;
    }
}
tombolLat2.addEventListener("click", cariLebihBesar);

// latihan 3 : cek username dan password 
const username = document.getElementById("username");
const password = document.getElementById("password");
const tombolLat3 = document.getElementById("tombol-latihan-3");
const hasilLat3 = document.getElementById("hasil-latihan-3");

function cekUser(){
    if(username.value == "admin" && password.value == "qwerty"){
        hasilLat3.innerHTML = "username dan password sesuai, hak akses diberikan";
    } else if(username.value != "admin" && password.value == "qwerty"){
        hasilLat3.innerHTML = "username tidak sesuai, cek kembali";
    } else if(username.value == "admin" && password.value != "qwerty"){
        hasilLat3.innerHTML = "password tidak sesuai, cek kembali";
    }
    else {
        hasilLat3.innerHTML = "username dan password tidak sesuai, silahkan coba lagi";
    }
}

tombolLat3.addEventListener("click", cekUser);
