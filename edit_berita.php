<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit(); }
include 'koneksi.php';

$id = $_GET['id'];
// Mengambil data berita berdasarkan ID
$query = mysqli_query($conn, "SELECT * FROM berita WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $sub = mysqli_real_escape_string($conn, $_POST['sub_judul']);
    $kategori = $_POST['kategori']; // Menangkap input kategori baru
    $isi = mysqli_real_escape_string($conn, $_POST['isi']);
    $dok = mysqli_real_escape_string($conn, $_POST['dokumentasi']);
    
    $foto = $_FILES['thumbnail']['name'];
    
    if (!empty($foto)) {
        // Jika user mengunggah foto baru
        $ekstensi = pathinfo($foto, PATHINFO_EXTENSION);
        $nama_baru = date('dmYHis').'.'.$ekstensi;
        move_uploaded_file($_FILES['thumbnail']['tmp_name'], "uploads/".$nama_baru);
        
        $sql = "UPDATE berita SET 
                judul='$judul', 
                sub_judul='$sub', 
                kategori='$kategori', 
                isi_berita='$isi', 
                dokumentasi='$dok', 
                thumbnail='$nama_baru' 
                WHERE id='$id'";
    } else {
        // Jika user tidak mengganti foto
        $sql = "UPDATE berita SET 
                judul='$judul', 
                sub_judul='$sub', 
                kategori='$kategori', 
                isi_berita='$isi', 
                dokumentasi='$dok' 
                WHERE id='$id'";
    }
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Berita Berhasil Diperbarui!'); window.location='dashboard.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Berita - Yayasan LAYAK</title>
    <link rel="stylesheet" href="assets/admin.css"> <style>
        .edit-container { padding: 40px; max-width: 800px; margin: 0 auto; }
        .form-group { margin-bottom: 20px; }
        label { display: block; font-weight: 600; margin-bottom: 8px; color: #003366; }
        select, input, textarea { 
            width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit; 
        }
        .btn-save { background: #003366; color: white; border: none; padding: 15px 30px; border-radius: 8px; cursor: pointer; font-weight: 600; width: 100%; }
        .btn-save:hover { background: #e67e22; }
        .current-img { margin: 10px 0; border-radius: 8px; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <div class="edit-container">
        <div class="box">
            <h3 style="margin-bottom: 25px; border-bottom: 2px solid #f0f2f5; padding-bottom: 10px;">📝 Edit Postingan</h3>
            
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Judul Utama</label>
                    <input type="text" name="judul" value="<?php echo $data['judul']; ?>" required>
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" required>
                        <?php 
                        $categories = ['ODHA', 'Sosialisasi', 'Low Vision', 'Trafficking', 'Training TPPO'];
                        foreach($categories as $cat) {
                            $selected = ($data['kategori'] == $cat) ? 'selected' : '';
                            echo "<option value='$cat' $selected>$cat</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Sub Judul / Ringkasan</label>
                    <input type="text" name="sub_judul" value="<?php echo $data['sub_judul']; ?>">
                </div>

                <div class="form-group">
                    <label>Isi Berita</label>
                    <textarea name="isi" style="height: 200px;"><?php echo $data['isi_berita']; ?></textarea>
                </div>

                <div class="form-group">
                    <label>Dokumentasi</label>
                    <input type="text" name="dokumentasi" value="<?php echo $data['dokumentasi']; ?>">
                </div>

                <div class="form-group">
                    <label>Foto Thumbnail Saat Ini</label>
                    <img src="uploads/<?php echo $data['thumbnail']; ?>" width="150" class="current-img">
                    <p style="font-size: 12px; color: #666;">Ganti Foto (Kosongkan jika tidak ingin mengubah):</p>
                    <input type="file" name="thumbnail" accept="image/*">
                </div>

                <button type="submit" name="update" class="btn-save">Simpan Perubahan</button>
                <a href="dashboard.php" style="display: block; text-align: center; margin-top: 15px; color: #64748b; text-decoration: none; font-size: 14px;">← Kembali ke Dashboard</a>
            </form>
        </div>
    </div>
</body>
</html>