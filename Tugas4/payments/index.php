<?php
include '../config.php';

$payments = $conn->query("SELECT payments.*, orders.customer_id 
                          FROM payments 
                          JOIN orders ON payments.order_id = orders.id");
                          
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payments</title>
</head>
<body>
    <h2>Daftar Pembayaran</h2>
    <a href="add.php">Tambah Pembayaran</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Order ID</th>
            <th>Customer ID</th>
            <th>Total Price</th>
            <th>Payment Method</th>
            <th>Payment Status</th>
            <th>Time</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $payments->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['order_id'] ?></td>
                <td><?= $row['customer_id'] ?></td>
                <td>Rp<?= number_format($row['total_price'], 0, ',', '.') ?></td>
                <td><?= ucfirst($row['payment_method']) ?></td>
                <td><?= ucfirst($row['payment_status']) ?></td>
                <td><?= $row['time'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus pembayaran ini?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <a href="../index.php">Kembali ke Dashboard</a>
</body>
</html>
