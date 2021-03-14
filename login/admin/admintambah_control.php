<?php
include('../../assets/config/koneksi.php');
session_start();

if(isset($_POST['btn_registrasi'])) {
    // print_r($_POST);

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $ulangi_password = md5($_POST['ulangi_password']);
    $level = $_POST['level'];

     if($password != $ulangi_password) {
        echo "Error: Password tidak sama";
        echo "<br><br> <button type='button' onclick='history.back();'> Kembali </button>";
        die;
    }

    $ekstensi_diperbolehkan = array('png','jpg');
    $filename = $_FILES['foto']['name'];
    $ukuran	= $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

            if(!in_array($ext, $ekstensi_diperbolehkan) ) {
            header("location:admin.php?alert=gagal_ekstensi");
                }else{
                if($ukuran < 5000000) {

                    $xx = $filename;

                    move_uploaded_file($_FILES['foto']['tmp_name'], '../../assets/images/admin/'.$filename);

                    $sql_posting = "INSERT INTO users (foto, nama, username, password, level ) values ('$filename', '$nama', '$username', '$password' , '$level')";
                    $query_update = mysqli_query($koneksi, $sql_posting);

                    if($query_update) { // jika berhasil
                        $_SESSION['pesan_sukses'] = "Admin Berhasil di Tambahkan!";

                        header('location:admin.php');

                    } else {
                        $_SESSION['pesan_gagal'] = "Data Gagal di Tambahkan!";
                        header('location:admin.php');
                    }

                } else {
                    $_SESSION['pesan_gagal'] = "Gambar Terlalu Besar";
                    header('location:admin.php');
                }

            } 
        }
         else {
            // jika query pendaftar gagal
            echo "Error insert posting ". mysqli_error($koneksi);
            echo "<br><br> <button type='button' onclick='history.back();'> Kembali </button>";
            die;
          }
?>