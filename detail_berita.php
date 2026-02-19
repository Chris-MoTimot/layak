<?php 
include 'koneksi.php'; 
include 'header.php'; 

// Menangkap ID dari URL
$id_berita = $_GET['id'];

// Mengambil data berita berdasarkan ID tersebut
$query = mysqli_query($conn, "SELECT * FROM berita WHERE id = '$id_berita'");
$data = mysqli_fetch_assoc($query);

// Jika ID tidak ditemukan
if (!$data) {
    echo "<h2>Berita tidak ditemukan!</h2>";
    echo "<a href='berita.php'>Kembali ke Berita</a>";
    exit;
}
?>

<div style="max-width: 800px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif;">
    <a href="berita.php">← Kembali ke Daftar Berita</a>
    <hr>
    
    <h1><?php echo $data['judul']; ?></h1>
    <h3 style="color: #666; font-style: italic;"><?php echo $data['sub_judul']; ?></h3>
    
    <div style="text-align: center; margin: 20px 0;">
        <img src="uploads/<?php echo $data['thumbnail']; ?>" style="max-width: 100%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
    </div>
    
    <p style="font-size: 0.9em; color: #888;">
        Diterbitkan pada: <?php echo date('d M Y', strtotime($data['tanggal'])); ?> | 
        Dokumentasi oleh: <strong><?php echo $data['dokumentasi']; ?></strong>
    </p>

    <div style="line-height: 1.8; font-size: 1.1em; text-align: justify; white-space: pre-line;">
        <?php echo $data['isi_berita']; ?>
    </div>
</div>
<link rel="stylesheet" href="assets/style3.css">