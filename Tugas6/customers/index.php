<?php
include '../config.php';
$stmt = $conn->query("SELECT * FROM customers");
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>No Telepon</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($customers as $row) { ?>
    <tr>
        <td><?= htmlspecialchars($row['id']) ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['phone_number']) ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus data?')">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
<a href="add.php">Tambah Customer</a>
