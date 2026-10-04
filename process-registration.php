<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: registration.php');
    exit;
}


/* =========================================================
   AMBIL DATA DARI FORM
========================================================= */

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$course = $_POST['course'] ?? '';
$participant_type = $_POST['participant_type'] ?? '';
$method = $_POST['method'] ?? '';
$number = $_POST['package'] ?? '1';
$note = $_POST['note'] ?? '';

/*
   Ambil semua minat yang dicentang.
   Karena input di registration.php menggunakan interests[],
   PHP akan menerimanya sebagai array.
*/
$interests = $_POST['interests'] ?? [];

if (!is_array($interests)) {
    $interests = [$interests];
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
   KONVERSI DATA
========================================================= */

$course_display = $course_names[$course] ?? 'Tidak diketahui';

$participant_display =
    $participant_names[$participant_type] ?? 'Tidak diketahui';

$method_display =
    $method_names[$method] ?? 'Tidak diketahui';


/* =========================================================
   PROSES MINAT
========================================================= */

$interest_display = [];

foreach ($interests as $interest) {

    if (isset($interest_names[$interest])) {

        $interest_display[] =
            $interest_names[$interest];

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

$unit_price = $prices[$course] ?? 0;


/* =========================================================
   JUMLAH PAKET
========================================================= */

$number = (int) $number;

if ($number < 1) {
    $number = 1;
}


/* =========================================================
   SUBTOTAL
========================================================= */

$subtotal = $unit_price * $number;


/* =========================================================
   DISKON
========================================================= */

if ($number == 1) {

    $discount_percent = 15;

} elseif ($number == 2) {

    $discount_percent = 20;

} else {

    $discount_percent = 20;

}


/* =========================================================
   HITUNG DISKON
========================================================= */

$discount = $subtotal * ($discount_percent / 100);


/* =========================================================
   TOTAL AKHIR
========================================================= */

$total = $subtotal - $discount;


/* =========================================================
   FORMAT RUPIAH
========================================================= */

function rupiah($number)
{
    return 'Rp ' . number_format(
        $number,
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

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Ringkasan Pendaftaran - KursusKu
    </title>

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

</head>


<body>

<main class="summary-page">

    <div class="summary-card">


        <!-- =================================================
             JUDUL
        ================================================== -->

        <p class="summary-eyebrow">
            MILESTONE 6 · RINGKASAN
        </p>

        <h1>
            Pendaftaran Berhasil Diproses
        </h1>


        <!-- =================================================
             DATA PESERTA
        ================================================== -->

        <div class="summary-info-grid">


            <div class="info-box">

                <strong>
                    Nama:
                </strong>

                <span>
                    <?= htmlspecialchars($name) ?>
                </span>

            </div>


            <div class="info-box">

                <strong>
                    Email:
                </strong>

                <span>
                    <?= htmlspecialchars($email) ?>
                </span>

            </div>


            <div class="info-box">

                <strong>
                    Kursus:
                </strong>

                <span>
                    <?= htmlspecialchars($course_display) ?>
                </span>

            </div>


            <div class="info-box">

                <strong>
                    Tipe peserta:
                </strong>

                <span>
                    <?= htmlspecialchars($participant_display) ?>
                </span>

            </div>


            <div class="info-box">

                <strong>
                    Metode:
                </strong>

                <span>
                    <?= htmlspecialchars($method_display) ?>
                </span>

            </div>


            <div class="info-box">

                <strong>
                    Jumlah paket:
                </strong>

                <span>
                    <?= htmlspecialchars($number) ?>
                </span>

            </div>

        </div>


        <!-- =================================================
             RINCIAN BIAYA
        ================================================== -->

        <h2>
            Rincian Biaya
        </h2>


        <div class="price-box">


            <div class="price-row">

                <span>
                    Biaya satuan
                </span>

                <span>
                    <?= rupiah($unit_price) ?>
                </span>

            </div>


            <div class="price-row">

                <span>
                    Subtotal
                </span>

                <span>
                    <?= rupiah($subtotal) ?>
                </span>

            </div>


            <div class="price-row">

                <span>
                    Diskon <?= $discount_percent ?>%
                </span>

                <span>
                    -<?= rupiah($discount) ?>
                </span>

            </div>


            <div class="price-row total-row">

                <strong>
                    TOTAL AKHIR
                </strong>

                <strong>
                    <?= rupiah($total) ?>
                </strong>

            </div>

        </div>


        <!-- =================================================
             MINAT
        ================================================== -->

        <h2>
            Minat
        </h2>


        <div class="interest-list">

            <?php if (count($interest_display) > 0): ?>

                <?php foreach ($interest_display as $interest): ?>

                    <span class="interest">

                        <?= htmlspecialchars($interest) ?>

                    </span>

                <?php endforeach; ?>

            <?php else: ?>

                <span class="interest">

                    Belum memilih minat

                </span>

            <?php endif; ?>

        </div>


        <!-- =================================================
             FASILITAS
        ================================================== -->

        <h2>
            Fasilitas
        </h2>


        <ul class="facility-list">

            <li>
                Modul digital
            </li>

            <li>
                Sertifikat penyelesaian
            </li>

            <li>
                Forum diskusi kelas
            </li>

        </ul>


        <!-- =================================================
             CATATAN
        ================================================== -->

        <h2>
            Catatan
        </h2>


        <p class="note">

            <?php if (!empty(trim($note))): ?>

                <?= htmlspecialchars($note) ?>

            <?php else: ?>

                Tidak ada catatan tambahan.

            <?php endif; ?>

        </p>


        <!-- =================================================
             TOMBOL
        ================================================== -->

        <div class="summary-actions">


            <a
                href="registration.php"
                class="btn btn-primary"
            >
                Daftar Lagi
            </a>


            <a
                href="#"
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