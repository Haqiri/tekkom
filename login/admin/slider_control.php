<?php
include('../../assets/config/koneksi.php');
session_start();

    $id_slider = $_GET['id'];
    $query = mysqli_query ($koneksi, "Select * from slider where id='$id_slider'");
    $a = mysqli_fetch_array($query);
    $lama = $a['foto'];

    unlink('../../assets/images/slider/' . $lama); //hapus foto lama di folder
    $hapus = mysqli_query($koneksi, "DELETE FROM slider where id='$id_slider'");
    if($hapus) { // jika berhasil
        $_SESSION['pesan_sukses'] = "Data Berhasil di Hapus!";
        header('location:slider.php');
    } else {
        $_SESSION['pesan_gagal'] = "Data Gagal di Hapus!";
        header('location:slider.php');
    }

?>