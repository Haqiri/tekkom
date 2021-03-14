<?php

include('../../assets/config/koneksi.php');
session_start();

if(isset($_POST['btn_registrasi'])) {
    // print_r($_POST);
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tgl = date("Y-m-d", strtotime($_POST['tgl']));
    $author = $_POST['author'];
    $ktg = $_POST['ktg'];
     //Foto
        $ekstensi_diperbolehkan = array('png','jpg');
        $filename = $_FILES['foto']['name'];
        $ukuran	= $_FILES['foto']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

            if(!in_array($ext, $ekstensi_diperbolehkan) ) {
            header("location:posting.php?alert=gagal_ekstensi");
                }else{
                if($ukuran < 5000000) {

                    $xx = $filename;

                    move_uploaded_file($_FILES['foto']['tmp_name'], '../../assets/images/berita/'.$filename);

                    $sql_posting = "INSERT INTO posting (foto, judul, isi, tgl, author, ktg) values ('$filename','$judul', '$isi', '$tgl', '$author', '$ktg')";
                    $query_update = mysqli_query($koneksi, $sql_posting);

                    if($query_update) { // jika berhasil
                        $_SESSION['pesan_sukses'] = "Data Berhasil di Tambahkan!";
                        header('location:posting.php');
                    } else {
                        $_SESSION['pesan_gagal'] = "Data Gagal di Tambahkan!";
                        header('location:posting.php');
                    }
                } else {
                   $_SESSION['pesan_gagal'] = "Size Foto Terlalu Besar!";
                    header('location:posting.php');
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