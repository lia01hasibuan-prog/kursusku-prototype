<?php
/*
=========================================================
HISTORY DUMMY
Latihan Array + Foreach
Bukan Database dan bukan CRUD
=========================================================
*/

$history = [
    [
        'nama' => 'Lia',
        'kursus' => 'Web Dasar',
        'total' => 240000
    ],
    [
        'nama' => 'Azka',
        'kursus' => 'PHP Dasar',
        'total' => 340000
    ],
    [
        'nama' => 'Putri',
        'kursus' => 'Laravel Dasar',
        'total' => 425000
    ],
    [
        'nama' => 'Aril',
        'kursus' => 'Web Dasar',
        'total' => 480000
    ]
];

/*
=========================================================
FUNGSI FORMAT RUPIAH
=========================================================
*/

function rupiah($number)
{
    return 'Rp ' . number_format($number, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>History Pendaftaran - KursusKu</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <style>

        /* =================================================
           HALAMAN HISTORY
        ================================================= */

        .history-page {
            min-height: 100vh;
            padding: 40px 20px;
            background: #eef8f5;
        }

        .history-container {
            max-width: 1000px;
            margin: 0 auto;
        }

        /* =================================================
           HEADER
        ================================================= */

        .history-header {
            margin-bottom: 25px;
        }

        .history-label {
            display: inline-block;

            padding: 7px 14px;

            margin-bottom: 12px;

            background: #d9f3ec;

            color: #0f766e;

            border-radius: 999px;

            font-size: 13px;

            font-weight: bold;

            letter-spacing: 0.5px;
        }

        .history-header h1 {
            margin: 0 0 8px;

            color: #172b4d;

            font-size: 32px;
        }

        .history-header p {
            margin: 0;

            color: #64748b;

            font-size: 15px;
        }

        /* =================================================
           CARD
        ================================================= */

        .history-card {
            background: white;

            padding: 30px;

            border-radius: 18px;

            border: 1px solid #dbeee9;

            box-shadow:
                0 10px 30px rgba(15, 118, 110, 0.08);

            overflow-x: auto;
        }

        /* =================================================
           TABLE
        ================================================= */

        .history-table {
            width: 100%;

            border-collapse: collapse;

            min-width: 650px;
        }

        .history-table th {
            padding: 15px;

            background: #e9f8f3;

            color: #24544d;

            text-align: left;

            font-size: 14px;

            border-bottom: 2px solid #cce9e1;
        }

        .history-table td {
            padding: 16px 15px;

            color: #334155;

            font-size: 14px;

            border-bottom: 1px solid #e5eeee;
        }

        .history-table tbody tr:hover {
            background: #f7fcfa;
        }

        .history-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* =================================================
           NOMOR
        ================================================= */

        .number {
            width: 60px;

            text-align: center;

            font-weight: bold;

            color: #0f766e;
        }

        /* =================================================
           NAMA
        ================================================= */

        .name {
            font-weight: bold;

            color: #172b4d;
        }

        /* =================================================
           KURSUS
        ================================================= */

        .course {
            color: #475569;
        }

        /* =================================================
           TOTAL
        ================================================= */

        .total {
            color: #0f766e;

            font-weight: bold;

            white-space: nowrap;
        }

        /* =================================================
           CATATAN
        ================================================= */

        .history-note {
            margin-top: 18px;

            padding: 14px 16px;

            background: #f0fdfa;

            border-left: 4px solid #14b8a6;

            border-radius: 8px;

            color: #475569;

            font-size: 13px;
        }

        /* =================================================
           RESPONSIVE
        ================================================= */

        @media (max-width: 600px) {

            .history-page {
                padding: 25px 15px;
            }

            .history-card {
                padding: 18px;
            }

            .history-header h1 {
                font-size: 25px;
            }

            .history-table th,
            .history-table td {
                padding: 12px;
            }
        }

    </style>

</head>

<body>

    <main class="history-page">

        <div class="history-container">

            <!-- HEADER -->

            <div class="history-header">

                <span class="history-label">
                    LATIHAN ARRAY + FOREACH
                </span>

                <h1>
                    History Pendaftaran
                </h1>

                <p>
                    Data dummy pendaftaran kursus KursusKu.
                </p>

            </div>


            <!-- CARD -->

            <section class="history-card">

                <table class="history-table">

                    <thead>

                        <tr>

                            <th class="number">
                                No
                            </th>

                            <th>
                                Nama
                            </th>

                            <th>
                                Kursus
                            </th>

                            <th>
                                Total Pembayaran
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php foreach ($history as $index => $item): ?>

                            <tr>

                                <td class="number">
                                    <?= $index + 1 ?>
                                </td>

                                <td class="name">
                                    <?= htmlspecialchars($item['nama']) ?>
                                </td>

                                <td class="course">
                                    <?= htmlspecialchars($item['kursus']) ?>
                                </td>

                                <td class="total">
                                    <?= rupiah($item['total']) ?>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>


                <!-- CATATAN -->

                <div class="history-note">

                    <strong>Catatan:</strong>

                    Data pada halaman ini merupakan data dummy
                    yang dibuat menggunakan array dan
                    <code>foreach</code>.

                    Data bukan berasal dari database.

                </div>

            </section>

        </div>

    </main>

</body>

</html>