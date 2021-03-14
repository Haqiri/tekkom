<?php

session_start();

include('koneksi.php');

$base_url = "http://localhost/tekkom/login";

$uri_segment = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
// var_dump($uri_segment);

if(isset($_SESSION['status']) && $_SESSION['status'] == 'login') {
    // lanjut
    if($uri_segment[2] == $_SESSION['level']) {
        // lanjut
    }

} else {
    $_SESSION['login_error'] = "Silahkan Login untuk masuk kedalam sistem";
    header('location:'. $base_url . '/login.php');
}

?>