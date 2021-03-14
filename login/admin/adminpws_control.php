<?php
include('../../assets/config/koneksi.php');
session_start();

if(isset($_POST['btn_simpan'])) {
    $id_admin = $_POST['id_admin'];
    $password_baru = md5($_POST['password_baru']);
    $ulang_password_baru = md5($_POST['ulang_password_baru']);

    if($password_baru == $ulang_password_baru){
        $update = mysqli_query($koneksi, "UPDATE users set password='$password_baru' where id='$id_admin'");
       if($update){
            $_SESSION['pesan_sukses'] = "Password Berhasil di Perbarui!";
            header('location:admin.php');
        } else {
            $_SESSION['pesan_gagal'] = "Password Gagal di Perbarui!";
            header('location:admin.php');
        }
    } else {
        $_SESSION['pesan_gagal'] = "Silahkan Ulangi Password Baru dengan Benar!";
        header('location:admin.php');
    }
}

?>