<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Kursus - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        body {
            background: #eef8f7;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 30px 20px;
            color: #172b4d;
        }

        .form-card {
            max-width: 750px;
            margin: 0 auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .eyebrow {
            color: #087f79;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1.5px;
            margin-bottom: 15px;
            margin-top: 0;
        }

        h1 {
            color: #172b4d;
            font-size: 32px;
            margin: 0 0 15px 0;
            font-weight: bold;
        }

        .description {
            color: #344563;
            font-size: 15px;
            margin-bottom: 30px;
            line-height: 1.5;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 18px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #172b4d;
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 15px;
        }

        input[type="text"],
        input[type="email"],
        select,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background: #ffffff;
            color: #172b4d;
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #087f79;
            box-shadow: 0 0 0 2px rgba(8, 127, 121, 0.1);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        fieldset {
            border: 1px solid #d9e2ec;
            border-radius: 10px;
            padding: 15px;
            margin: 0 0 20px 0;
        }

        fieldset legend {
            padding: 0 8px;
            font-weight: bold;
            color: #172b4d;
            font-size: 15px;
        }

        .choice {
            display: inline-flex;
            align-items: center;
            margin-right: 18px;
            margin-bottom: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .choice input {
            margin-right: 6px;
            accent-color: #087f79;
        }

        .char-info {
            font-size: 12px;
            color: #64748b;
            margin-top: 5px;
            margin-bottom: 0;
        }

        .button-group {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 30px;
        }

        .btn-primary {
            border: none;
            background: #087f79;
            color: #ffffff;
            padding: 14px 24px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            font-family: Arial, Helvetica, sans-serif;
            transition: background 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary:hover {
            background: #066a65;
        }

        @media (max-width: 600px) {
            .form-card { padding: 25px 20px; }
            .form-grid { grid-template-columns: 1fr; }
            h1 { font-size: 26px; }
            .button-group { flex-direction: column; }
            .btn-primary { width: 100%; text-align: center; }
        }
    </style>
</head>

<body>

<main>
    <section class="form-card">

        <!-- JUDUL -->
        <p class="eyebrow">MILESTONE 5 · FORM + get</p>

        <h1>Mulai belajar bersama KursusKu</h1>

        <p class="description">
            Gunakan data latihan. Field bertanda wajib harus diisi. Method akhir form adalah get.
        </p>

        <!-- FORM -->
        <form action="process-registration.php" method="get">

            <!-- NAMA LENGKAP & EMAIL -->
            <div class="form-grid">
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
            </div>

            <!-- NOMOR HP & PROGRAM STUDI -->
            <div class="form-grid">
                <div class="form-group">
                    <label for="phone">Nomor HP</label>
                    <input type="text" id="phone" name="phone" placeholder="Contoh: 081234567890" required>
                </div>

                <div class="form-group">
                    <label for="study">Program Studi</label>
                    <input type="text" id="study" name="study" required>
                </div>
            </div>

            <!-- KURSUS YANG DIPILIH -->
            <div class="form-group">
                <label for="course">Kursus yang Dipilih</label>
                <select id="course" name="course" required>
                    <option value="">-- Pilih kursus --</option>
                    <option value="web-dasar">Web Dasar</option>
                    <option value="php-dasar">PHP Dasar</option>
                    <option value="laravel-dasar">Laravel Dasar</option>
                </select>
            </div>

            <!-- JENIS PESERTA -->
            <fieldset>
                <legend>Jenis Peserta</legend>
                <label class="choice">
                    <input type="radio" name="participant_type" value="mahasiswa" required>
                    Mahasiswa
                </label>
                <label class="choice">
                    <input type="radio" name="participant_type" value="umum">
                    Umum
                </label>
            </fieldset>

            <!-- MINAT TAMBAHAN -->
            <fieldset>
                <legend>Minat Tambahan</legend>
                <label class="choice">
                    <input type="checkbox" name="interests[]" value="ui-ux">
                    UI/UX
                </label>
                <label class="choice">
                    <input type="checkbox" name="interests[]" value="database">
                    Database
                </label>
                <label class="choice">
                    <input type="checkbox" name="interests[]" value="backend">
                    Backend
                </label>
            </fieldset>

            <!-- CATATAN -->
            <div class="form-group">
                <label for="note">Catatan</label>
                <textarea id="note" name="note" rows="5" maxlength="300" placeholder="Tuliskan kebutuhan belajar Anda (opsional)"></textarea>
                <p class="char-info">Maksimal 300 karakter.</p>
            </div>

            <!-- TOMBOL -->
            <div class="button-group">
                <button class="btn-primary" type="submit">Kirim Pendaftaran</button>
                <button class="btn-primary" type="button" onclick="window.location.href='experiment-get.php'">Eksperimen GET</button>
                <button class="btn-primary" type="button" onclick="window.location.href='index.php'">Beranda</button>
            </div>

        </form>

    </section>
</main>

</body>
</html>