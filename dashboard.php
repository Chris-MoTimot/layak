<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit(); }
include 'koneksi.php';

// Proses Upload Berita
if (isset($_POST['upload'])) {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $sub = mysqli_real_escape_string($conn, $_POST['sub_judul']);
    $isi = mysqli_real_escape_string($conn, $_POST['isi']);
    $dok = mysqli_real_escape_string($conn, $_POST['dokumentasi']);
    
    $foto = $_FILES['thumbnail']['name'];
    $tmp = $_FILES['thumbnail']['tmp_name'];
    $ekstensi = pathinfo($foto, PATHINFO_EXTENSION);
    $nama_baru = date('dmYHis').'.'.$ekstensi; // Rename agar tidak duplikat

    if (move_uploaded_file($tmp, "uploads/".$nama_baru)) {
        mysqli_query($conn, "INSERT INTO berita (judul, sub_judul, thumbnail, isi_berita, dokumentasi) VALUES ('$judul', '$sub', '$nama_baru', '$isi', '$dok')");
        echo "<script>alert('Berita Berhasil Diposting!'); window.location='dashboard.php';</script>";
    }
}

// Hitung total berita untuk statistik
$total_berita = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM berita"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Yayasan LAYAK</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/admin.css">
</head>
<body>

    <div class="sidebar">
        <h2>LAYAK<span>.Admin</span></h2>
        <a href="dashboard.php" class="active">📊 <span>Dashboard</span></a>
        <a href="berita.php">📰 <span>Lihat Berita</span></a>
        <a href="tentang.php">🏢 <span>Profil</span></a>
        <div style="margin-top: 50px; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 20px;">
            <a href="logout.php" style="color: #ff7675;">🚪 <span>Keluar</span></a>
        </div>
    </div>

    <div class="main-content">
        <div class="header">
            <div>
                <h1 style="font-size: 24px;">Halo, <?php echo $_SESSION['admin']; ?> 👋</h1>
                <p style="color: #64748b; font-size: 14px;">Selamat datang kembali di panel kendali.</p>
            </div>
            <div class="user-info">
                <a href="index.php" target="_blank" class="btn-web">🌐 Kunjungi Situs</a>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <h4>Total Postingan</h4>
                <span><?php echo $total_berita; ?> Berita</span>
            </div>
            <div class="stat-card" style="border-left-color: #22c55e;">
                <h4>Status Admin</h4>
                <span>Aktif</span>
            </div>
            <div class="stat-card" style="border-left-color: #3b82f6;">
                <h4>Tanggal</h4>
                <span style="font-size: 16px;"><?php echo date('d F Y'); ?></span>
            </div>
        </div>

        <div class="dashboard-grid">
            <div class="box">
                <h3>✍️ Tulis Berita Baru</h3>
                <form method="POST" enctype="multipart/form-data">
                    <label>Judul Utama</label>
                    <input type="text" name="judul" placeholder="Contoh: Penyerahan Alat Bantu..." required>
                    
                    <label>Sub Judul (Ringkasan)</label>
                    <input type="text" name="sub_judul" placeholder="Headline singkat">
                    
                    <label>Isi Berita Lengkap</label>
                    <textarea name="isi" placeholder="Tulis rincian kegiatan di sini..." style="height: 180px;"></textarea>
                    
                    <label>Dokumentasi / Fotografer</label>
                    <input type="text" name="dokumentasi" placeholder="Nama pengambil foto">
                    
                    <label>Foto Utama (Thumbnail)</label>
                    <input type="file" name="thumbnail" accept="image/*" required>
                    
                    <button type="submit" name="upload">🚀 Terbitkan Berita</button>
                </form>
            </div>

            <div class="box">
                <h3>📚 Riwayat Berita</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Informasi Berita</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $q = mysqli_query($conn, "SELECT * FROM berita ORDER BY id DESC");
                        if(mysqli_num_rows($q) == 0) {
                            echo "<tr><td colspan='3' style='text-align:center; color:#94a3b8; padding:40px;'>Belum ada berita yang diposting.</td></tr>";
                        }
                        while($r = mysqli_fetch_assoc($q)) { ?>
                        <tr>
                            <td><img src="uploads/<?php echo $r['thumbnail']; ?>" class="news-thumb"></td>
                            <td>
                                <div style="font-weight: 600; color: var(--navy);"><?php echo $r['judul']; ?></div>
                                <div style="font-size: 12px; color: #94a3b8;"><?php echo date('d/m/Y', strtotime($r['tanggal'])); ?></div>
                            </td>
                            <td style="text-align: center; white-space: nowrap;">
                                <a href="edit_berita.php?id=<?php echo $r['id']; ?>" class="btn-edit">Edit</a>
                                <a href="hapus.php?id=<?php echo $r['id']; ?>" class="btn-delete" onclick="return confirm('Hapus berita ini selamanya?')">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>