<?php
include '../conn.php';
$result = $conn->query("SELECT * FROM angpau");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Penerimaan Angpau</title>
</head>
<body>
    <h2>Daftar Angpau yang telah diterima</h2>
    <a href="add.php">Tambah Pemberian</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Nama Pemberi</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row['id_angpau'] ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['nama_pemberi'] ?></td>
                <td><?= $row['jumlah'] ?> </td>
                <td>
                    <a href="update.php?id_angpau<?= $row['id_angpau'] ?>">Edit</a>
                    <a href="delete.php?id_angpau<?= $row['id_angpau'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
