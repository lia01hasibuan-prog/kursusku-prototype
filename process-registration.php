
<?php

declare(strict_types=1);

/* =========================================================
   CEK METODE REQUEST
========================================================= */

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: registration.php');
    exit;
}

/* =========================================================
   AMBIL DATA DARI FORM
========================================================= */

$name = trim((string) ($_POST['name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$course = (string) ($_POST['course'] ?? '');
$participant_type = (string) ($_POST['participant_type'] ?? '');
$method = (string) ($_POST['method'] ?? '');
$number = (int) ($_POST['package'] ?? 1);
$note = trim((string) ($_POST['note'] ?? ''));

/* =========================================================
   VALIDASI DATA
========================================================= */

if (
    $name === '' ||
    $email === '' ||
    !filter_var($email, FILTER_VALIDATE_EMAIL)
) {
    exit('Nama atau email tidak valid. Silakan kembali dan periksa formulir.');
}

/* =========================================================
   AMBIL DATA MINAT
========================================================= */

$interests = $_POST['interests'] ?? [];

if (!is_array($interests)) {
    $interests = [];
}

/* =========================================================
   NAMA KURSUS
========================================================= */

$course_names = [
    'web-dasar' => 'Web Dasar',
    'php-dasar' => 'PHP Dasar',
    'laravel-dasar' => 'Laravel Dasar'
];

/* =========================================================
   TIPE PESERTA
========================================================= */

$participant_names = [
    'mahasiswa' => 'Mahasiswa',
    'guru' => 'Guru',
    'umum' => 'Umum'
];

/* =========================================================
   METODE BELAJAR
========================================================= */

$method_names = [
    'online' => 'Online',
    'offline' => 'Offline',
    'hybrid' => 'Hybrid'
];

/* =========================================================
   NAMA MINAT
========================================================= */

$interest_names = [
    'frontend' => 'Frontend',
    'backend' => 'Backend',
    'database' => 'Database',
    'ui-ux' => 'UI/UX'
];

/* =========================================================
   VALIDASI PILIHAN FORM
========================================================= */

if (!isset($course_names[$course])) {
    exit('Pilihan kursus tidak valid.');
}

if (!isset($participant_names[$participant_type])) {
    exit('Tipe peserta tidak valid.');
}

if (!isset($method_names[$method])) {
    exit('Metode belajar tidak valid.');
}

if ($number < 1 || $number > 3) {
    exit('Jumlah paket harus antara 1 sampai 3.');
}

/* =========================================================
   KONVERSI DATA
========================================================= */

$course_display = $course_names[$course];

$participant_display =
    $participant_names[$participant_type];

$method_display =
    $method_names[$method];

/* =========================================================
   PROSES MINAT
========================================================= */

$interest_display = [];

foreach ($interests as $interest) {
    if (
        is_string($interest) &&
        isset($interest_names[$interest])
    ) {
        $interest_display[] = $interest_names[$interest];
    }
}

/* =========================================================
   HARGA KURSUS
========================================================= */

$prices = [
    'web-dasar' => 300000,
    'php-dasar' => 400000,
    'laravel-dasar' => 500000
];

$unit_price = $prices[$course];

/* =========================================================
   HITUNG SUBTOTAL
========================================================= */

$subtotal = $unit_price * $number;

/* =========================================================
   HITUNG DISKON
========================================================= */

if ($number === 1) {
    $discount_percent = 15;
} else {
    $discount_percent = 20;
}

$discount = $subtotal * ($discount_percent / 100);

/* =========================================================
   TOTAL AKHIR
========================================================= */

$total = $subtotal - $discount;

/* =========================================================
   FUNGSI FORMAT RUPIAH
========================================================= */

function rupiah(int|float $number): string
{
    return 'Rp ' . number_format(
        $number,
        0,
        ',',
        '.'
    );
}

/* =========================================================
   FUNGSI AMAN UNTUK MENAMPILKAN TEKS
========================================================= */

function e(string $value): string
{
    return htmlspecialchars(
        $value,
        ENT_QUOTES,
        'UTF-8'
    );
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Ringkasan Pendaftaran - KursusKu</title>

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >
</head>

<body>

<main class="summary-page">

    <div class="summary-card">

        <!-- JUDUL -->

        <p class="summary-eyebrow">
            MILESTONE 6 · RINGKASAN
        </p>

        <h1>Pendaftaran Berhasil Diproses</h1>

        <p>
            Terima kasih telah mendaftar di KursusKu.
            Berikut adalah ringkasan data pendaftaran kamu.
        </p>

        <!-- DATA PESERTA -->

        <h2>Data Peserta</h2>

        <div class="summary-info-grid">

            <div class="info-box">
                <strong>Nama:</strong>
                <span><?= e($name) ?></span>
            </div>

            <div class="info-box">
                <strong>Email:</strong>
                <span><?= e($email) ?></span>
            </div>

            <div class="info-box">
                <strong>Kursus:</strong>
                <span><?= e($course_display) ?></span>
            </div>

            <div class="info-box">
                <strong>Tipe peserta:</strong>
                <span><?= e($participant_display) ?></span>
            </div>

            <div class="info-box">
                <strong>Metode:</strong>
                <span><?= e($method_display) ?></span>
            </div>

            <div class="info-box">
                <strong>Jumlah paket:</strong>
                <span><?= $number ?></span>
            </div>

        </div>

        <!-- RINCIAN BIAYA -->

        <h2>Rincian Biaya</h2>

        <div class="price-box">

            <div class="price-row">
                <span>Biaya satuan</span>
                <span><?= rupiah($unit_price) ?></span>
            </div>

            <div class="price-row">
                <span>Jumlah paket</span>
                <span><?= $number ?> paket</span>
            </div>

            <div class="price-row">
                <span>Subtotal</span>
                <span><?= rupiah($subtotal) ?></span>
            </div>

            <div class="price-row">
                <span>Diskon <?= $discount_percent ?>%</span>
                <span>-<?= rupiah($discount) ?></span>
            </div>

            <div class="price-row total-row">
                <strong>TOTAL AKHIR</strong>
                <strong><?= rupiah($total) ?></strong>
            </div>

        </div>

        <!-- MINAT -->

        <h2>Minat</h2>

        <div class="interest-list">

            <?php if (!empty($interest_display)): ?>

                <?php foreach ($interest_display as $interest): ?>

                    <span class="interest">
                        <?= e($interest) ?>
                    </span>

                <?php endforeach; ?>

            <?php else: ?>

                <span class="interest">
                    Belum ada minat tambahan.
                </span>

            <?php endif; ?>

        </div>

        <!-- FASILITAS -->

        <h2>Fasilitas</h2>

        <ul class="facility-list">
            <li>Modul digital</li>
            <li>Sertifikat penyelesaian</li>
            <li>Forum diskusi kelas</li>
        </ul>

        <!-- CATATAN -->

        <h2>Catatan</h2>

        <p class="note">
            <?php if ($note !== ''): ?>

                <?= nl2br(e($note)) ?>

            <?php else: ?>

                Tidak ada catatan tambahan.

            <?php endif; ?>
        </p>

        <!-- TOMBOL -->

        <div class="summary-actions">

            <a
                href="registration.php"
                class="btn btn-primary"
            >
                Daftar Lagi
            </a>

            <a
                href="history-dummy.php"
                class="btn btn-outline"
            >
                Lihat History Dummy
            </a>

            <a
                href="index.php"
                class="btn btn-outline"
            >
                Beranda
            </a>

        </div>

    </div>

</main>

</body>
</html>
