<?php
session_start();
include 'koneksi.php';

// Proteksi: Hanya admin yang bisa akses file ini
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Opsional: Hapus file gambar dari folder uploads agar penyimpanan tidak penuh
    $ambil_berita = mysqli_query($conn, "SELECT thumbnail FROM berita WHERE id = '$id'");
    $data = mysqli_fetch_assoc($ambil_berita);
    if ($data) {
        unlink("uploads/" . $data['thumbnail']); // Menghapus file gambar asli
    }

    // Hapus data dari database
    $delete = mysqli_query($conn, "DELETE FROM berita WHERE id = '$id'");

    if ($delete) {
        echo "<script>alert('Berita berhasil dihapus!'); window.location='berita.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus berita!'); window.location='berita.php';</script>";
    }
}
?>