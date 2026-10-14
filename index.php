<?php
require_once __DIR__ . '/helpers.php';

$courses = [
    ['code' => 'WEB-01', 'name' => 'Web Dasar', 'fee' => 200000, 'quota' => 30, 'registered' => 12, 'start_date' => '2026-09-21'],
    ['code' => 'PHP-01', 'name' => 'PHP Dasar', 'fee' => 250000, 'quota' => 30, 'registered' => 18, 'start_date' => '2026-09-22'],
    ['code' => 'PHP-02', 'name' => 'PHP Lanjutan', 'fee' => 300000, 'quota' => 25, 'registered' => 24, 'start_date' => '2026-09-24'],
    ['code' => 'LAR-01', 'name' => 'Laravel Fundamental', 'fee' => 350000, 'quota' => 25, 'registered' => 25, 'start_date' => '2026-09-28'],
    ['code' => 'DB-01', 'name' => 'MySQL Dasar', 'fee' => 275000, 'quota' => 20, 'registered' => 0, 'start_date' => '2026-10-01'],
    ['code' => 'UI-01', 'name' => 'UI Web Dasar', 'fee' => 225000, 'quota' => 35, 'registered' => 9, 'start_date' => '2026-10-03'],
];

$siteName = "KursusKu";
$tagline = "Belajar Teknologi, Bangun Masa Depan";
$tahun = date("Y");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $siteName; ?></title>

    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        /* ===== HEADER ===== */
        .site-header {
            background: #0d7377;
            color: #ffffff;
            text-align: center;
            padding: 50px 20px 40px;
        }

        .site-header h1 {
            color: #ffffff;
            font-size: 48px;
            margin-bottom: 12px;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
        }

        .site-header p {
            color: rgba(255, 255, 255, 0.95);
            font-size: 20px;
            font-weight: 500;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* ===== NAVBAR ===== */
        .site-nav {
            background: #0a5c5f;
        }

        .site-nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 0;
            padding: 0;
        }

        .site-nav a {
            display: block;
            color: #ffffff;
            text-decoration: none;
            padding: 18px 30px;
            font-weight: bold;
            font-size: 16px;
            font-family: Arial, Helvetica, sans-serif;
            transition: background 0.2s;
        }

        .site-nav a:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        /* ===== HERO (LAYOUT 2 KOLOM) ===== */
        .hero-section {
            background: #ffffff;
            padding: 60px 20px;
        }

        .hero-section .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .hero-text {
            text-align: left;
        }

        .hero-text .eyebrow {
            display: block;
            margin-bottom: 15px;
        }

        .hero-text h2 {
            color: #172b4d;
            font-size: 36px;
            margin-bottom: 18px;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.2;
        }

        .hero-text p {
            color: #344563;
            font-size: 16px;
            margin-bottom: 28px;
            line-height: 1.6;
            font-family: Arial, Helvetica, sans-serif;
        }

        .hero-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .hero-buttons .btn-primary,
        .hero-buttons .btn-outline {
            padding: 13px 26px;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
            border-radius: 7px;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
        }

        .hero-image-wrapper {
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .hero-image-wrapper img {
            width: 100%;
            height: auto;
            display: block;
        }

        /* ===== SECTION UMUM ===== */
        .content-section {
            padding: 60px 20px;
        }

        .content-section .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .content-section h2 {
            color: #172b4d;
            font-size: 28px;
            margin-bottom: 25px;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
        }

        .content-section p {
            color: #344563;
            margin-bottom: 20px;
            font-size: 15px;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* ===== TABLE ===== */
        .table-wrapper {
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #0d7377;
            color: #ffffff;
        }

        th {
            padding: 14px 16px;
            text-align: left;
            font-weight: bold;
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
        }

        td {
            padding: 14px 16px;
            border-bottom: 1px solid #e3e8ee;
            font-size: 14px;
            color: #172b4d;
            font-family: Arial, Helvetica, sans-serif;
        }

        tbody tr:hover {
            background: #f8f9fa;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .badge-available {
            background: #e8f8f5;
            color: #0d7377;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .badge-full {
            background: #fee2e2;
            color: #dc2626;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        /* ===== COURSE GRID ===== */
        .course-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 25px;
        }

        .course-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 25px 20px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid #e3e8ee;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .course-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .course-icon {
            width: 60px;
            height: 60px;
            background: #0d7377;
            color: #ffffff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 18px;
            margin: 0 auto 15px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .course-card h3 {
            color: #172b4d;
            font-size: 18px;
            margin-bottom: 10px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .course-card p {
            color: #344563;
            font-size: 14px;
            margin-bottom: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* ===== VIDEO ===== */
        .video-placeholder {
            margin-top: 25px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            background: #000;
        }

        .video-placeholder iframe {
            width: 100%;
            aspect-ratio: 16 / 9;
            border: none;
            display: block;
        }

        /* ===== FOOTER ===== */
        .site-footer {
            background: #0a5c5f;
            color: #ffffff;
            text-align: center;
            padding: 25px 20px;
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .site-header h1 { font-size: 32px; }
            .site-header p { font-size: 15px; }
            .site-nav ul { flex-direction: column; }
            .site-nav a {
                text-align: center;
                border-bottom: 1px solid rgba(255,255,255,0.1);
            }

            /* Hero jadi 1 kolom di HP */
            .hero-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            .hero-text {
                text-align: center;
            }
            .hero-text h2 { font-size: 28px; }
            .hero-buttons { justify-content: center; }

            .table-wrapper { overflow-x: auto; }
            table { min-width: 600px; }
            .course-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header class="site-header">
        <h1><?php echo $siteName; ?></h1>
        <p><?php echo $tagline; ?></p>
    </header>

    <!-- NAVBAR -->
    <nav class="site-nav">
        <ul>
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="#katalog">Katalog</a></li>
            <li><a href="#daftar">Daftar Kursus</a></li>
        </ul>
    </nav>

    <main>

        <!-- HERO / BERANDA (LAYOUT 2 KOLOM) -->
        <section id="beranda" class="hero-section">
            <div class="container">
                <div class="hero-grid">

                    <!-- Teks di Kiri -->
                    <div class="hero-text">
                        <span class="eyebrow">Belajar Teknologi</span>
                        <h2>Selamat Datang di <?php echo $siteName; ?></h2>
                        <p>
                            Platform belajar teknologi untuk mahasiswa yang ingin meningkatkan 
                            kemampuan pemrograman web.
                        </p>
                        <div class="hero-buttons">
                            <a href="#katalog" class="btn btn-primary">Lihat Kursus</a>
                            <a href="fee-calculator.php" class="btn btn-outline">Lihat Estimasi Biaya</a>
                        </div>
                    </div>

                    <!-- Gambar di Kanan -->
                    <div class="hero-image-wrapper">
                        <img src="assets/img/image1.png" alt="Mahasiswa sedang belajar pemrograman web">
                    </div>

                </div>
            </div>
        </section>

        <!-- KATALOG KURSUS -->
        <section id="katalog" class="content-section" style="background: #eef8f7;">
            <div class="container">
                <span class="eyebrow">Pilihan Pembelajaran</span>
                <h2>Katalog Kursus</h2>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Biaya</th>
                                <th>Mulai</th>
                                <th>Sisa</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($courses as $course): ?>
                                <?php
                                $status = statusKursus($course['quota'], $course['registered']);
                                $statusClass = $status === 'Penuh' ? 'badge-full' : 'badge-available';
                                ?>
                                <tr>
                                    <td><?= htmlspecialchars($course['code']) ?></td>
                                    <td><?= htmlspecialchars(trim($course['name'])) ?></td>
                                    <td><?= rupiah($course['fee']) ?></td>
                                    <td><?= formatTanggal($course['start_date']) ?></td>
                                    <td><?= sisaKursi($course['quota'], $course['registered']) ?></td>
                                    <td>
                                        <span class="<?= $statusClass ?>"><?= $status ?></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- PROGRAM KURSUS -->
        <section class="content-section" style="background: #ffffff;">
            <div class="container">
                <span class="eyebrow">Program Belajar</span>
                <h2>Program Kursus</h2>

                <div class="course-grid">
                    <article class="course-card">
                        <div class="course-icon">HTML</div>
                        <h3>HTML & CSS</h3>
                        <p>Belajar membangun struktur dan tampilan website dari dasar.</p>
                    </article>
                    <article class="course-card">
                        <div class="course-icon">PHP</div>
                        <h3>PHP</h3>
                        <p>Belajar pemrograman web server-side menggunakan PHP.</p>
                    </article>
                    <article class="course-card">
                        <div class="course-icon">LR</div>
                        <h3>Laravel</h3>
                        <p>Membangun aplikasi web modern menggunakan framework Laravel.</p>
                    </article>
                </div>
            </div>
        </section>

        <!-- TENTANG -->
        <section id="tentang" class="content-section" style="background: #eef8f7;">
            <div class="container">
                <span class="eyebrow">Tentang Kami</span>
                <h2>Tentang <?php echo $siteName; ?></h2>
                <p>
                    <?php echo $siteName; ?> merupakan prototype website pembelajaran yang 
                    dikembangkan dalam mata kuliah Pemrograman Web III.
                </p>
                <p>
                    Pada semester ini mahasiswa akan belajar PHP, MySQL dan framework Laravel.
                </p>
                <a href="https://laravel.com" target="_blank" rel="noopener" class="btn btn-primary">
                    Pelajari Laravel
                </a>
            </div>
        </section>

        <!-- VIDEO -->
        <section class="content-section" style="background: #ffffff;">
            <div class="container">
                <span class="eyebrow">Materi Tambahan</span>
                <h2>Video Pembelajaran</h2>

                <div class="video-placeholder">
                    <iframe
                        src="https://www.youtube.com/embed/nQinn48Bk2g"
                        title="Kenapa Laravel Masih Banyak Yang Pake"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </section>

        <!-- DAFTAR KURSUS -->
        <section id="daftar" class="content-section" style="background: #eef8f7;">
            <div class="container" style="text-align: center;">
                <span class="eyebrow">Gabung Bersama Kami</span>
                <h2>Daftar Kursus</h2>
                <p>
                    Silakan pilih kursus yang ingin Anda ikuti dan lengkapi formulir 
                    pendaftaran untuk memulai perjalanan belajar Anda.
                </p>
                <a href="register.php" class="btn btn-primary" style="padding: 13px 26px; font-size: 14px; text-decoration: none; display: inline-block;">
                    Mulai Pendaftaran
                </a>
            </div>
        </section>

        <!-- KONTAK -->
        <section id="kontak" class="content-section" style="background: #ffffff;">
            <div class="container" style="text-align: center;">
                <span class="eyebrow">Hubungi Kami</span>
                <h2>Kontak</h2>
                <p>
                    Informasi lebih lanjut mengenai program <?php echo $siteName; ?> 
                    dapat diperoleh melalui halaman ini.
                </p>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="site-footer">
        <p>&copy; <?php echo $tahun; ?> <?php echo $siteName; ?>. Pemrograman Web III.</p>
    </footer>

</body>
</html>