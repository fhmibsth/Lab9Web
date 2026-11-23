<?php
require_once __DIR__ . '/../../config/database.php';

$id = (int) ($_GET['id'] ?? 0);

$stmt = mysqli_prepare(
    $conn,
    "SELECT * FROM data_barang WHERE id_barang = ?"
);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "<h2>Data barang tidak ditemukan.</h2>";
    return;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama       = $_POST['nama'] ?? '';
    $kategori   = $_POST['kategori'] ?? '';
    $harga_jual = (int) ($_POST['harga_jual'] ?? 0);
    $harga_beli = (int) ($_POST['harga_beli'] ?? 0);
    $stok       = (int) ($_POST['stok'] ?? 0);

    $gambar = $data['gambar'];

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
        "UPDATE data_barang
         SET nama=?, kategori=?, harga_jual=?, harga_beli=?,
             stok=?, gambar=?
         WHERE id_barang=?"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "ssiiisi",
        $nama,
        $kategori,
        $harga_jual,
        $harga_beli,
        $stok,
        $gambar,
        $id
    );

    mysqli_stmt_execute($stmt);

    header('Location: /lab9_php_modular/barang/list');
    exit;
}
?>

<h2>Ubah Barang</h2>

<form method="post"
      action="/lab9_php_modular/index.php?page=barang/edit&id=<?php echo $id; ?>"
      enctype="multipart/form-data">

    <p>
        <label>Nama Barang</label><br>
        <input type="text" name="nama"
               value="<?php echo htmlspecialchars($data['nama']); ?>"
               required>
    </p>

    <p>
        <label>Kategori</label><br>
        <select name="kategori">
            <?php
            $kategoriList = ['Komputer', 'Elektronik', 'Hand Phone'];
            foreach ($kategoriList as $kategori):
            ?>
                <option value="<?php echo $kategori; ?>"
                    <?php echo $data['kategori'] === $kategori ? 'selected' : ''; ?>>
                    <?php echo $kategori; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>
        <label>Harga Jual</label><br>
        <input type="number" name="harga_jual"
               value="<?php echo $data['harga_jual']; ?>" required>
    </p>

    <p>
        <label>Harga Beli</label><br>
        <input type="number" name="harga_beli"
               value="<?php echo $data['harga_beli']; ?>" required>
    </p>

    <p>
        <label>Stok</label><br>
        <input type="number" name="stok"
               value="<?php echo $data['stok']; ?>" required>
    </p>

    <p>
        <label>Gambar Baru (opsional)</label><br>
        <input type="file" name="file_gambar" accept="image/*">
    </p>

    <button type="submit">Simpan Perubahan</button>
    <a href="/lab9_php_modular/barang/list">Kembali</a>
</form>
