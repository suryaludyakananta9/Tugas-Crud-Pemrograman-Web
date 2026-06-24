<?php
include '../config/koneksi.php';
include '../config/middleware.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT n.*, m.nama, mk.nama_mk FROM nilai n 
                                 INNER JOIN mahasiswa m ON n.nim = m.nim 
                                 INNER JOIN matakuliah mk ON n.kode_mk = mk.kode_mk 
                                 WHERE n.id_nilai='$id'");
$data = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) < 1) {
    die("Data nilai tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Nilai KHS</title>
</head>
<body>
    <h2>Ubah Input Nilai Huruf</h2>
    <form action="proses.php" method="POST">
        <input type="hidden" name="id_nilai" value="<?= $data['id_nilai']; ?>">
        
        <table cellpadding="5">
            <tr>
                <td>Mahasiswa:</td>
                <td><b><?= $data['nama']; ?> (<?= $data['nim']; ?>)</b></td>
            </tr>
            <tr>
                <td>Mata Kuliah:</td>
                <td><b><?= $data['nama_mk']; ?></b></td>
            </tr>
            <tr>
                <td>Nilai Huruf:</td>
                <td>
                    <select name="nilai_huruf">
                        <option value="A" <?= ($data['nilai_huruf'] == 'A') ? 'selected' : ''; ?>>A</option>
                        <option value="B" <?= ($data['nilai_huruf'] == 'B') ? 'selected' : ''; ?>>B</option>
                        <option value="C" <?= ($data['nilai_huruf'] == 'C') ? 'selected' : ''; ?>>C</option>
                        <option value="D" <?= ($data['nilai_huruf'] == 'D') ? 'selected' : ''; ?>>D</option>
                        <option value="E" <?= ($data['nilai_huruf'] == 'E') ? 'selected' : ''; ?>>E</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="update">Simpan Perubahan</button>
                    <a href="index.php">Batal</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
