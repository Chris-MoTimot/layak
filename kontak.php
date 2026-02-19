<?php include 'header.php'; ?>
<link rel="stylesheet" href="assets/style.css">
<div class="container contact-section">
    <h1 class="page-title">Hubungi Yayasan LAYAK</h1>
    
    <div class="contact-grid">
        <div class="contact-info">
            <h3 class="contact-subtitle">Alamat Kantor</h3>
            <p class="address-text">Jl. Kompleks Depsos No. 12, Pesanggrahan, Jakarta Selatan.</p>
            
            <div class="contact-details">
                <p><strong>Telepon:</strong> (021) 123 4567</p>
                <p><strong>Email:</strong> layakhak@indosat.net.id</p>
            </div>

            <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1120.6325972434408!2d106.83615132918142!3d-6.321879715346391!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed8950fab9cb%3A0x4c7d2ff6e8b4227e!2sLayanan%20Low%20Vision%20Yayasan%20LAYAK!5e1!3m2!1sid!2sid!4v1771421266080!5m2!1sid!2sid" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        <div class="contact-form-wrapper">
            <form class="styled-form">
                <div class="form-group">
                    <label>Nama Anda</label>
                    <input type="text" placeholder="Masukkan nama lengkap">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" placeholder="contoh@email.com">
                </div>
                <div class="form-group">
                    <label>Pesan</label>
                    <textarea placeholder="Tuliskan pesan Anda di sini..."></textarea>
                </div>
                <button type="submit" class="btn-submit">Kirim Pesan</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>