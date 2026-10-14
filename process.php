```php
<?php
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';

// Hanya menerima data dari formulir POST.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit;
}

// Fungsi untuk menampilkan data dengan aman.
function tampilkan(mixed $value): string
{
    return htmlspecialchars(
        (string) $value,
        ENT_QUOTES,
        'UTF-8'
    );
}

// Mengambil data dari formulir.
$name = trim((string) ($_POST['name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$courseCode = (string) ($_POST['course_code'] ?? '');
$participantType = (string) ($_POST['participant_type'] ?? '');
$learningMode = (string) ($_POST['learning_mode'] ?? '');
$notes = trim((string) ($_POST['notes'] ?? ''));

// Mengambil jumlah paket.
$packageCount = filter_var(
    $_POST['package_count'] ?? null,
    FILTER_VALIDATE_INT
);

// Mengambil minat tambahan.
$submittedInterests = $_POST['interests'] ?? [];

if (!is_array($submittedInterests)) {
    $submittedInterests = [];
}

// Memastikan data kursus tersedia.
$courseList = isset($courses) && is_array($courses)
    ? $courses
    : [];

$interestOptions = isset($interestOptions)
    && is_array($interestOptions)
    ? $interestOptions
    : [];

$facilities = isset($facilities) && is_array($facilities)
    ? $facilities
    : [];

// Mencari kursus berdasarkan kode.
$course = null;

foreach ($courseList as $item) {
    if (
        isset($item['code']) &&
        $item['code'] === $courseCode
    ) {
        $course = $item;
        break;
    }
}

// Validasi data formulir.
$errors = [];

if ($name === '') {
    $errors[] = 'Nama wajib diisi.';
} elseif (strlen($name) > 100) {
    $errors[] = 'Nama maksimal 100 karakter.';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format email tidak valid.';
}

if ($course === null) {
    $errors[] = 'Silakan pilih kursus yang tersedia.';
}

if (!in_array(
    $participantType,
    ['mahasiswa', 'guru', 'umum'],
    true
)) {
    $errors[] = 'Tipe peserta tidak valid.';
}

if (!in_array(
    $learningMode,
    ['offline', 'online', 'hybrid'],
    true
)) {
    $errors[] = 'Metode belajar tidak valid.';
}

if (
    $packageCount === false ||
    $packageCount < 1 ||
    $packageCount > 3
) {
    $errors[] = 'Jumlah paket harus antara 1 sampai 3.';
}

if (strlen($notes) > 1000) {
    $errors[] = 'Catatan maksimal 1000 karakter.';
}

// Memeriksa minat yang dipilih.
$selectedInterests = [];

foreach ($submittedInterests as $interest) {
    if (
        is_string($interest) &&
        isset($interestOptions[$interest])
    ) {
        $selectedInterests[] = $interest;
    }
}

$selectedInterests = array_values(
    array_unique($selectedInterests)
);

// Menampilkan kesalahan jika data tidak valid.
if ($errors !== []) {
    http_response_code(422);
    ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Data Belum Valid - KursusKu</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>

    <main class="summary-page">
        <section class="summary-card">

            <p class="summary-eyebrow">
                MILESTONE 6 · VALIDASI
            </p>

            <h1>Data Belum Dapat Diproses</h1>

            <p class="description">
                Periksa kembali data pendaftaran berikut.
            </p>

            <div class="note">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= tampilkan($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="summary-actions">
                <a href="register.php" class="btn btn-primary">
                    Kembali ke Form
                </a>
            </div>

        </section>
    </main>

    </body>
    </html>
    <?php
    exit;
}

// Menghitung biaya kursus.
$fee = (int) ($course['fee'] ?? 0);
$grossTotal = $fee * $packageCount;

// Mengambil persentase diskon dari helpers.php.
$discountPercent = 0;

if (function_exists('getDiscountPercent')) {
    $discountPercent = (int) getDiscountPercent(
        $participantType
    );
}

// Membatasi diskon antara 0% sampai 100%.
$discountPercent = max(
    0,
    min(100, $discountPercent)
);

$discountAmount = (int) floor(
    $grossTotal * $discountPercent / 100
);

$finalTotal = $grossTotal - $discountAmount;

// Mengubah kode metode belajar menjadi label.
$modeLabels = [
    'offline' => 'Tatap Muka (Offline)',
    'online' => 'Daring (Online)',
    'hybrid' => 'Hybrid',
];

$learningModeLabel = $modeLabels[$learningMode];

// Fungsi format rupiah dengan fallback.
function formatBiaya(int $amount): string
{
    if (function_exists('formatRupiah')) {
        return (string) formatRupiah($amount);
    }

    if (function_exists('rupiah')) {
        return (string) rupiah($amount);
    }

    return 'Rp ' . number_format(
        $amount,
        0,
        ',',
        '.'
    );
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ringkasan Pendaftaran - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<main class="summary-page">
    <section class="summary-card">

        <p class="summary-eyebrow">
            MILESTONE 6 · RINGKASAN
        </p>

        <h1>Pendaftaran Berhasil Diproses</h1>

        <p class="description">
            Berikut adalah ringkasan data pendaftaran kursus kamu.
        </p>

        <div class="summary-info-grid">

            <div class="info-box">
                <strong>Nama Peserta</strong>
                <span><?= tampilkan($name) ?></span>
            </div>

            <div class="info-box">
                <strong>Email</strong>
                <span><?= tampilkan($email) ?></span>
            </div>

            <div class="info-box">
                <strong>Kursus</strong>
                <span><?= tampilkan($course['name'] ?? $courseCode) ?></span>
            </div>

            <div class="info-box">
                <strong>Tipe Peserta</strong>
                <span><?= tampilkan(ucfirst($participantType)) ?></span>
            </div>

            <div class="info-box">
                <strong>Metode Belajar</strong>
                <span><?= tampilkan($learningModeLabel) ?></span>
            </div>

            <div class="info-box">
                <strong>Jumlah Paket</strong>
                <span><?= $packageCount ?> paket</span>
            </div>

        </div>

        <h2>Rincian Biaya</h2>

        <div class="price-box">

            <div class="price-row">
                <span>Biaya per paket</span>
                <span><?= formatBiaya($fee) ?></span>
            </div>

            <div class="price-row">
                <span>Jumlah paket</span>
                <span><?= $packageCount ?></span>
            </div>

            <div class="price-row">
                <span>Subtotal</span>
                <span><?= formatBiaya($grossTotal) ?></span>
            </div>

            <div class="price-row">
                <span>Diskon (<?= $discountPercent ?>%)</span>
                <span>-<?= formatBiaya($discountAmount) ?></span>
            </div>

            <div class="price-row total-row">
                <strong>Total Akhir</strong>
                <strong><?= formatBiaya($finalTotal) ?></strong>
            </div>

        </div>

        <h2>Minat Tambahan</h2>

        <?php if ($selectedInterests === []): ?>

            <p class="note">
                Belum ada minat tambahan.
            </p>

        <?php else: ?>

            <div class="interest-list">
                <?php foreach ($selectedInterests as $interest): ?>
                    <span class="interest">
                        <?= tampilkan(
                            $interestOptions[$interest]
                        ) ?>
                    </span>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>

        <h2>Fasilitas Kursus</h2>

        <?php if ($facilities !== []): ?>

            <ul class="facility-list">
                <?php foreach ($facilities as $facility): ?>
                    <li><?= tampilkan($facility) ?></li>
                <?php endforeach; ?>
            </ul>

        <?php else: ?>

            <p class="note">
                Informasi fasilitas belum tersedia.
            </p>

        <?php endif; ?>

        <h2>Catatan Peserta</h2>

        <div class="note">
            <?= nl2br(tampilkan(
                $notes !== ''
                    ? $notes
                    : 'Tidak ada catatan tambahan.'
            )) ?>
        </div>

        <div class="summary-actions">

            <a href="register.php" class="btn btn-primary">
                Daftar Lagi
            </a>

            <a href="history-dummy.php" class="btn btn-outline">
                Lihat History Dummy
            </a>

            <a href="index.php" class="btn btn-outline">
                Beranda
            </a>

        </div>

    </section>
</main>

</body>
</html>
```
