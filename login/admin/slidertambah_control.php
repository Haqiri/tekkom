<?php

include('../../assets/config/koneksi.php');
session_start();

if(isset($_POST['btn_registrasi'])) {
    // print_r($_POST);

    $judul = $_POST['judul'];
    $keterangan = $_POST['keterangan'];
    // Insert Foto
            
            $ekstensi_diperbolehkan = array('png','jpg');
            $filename = $_FILES['foto']['name'];
            $ukuran	= $_FILES['foto']['size'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);

            if(!in_array($ext,$ekstensi_diperbolehkan) ) {
            header("location:slider.php?alert=gagal_ekstensi");
                }else{
                if($ukuran < 5000000) {

                    $xx = $filename;

                    move_uploaded_file($_FILES['foto']['tmp_name'], '../../assets/images/slider/'.$filename);

                    $sql_slider = "INSERT INTO slider (foto, judul, keterangan) values ('$filename','$judul', '$keterangan')";
                    $query_update = mysqli_query($koneksi, $sql_slider);

                    if($query_update) { // jika berhasil
                        $_SESSION['pesan_sukses'] = "Data Berhasil di Tambahkan!";
                        header('location:slider.php');
                    } else {
                        $_SESSION['pesan_gagal'] = "Data Gagal di Tambahkan!";
                        header('location:slider.php');
                    }

                } else {
                    $_SESSION['pesan_gagal'] = "Size Foto Terlalu Besar!";
                    header('location:slider.php');
                }

            } 

        } else {
            // jika query pendaftar gagal
            echo "Error insert posting ". mysqli_error($koneksi);
            echo "<br><br> <button type='button' onclick='history.back();'> Kembali </button>";
            die;
          }

?>