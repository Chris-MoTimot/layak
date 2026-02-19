<?php include 'header.php'; ?>

<style>
    /* Gunakan variabel yang sudah ada di header jika mungkin, atau definisikan ulang */
    .donation-page-body {
        padding: 60px 8%;
        display: flex;
        justify-content: center;
        background: #f8fafc;
    }

    .donation-card {
        background: #fff;
        border-radius: 24px;
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(0,0,0,0.05);
        max-width: 1000px;
        width: 100%;
    }

    .donation-info { padding: 50px; }
    .donation-info h1 { font-size: 2rem; color: #003366; margin-bottom: 20px; }
    .subtitle { color: #64748b; line-height: 1.6; margin-bottom: 30px; }

    .how-to {
        background: #f1f5f9;
        padding: 25px;
        border-radius: 15px;
        border-left: 5px solid #e67e22;
    }
    .how-to ol { margin-left: 20px; }
    .how-to li { margin-bottom: 10px; color: #334155; }

    .donation-qris {
        background: linear-gradient(135deg, #003366, #004a99);
        padding: 50px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
    }

    .qris-box {
        background: white;
        padding: 15px;
        border-radius: 15px;
        cursor: pointer;
        transition: 0.3s;
    }
    .qris-box:hover { transform: scale(1.05); }
    .qris-box img { width: 200px; height: auto; display: block; }

    .scan-text { margin-top: 20px; font-weight: 600; font-size: 1.1rem; }

    /* Lightbox */
    .lightbox {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.8);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 2000;
    }
    .lightbox img { max-width: 90%; max-height: 80vh; border-radius: 10px; }

    @media (max-width: 900px) {
        .donation-card { grid-template-columns: 1fr; }
        .donation-qris { order: -1; }
    }
</style>

<div class="lightbox" id="lightbox" onclick="closeLightbox()">
    <img src="images/brcode.jpeg" alt="QRIS Besar">
</div>

<div class="donation-page-body">
    <div class="donation-card">
        <div class="donation-info">
            <h1>💙 Dukung Masa Depan Anak</h1>
            <p class="subtitle">Setiap donasi Anda sangat berarti bagi program advokasi kami.</p>
            <div class="how-to">
                <h3>📱 Cara Donasi</h3>
                <ol>
                    <li>Buka aplikasi <strong>e-Wallet</strong> (Gopay, OVO, Dana, dll) atau <strong>Mobile Banking</strong>.</li>
                    <li>Pilih fitur <strong>Pindai / Scan QR</strong>.</li>
                    <li>Arahkan kamera ke kode QRIS di samping.</li>
                    <li>Masukkan jumlah donasi yang ingin diberikan.</li>
                    <li>Konfirmasi nama <strong>YAYASAN LAYAK</strong> dan selesaikan pembayaran.</li>
                </ol>
            </div>
        </div>

        <div class="donation-qris">
            <div class="qris-box" onclick="openLightbox()">
                <img src="images/brcode.jpeg" alt="QRIS Donasi">
            </div>
            <p class="scan-text">SCAN QRIS DISINI</p>
        </div>
    </div>
</div>

<script>
    function openLightbox() { document.getElementById('lightbox').style.display = 'flex'; }
    function closeLightbox() { document.getElementById('lightbox').style.display = 'none'; }
</script>

<?php include 'footer.php'; ?>