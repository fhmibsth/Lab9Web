
<?php
require_once __DIR__ . '/../helpers/functions.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan Function 2</title>
</head>
<body>

    <h2>Menghitung Total Belanja</h2>

    <?php
    $harga = 15000;
    $jumlah = 4;

    $total = hitungTotal($harga, $jumlah);

    echo "Harga Barang: " . formatRupiah($harga) . "<br>";
    echo "Jumlah Barang: " . $jumlah . "<br>";
    echo "Total Belanja: " . formatRupiah($total);
    ?>

</body>
</html>
