<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);

        $stmt = $kon->prepare("SELECT * FROM Mahasiswa WHERE id_Mahasiswa = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($data = $result->fetch_assoc()) {
            $nama = $data['Nama'];
            $nim = $data['Nim'];
            $kelas = $data['Kelas'];
            $prodi = $data['Prodi'];
        } else {
            echo "<div class='alert alert-danger'>Data tidak ditemukan!</div>";
            exit;
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id = intval($_POST['id']);
    $nama = htmlspecialchars($_POST['Nama']);
    $nim = htmlspecialchars($_POST['Nim']);
    $kelas = htmlspecialchars($_POST['Kelas']);
    $prodi = htmlspecialchars($_POST['Prodi']);

    $stmt = $kon->prepare("UPDATE Mahasiswa SET Nama = ?, Nim = ?, Kelas = ?, Prodi = ? WHERE id_Mahasiswa = ?");
    $stmt->bind_param("ssssi", $nama, $nim, $kelas, $prodi, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Data gagal diperbarui!</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Update Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h4 class="mt-4 text-center">Edit Data Mahasiswa</h4>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="Nama" class="form-control" value="<?php echo htmlspecialchars($nama); ?>" required>
            </div>
            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="Nim" class="form-control" value="<?php echo htmlspecialchars($nim); ?>" required>
            </div>
            <div class="form-group">
                <label>Kelas</label>
                <input type="text" name="Kelas" class="form-control" value="<?php echo htmlspecialchars($kelas); ?>" required>
            </div>
            <div class="form-group">
                <label>Prodi</label>
                <input type="text" name="Prodi" class="form-control" value="<?php echo htmlspecialchars($prodi); ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
