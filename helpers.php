]<?php

declare(strict_types=1);

/**
 * Mengamankan teks sebelum ditampilkan ke HTML.
 */
function e(mixed $value): string
{
    return htmlspecialchars(
        (string) $value,
        ENT_QUOTES,
        'UTF-8'
    );
}

/**
 * Format mata uang rupiah.
 */
function rupiah(int $amount): string
{
    return 'Rp ' . number_format($amount, 0, ',', '.');
}

/**
 * Alias untuk fungsi format rupiah.
 */
function formatRupiah(int $amount): string
{
    return rupiah($amount);
}

/**
 * Mencari kursus berdasarkan kode.
 */
function findCourse(array $courses, string $code): ?array
{
    return $courses[$code] ?? null;
}

/**
 * Menentukan diskon berdasarkan tipe peserta.
 */
function getDiscountPercent(string $participantType): int
{
    return match ($participantType) {
        'mahasiswa' => 15,
        'guru' => 5,
        default => 0,
    };
}

/**
 * Mengubah kode metode belajar menjadi label.
 */
function getLearningModeLabel(string $mode): string
{
    return match ($mode) {
        'offline' => 'Tatap Muka (Offline)',
        'online' => 'Online',
        'hybrid' => 'Hybrid',
        default => 'Tidak diketahui',
    };
}

/**
 * Menentukan status ketersediaan kursus.
 */
function statusKursus(int $quota, int $registered): string
{
    return $registered >= $quota ? 'Penuh' : 'Tersedia';
}

/**
 * Menghitung sisa kursi kursus.
 */
function sisaKursi(int $quota, int $registered): int
{
    return max(0, $quota - $registered);
}

/**
 * Mengubah format tanggal menjadi hari-bulan-tahun.
 */
function formatTanggal(string $date): string
{
    $value = new DateTimeImmutable($date);
    return $value->format('d-m-Y');
}
