<?php
include '../config.php';

$stmt = $conn->query("SELECT * FROM menu");
$menus = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Data Menu</h2>
<a href="add.php">Tambah Menu</a>
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Menu</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($menus as $menu): ?>
        <tr>
            <td><?= htmlspecialchars($menu['id']) ?></td>
            <td><?= htmlspecialchars($menu['name']) ?></td>
            <td><?= htmlspecialchars($menu['description']) ?></td>
            <td><?= htmlspecialchars($menu['price']) ?></td>
            <td>
                <a href="edit.php?id=<?= $menu['id'] ?>">Edit</a> |
                <a href="delete.php?id=<?= $menu['id'] ?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
