<?php
$koneksi = mysqli_connect("localhost", "root", "", "database_anda", port_anda);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
