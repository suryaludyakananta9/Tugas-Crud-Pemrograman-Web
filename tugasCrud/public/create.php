<?php
include '../config/koneksi.php';
include '../config/middleware.php';

// Ambil data untuk opsi pilihan dropdown
$mhs_query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
$mk_query  = mysqli_query($koneksi, "SELECT * FROM matakuliah");
$dsn_query = mysqli_query($koneksi, "SELECT * FROM dosen");

if (isset($_POST['simpan'])) {
    $nim         = $_POST['nim'];
    $kode_mk     = $_POST['kode_mk'];
    $nidn        = $_POST['nidn'];
    $nilai_huruf = $_POST['nilai_huruf'];
    
    $query = "INSERT INTO nilai (nim, kode_mk, nidn, nilai_huruf) 
              VALUES ('$nim', '$kode_mk', '$nidn', '$nilai_huruf')";
              
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Nilai KHS</title>
</head>
<body>
    <h2>Input Nilai Baru</h2>
    <form method="POST">
        <label>Mahasiswa:</label><br>
        <select name="nim" required>
            <option value="">-- Pilih Mahasiswa --</option>
            <?php while($mhs = mysqli_fetch_assoc($mhs_query)): ?>
                <option value="<?= $mhs['nim']; ?>"><?= $mhs['nim']; ?> - <?= $mhs['nama']; ?></option>
            <?php endwhile; ?> </select><br><br>

        <label>Mata Kuliah:</label><br>
        <select name="kode_mk" required>
            <option value="">-- Pilih Mata Kuliah --</option>
            <?php while($mk = mysqli_fetch_assoc($mk_query)): ?>
                <option value="<?= $mk['kode_mk']; ?>"><?= $mk['nama_mk']; ?></option>
            <?php endwhile; ?> </select><br><br>

        <label>Dosen Pengampu:</label><br>
        <select name="nidn" required>
            <option value="">-- Pilih Dosen --</option>
            <?php while($dsn = mysqli_fetch_assoc($dsn_query)): ?>
                <option value="<?= $dsn['nidn']; ?>"><?= $dsn['nama_dosen']; ?></option>
            <?php endwhile; ?> </select><br><br>

        <label>Nilai Huruf:</label><br>
        <select name="nilai_huruf" required>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
        </select><br><br>

        <button type="submit" name="simpan">Simpan Data</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>