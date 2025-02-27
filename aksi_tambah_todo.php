<?php
include "../config.php";

//Periksa apakah semua data dikirim
if(!isset($_POST['tugas'], $_POST['jangka_waktu'], $_POST['status'], $_POST['prioritas'])) {
}

// ambil data dari form
$tugas= mysqli_real_escape_string($koneksi, $_POST['tugas']);
$jangka_waktu= mysqli_real_escape_string($koneksi, $_POST['jangka_waktu']);
$status= mysqli_real_escape_string($koneksi, $_POST['status']);
$prioritas= mysqli_real_escape_string($koneksi, $_POST['prioritas']);

// Debug: cek apakah data diterima dari form
echo "<pre>";
print_r($_POST);
echo "</pre>";

//Query untuk menyimpan data ke database
$query = "INSERT INTO todo(tugas, jangka_waktu, status, prioritas) VALUES ('$tugas', '$jangka_waktu', '$status', '$prioritas')";

// Eksekusi Query
$result = mysqli_query($koneksi, $query);
$r = mysqli_affected_rows($koneksi);
//Debug: ccek apakah query berhasil dieksekusi
if(!$result) {
    die("Error Query: " . mysqli_error($koneksi));
} else {
    echo "Data berhasil disimpan!";
}

//Redirect ke halaman utama
header("Location:http://localhost/dolist/index.php?halaman=todo&pesan_tambah=berhasil");

exit();
?>
