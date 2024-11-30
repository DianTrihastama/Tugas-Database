<?php
include "koneksi.php"; 

if (isset($_GET['id'])) {
    $idMahasiswa = $_GET['id'];

    $sql = "DELETE FROM Mahasiswa WHERE id_Mahasiswa='$idMahasiswa'";

    if (mysqli_query($kon, $sql)) {
        header("Location: index.php?message=Data berhasil dihapus");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($kon);
    }
} else {
    header("Location: index.php?message=ID tidak ditemukan");
    exit();
}

mysqli_close($kon);
?>