<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yayasan LAYAK - Advokasi Hak Anak</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root { --navy: #003366; --blue: #00a8e8; --orange: #e67e22; --light: #f4f7f6; }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Poppins', sans-serif; background-color: var(--light); color: #333; }
        
        nav { background: #fff; padding: 15px 8%; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 15px rgba(0,0,0,0.1); position: sticky; top: 0; z-index: 1000; }
        .logo { font-weight: 600; font-size: 24px; color: var(--navy); text-decoration: none; }
        .logo span { color: var(--orange); }
        
        nav div a { text-decoration: none; color: #555; margin-left: 20px; font-weight: 400; transition: 0.3s; }
        nav div a:hover { color: var(--blue); }
        .btn-donasi { background: var(--orange); color: #fff !important; padding: 10px 25px; border-radius: 50px; font-weight: 600; }

        /* Mobile Menu Styling */
        .mobile-menu-btn { display: none; font-size: 30px; cursor: pointer; color: var(--navy); }
        .mobile-menu { display: none; flex-direction: column; background: #fff; position: absolute; top: 70px; left: 0; width: 100%; box-shadow: 0 10px 10px rgba(0,0,0,0.1); padding: 20px; }
        .mobile-menu a { padding: 10px 0; text-decoration: none; color: var(--navy); border-bottom: 1px solid #eee; }

        @media (max-width: 768px) {
            nav div { display: none; }
            .mobile-menu-btn { display: block; }
        }
    </style>
</head>
<body>

<nav>
    <a href="index.php" class="logo">LAYAK<span></span></a>
    <div class="mobile-menu-btn" onclick="toggleMenu()">☰</div>
    <div>
        <a href="index.php">Home</a>
        <a href="tentang.php">Profil</a>
        <a href="berita.php">Kabar Anak</a>
        <a href="kontak.php">Kontak</a>
        <a href="donasi.php" class="btn-donasi">Dukung Kami</a>
    </div>
</nav>

<div id="mobileMenu" class="mobile-menu">
    <a href="index.php">Home</a>
    <a href="tentang.php">Profil</a>
    <a href="berita.php">Kabar Anak</a>
    <a href="kontak.php">Kontak</a>
    <a href="donasi.php">Dukung Kami</a>
</div>

<script>
    function toggleMenu() {
        var menu = document.getElementById("mobileMenu");
        menu.style.display = (menu.style.display === "flex") ? "none" : "flex";
    }
</script>