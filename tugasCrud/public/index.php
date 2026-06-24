<?php 
include '../config/koneksi.php';  
include '../config/middleware.php';

$query = mysqli_query($koneksi, "SELECT n.id_nilai, n.nilai_huruf, m.nama, mk.nama_mk, d.nama_dosen 
                                 FROM nilai n
                                 INNER JOIN mahasiswa m ON n.nim = m.nim
                                 INNER JOIN matakuliah mk ON n.kode_mk = mk.kode_mk
                                 INNER JOIN dosen d ON n.nidn = d.nidn");  
?> 
<!DOCTYPE html> 
<html> 
    <head>
        <title>Daftar Nilai KHS (Akademik)</title>
    </head> 
    <body>    
         <h2>Daftar Nilai Mahasiswa (KHS)</h2>     
         <a href="create.php">[+] Tambah Nilai Baru</a>     
         <br><br>     
         <table border="1" cellpadding="8" cellspacing="0">         
            <tr>             
                <th>Nama Mahasiswa</th>             
                <th>Mata Kuliah</th>             
                <th>Dosen Pengampu</th>             
                <th>Nilai Huruf</th>             
                <th>Aksi</th>         
            </tr>         
            <?php while($row = mysqli_fetch_assoc($query)) : ?>         
                <tr>             
                    <td><?= $row['nama']; ?></td>             
                    <td><?= $row['nama_mk']; ?></td>             
                    <td><?= $row['nama_dosen']; ?></td>             
                    <td><b><?= $row['nilai_huruf']; ?></b></td> 
                    <td>  
                        <a href="update.php?id=<?= $row['id_nilai']; ?>">Edit</a> | 
                        <a href="delete.php?id=<?= $row['id_nilai']; ?>" onclick="return confirm('Are you sure?')">Hapus</a>  
                    </td>                       
                </tr>         
            <?php endwhile; ?>     
        </table> 
        <br><br>
        <a href="logout.php">Logout</a>
    </body>
</html>
