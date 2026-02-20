<?php 
session_start(); 
include 'koneksi.php'; 
include 'header.php'; 

$kategori_aktif = isset($_GET['kategori']) ? $_GET['kategori'] : 'Semua';
$categories = ['Semua', 'ODHA', 'Sosialisasi', 'Low Vision', 'Trafficking', 'Training TPPO'];
?>

<link rel="stylesheet" href="assets/style.css">

<style>
    /* Sinkronisasi dengan Hero Section di tentang.php */
    .about-hero.news-hero {
        background: linear-gradient(rgba(0, 51, 102, 0.7), rgba(0, 51, 102, 0.7)), 
                    url('https://images.unsplash.com/photo-1526628953301-3e589a6a8b74?q=80') center/cover;
        padding: 100px 20px;
        text-align: center;
        color: white;
        margin-bottom: 0;
    }

    /* Penyesuaian Filter agar melayang (Floating) */
    .filter-wrapper {
        max-width: 1000px;
        margin: -40px auto 40px;
        padding: 0 20px;
        position: relative;
        z-index: 10;
    }

    .filter-glass {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        padding: 15px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .filter-btn {
        padding: 8px 20px;
        border-radius: 12px;
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--navy);
        text-decoration: none;
        transition: all 0.3s;
    }

    .filter-btn.active {
        background: var(--orange);
        color: white;
    }

    /* Grid Berita menggunakan konsep Glass Card */
    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
        margin-top: 20px;
    }

    .news-card-custom {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        transition: transform 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .news-card-custom:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
    }

    .news-thumb {
        height: 200px;
        position: relative;
    }

    .news-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .badge-cat {
        position: absolute;
        top: 15px;
        left: 15px;
        background: var(--orange);
        color: white;
        padding: 5px 12px;
        border-radius: 8px;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
    }

    .news-body {
        padding: 25px;
        flex-grow: 1;
    }

    .news-meta {
        font-size: 0.8rem;
        color: #94a3b8;
        margin-bottom: 10px;
    }

    .news-title-link {
        font-size: 1.25rem;
        color: var(--navy);
        text-decoration: none;
        font-weight: 700;
        line-height: 1.4;
        display: block;
        margin-bottom: 12px;
    }

    .news-title-link:hover {
        color: var(--orange);
    }

    .btn-admin-float {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 25px;
        border-radius: 50px;
        background: rgba(255,255,255,0.2);
        color: white;
        text-decoration: none;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255,255,255,0.3);
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-admin-float:hover {
        background: white;
        color: var(--navy);
    }
</style>

<div class="about-hero news-hero">
    <h1 style="font-size: 3rem; font-weight: 700; margin-bottom: 10px;">Program Kami</h1>
    <p style="font-size: 1.2rem; opacity: 0.9;">Aksi Nyata dan Pendampingan Keluarga di Seluruh Indonesia</p>
    
    <?php if(!isset($_SESSION['admin'])): ?>
        <a href="login.php" class="btn-admin-float">Akses Admin</a>
    <?php else: ?>
        <a href="dashboard.php" class="btn-admin-float" style="background: var(--orange); border: none;">Dashboard Admin</a>
    <?php endif; ?>
</div>

<div class="content-wrapper">
    <div class="filter-wrapper">
        <div class="filter-glass">
            <?php foreach($categories as $cat): ?>
                <a href="berita.php<?php echo ($cat == 'Semua') ? '' : '?kategori='.urlencode($cat); ?>" 
                   class="filter-btn <?php echo ($kategori_aktif == $cat) ? 'active' : ''; ?>">
                    <?php echo $cat; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="news-grid">
        <?php
        $where = ($kategori_aktif == 'Semua') ? "" : "WHERE kategori = '".mysqli_real_escape_string($conn, $kategori_aktif)."'";
        $sql = "SELECT * FROM berita $where ORDER BY id DESC";
        $query = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($query) == 0): ?>
            <div style="grid-column: 1/-1; text-align: center; padding: 60px;">
                <h3 style="color: var(--navy);">Belum ada berita dalam kategori ini.</h3>
            </div>
        <?php else:
            while($row = mysqli_fetch_assoc($query)): ?>
                <article class="news-card-custom">
                    <div class="news-thumb">
                        <span class="badge-cat"><?php echo htmlspecialchars($row['kategori']); ?></span>
                        <img src="uploads/<?php echo $row['thumbnail']; ?>" alt="Berita">
                    </div>
                    
                    <div class="news-body">
                        <div class="news-meta">
                            📅 <?php echo date('d M Y', strtotime($row['tanggal'])); ?>
                        </div>
                        
                        <a href="detail_berita.php?id=<?php echo $row['id']; ?>" class="news-title-link">
                            <?php echo htmlspecialchars($row['judul']); ?>
                        </a>
                        
                        <p style="color: #64748b; font-size: 0.95rem; line-height: 1.6; margin-bottom: 20px;">
                            <?php echo substr(strip_tags($row['isi_berita']), 0, 120); ?>...
                        </p>
                        
                        <a href="detail_berita.php?id=<?php echo $row['id']; ?>" 
                           style="color: var(--orange); text-decoration: none; font-weight: 700; font-size: 0.85rem; letter-spacing: 1px;">
                            BACA SELENGKAPNYA →
                        </a>
                    </div>
                </article>
            <?php endwhile; 
        endif; ?>
    </div>
</div>

<?php include 'footer.php'; ?>