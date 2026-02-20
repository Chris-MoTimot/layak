<?php 
session_start(); 
include 'koneksi.php'; 
include 'header.php'; 
?>
<style>
    .container-news {
        padding: 60px 20px; /* Memberi ruang bernapas di atas & bawah */
        max-width: 1200px;
        margin: 0 auto;
    }
    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 40px; /* Jarak antar kartu lebih lebar */
    }
    .news-card {
        background: #fff;
        border-radius: 15px; /* Sudut lebih lembut */
        overflow: hidden;
        transition: transform 0.3s ease;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05); /* Shadow halus */
        display: flex;
        flex-direction: column;
    }
    .news-card:hover {
        transform: translateY(-10px);
    }
    .news-content {
        padding: 25px; /* Padding dalam konten diperluas */
    }
    .news-title {
        margin: 15px 0;
        line-height: 1.4; /* Agar judul tidak rapat antar baris */
        font-size: 1.25rem;
    }
    .news-excerpt {
        line-height: 1.6; /* Spasi antar baris teks lebih lega */
        color: #666;
        margin-bottom: 20px;
    }
    .read-more {
        margin-top: auto; /* Memastikan tombol selalu di bawah */
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
    }
</style>

<link rel="stylesheet" href="assets/style.css">
<link rel="stylesheet" href="assets/style2.css">

<div class="hero-news">
    <h1 style="font-size: 42px; margin-bottom: 20px; font-weight: 600;">Kabar Kebaikan</h1>
    <p style="font-size: 18px; opacity: 0.9; max-width: 600px; margin: 0 auto 30px;">
        Mengabarkan setiap senyum dan langkah nyata dalam melindungi hak-hak anak Indonesia.
    </p>
    <?php if(!isset($_SESSION['admin'])): ?>
        <a href="login.php" class="admin-login-btn">Akses Admin</a>
    <?php else: ?>
        <a href="dashboard.php" class="admin-login-btn" style="background: var(--orange); border: none;">Dashboard Admin</a>
    <?php endif; ?>
</div>

<div class="container-news">
    <div class="news-grid">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM berita ORDER BY id DESC");
        while($row = mysqli_fetch_assoc($query)) { ?>
            <article class="news-card">
                <div class="news-image-wrapper" style="position: relative; height: 220px;">
                    <div class="category-badge" style="position: absolute; top: 15px; left: 15px; z-index: 2;">Kegiatan</div>
                    <img src="uploads/<?php echo $row['thumbnail']; ?>" 
                         alt="<?php echo $row['judul']; ?>" 
                         style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                
                <div class="news-content">
                    <div class="news-date" style="font-size: 0.9rem; color: #888;">
                        <span style="margin-right: 5px;">📅</span> <?php echo date('d M Y', strtotime($row['tanggal'])); ?>
                    </div>
                    
                    <h2 class="news-title"><?php echo $row['judul']; ?></h2>
                    
                    <p class="news-excerpt">
                        <?php echo substr(strip_tags($row['isi_berita']), 0, 110); ?>...
                    </p>
                    
                    <a href="detail_berita.php?id=<?php echo $row['id']; ?>" class="read-more">
                        BACA SELENGKAPNYA <span>→</span>
                    </a>
                </div>
            </article>
        <?php } ?>
    </div>
</div>

<?php include 'footer.php'; ?>