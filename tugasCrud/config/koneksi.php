<?php
// Menggunakan ekstensi mysqli bawaan dengan database db_akademik dan port 3307
$koneksi = mysqli_connect("localhost", "root", "", "db_akademik", 3307);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>