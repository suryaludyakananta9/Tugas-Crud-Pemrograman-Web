<?php
include '../config/koneksi.php';
include '../config/middleware.php';

$id = $_GET['id'];

// Mengeksekusi instruksi penghapusan transaksi nilai
$query = "DELETE FROM nilai WHERE id_nilai='$id'";

if (mysqli_query($koneksi, $query)) {
    // Proses hapus sukses
}

header("Location: index.php");
exit();
?>