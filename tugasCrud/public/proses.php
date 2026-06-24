<?php
include '../config/koneksi.php';
include '../config/middleware.php';

if (isset($_POST['update'])) {
    $id_nilai    = $_POST['id_nilai'];
    $nilai_huruf = $_POST['nilai_huruf'];
    
    // Mengeksekusi pembaruan nilai_huruf berdasarkan id_nilai target
    $query = "UPDATE nilai SET nilai_huruf = '$nilai_huruf' WHERE id_nilai = '$id_nilai'";
              
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal memperbarui data nilai: " . mysqli_error($koneksi);
    }
} else {
    header("Location: index.php");
    exit();
}
?>