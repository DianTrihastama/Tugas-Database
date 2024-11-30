<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = htmlspecialchars($_POST['Nama']);
    $nim = htmlspecialchars($_POST['Nim']);
    $kelas = htmlspecialchars($_POST['Kelas']);
    $prodi = htmlspecialchars($_POST['Prodi']);

    $stmt = $kon->prepare("INSERT INTO Mahasiswa (Nama, Nim, Kelas, Prodi) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama, $nim, $kelas, $prodi);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Data gagal disimpan.</div>";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h4>Tambah Mahasiswa</h4>
        <form method="POST">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="Nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="Nim" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Kelas</label>
                <input type="text" name="Kelas" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Prodi</label>
                <input type="text" name="Prodi" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
