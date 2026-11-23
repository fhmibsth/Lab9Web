<?php

// Memanggil file helper
require_once __DIR__ . '/helpers/functions.php';

// Daftar halaman yang diizinkan
$routes = [
    
];

// Membaca parameter URL
$routes = [
    'dashboard' => __DIR__ . '/views/dashboard.php',
    'home' => __DIR__ . '/views/home.php',
    'about' => __DIR__ . '/views/about.php',
    'kontak' => __DIR__ . '/views/kontak.php',
    'user/list' => __DIR__ . '/modules/user/list.php',
    'user/add' => __DIR__ . '/modules/user/add.php',
    'user/edit' => __DIR__ . '/modules/user/edit.php',
];

$page = $_GET['page'] ?? 'dashboard';

// Memeriksa halaman yang diminta
if (!is_string($page) || !array_key_exists($page, $routes)) {

    http_response_code(404);
    $contentFile = __DIR__ . '/views/404.php';

} else {

    $contentFile = $routes[$page];

}

// Memanggil template header
require_once __DIR__ . '/views/header.php';

// Memanggil halaman sesuai route
require $contentFile;

// Memanggil template footer
require_once __DIR__ . '/views/footer.php';

?>
