<?php
include('../../assets/config/koneksi.php');
session_start();

    $id_posting = $_GET['id'];
    $query = mysqli_query ($koneksi, "Select * from posting where id='$id_posting'");
    $a = mysqli_fetch_array($query);
    $lama = $a['foto'];

    unlink('../../assets/images/berita/' . $lama); //hapus foto lama di folder
    $hapus = mysqli_query($koneksi, "DELETE FROM posting where id='$id_posting'");
    if($hapus) { // jika berhasil
        $_SESSION['pesan_sukses'] = "Data Berhasil di Hapus!";
        header('location:posting.php');
    } else {
        $_SESSION['pesan_gagal'] = "Data Gagal di Hapus!";
        header('location:posting.php');
    }

?>