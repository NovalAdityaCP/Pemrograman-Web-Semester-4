<?php
include '../config.php';

$stmt = $conn->query("SELECT orders.*, customers.name AS customer_name FROM orders JOIN customers ON orders.customer_id = customers.id");
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Data Orders</h2>
<a href="add.php">Tambah Order</a>
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order): ?>
        <tr>
            <td><?= htmlspecialchars($order['id']) ?></td>
            <td><?= htmlspecialchars($order['customer_name']) ?></td>
            <td><?= htmlspecialchars($order['total_price']) ?></td>
            <td><?= htmlspecialchars($order['status']) ?></td>
            <td>
                <a href="edit.php?id=<?= $order['id'] ?>">Edit</a> |
                <a href="delete.php?id=<?= $order['id'] ?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
