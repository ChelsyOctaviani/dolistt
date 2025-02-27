<?php
include "../config.php";
$id = $_POST['id'];
$tugas = $_POST['tugas'];
$jangka_waktu = $_POST['jangka_waktu'];
$status = $_POST['status'];
$prioritas = $_POST['prioritas'];
//Ambil deadline yang sudah ada didatabase
$query = "SELECT jangka_waktu FROM todo WHERE id='$id'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if ($data) {
    $deadline_sebelumnya = $data['jangka_waktu'];

    //cek apakah jangka_waktu baru melebihi deadline yang sudah ada
    if ($jangka_waktu > $deadline_sebelumnya) {
        header("Location: http://localhost/dolist/index.php?halaman=todo&pesan_edit=gagal_deadline");
        exit();
    }
    //lanjut update jika deadline sesuai
    $sql = "UPDATE todo SET
                  tugas='$tugas',
                  jangka_waktu='$jangka_waktu',
                  status='$status',
                  prioritas='$prioritas'
                  WHERE id='$id'";

    $result = mysqli_query($koneksi, $sql);
    $r = mysqli_affected_rows($koneksi);

    if ($r > 0) {
        header("Location:http://localhost/dolist/index.php?halaman=todo&pesan_edit=berhasil");
    } else {
        header("Location:http://localhost/dolist/index.php?halaman=todo&pesan_edit=gagal");
    }
} else {
    header("Location:http://localhost/dolist/index.php?halaman=todo&pesan_edit=gagal_data");
}

exit();
?>