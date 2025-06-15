<?php
include '../config.php';
$result = $conn->query("SELECT * FROM customers");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customers</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Daftar pelanggan</h2>
    <a href="add.php">Tambah Pelanggan</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Nomor Telepon</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['phone_number'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
