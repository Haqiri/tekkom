<?php
include('../../assets/config/koneksi.php');
session_start();

if(isset($_POST['btn_simpan'])) {
        $id_dosen = $_POST['id_dosen'];
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $jabatan = $_POST['jabatan'];
        $pendidikan = $_POST['pendidikan'];
        $sk = $_POST['sk'];
        $sa = $_POST['sa'];
        $rp = $_POST['rp'];
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
                    $sql_dosen = "UPDATE dosen set nip='$nip', nama='$nama', jk='$jk', jabatan='$jabatan', pendidikan='$pendidikan', sk='$sk', sa='$sa', rp='$rp' where id='$id_dosen'";
                    $query_update = mysqli_query($koneksi, $sql_dosen);

                    if($query_update) { // jika berhasil
                       $_SESSION['pesan_sukses'] = "Data Berhasil di Perbarui!";
                        header('location:dosen.php');
                    } else {
                        $_SESSION['pesan_gagal'] = "Data Gagal di Perbarui!";
                        header('location:dosen.php');
                    }
                }else{
                    unlink('../../assets/images/dosen/' . $lama); //hapus foto lama di folder
                    move_uploaded_file($foto, "../../assets/images/dosen/$nama_foto"); //upload foto baru
                    $sql_dosen1 = "UPDATE dosen set nip='$nip', nama='$nama', jk='$jk', jabatan='$jabatan', pendidikan='$pendidikan', sk='$sk', sa='$sa', rp='$rp', foto='$nama_foto' where id='$id_dosen'";
                    $query_update1 = mysqli_query($koneksi, $sql_dosen1);

                    if($query_update1) { // jika berhasil
                       $_SESSION['pesan_sukses'] = "Data Berhasil di Perbarui!";
                        header('location:dosen.php');
                    } else {
                       $_SESSION['pesan_gagal'] = "Data Gagal di Perbarui!";
                        header('location:dosen.php');
                    }
                }
            } 
}
?>