<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit(); }
include 'koneksi.php';

if (isset($_POST['upload'])) {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $sub = mysqli_real_escape_string($conn, $_POST['sub_judul']);
    $kategori = $_POST['kategori']; // Kategori Baru
    $isi = mysqli_real_escape_string($conn, $_POST['isi']);
    $dok = mysqli_real_escape_string($conn, $_POST['dokumentasi']);
    
    $foto = $_FILES['thumbnail']['name'];
    $tmp = $_FILES['thumbnail']['tmp_name'];
    $nama_baru = date('dmYHis').'.'.pathinfo($foto, PATHINFO_EXTENSION);

    if (move_uploaded_file($tmp, "uploads/".$nama_baru)) {
        mysqli_query($conn, "INSERT INTO berita (judul, sub_judul, kategori, thumbnail, isi_berita, dokumentasi) 
                            VALUES ('$judul', '$sub', '$kategori', '$nama_baru', '$isi', '$dok')");
        echo "<script>alert('Berita Berhasil Diposting!'); window.location='dashboard.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Berita - Yayasan LAYAK</title>
    <link rel="stylesheet" href="assets/admin.css">
</head>
<body>
    <div class="sidebar">
        <h2>LAYAK<span>.Admin</span></h2>
        <a href="dashboard.php" class="active">📊 <span>Dashboard</span></a>
        <a href="tambah_berita.php">✍️ <span>Tambah Berita</span></a> <a href="tentang.php">🏢 <span>Profil</span></a>
        <div style="margin-top: 50px; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 20px;">
            <a href="logout.php" style="color: #ff7675;">🚪 <span>Keluar</span></a>
        </div>
    </div>
    
    <div class="main-content">
        <div class="box">
            <h3>✍️ Tulis Berita Baru</h3>
            <form method="POST" enctype="multipart/form-data">
                <label>Judul Utama</label>
                <input type="text" name="judul" required>
                
                <label>Kategori</label>
                <select name="kategori" required style="width: 100%; padding: 10px; margin-bottom: 15px; border-radius: 8px; border: 1px solid #ddd;">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="ODHA">ODHA</option>
                    <option value="Sosialisasi">Sosialisasi</option>
                    <option value="Low Vision">Low Vision</option>
                    <option value="Trafficking">Trafficking</option>
                    <option value="Training TPPO">Training TPPO</option>
                    <option value="Kisah Inspiratif">Kisah Inspiratif</option>
                </select>

                <label>Sub Judul (Ringkasan)</label>
                <input type="text" name="sub_judul">
                
                <label>Isi Berita Lengkap</label>
                <textarea name="isi" style="height: 180px;"></textarea>
                
                <label>Dokumentasi</label>
                <input type="text" name="dokumentasi">
                
                <label>Foto Utama</label>
                <input type="file" name="thumbnail" accept="image/*" required>
                
                <button type="submit" name="upload" style="background: #22c55e;">🚀 Terbitkan Berita</button>
            </form>
        </div>
    </div>
</body>
</html>