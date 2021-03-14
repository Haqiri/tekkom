<?php

// tabel pendaftar
$all_pendaftar = mysqli_query($koneksi, "SELECT * FROM posting WHERE posting.id ");

// cek hasil
if(!$all_pendaftar) {
    die('Query Error : '. mysqli_error($koneksi));
}

// jml pendaftar
$jml_pendaftar = mysqli_query($koneksi, "SELECT * FROM posting WHERE posting.id");

// cek hasil
if(!$jml_pendaftar) {
    die('Query Error : '. mysqli_error($koneksi));
}
$jml_dosen = mysqli_query($koneksi, "SELECT * FROM dosen WHERE dosen.id");

// cek hasil
if(!$jml_dosen) {
    die('Query Error : '. mysqli_error($koneksi));
}

// jml LOLOS
$jml_lolos = mysqli_query($koneksi, "SELECT * FROM slider WHERE slider.id");

// cek hasil
if(!$jml_lolos) {
    die('Query Error : '. mysqli_error($koneksi));
}

?>