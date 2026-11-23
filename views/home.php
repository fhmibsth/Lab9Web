<section>
    <h2>Halaman Home</h2>

    <p>
        Selamat datang di aplikasi PHP Modular.
        Aplikasi ini dibuat untuk mempraktikkan
        penggunaan template dan modularisasi PHP.
    </p>
</section>

<?php
require_once __DIR__ . '/../helpers/functions.php';

$harga = 150000;
$diskon = hitungDiskon($harga, 10);
$total = $harga - $diskon;

$email = "admin@gmail.com";
?>

<section>
    <h2>Contoh Penggunaan Function</h2>

    <p>Harga: <?= formatRupiah($harga); ?></p>

    <p>Diskon: <?= formatRupiah($diskon); ?></p>

    <p>Total: <?= formatRupiah($total); ?></p>

    <p>
        Status Email:
        <?= validasiEmail($email) ? 'Valid' : 'Tidak Valid'; ?>
    </p>

    <p>
        Ringkasan:
        <?= htmlspecialchars(ringkasTeks(
            'Ini adalah contoh penggunaan function PHP modular.',
            30
        )); ?>
    </p>
</section>