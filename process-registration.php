<?php
declare(strict_types=1);

/* =========================================================
   CEK METODE REQUEST
========================================================= */

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    header('Location: registration.php');
    exit;
}

/* =========================================================
   AMBIL DATA DARI FORM (PAKAI $_GET BUKAN $_POST)
========================================================= */

$name = trim((string) ($_GET['name'] ?? ''));
$email = trim((string) ($_GET['email'] ?? ''));
$phone = trim((string) ($_GET['phone'] ?? ''));
$study = trim((string) ($_GET['study'] ?? ''));
$course = (string) ($_GET['course'] ?? '');
$participant_type = (string) ($_GET['participant_type'] ?? '');
$note = trim((string) ($_GET['note'] ?? ''));

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

$interests = $_GET['interests'] ?? [];

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
    'umum' => 'Umum'
];

/* =========================================================
   NAMA MINAT
========================================================= */

$interest_names = [
    'ui-ux' => 'UI/UX',
    'database' => 'Database',
    'backend' => 'Backend'
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

/* =========================================================
   KONVERSI DATA
========================================================= */

$course_display = $course_names[$course];
$participant_display = $participant_names[$participant_type];

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
   TOTAL AKHIR
========================================================= */

$total = $unit_price;

/* =========================================================
   FUNGSI FORMAT RUPIAH
========================================================= */

function rupiah(int|float $number): string
{
    return 'Rp ' . number_format($number, 0, ',', '.');
}

/* =========================================================
   FUNGSI AMAN UNTUK MENAMPILKAN TEKS
========================================================= */

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ringkasan Pendaftaran - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body { background: #eef8f7; font-family: Arial, Helvetica, sans-serif; margin: 0; padding: 30px 20px; color: #172b4d; }
        .summary-card { max-width: 750px; margin: 0 auto; background: #ffffff; padding: 40px; border-radius: 16px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05); }
        .summary-eyebrow { color: #087f79; font-size: 12px; font-weight: bold; letter-spacing: 1.5px; margin-bottom: 15px; margin-top: 0; }
        .summary-card h1 { color: #172b4d; font-size: 32px; margin: 0 0 15px 0; font-weight: bold; }
        .summary-card > p { color: #344563; font-size: 15px; margin-bottom: 30px; line-height: 1.5; }
        .summary-card h2 { color: #172b4d; font-size: 20px; margin-top: 25px; margin-bottom: 15px; font-weight: bold; }
        .summary-info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 20px; }
        .info-box { background: #f1f5f9; border-radius: 8px; padding: 12px 14px; min-height: 55px; display: flex; flex-direction: column; justify-content: center; }
        .info-box strong { color: #172b4d; font-size: 12px; margin-bottom: 4px; }
        .info-box span { color: #344563; font-size: 14px; }
        .price-box { border: 1px solid #d9e2ec; border-radius: 9px; overflow: hidden; margin-bottom: 20px; }
        .price-row { display: flex; justify-content: space-between; align-items: center; padding: 11px 12px; border-bottom: 1px solid #e3e8ee; font-size: 14px; }
        .price-row:last-child { border-bottom: none; }
        .total-row { background: #e7f8f3; color: #087f79; font-weight: bold; }
        .interest-list { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 20px; }
        .interest { background: #e8f8f5; color: #087f79; padding: 6px 14px; border-radius: 20px; font-size: 13px; font-weight: bold; }
        .note { background: #f1f5f9; border-left: 4px solid #087f79; border-radius: 6px; padding: 12px 15px; color: #344563; font-size: 14px; margin-bottom: 20px; line-height: 1.5; }
        .summary-actions { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 25px; }
        .btn { display: inline-block; text-decoration: none; padding: 12px 20px; border-radius: 8px; font-size: 14px; font-weight: bold; font-family: Arial, Helvetica, sans-serif; transition: all 0.2s; }
        .btn-primary { background: #087f79; color: #ffffff; border: none; }
        .btn-primary:hover { background: #066a65; }
        .btn-outline { background: #ffffff; color: #087f79; border: 2px solid #087f79; }
        .btn-outline:hover { background: #e8f8f5; }
        @media (max-width: 600px) { .summary-card { padding: 25px 20px; } .summary-info-grid { grid-template-columns: 1fr; } .summary-card h1 { font-size: 26px; } .summary-actions { flex-direction: column; } .btn { text-align: center; } }
    </style>
</head>
<body>
<main>
    <div class="summary-card">
        <p class="summary-eyebrow">MILESTONE 6 · RINGKASAN</p>
        <h1>Pendaftaran Berhasil Diproses</h1>
        <p>Terima kasih telah mendaftar di KursusKu. Berikut adalah ringkasan data pendaftaran kamu.</p>

        <h2>Data Peserta</h2>
        <div class="summary-info-grid">
            <div class="info-box"><strong>Nama:</strong><span><?= e($name) ?></span></div>
            <div class="info-box"><strong>Email:</strong><span><?= e($email) ?></span></div>
            <div class="info-box"><strong>Nomor HP:</strong><span><?= e($phone) ?></span></div>
            <div class="info-box"><strong>Program Studi:</strong><span><?= e($study) ?></span></div>
            <div class="info-box"><strong>Kursus:</strong><span><?= e($course_display) ?></span></div>
            <div class="info-box"><strong>Tipe Peserta:</strong><span><?= e($participant_display) ?></span></div>
        </div>

        <h2>Rincian Biaya</h2>
        <div class="price-box">
            <div class="price-row"><span>Biaya kursus</span><span><?= rupiah($unit_price) ?></span></div>
            <div class="price-row total-row"><strong>TOTAL</strong><strong><?= rupiah($total) ?></strong></div>
        </div>

        <h2>Minat Tambahan</h2>
        <div class="interest-list">
            <?php if (!empty($interest_display)): ?>
                <?php foreach ($interest_display as $interest): ?>
                    <span class="interest"><?= e($interest) ?></span>
                <?php endforeach; ?>
            <?php else: ?>
                <span class="interest">Belum ada minat tambahan.</span>
            <?php endif; ?>
        </div>

        <h2>Catatan</h2>
        <p class="note">
            <?php if ($note !== ''): ?>
                <?= nl2br(e($note)) ?>
            <?php else: ?>
                Tidak ada catatan tambahan.
            <?php endif; ?>
        </p>

        <div class="summary-actions">
            <a href="registration.php" class="btn btn-primary">Daftar Lagi</a>
            <a href="index.php" class="btn btn-outline">Beranda</a>
        </div>
    </div>
</main>
</body>
</html>