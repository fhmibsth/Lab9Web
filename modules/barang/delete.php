<?php
require_once __DIR__ . '/../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Metode tidak diizinkan.');
}

$id = (int) ($_POST['id'] ?? 0);

$stmt = mysqli_prepare(
    $conn,
    "DELETE FROM data_barang WHERE id_barang = ?"
);

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

header('Location: /lab9_php_modular/barang/list');
exit;
?>
