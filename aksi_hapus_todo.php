<?php
include "../config.php";
$sql="DELETE FROM todo WHERE id='$_GET[id]'";
//echo $sql;
mysqli_query($koneksi, $sql);
$r = mysqli_affected_rows($koneksi);
if ($r > 0) {
    header("Location:http://localhost/dolist/index.php?halaman=todo&pesan_hapus=berhasil");
} else {
    header("Location:http://localhost/dolist/index.php?halaman=todo&pesan_hapus=gagal");
}
exit();
?>