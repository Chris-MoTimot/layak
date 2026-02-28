<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit(); }
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Printing Surat Resmi - Yayasan LAYAK</title>
    <link rel="stylesheet" href="assets/admin.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <style>
        .print-container { max-width: 700px; margin: 30px auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; font-weight: bold; margin-bottom: 5px; color: #333; }
        .form-group input, .form-group textarea { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; }
        .btn-generate { background: #003366; color: white; padding: 15px; border: none; width: 100%; border-radius: 5px; cursor: pointer; font-weight: bold; font-size: 16px; transition: 0.3s; }
        .btn-generate:hover { background: #001a33; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>LAYAK<span>.Admin</span></h2>
        <a href="dashboard.php">🏠 <span>Dashboard</span></a>
        <a href="tambah_berita.php">📝 <span>Tambah Berita</span></a>
        <a href="printing.php" class="active">🖨️ <span>Printing</span></a>
        <a href="logout.php" style="color: #ff7675;">🚪 <span>Keluar</span></a>
    </div>

    <div class="main-content">
        <div class="print-container">
            <h2 style="border-bottom: 2px solid #003366; padding-bottom: 10px; margin-bottom: 20px;">Pembuat Surat Referensi</h2>
            
            <div class="form-group">
                <label>Nama Lengkap (Penerima Surat)</label>
                <input type="text" id="name" placeholder="Contoh: Christopher Timothy Malelak">
            </div>

            <div class="form-group">
                <label>Isi Surat / Pesan</label>
                <textarea id="body" rows="6" placeholder="Tuliskan isi surat referensi di sini..."></textarea>
            </div>

            <div class="form-group">
                <label>Nama Direktur / Penandatangan</label>
                <input type="text" id="director" value="Evie Suranta Tarigan">
            </div>

            <button type="button" onclick="generatePDF()" class="btn-generate">CETAK SURAT REFERENSI (PDF)</button>
        </div>
    </div>

    <script>
    function generatePDF() {
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF("p", "mm", "a4");

        const name = document.getElementById("name").value || "Nama";
        const body = document.getElementById("body").value || "Isi Surat";
        const director = document.getElementById("director").value;
        const date = new Date().toISOString().split('T')[0];

        // --- HEADER / KOP SURAT (Sesuai Contoh PDF) ---
        pdf.setFont("Helvetica", "normal");
        pdf.setFontSize(10);
        pdf.text(`Date: ${date}`, 10, 15);

        pdf.setFont("Helvetica", "bold");
        pdf.setFontSize(14);
        pdf.setTextColor(0, 51, 102); // Navy Blue
        pdf.text("YAYASAN PELAYANAN ANAK DAN KELUARGA (LAYAK)", 105, 25, { align: "center" });

        pdf.setFont("Helvetica", "normal");
        pdf.setFontSize(9);
        pdf.setTextColor(100, 100, 100);
        pdf.text("Jl. Raya Lenteng Agung Gg. Anyar No.42 RT.07/02, Jagakarsa", 105, 30, { align: "center" });
        pdf.text("Jakarta Selatan, Indonesia, 12610", 105, 34, { align: "center" });
        pdf.text("082211610049 | yayasanlayak.or.id | layak.foundation2001@gmail.com", 105, 38, { align: "center" });

        // Garis Pemisah Kop
        pdf.setDrawColor(0, 51, 102);
        pdf.setLineWidth(0.5);
        pdf.line(10, 42, 200, 42);

        // --- JUDUL DOKUMEN ---
        pdf.setFont("Helvetica", "bold");
        pdf.setFontSize(14);
        pdf.setTextColor(0, 0, 0);
        pdf.text("REFERENCE LETTER", 105, 55, { align: "center" });

        // --- ISI SURAT ---
        pdf.setFont("Helvetica", "normal");
        pdf.setFontSize(11);
        pdf.text("To Whom It May Concern,", 10, 70);

        const splitBody = pdf.splitTextToSize(body, 185);
        pdf.text(splitBody, 10, 80);

        // --- PENUTUP ---
        let footerY = 220;
        pdf.text("Sincerely,", 10, footerY);
        
        pdf.setFont("Helvetica", "bold");
        pdf.text("Chairperson of Yayasan LAYAK", 10, footerY + 25);
        
        pdf.setFont("Helvetica", "bold");
        pdf.text(`(${director})`, 10, footerY + 35);

        // Save
        pdf.save(`${name}_Reference_Letter.pdf`);
    }
    </script>
</body>
</html>