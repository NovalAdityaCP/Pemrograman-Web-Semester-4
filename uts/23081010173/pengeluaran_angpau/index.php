<?php
include '../conn.php';
$result = $conn->query("SELECT * FROM pengeluaran_angpau");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pengeluaran Angpau</title>
</head>
<body>
    <h2>Daftar Angpau yang telah dikeluarkan</h2>
    <a href="add.php">Tambah Pengeluaran</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Deskripsi Pengeluaran</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row['id_pengeluaran'] ?></td>
                <td><?= $row['deskripsi_pengeluaran'] ?></td>
                <td><?= $row['jumlah'] ?></td>
                <td>
                    <a href="update.php?id_pengeluaran<?= $row['id_pengeluaran'] ?>">Edit</a>
                    <a href="delete.php?id_pengeluaran<?= $row['id_pengeluaran'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
