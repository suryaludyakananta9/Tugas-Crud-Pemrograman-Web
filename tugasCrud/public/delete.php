<?php
include '../config/koneksi.php';
include '../config/middleware.php';

$id = $_GET['id'];
$query = "DELETE FROM nilai WHERE id_nilai='$id'";

if (mysqli_query($koneksi, $query)) {
}

header("Location: index.php");
exit();
?>
