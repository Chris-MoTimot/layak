<?php 
// Diasumsikan header.php ada di direktori yang sama
// include 'header.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Yayasan LAYAK</title>
    <link rel="stylesheet" href="assets/styling.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<div class="about-hero">
    <h1 style="font-size: 3rem; font-weight: 700; margin-bottom: 10px;">Profil Yayasan LAYAK</h1>
    <p style="font-size: 1.2rem; opacity: 0.9;">Melayani Anak dan Keluarga dengan Nilai Pekerja Sosial Sejak 2003</p>
</div>

<div class="content-wrapper">

    <div class="glass-card">
        <span class="section-tag">Our Origin</span>
        <h2 style="color: var(--navy); margin-bottom: 25px;">Sejarah & Latar Belakang</h2>
        
        <div class="history-grid">
            <div class="history-text">
                <p>
                    LAYAK adalah Yayasan yang bergerak dalam bidang pelayanan anak dan keluarga, membantu dalam keberfungsial sosial.
                    Awal berdirinya LAYAK didasari oleh minat beberapa praktisi sosial dengan latar belakang pendidikan kesejahteraan/pekerja sosial untuk membentuk suatu lembaga sosial yang memiliki "warna" tersendiri dalam memberikan layanan kesejahteraan sosial.
                </p>
                <div class="history-highlight" style="margin-top: 20px;">
                    <p>
                        "Sejak tahun 2001 sudah dilakukan diskusi-diskusi praktisi di bidang HIV/AIDS, Kesehatan Reproduksi, Anak korban trafficking, Low Vision, Anak Jalanan dan pelayanan lainnya."
                    </p>
                </div>
            </div>
            
            <div class="history-text">
                <p>
                    Pada mulanya kegiatan dilakukan secara sukarela dalam kelompok informal. Seiring berkembangnya kegiatan, diperlukan tenaga penuh waktu untuk mengoordinasikan pelayanan sehingga disepakati kelompok ini diformalkan menjadi Yayasan.
                </p>
                <p style="margin-top: 15px;">
                    Pada tanggal <strong>8 April tahun 2003</strong>, LAYAK diaktenotariskan sebagai Yayasan. Bermula hanya dengan satu orang tenaga penuh waktu, kini LAYAK didukung oleh personel dari berbagai disiplin ilmu dengan nilai khas pekerja sosial.
                </p>
                <p style="margin-top: 15px; font-weight: 600; color: var(--orange);">
                    Area program yang semula di wilayah Jakarta, kini telah berkembang ke Jawa Barat, Sumatera Utara, Sulawesi Selatan, dan Jawa Timur.
                </p>
            </div>
        </div>
    </div>

    <div class="glass-card" style="text-align: center;">
        <span class="section-tag">Leadership</span>
        <h2 style="color: var(--navy); margin-bottom: 35px;">Dewan Pengurus Yayasan</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
            
            <div style="padding: 25px; background: #f8fafc; border-radius: 15px;">
                <p style="font-size: 0.75rem; color: var(--orange); font-weight: 800; letter-spacing: 1px;">KETUA PEMBINA</p>
                <p class="clickable-name" onclick="openModal('Sumarni Surbakti, MBA', 'Beliau merupakan Ketua Pembina Yayasan LAYAK yang memiliki latar belakang pendidikan MBA dan fokus pada pengembangan manajemen organisasi sosial.')">Sumarni Surbakti, MBA</p>
                <br>
                <p style="font-size: 0.75rem; color: var(--orange); font-weight: 800; letter-spacing: 1px;">Anggota</p>
                <p class="clickable-name" onclick="openModal('Yeremias Wutun, M.Si', 'Yeremias Wutun adalah anggota pembina dengan keahlian dalam ilmu sosial (M.Si).')">Yeremias Wutun, M.Si</p>
                <p class="clickable-name" onclick="openModal('dr.Alexander Kaliga Ginting Suka', 'dr. Alexander adalah seorang praktisi medis (MD, Sp.P, FCCP) yang mendukung aspek kesehatan dalam program Yayasan.')">dr.Alexander Kaliga Ginting Suka, MD, Sp.P, FCCP</p>
            </div>

            <div style="padding: 25px; background: #f8fafc; border-radius: 15px;">
                <p style="font-size: 0.75rem; color: var(--orange); font-weight: 800; letter-spacing: 1px;">KETUA PENGAWAS</p>
                <p class="clickable-name" onclick="openModal('Dra. Jenny Tarigan', 'Dra. Jenny Tarigan bertugas mengawasi jalannya roda organisasi agar tetap sesuai dengan visi dan misi yayasan.')">Dra. Jenny Tarigan</p>
            </div>

            <div style="padding: 25px; background: #f8fafc; border-radius: 15px;">
                <p style="font-size: 0.75rem; color: var(--orange); font-weight: 800; letter-spacing: 1px;">KETUA PENGURUS</p>
                <p class="clickable-name" onclick="openModal('Dra. Evie Suranta Tarigan', 'Ketua Pengurus yang bertanggung jawab atas koordinasi harian seluruh program layanan anak dan keluarga.')">Dra. Evie Suranta Tarigan</p>
                <br>
                <p style="font-size: 0.75rem; color: var(--orange); font-weight: 800; letter-spacing: 1px;">Anggota</p>
                <p class="clickable-name" onclick="openModal('Dra. H.Frida M. Girsang', 'Anggota pengurus dengan dedikasi tinggi pada isu kesejahteraan sosial.')">Dra. H.Frida M. Girsang</p>
                <p class="clickable-name" onclick="openModal('Lucia Rusmiyati, S.Sos', 'Latar belakang Sosiologi yang membantu dalam pemetaan kebutuhan sosial masyarakat.')">Lucia Rusmiyati,S.Sos</p>
                <p class="clickable-name" onclick="openModal('Ribka Pittaria, M.Si', 'Pakar dalam manajemen program sosial dengan fokus pada dampak berkelanjutan.')">Ribka Pittaria, M.Si</p>
                <p class="clickable-name" onclick="openModal('Dra. Erna Indiaswari', 'Mendukung implementasi program di lapangan dan penguatan kapasitas personel.')">Dra. Erna Indiaswari</p>
            </div>
        </div>
    </div>

    <div id="bioModal" class="modal-overlay" onclick="closeModal()">
        <div class="modal-card" onclick="event.stopPropagation()">
            <div class="modal-sidebar">
                <div class="modal-circle">
                    <i class="fas fa-user" style="font-size: 50px; color: #fff;"></i>
                </div>
            </div>
            <div class="modal-body">
                <button class="close-btn" onclick="closeModal()">&times;</button>
                <h3 id="modalName">Nama Pengurus</h3>
                <p id="modalBio">Deskripsi biografi akan muncul di sini sesuai dengan nama yang diklik.</p>
            </div>
        </div>
    </div>

    <div class="glass-card">
        <span class="section-tag">Our Journey</span>
        <h2 style="color: var(--navy); margin-bottom: 10px;">Rekam Jejak & Kolaborasi</h2>
        <div class="timeline-container">
            <div class="timeline-horizontal">
                <div class="timeline-item">
                    <span class="year-tag">2005</span>
                    <div class="timeline-content"><strong>IOM</strong> Program penanggulangan TPPO.</div>
                </div>
                <div class="timeline-item">
                    <span class="year-tag">2008</span>
                    <div class="timeline-content"><strong>TDH Belanda</strong> Dukungan anak & keluarga rentan di Jakarta Utara.</div>
                </div>
                <div class="timeline-item">
                    <span class="year-tag">2013</span>
                    <div class="timeline-content"><strong>USAID/Global Fund/Kemensos</strong> Program HIV/AIDS & AMPK.</div>
                </div>
                <div class="timeline-item">
                    <span class="year-tag">2016</span>
                    <div class="timeline-content"><strong>USAID-LINKAGES</strong> Program HIV/AIDS Jakarta Utara & Pusat.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="glass-card">
        <span class="section-tag">Social Impact</span>
        <h2 style="color: var(--navy); margin-bottom: 10px;">Penerima Manfaat</h2>
        <div class="stats-container">
            <div class="stat-card stat-main">
                <span class="big-num">371.406</span>
                <p>Total Individu Terlayani</p>
            </div>
            <div class="stat-card stat-outline">
                <span class="big-num">341.694</span>
                <p>Dewasa (92%)</p>
            </div>
            <div class="stat-card stat-orange">
                <span class="big-num">29.712</span>
                <p>Anak-anak (8%)</p>
            </div>
        </div>
    </div>

</div>

<script>
    function openModal(name, bio) {
        document.getElementById('modalName').innerText = name;
        document.getElementById('modalBio').innerText = bio;
        const modal = document.getElementById('bioModal');
        modal.style.display = 'flex';
        // Mencegah scroll pada body saat modal terbuka
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('bioModal');
        modal.style.display = 'none';
        // Mengembalikan scroll body
        document.body.style.overflow = 'auto';
    }

    // Menutup modal dengan tombol ESC
    window.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeModal();
        }
    });
</script>

<?php 
// include 'footer.php'; 
?>
</body>
</html>