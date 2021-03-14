<?php
include('../../assets/config/koneksi.php');
session_start();

if(isset($_POST['btn_simpan'])) {
    $id_admin = $_POST['id_admin'];
    $password_baru = md5($_POST['password_baru']);
    $ulang_password_baru = md5($_POST['ulang_password_baru']);
    $password_lama = md5($_POST['password_lama']);
    $query_pw = mysqli_query ($koneksi, "Select * from users where id='$id_admin'");
    $pw = mysqli_fetch_array($query_pw);
    
    if($password_lama != $pw['password']){
        $_SESSION['pesan_gagal'] = "Password Lama Salah. Silahkan Masukkan Password Lama dengan Benar!";
        header('location:admin.php');
    } elseif ($password_baru != $ulang_password_baru){
        $_SESSION['pesan_gagal'] = "Silahkan Ulangi Password Baru dengan Benar!";
        header('location:admin.php');
    } else {
        $update = mysqli_query($koneksi, "UPDATE users set password='$password_baru' where id='$id_admin'");
        if($update){
            $_SESSION['pesan_sukses'] = "Password Berhasil di Perbarui!";
            header('location:admin.php');
        } else {
            $_SESSION['pesan_gagal'] = "Password Gagal di Perbarui!";
            header('location:admin.php');
        }
    }
}
?>