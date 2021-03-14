<?php
include('../../assets/config/koneksi.php');
session_start();

    $id_dosen = $_GET['id'];
    $query = mysqli_query ($koneksi, "Select * from dosen where id='$id_dosen'");
    $a = mysqli_fetch_array($query);
    $lama = $a['foto'];

    unlink('../../assets/images/dosen/' . $lama); //hapus foto lama di folder
    $hapus = mysqli_query($koneksi, "DELETE FROM dosen where id='$id_dosen'");
    if($hapus) { // jika berhasil
        $_SESSION['pesan_sukses'] = "Data Berhasil di Hapus!";
        header('location:dosen.php');
    } else {
        $_SESSION['pesan_gagal'] = "Data Gagal di Hapus!";
        header('location:dosen.php');
    }
?>