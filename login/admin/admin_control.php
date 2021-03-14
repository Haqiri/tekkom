<?php
include('../../assets/config/koneksi.php');
session_start();

    $id_admin = $_GET['id'];
    $query = mysqli_query ($koneksi, "Select * from users where id='$id_admin'");
    $a = mysqli_fetch_array($query);
    $lama = $a['foto'];

    unlink('../../assets/images/admin/' . $lama); //hapus foto lama di folder
    $hapus = mysqli_query($koneksi, "DELETE FROM users where id='$id_admin'");
    if($hapus) { // jika berhasil
        $_SESSION['pesan_sukses'] = "Data Berhasil di Hapus!";
        header('location:admin.php');
    } else {
        $_SESSION['pesan_gagal'] = "Data Gagal di Hapus!";
        header('location:admin.php');
    }

?>