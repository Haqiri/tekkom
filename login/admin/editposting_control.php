<?php
include('../../assets/config/koneksi.php');
session_start();

if(isset($_POST['btn_simpan'])) {
        $id_posting = $_POST['id_posting'];
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $tgl = date("Y-m-d", strtotime($_POST['tgl']));
        $author = $_POST['author'];
        $ktg = $_POST['ktg'];
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
                    $sql_posting = "UPDATE posting set judul='$judul', isi='$isi', tgl='$tgl', author='$author', ktg='$ktg' where id='$id_posting'";
                    $query_update = mysqli_query($koneksi, $sql_posting);

                    if($query_update) { // jika berhasil
                       $_SESSION['pesan_sukses'] = "Data Berhasil di Perbarui!";
                        header('location:posting.php');
                    } else {
                        $_SESSION['pesan_gagal'] = "Data Gagal di Perbarui!";
                        header('location:posting.php');
                    }
                }else{
                    unlink('../../assets/images/berita/' . $lama); //hapus foto lama di folder
                    move_uploaded_file($foto, "../../assets/images/berita/$nama_foto"); //upload foto baru
                    $sql_posting1 = "UPDATE posting set judul='$judul', isi='$isi', foto='$nama_foto',tgl='$tgl', author='$author', ktg='$ktg' where id='$id_posting'";
                    $query_update1 = mysqli_query($koneksi, $sql_posting1);

                    if($query_update1) { // jika berhasil
                       $_SESSION['pesan_sukses'] = "Data Berhasil di Perbarui!";
                        header('location:posting.php');
                    } else {
                       $_SESSION['pesan_gagal'] = "Data Gagal di Perbarui!";
                        header('location:posting.php');
                    }
                }
            } 
}
?>