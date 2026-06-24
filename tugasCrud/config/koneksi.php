<?php
// Menggunakan ekstensi mysqli bawaan dengan database db_akademik dan port 3307
$koneksi = mysqli_connect("localhost", "root", "", "database_anda", port_anda);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
