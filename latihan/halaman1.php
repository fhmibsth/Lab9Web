
<?php
require_once __DIR__ . '/../helpers/functions.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan Function 1</title>
</head>
<body>

    <h2>Latihan Function PHP</h2>

    <h3>1. Konversi Celsius ke Fahrenheit</h3>

    <?php
    $suhu = 30;
    $hasil = konversiCelciusKeFahrenheit($suhu);

    echo $suhu . " Celsius = " . $hasil . " Fahrenheit";
    ?>

    <h3>2. Menentukan Status Nilai</h3>

    <?php
    $nilai = 90;
    $status = tentukanStatusNilai($nilai);

    echo "Nilai: " . $nilai . "<br>";
    echo "Predikat: " . e($status);
    ?>

</body>
</html>
