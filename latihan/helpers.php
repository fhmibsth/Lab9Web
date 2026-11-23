
<?php

// Function untuk mengubah Celsius ke Fahrenheit
function konversiCelciusKeFahrenheit($c) {
    return ($c * 9 / 5) + 32;
}

// Function untuk menentukan status nilai
function tentukanStatusNilai($nilai) {
    if ($nilai >= 85) {
        return "A (Sangat Baik)";
    } elseif ($nilai >= 75) {
        return "B (Baik)";
    } elseif ($nilai >= 65) {
        return "C (Cukup)";
    } else {
        return "D (Kurang)";
    }
}

// Function untuk menghitung total belanja
function hitungTotal($harga, $jumlah) {
    return $harga * $jumlah;
}

// Function untuk format Rupiah
function formatRupiah(float $angka): string {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

// Function untuk mengamankan teks HTML
function e(string $nilai): string {
    return htmlspecialchars($nilai, ENT_QUOTES, 'UTF-8');
}

?>
