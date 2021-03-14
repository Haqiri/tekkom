<?php
include('../../assets/config/koneksi.php');
session_start();

if(isset($_POST['btn_simpan'])) {
        $id_admin = $_POST['id_admin'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $level = $_POST['level'];
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
                    $sql_admin = "UPDATE users set nama='$nama', username='$username', level='$level' where id='$id_admin'";
                    $query_update = mysqli_query($koneksi, $sql_admin);

                    if($query_update) { // jika berhasil
                        $_SESSION['pesan_sukses'] = "Data Berhasil di Perbarui!";
                        header('location:admin.php');
                    } else {
                        $_SESSION['pesan_gagal'] = "Data Gagal di Perbarui!";
                        header('location:admin.php');
                    }
                }else{
                    unlink('../../assets/images/admin/' . $lama); //hapus foto lama di folder
                    move_uploaded_file($foto, "../../assets/images/admin/$nama_foto"); //upload foto baru
                    $sql_admin1 = "UPDATE users set nama='$nama', username='$username', foto='$nama_foto', level='$level' where id='$id_admin'";
                    $query_update1 = mysqli_query($koneksi, $sql_admin1);

                    if($query_update1) { // jika berhasil
                        $_SESSION['pesan_sukses'] = "Data Berhasil di Perbarui!";
                        header('location:admin.php');
                    } else {
                        $_SESSION['pesan_gagal'] = "Data Gagal di Perbarui!";
                        header('location:admin.php');
                    }
                }
            } 
}
?>