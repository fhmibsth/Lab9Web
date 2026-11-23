
<?php
require_once __DIR__ . '/helpers/functions.php';
require_once __DIR__ . '/config/database.php';


$routes = [
    // Halaman utama
    'dashboard' => __DIR__ . '/views/dashboard.php',
    'home'      => __DIR__ . '/views/home.php',
    'profil'     => __DIR__ . '/views/profil.php',
    'kontak'    => __DIR__ . '/views/kontak.php',

    // Modul pengguna
    'user/list' => __DIR__ . '/modules/user/list.php',
    'user/add'  => __DIR__ . '/modules/user/add.php',
    'user/edit' => __DIR__ . '/modules/user/edit.php',

    // Modul barang
    'barang/list'   => __DIR__ . '/modules/barang/list.php',
    'barang/add'    => __DIR__ . '/modules/barang/add.php',
    'barang/edit'   => __DIR__ . '/modules/barang/edit.php',
    'barang/delete' => __DIR__ . '/modules/barang/delete.php',

];


$page = $_GET['page'] ?? 'dashboard';

if (!is_string($page) || !array_key_exists($page, $routes)) {
    http_response_code(404);
    $contentFile = __DIR__ . '/views/404.php';
} else {
    $contentFile = $routes[$page];
}

require_once __DIR__ . '/views/header.php';

require $contentFile;

require_once __DIR__ . '/views/footer.php';
?>
