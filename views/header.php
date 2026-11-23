<?php
$page = $_GET['page'] ?? 'dashboard';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi PHP Modular</title>
    <link rel="stylesheet" href="/lab9_php_modular/assets/css/style.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Aplikasi PHP Modular</h1>
        <p>Praktikum Pemrograman Web</p>
    </header>

    <nav>
        <a href="index.php?page=dashboard" class="<?= $page === 'dashboard' ? 'active' : '' ?>">Dashboard</a>
        <a href="index.php?page=home" class="<?= $page === 'home' ? 'active' : '' ?>">Home</a>
        <a href="index.php?page=profil" class="<?= $page === 'profil' ? 'active' : '' ?>">Profil</a>
        <a href="index.php?page=kontak" class="<?= $page === 'kontak' ? 'active' : '' ?>">Kontak</a>
        <a href="index.php?page=user/list" class="<?= ($page === 'user/list' || $page === 'user/edit') ? 'active' : '' ?>">Data Pengguna</a>
        <a href="index.php?page=user/add" class="<?= $page === 'user/add' ? 'active' : '' ?>">Tambah Pengguna</a>
        <a href="index.php?page=barang/list" class="<?= str_starts_with($page, 'barang') ? 'active' : '' ?>">Data Barang</a>
    </nav>