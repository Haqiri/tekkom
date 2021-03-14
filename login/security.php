<?php
if(!isset($_SESSION['id_users'])){
        header('location:../redirect_logout.php');
}
else{
$akun=$_SESSION['id_users'];
$admin=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM users where id='$akun'"));
}

?>