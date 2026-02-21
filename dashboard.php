<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit(); }
include 'koneksi.php';

// Hitung statistik
$total_berita = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM berita"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Yayasan LAYAK</title>
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
        <div class="header">
            <h1>Manajemen Berita</h1>
            <a href="tambah_berita.php" class="btn-web" style="background: var(--orange); text-decoration: none;">+ Berita Baru</a>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <h4>Total Postingan</h4>
                <span><?php echo $total_berita; ?> Berita</span>
            </div>
            <div class="stat-card" style="border-left-color: #3b82f6;">
                <h4>Kategori Aktif</h4>
                <span>6 Kategori</span>
            </div>
        </div>

        <div class="box">
            <h3>📚 Riwayat Postingan</h3>
            <table>
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Judul & Kategori</th>
                        <th>Tanggal</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $q = mysqli_query($conn, "SELECT * FROM berita ORDER BY id DESC");
                    while($r = mysqli_fetch_assoc($q)) { ?>
                    <tr>
                        <td><img src="uploads/<?php echo $r['thumbnail']; ?>" class="news-thumb" width="80"></td>
                        <td>
                            <div style="font-weight: 600;"><?php echo $r['judul']; ?></div>
                            <span style="background: #e2e8f0; font-size: 10px; padding: 2px 8px; border-radius: 10px;"><?php echo $r['kategori']; ?></span>
                        </td>
                        <td><?php echo date('d/m/Y', strtotime($r['tanggal'])); ?></td>
                        <td style="text-align: center;">
                            <a href="edit_berita.php?id=<?php echo $r['id']; ?>" class="btn-edit">Edit</a>
                            <a href="hapus.php?id=<?php echo $r['id']; ?>" class="btn-delete">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>