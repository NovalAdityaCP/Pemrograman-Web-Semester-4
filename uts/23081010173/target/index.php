<?php
include '../conn.php';
$result = $conn->query("SELECT * FROM target");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Target</title>
</head>
<body>
    <h2>Daftar Target</h2>
    <a href="add.php">Tambah Target</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Jumlah Target</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row['id_target'] ?></td>
                <td><?= $row['jumlah_target'] ?></td>
                <td>
                    <a href="update.php?id_target<?= $row['id_target'] ?>">Edit</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
