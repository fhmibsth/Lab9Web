<?php
require_once __DIR__ . '/../../config/database.php';

$sql = "SELECT * FROM data_barang ORDER BY id_barang DESC";
$result = mysqli_query($conn, $sql);
?>

<h2>Data Barang</h2>

<p>
    <a href="/lab9_php_modular/barang/add">
        + Tambah Barang
    </a>
</p>

<table border="1" cellpadding="10" cellspacing="0" width="100%">
    <tr>
        <th>Gambar</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Harga Jual</th>
        <th>Harga Beli</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    <?php if ($result && mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td>
                    <?php if (!empty($row['gambar'])): ?>
                        <img
                            src="/lab9_php_modular/<?php echo htmlspecialchars($row['gambar']); ?>"
                            width="70"
                            alt="Gambar barang"
                        >
                    <?php else: ?>
                        Tidak ada gambar
                    <?php endif; ?>
                </td>

                <td><?php echo htmlspecialchars($row['nama']); ?></td>
                <td><?php echo htmlspecialchars($row['kategori']); ?></td>
                <td>Rp <?php echo number_format($row['harga_jual'], 0, ',', '.'); ?></td>
                <td>Rp <?php echo number_format($row['harga_beli'], 0, ',', '.'); ?></td>
                <td><?php echo htmlspecialchars($row['stok']); ?></td>

                <td>
                    <a href="/lab9_php_modular/barang/edit?id=<?php echo $row['id_barang']; ?>">
                        Ubah
                    </a>

                    <form method="post"
                          action="/lab9_php_modular/index.php?page=barang/delete"
                          onsubmit="return confirm('Yakin ingin menghapus barang ini?');">
                        <input type="hidden" name="id"
                               value="<?php echo $row['id_barang']; ?>">
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="7">Belum ada data barang.</td>
        </tr>
    <?php endif; ?>
</table>
