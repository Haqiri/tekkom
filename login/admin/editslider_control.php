<?php
include('../../assets/config/koneksi.php');
session_start();

if(isset($_POST['btn_simpan'])) {
        $id_slider = $_POST['id_slider'];
        $judul = $_POST['judul'];
        $keterangan = $_POST['keterangan'];
        $lama = $_POST['foto_lama'];
        // GAMBAR
        $foto = $_FILES['foto']['tmp_name'];               //variabel dari temporary foto
        $nama_foto = $_FILES['foto']['name'];             //variabel dari name input foto
        $type = $_FILES['foto']['type'];                   //variabel dari type foto
        $ukuran = $_FILES['foto']['size'];                 //variabel dari ukuran foto
        $files = strtolower(substr(strrchr($nama_foto, "."), 1)); //variabel untuk extensi file
            
           if($ukuran > 5000000) {
                echo "Gambar terlalu besar";        
            } else {
                if(empty($foto)){
                    $sql_slider = "UPDATE slider set judul='$judul', keterangan='$keterangan' where id='$id_slider'";
                    $query_update = mysqli_query($koneksi, $sql_slider);

                    if($query_update) { // jika berhasil
                       $_SESSION['pesan_sukses'] = "Data Berhasil di Perbarui!";
                        header('location:slider.php');
                    } else {
                        $_SESSION['pesan_gagal'] = "Data Gagal di Perbarui!";
                        header('location:slider.php');
                    }
                }else{
                    unlink('../../assets/images/slider/' . $lama); //hapus foto lama di folder
                    move_uploaded_file($foto, "../../assets/images/slider/$nama_foto"); //upload foto baru
                    $sql_slider1 = "UPDATE slider set judul='$judul', keterangan='$keterangan', foto='$nama_foto' where id='$id_slider'";
                    $query_update1 = mysqli_query($koneksi, $sql_slider1);

                    if($query_update1) { // jika berhasil
                       $_SESSION['pesan_sukses'] = "Data Berhasil di Perbarui!";
                        header('location:slider.php');
                    } else {
                       $_SESSION['pesan_gagal'] = "Data Gagal di Perbarui!";
                        header('location:slider.php');
                    }
                }
            } 
}
?>