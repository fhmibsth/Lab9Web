<?php
require_once __DIR__ . '/../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama       = $_POST['nama'] ?? '';
    $kategori   = $_POST['kategori'] ?? '';
    $harga_jual = (int) ($_POST['harga_jual'] ?? 0);
    $harga_beli = (int) ($_POST['harga_beli'] ?? 0);
    $stok       = (int) ($_POST['stok'] ?? 0);

    $gambar = '';

    if (isset($_FILES['file_gambar']) &&
        $_FILES['file_gambar']['error'] === UPLOAD_ERR_OK) {

        $folder = __DIR__ . '/../../gambar/';

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $namaFile = basename($_FILES['file_gambar']['name']);
        $namaFile = preg_replace('/[^A-Za-z0-9._-]/', '_', $namaFile);
        $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

        if (in_array($ekstensi, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $namaFile = uniqid() . '_' . $namaFile;

            if (move_uploaded_file(
                $_FILES['file_gambar']['tmp_name'],
                $folder . $namaFile
            )) {
                $gambar = 'gambar/' . $namaFile;
            }
        }
    }

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO data_barang
        (nama, kategori, harga_jual, harga_beli, stok, gambar)
        VALUES (?, ?, ?, ?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "ssiiis",
        $nama,
        $kategori,
        $harga_jual,
        $harga_beli,
        $stok,
        $gambar
    );

    mysqli_stmt_execute($stmt);

    header('Location: /lab9_php_modular/barang/list');
    exit;
}
?>

<h2>Tambah Barang</h2>

<form method="post"
      action="/lab9_php_modular/index.php?page=barang/add"
      enctype="multipart/form-data">

    <p>
        <label>Nama Barang</label><br>
        <input type="text" name="nama" required>
    </p>

    <p>
        <label>Kategori</label><br>
        <select name="kategori" required>
            <option value="Komputer">Komputer</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Hand Phone">Hand Phone</option>
        </select>
    </p>

    <p>
        <label>Harga Jual</label><br>
        <input type="number" name="harga_jual" required>
    </p>

    <p>
        <label>Harga Beli</label><br>
        <input type="number" name="harga_beli" required>
    </p>

    <p>
        <label>Stok</label><br>
        <input type="number" name="stok" required>
    </p>

    <p>
        <label>File Gambar</label><br>
        <input type="file" name="file_gambar" accept="image/*">
    </p>

    <button type="submit">Simpan</button>
    <a href="/lab9_php_modular/barang/list">Kembali</a>
</form>
