<?php
include '../config.php';

$query = "SELECT order_details.*, orders.id AS order_number, menu.name AS menu_name
          FROM order_details
          JOIN orders ON order_details.order_id = orders.id
          JOIN menu ON order_details.menu_id = menu.id";
$stmt = $conn->query($query);
$orderDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Data Order Details</h2>
<a href="add.php">Tambah Detail Order</a>
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Order ID</th>
            <th>Menu</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orderDetails as $detail): ?>
        <tr>
            <td><?= htmlspecialchars($detail['id']) ?></td>
            <td><?= htmlspecialchars($detail['order_number']) ?></td>
            <td><?= htmlspecialchars($detail['menu_name']) ?></td>
            <td><?= htmlspecialchars($detail['quantity']) ?></td>
            <td><?= htmlspecialchars($detail['price']) ?></td>
            <td><?= htmlspecialchars($detail['total_price']) ?></td>
            <td>
                <a href="edit.php?id=<?= $detail['id'] ?>">Edit</a> |
                <a href="delete.php?id=<?= $detail['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
