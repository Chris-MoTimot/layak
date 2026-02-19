<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); }
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM berita WHERE id = '$id'"));

if (isset($_POST['update'])) {
    $judul = $_POST['judul']; $sub = $_POST['sub_judul']; $isi = $_POST['isi']; $dok = $_POST['dokumentasi'];
    $foto = $_FILES['thumbnail']['name'];
    if (!empty($foto)) {
        move_uploaded_file($_FILES['thumbnail']['tmp_name'], "uploads/".$foto);
        mysqli_query($conn, "UPDATE berita SET judul='$judul', sub_judul='$sub', isi_berita='$isi', dokumentasi='$dok', thumbnail='$foto' WHERE id='$id'");
    } else {
        mysqli_query($conn, "UPDATE berita SET judul='$judul', sub_judul='$sub', isi_berita='$isi', dokumentasi='$dok' WHERE id='$id'");
    }
    echo "<script>alert('Updated!'); window.location='dashboard.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Berita</title>
    <style>
        body { font-family: 'Poppins'; background: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .box { background: #fff; padding: 40px; border-radius: 15px; width: 500px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); }
        input, textarea { width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 8px; }
        button { background: #003366; color: white; border: none; padding: 12px; width: 100%; border-radius: 8px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="box">
        <h3>Edit Berita</h3><br>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="judul" value="<?php echo $data['judul']; ?>">
            <input type="text" name="sub_judul" value="<?php echo $data['sub_judul']; ?>">
            <textarea name="isi" style="height: 100px;"><?php echo $data['isi_berita']; ?></textarea>
            <input type="text" name="dokumentasi" value="<?php echo $data['dokumentasi']; ?>">
            <p style="font-size: 12px;">Ganti Gambar (Opsional):</p>
            <input type="file" name="thumbnail">
            <button type="submit" name="update">Simpan Perubahan</button>
            <a href="dashboard.php" style="display: block; text-align: center; margin-top: 15px; color: #888; text-decoration: none;">Batal</a>
        </form>
    </div>
</body>
</html>