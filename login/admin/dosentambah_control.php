<?php
include('../../assets/config/koneksi.php');
session_start();

if(isset($_POST['btn_registrasi'])) {
    // print_r($_POST);

    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $jabatan = $_POST['jabatan'];
    $pendidikan = $_POST['pendidikan'];
    $sk = $_POST['sk'];
    $sa = $_POST['sa'];
    $rp = $_POST['rp'];

    $ekstensi_diperbolehkan = array('png','jpg');
    $filename = $_FILES['foto']['name'];
    $ukuran	= $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

            if(!in_array($ext, $ekstensi_diperbolehkan) ) {
            header("location:dosen.php?alert=gagal_ekstensi");
                }else{
                if($ukuran < 5000000) {

                    $xx = $filename;

                    move_uploaded_file($_FILES['foto']['tmp_name'], '../../assets/images/dosen/'.$filename);

                    $sql_posting = "INSERT INTO dosen (foto, nip, nama, jk, jabatan, pendidikan, sk, sa, rp) values ('$filename','$nip', '$nama', '$jk', '$jabatan', '$pendidikan','$sk', '$sa', '$rp')";
                    $query_update = mysqli_query($koneksi, $sql_posting);

                    if($query_update) { // jika berhasil
                        $_SESSION['pesan_sukses'] = "Data Berhasil di Tambahkan!";
                        header('location:dosen.php');
                    } else {
                        $_SESSION['pesan_gagal'] = "Data Gagal di Tambahkan!";
                        header('location:dosen.php');
                    }

                } else {
                    $_SESSION['pesan_gagal'] = "Size Foto Terlalu Besar!";
                    header('location:dosen.php');
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