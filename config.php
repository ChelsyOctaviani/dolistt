<?php 
// Konfigurasikan koneksi database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'list';

// membuat koneksi
$koneksi = mysqli_connect($host, $username, $password, $database);

// mengecek koneksi
if (!$koneksi) {
    die('koneksi ke database gagal:' . mysqli_connect_error());
}

?>