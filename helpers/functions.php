
<?php

// 1. Function untuk mengubah Celsius ke Fahrenheit
function konversiCelciusKeFahrenheit($c) {
    return ($c * 9 / 5) + 32;
}

// 2. Function untuk menentukan status nilai
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

// 3. Function untuk menghitung total belanja
function hitungTotal($harga, $jumlah) {
    return $harga * $jumlah;
}

// 4. Function untuk format Rupiah
function formatRupiah(float $angka): string {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

// 5. Function untuk mengamankan teks HTML
function e(string $nilai): string {
    return htmlspecialchars($nilai, ENT_QUOTES, 'UTF-8');
}

// 6. Function untuk menghitung diskon
function hitungDiskon($harga, $persen) {
    return $harga * ($persen / 100);
}

// 7. Function untuk validasi email
function validasiEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// 8. Function untuk meringkas teks
function ringkasTeks($teks, $batas = 50) {
    if (strlen($teks) > $batas) {
        return substr($teks, 0, $batas) . '...';
    }

    return $teks;
}

function setFlash($pesan) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION['flash'] = $pesan;
}

function getFlash() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['flash'])) {
        $pesan = $_SESSION['flash'];
        unset($_SESSION['flash']);

        return $pesan;
    }

    return null;
}

function set_flash(string $type, string $msg): void {
    if (session_status() === PHP_SESSION_NONE) session_start();
    $_SESSION['flash'] = ['type' => $type, 'msg' => $msg];
}

function show_flash(): void {
    if (session_status() === PHP_SESSION_NONE) session_start();
    if (!empty($_SESSION['flash'])) {
        $type = htmlspecialchars($_SESSION['flash']['type'], ENT_QUOTES, 'UTF-8');
        $msg  = htmlspecialchars($_SESSION['flash']['msg'], ENT_QUOTES, 'UTF-8');
        echo "<div class='alert alert-{$type}'>{$msg}</div>";
        unset($_SESSION['flash']);
    }
}

function cek_login(): void {
    if (session_status() === PHP_SESSION_NONE) session_start();
    if (empty($_SESSION['login'])) { // sesuaikan nama session login kamu
        set_flash('error', 'Silakan login terlebih dahulu.');
        header('Location: index.php?page=auth/login');
        exit;
    }
}