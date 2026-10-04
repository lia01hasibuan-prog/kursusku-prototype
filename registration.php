<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Daftar Kursus - KursusKu</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>


<body>

<main class="container">

    <section class="form-card">

        <!-- =========================
             JUDUL
        ========================== -->

        <p class="eyebrow">
            MILESTONE 6 · FORM LANJUTAN
        </p>

        <h1>
            Daftar Kursus
        </h1>

        <p class="description">
            Alur: landing page → form → proses PHP → ringkasan.
            Belum memakai database.
        </p>


        <!-- =========================
             FORM
        ========================== -->

        <form
            action="process-registration.php"
            method="POST"
        >

            <input
                type="hidden"
                name="source"
                value="week-06"
            >


            <!-- =========================
                 NAMA & EMAIL
            ========================== -->

            <div class="form-grid">

                <div class="form-group">

                    <label for="name">
                        Nama lengkap
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        required
                    >

                </div>

            </div>


            <!-- =========================
                 PILIH KURSUS
            ========================== -->

            <div class="form-group">

                <label for="course">
                    Pilih kursus
                </label>

                <select
                    id="course"
                    name="course"
                    required
                >

                    <option value="">
                        -- Pilih kursus --
                    </option>

                    <option value="web-dasar">
                        Web Dasar
                    </option>

                    <option value="php-dasar">
                        PHP Dasar
                    </option>

                    <option value="laravel-dasar">
                        Laravel Dasar
                    </option>

                </select>

            </div>


            <!-- =========================
                 TIPE PESERTA
            ========================== -->

            <fieldset>

                <legend>
                    Tipe peserta
                </legend>


                <label class="choice">

                    <input
                        type="radio"
                        name="participant_type"
                        value="mahasiswa"
                        required
                    >

                    Mahasiswa

                </label>


                <label class="choice">

                    <input
                        type="radio"
                        name="participant_type"
                        value="guru"
                    >

                    Guru

                </label>


                <label class="choice">

                    <input
                        type="radio"
                        name="participant_type"
                        value="umum"
                    >

                    Umum

                </label>

            </fieldset>


            <!-- =========================
                 MINAT BELAJAR
            ========================== -->

            <fieldset>

                <legend>
                    Minat belajar
                </legend>


                <label class="choice">

                    <input
                        type="checkbox"
                        name="interests[]"
                        value="frontend"
                    >

                    Frontend

                </label>


                <label class="choice">

                    <input
                        type="checkbox"
                        name="interests[]"
                        value="backend"
                    >

                    Backend

                </label>


                <label class="choice">

                    <input
                        type="checkbox"
                        name="interests[]"
                        value="database"
                    >

                    Database

                </label>


                <label class="choice">

                    <input
                        type="checkbox"
                        name="interests[]"
                        value="ui-ux"
                    >

                    UI/UX

                </label>

            </fieldset>


            <!-- =========================
                 METODE & JUMLAH PAKET
            ========================== -->

            <div class="form-grid">


                <div class="form-group">

                    <label for="method">
                        Metode belajar
                    </label>


                    <select
                        id="method"
                        name="method"
                        required
                    >

                        <option value="">
                            -- Pilih metode --
                        </option>

                        <option value="online">
                            Online
                        </option>

                        <option value="offline">
                            Offline
                        </option>

                        <option value="hybrid">
                            Hybrid
                        </option>

                    </select>

                </div>


                <div class="form-group">

                    <label for="package">
                        Jumlah paket
                    </label>


                    <select
                        id="package"
                        name="package"
                        required
                    >

                        <option value="1">
                            1 paket
                        </option>

                        <option value="2">
                            2 paket
                        </option>

                        <option value="3">
                            3 paket
                        </option>

                    </select>

                </div>

            </div>


            <!-- =========================
                 CATATAN
            ========================== -->

            <div class="form-group">

                <label for="note">
                    Catatan tambahan
                </label>


                <textarea
                    id="note"
                    name="note"
                    rows="5"
                    maxlength="300"
                    placeholder="Tuliskan kebutuhan belajar Anda (opsional)"
                ></textarea>

            </div>


            <!-- =========================
                 TOMBOL
            ========================== -->

            <div class="button-group">


                <button
                    class="btn-primary"
                    type="submit"
                >
                    Proses Pendaftaran
                </button>


                <button
                    class="btn-primary"
                    type="button"
                    onclick="alert('History Dummy')"
                >
                    History Dummy
                </button>


                <button
                    class="btn-primary"
                    type="button"
                    onclick="alert('Loop Lab')"
                >
                    Loop Lab
                </button>

            </div>

        </form>


        <!-- =========================
             FASILITAS
        ========================== -->

        <section class="facility-box">

            <h3>
                Fasilitas
            </h3>


            <ul>

                <li>
                    Materi pembelajaran
                </li>

                <li>
                    Video pembelajaran
                </li>

                <li>
                    Latihan dan tugas
                </li>

                <li>
                    Sertifikat kursus
                </li>

            </ul>

        </section>

    </section>

</main>

</body>

</html>