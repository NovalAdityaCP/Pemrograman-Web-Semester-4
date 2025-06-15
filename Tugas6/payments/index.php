<?php
include '../config.php';

$query = "SELECT payments.*, orders.id AS order_number 
          FROM payments
          JOIN orders ON payments.order_id = orders.id";
$stmt = $conn->query($query);
$payments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Data Payments</h2>
<a href="add.php">Tambah Payment</a>
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Order ID</th>
            <th>Total Harga</th>
            <th>Metode</th>
            <th>Status</th>
            <th>Waktu</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($payments as $payment): ?>
        <tr>
            <td><?= htmlspecialchars($payment['id']) ?></td>
            <td><?= htmlspecialchars($payment['order_number']) ?></td>
            <td><?= htmlspecialchars($payment['total_price']) ?></td>
            <td><?= htmlspecialchars($payment['payment_method']) ?></td>
            <td><?= htmlspecialchars($payment['payment_status']) ?></td>
            <td><?= htmlspecialchars($payment['time']) ?></td>
            <td>
                <a href="edit.php?id=<?= $payment['id'] ?>">Edit</a> |
                <a href="delete.php?id=<?= $payment['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
