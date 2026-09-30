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
</head>

<body>

    <!-- HEADER -->
    <header class="header">
        <div class="container">
            <h1><?php echo $siteName; ?></h1>
            <p><?php echo $tagline; ?></p>
        </div>
    </header>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="container">
            <a href="#beranda">Beranda</a>
            <a href="#kursus">Kursus</a>
            <a href="#tentang">Tentang</a>
            <a href="#kontak">Kontak</a>
        </div>
    </nav>

    <main>

        <!-- HERO -->
        <section id="beranda" class="hero">
            <div class="container">

                <div class="hero-content">

                    <div class="hero-text">
                        <span class="eyebrow">Belajar Teknologi</span>

                        <h2>
                            Selamat Datang di <?php echo $siteName; ?>
                        </h2>

                        <p>
                            Platform belajar teknologi untuk mahasiswa
                            yang ingin meningkatkan kemampuan pemrograman web.
                        </p>

                        <div class="hero-buttons">
                            <a href="#kursus" class="button">
                                Lihat Kursus
                            </a>

                            <a href="fee-calculator.php" class="button button-outline">
                                Lihat Estimasi Biaya
                            </a>
                        </div>
                    </div>

                    <div class="hero-image-wrapper">
                        <img
                            src="assets/img/image1.png"
                            alt="Mahasiswa sedang belajar pemrograman web"
                            class="hero-image">
                    </div>

                </div>

            </div>
        </section>

        <!-- KATALOG KURSUS -->
        <section id="kursus" class="section">
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
                                $status = statusKursus(
                                    $course['quota'],
                                    $course['registered']
                                );

                                $statusClass =
                                    $status === 'Penuh'
                                    ? 'badge-full'
                                    : 'badge-available';
                                ?>

                                <tr>
                                    <td>
                                        <?= htmlspecialchars($course['code']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars(trim($course['name'])) ?>
                                    </td>

                                    <td>
                                        <?= rupiah($course['fee']) ?>
                                    </td>

                                    <td>
                                        <?= formatTanggal($course['start_date']) ?>
                                    </td>

                                    <td>
                                        <?= sisaKursi(
                                            $course['quota'],
                                            $course['registered']
                                        ) ?>
                                    </td>

                                    <td>
                                        <span class="<?= $statusClass ?>">
                                            <?= $status ?>
                                        </span>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </section>

        <!-- PROGRAM KURSUS -->
        <section class="section section-light">
            <div class="container">

                <span class="eyebrow">Program Belajar</span>

                <h2>Program Kursus</h2>

                <div class="course-grid">

                    <article class="course-card">
                        <div class="course-icon">HTML</div>

                        <h3>HTML & CSS</h3>

                        <p>
                            Belajar membangun struktur dan tampilan
                            website dari dasar.
                        </p>
                    </article>

                    <article class="course-card">
                        <div class="course-icon">PHP</div>

                        <h3>PHP</h3>

                        <p>
                            Belajar pemrograman web server-side
                            menggunakan PHP.
                        </p>
                    </article>

                    <article class="course-card">
                        <div class="course-icon">LR</div>

                        <h3>Laravel</h3>

                        <p>
                            Membangun aplikasi web modern menggunakan
                            framework Laravel.
                        </p>
                    </article>

                </div>

            </div>
        </section>

        <!-- TENTANG -->
        <section id="tentang" class="section">
            <div class="container">

                <span class="eyebrow">Tentang Kami</span>

                <h2>Tentang KursusKu</h2>

                <p>
                    KursusKu merupakan prototype website pembelajaran
                    yang dikembangkan dalam mata kuliah Pemrograman Web III.
                </p>

                <p>
                    Pada semester ini mahasiswa akan belajar PHP, MySQL
                    dan framework Laravel.
                </p>

                <a
                    href="https://laravel.com"
                    target="_blank"
                    rel="noopener"
                    class="button">
                    Pelajari Laravel
                </a>

            </div>
        </section>

        <!-- VIDEO -->
        <section class="section section-light">
            <div class="container">

                <span class="eyebrow">Materi Tambahan</span>

                <h2>Video Pembelajaran</h2>

                <div class="video-placeholder">
                    <iframe
                        src="https://www.youtube.com/embed/nQinn48Bk2g"
                        title="Kenapa Laravel Masih Banyak Yang Pake"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin"
                        allowfullscreen>
                    </iframe>
                </div>

            </div>
        </section>

        <!-- KONTAK -->
        <section id="kontak" class="section">
            <div class="container">

                <span class="eyebrow">Hubungi Kami</span>

                <h2>Kontak</h2>

                <p>
                    Informasi lebih lanjut mengenai program KursusKu
                    dapat diperoleh melalui halaman ini.
                </p>

            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">

            <p>
                &copy;
                <?php echo $tahun; ?>
                <?php echo $siteName; ?>.
                Pemrograman Web III.
            </p>

        </div>
    </footer>

</body>
</html>