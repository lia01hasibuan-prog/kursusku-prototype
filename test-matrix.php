<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Test Matrix Pertemuan 6 - KursusKu</title>

    <style>
        /* ==============================
           RESET
        ============================== */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* ==============================
           BODY
        ============================== */
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #eef8f5;
            color: #172033;
            padding: 32px 20px;
            line-height: 1.5;
        }

        /* ==============================
           CONTAINER
        ============================== */
        .container {
            max-width: 1100px;
            margin: 0 auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(23, 32, 51, 0.08);
        }

        /* ==============================
           LABEL
        ============================== */
        .label {
            display: inline-block;
            background: #d9f3ec;
            color: #0f766e;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }

        /* ==============================
           JUDUL
        ============================== */
        h1 {
            color: #172b4d;
            font-size: 26px;
            margin-bottom: 8px;
        }

        .description {
            color: #536174;
            font-size: 14px;
            margin-bottom: 25px;
        }

        /* ==============================
           TABLE WRAPPER
        ============================== */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            border: 1px solid #dce9e5;
            border-radius: 12px;
        }

        /* ==============================
           TABLE
        ============================== */
        table {
            width: 100%;
            min-width: 900px;
            border-collapse: collapse;
        }

        th {
            background: #e9f8f3;
            color: #24544d;
            padding: 14px 12px;
            text-align: left;
            font-size: 13px;
            border-bottom: 1px solid #cde5df;
        }

        td {
            padding: 13px 12px;
            font-size: 13px;
            color: #344054;
            vertical-align: top;
            border-bottom: 1px solid #e2ece9;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background: #f7fcfa;
        }

        /* ==============================
           NOMOR
        ============================== */
        .no {
            color: #0f766e;
            font-weight: bold;
            text-align: center;
            width: 60px;
        }

        /* ==============================
           STATUS PASS
        ============================== */
        .status {
            text-align: center;
            width: 100px;
        }

        .pass {
            display: inline-block;
            background: #dcfce7;
            color: #166534;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        /* ==============================
           CATATAN
        ============================== */
        .note {
            margin-top: 20px;
            padding: 15px 18px;
            background: #f3faf8;
            border-left: 4px solid #14b8a6;
            border-radius: 8px;
            color: #475467;
            font-size: 13px;
        }

        /* ==============================
           MOBILE
        ============================== */
        @media (max-width: 600px) {

            body {
                padding: 20px 12px;
            }

            .container {
                padding: 20px 15px;
                border-radius: 12px;
            }

            h1 {
                font-size: 21px;
            }

            .description {
                font-size: 13px;
            }

            th,
            td {
                padding: 10px;
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <span class="label">TEST MATRIX · PERTEMUAN 6</span>

    <h1>Test Matrix KursusKu</h1>

    <p class="description">
        Pengujian fitur pendaftaran, perhitungan biaya, validasi form,
        pilihan minat, metode pembelajaran, dan fasilitas kursus pada proyek KursusKu.
    </p>

    <div class="table-wrapper">

        <table>

            <thead>
                <tr>
                    <th>NO</th>
                    <th>SKENARIO</th>
                    <th>ACTUAL</th>
                    <th>EXPECTED</th>
                    <th>STATUS</th>
                </tr>
            </thead>

            <tbody>

                <!-- 01 -->
                <tr>
                    <td class="no">01</td>
                    <td>
                        Mahasiswa + Web Dasar + 1 paket
                    </td>
                    <td>
                        Total biaya Rp 240.000
                    </td>
                    <td>
                        Total biaya sesuai pilihan kursus dan jumlah paket.
                    </td>
                    <td class="status">
                        <span class="pass">PASS</span>
                    </td>
                </tr>

                <!-- 02 -->
                <tr>
                    <td class="no">02</td>
                    <td>
                        Guru + PHP Dasar + 1 paket
                    </td>
                    <td>
                        Total biaya Rp 340.000
                    </td>
                    <td>
                        Total biaya sesuai pilihan kursus dan jumlah paket.
                    </td>
                    <td class="status">
                        <span class="pass">PASS</span>
                    </td>
                </tr>

                <!-- 03 -->
                <tr>
                    <td class="no">03</td>
                    <td>
                        Umum + Laravel Fundamental + 1 paket
                    </td>
                    <td>
                        Total biaya Rp 425.000
                    </td>
                    <td>
                        Total biaya sesuai pilihan kursus dan jumlah paket.
                    </td>
                    <td class="status">
                        <span class="pass">PASS</span>
                    </td>
                </tr>

                <!-- 04 -->
                <tr>
                    <td class="no">04</td>
                    <td>
                        Mahasiswa + Web Dasar + 2 paket
                    </td>
                    <td>
                        Total biaya Rp 480.000
                    </td>
                    <td>
                        Total biaya bertambah sesuai jumlah paket yang dipilih.
                    </td>
                    <td class="status">
                        <span class="pass">PASS</span>
                    </td>
                </tr>

                <!-- 05 -->
                <tr>
                    <td class="no">05</td>
                    <td>
                        Nama kosong
                    </td>
                    <td>
                        Browser menahan pengiriman karena field wajib.
                    </td>
                    <td>
                        Field nama wajib diisi sebelum form dapat dikirim.
                    </td>
                    <td class="status">
                        <span class="pass">PASS</span>
                    </td>
                </tr>

                <!-- 06 -->
                <tr>
                    <td class="no">06</td>
                    <td>
                        Email tidak valid
                    </td>
                    <td>
                        Browser meminta format email yang valid.
                    </td>
                    <td>
                        Form menampilkan validasi pada email yang tidak sesuai format.
                    </td>
                    <td class="status">
                        <span class="pass">PASS</span>
                    </td>
                </tr>

                <!-- 07 -->
                <tr>
                    <td class="no">07</td>
                    <td>
                        Tidak memilih minat
                    </td>
                    <td>
                        “Belum ada minat tambahan.” tanpa warning.
                    </td>
                    <td>
                        Pengguna tetap dapat melanjutkan tanpa memilih minat tambahan.
                    </td>
                    <td class="status">
                        <span class="pass">PASS</span>
                    </td>
                </tr>

                <!-- 08 -->
                <tr>
                    <td class="no">08</td>
                    <td>
                        Pilih 3 minat
                    </td>
                    <td>
                        Frontend, Database, dan Backend tampil di ringkasan.
                    </td>
                    <td>
                        Semua minat yang dipilih tampil pada halaman ringkasan.
                    </td>
                    <td class="status">
                        <span class="pass">PASS</span>
                    </td>
                </tr>

                <!-- 09 -->
                <tr>
                    <td class="no">09</td>
                    <td>
                        Metode offline
                    </td>
                    <td>
                        Tatap Muka tampil di ringkasan.
                    </td>
                    <td>
                        Pilihan metode offline ditampilkan sebagai Tatap Muka.
                    </td>
                    <td class="status">
                        <span class="pass">PASS</span>
                    </td>
                </tr>

                <!-- 10 -->
                <tr>
                    <td class="no">10</td>
                    <td>
                        Metode hybrid
                    </td>
                    <td>
                        Hybrid tampil di ringkasan.
                    </td>
                    <td>
                        Pilihan metode hybrid ditampilkan pada ringkasan.
                    </td>
                    <td class="status">
                        <span class="pass">PASS</span>
                    </td>
                </tr>

                <!-- 11 -->
                <tr>
                    <td class="no">11</td>
                    <td>
                        PHP Dasar dipilih
                    </td>
                    <td>
                        Pilihan jumlah paket tersedia dari 1 sampai 3.
                    </td>
                    <td>
                        Pengguna dapat memilih jumlah paket 1, 2, atau 3.
                    </td>
                    <td class="status">
                        <span class="pass">PASS</span>
                    </td>
                </tr>

                <!-- 12 -->
                <tr>
                    <td class="no">12</td>
                    <td>
                        Fasilitas kursus
                    </td>
                    <td>
                        Modul digital, Sertifikat penyelesaian,
                        dan Forum diskusi kelas dirender otomatis dengan foreach.
                    </td>
                    <td>
                        Semua fasilitas kursus ditampilkan secara otomatis.
                    </td>
                    <td class="status">
                        <span class="pass">PASS</span>
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

    <div class="note">
        <strong>Catatan:</strong>
        Pengujian menyesuaikan form pendaftaran, perhitungan biaya,
        ringkasan, validasi form, dan data kursus pada proyek KursusKu.
        Seluruh pengujian dinyatakan berhasil.
    </div>

</div>

</body>
</html>