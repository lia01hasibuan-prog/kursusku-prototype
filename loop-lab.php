<?php
require_once __DIR__ . '/helpers.php';

$forItems = [];
for ($i = 1; $i <= 3; $i++) {
    $forItems[] = "Paket ke-$i";
}

$whileItems = [];
$i = 1;
while ($i <= 3) {
    $whileItems[] = "While ke-$i";
    $i++;
}

$doWhileItems = [];
$i = 1;
do {
    $doWhileItems[] = "Percobaan ke-$i";
    $i++;
} while ($i <= 3);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loop Lab - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .loop-container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0,0,0,.06);
        }
        .loop-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin: 25px 0;
        }
        .loop-card {
            background: #eef8f7;
            border: 1px solid #d9f3ec;
            border-radius: 12px;
            padding: 20px;
        }
        .loop-card h2 {
            color: #087f79;
            margin-bottom: 12px;
        }
        .loop-card p {
            margin: 8px 0;
        }
        .loop-button {
            display: inline-block;
            background: #087f79;
            color: white;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 7px;
        }
        @media (max-width: 700px) {
            .loop-grid {
                grid-template-columns: 1fr;
            }
            .loop-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
<main>
    <section class="loop-container">
        <p class="eyebrow">MILESTONE 6 · LOOPING</p>
        <h1>Loop Lab</h1>
        <p class="description">
            Contoh penggunaan perulangan for, while, dan do-while dalam PHP.
        </p>

        <div class="loop-grid">
            <article class="loop-card">
                <h2>Perulangan for</h2>
                <?php foreach ($forItems as $item): ?>
                    <p><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?></p>
                <?php endforeach; ?>
            </article>

            <article class="loop-card">
                <h2>Perulangan while</h2>
                <?php foreach ($whileItems as $item): ?>
                    <p><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?></p>
                <?php endforeach; ?>
            </article>

            <article class="loop-card">
                <h2>Perulangan do-while</h2>
                <?php foreach ($doWhileItems as $item): ?>
                    <p><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?></p>
                <?php endforeach; ?>
            </article>
        </div>

        <a class="loop-button" href="index.php">Kembali ke Beranda</a>
    </section>
</main>
</body>
</html>
