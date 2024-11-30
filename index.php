<!DOCTYPE html>
<html lang="id">
<head>
    <title>CRUD Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">DIAN TRIHASTAMA</span>
    </nav>
    <div class="container">
        <br>
        <h4 class="text-center">DAFTAR MAHASISWA</h4>
        <a href="create.php" class="btn btn-success mb-3">Tambah Mahasiswa</a>
        
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Kelas</th>
                    <th>Prodi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $sql = "SELECT * FROM Mahasiswa ORDER BY id_Mahasiswa DESC";
                $hasil = mysqli_query($kon, $sql);
                $no = 0;
                while ($data = mysqli_fetch_assoc($hasil)) {
                    $no++;
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo htmlspecialchars($data['Nama']); ?></td>
                    <td><?php echo htmlspecialchars($data['Nim']); ?></td>
                    <td><?php echo htmlspecialchars($data['Kelas']); ?></td>
                    <td><?php echo htmlspecialchars($data['Prodi']); ?></td>
                    <td>
                        <a href="update.php?id=<?php echo htmlspecialchars($data['id_Mahasiswa']); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete.php?id=<?php echo htmlspecialchars($data['id_Mahasiswa']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
