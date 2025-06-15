<?php
include '../config.php';

$result = $conn->query("
    SELECT orders.id, orders.customer_id, customers.name AS customer_name, orders.total_price, orders.status 
    FROM orders 
    JOIN customers ON orders.customer_id = customers.id
");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
</head>
<body>
    <h2>Daftar Pesanan</h2>
    <a href="add.php">Tambah Pesanan</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Customer ID</th>
            <th>Nama Pelanggan</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['customer_id'] ?></td> 
            <td><?= $row['customer_name'] ?></td> 
            <td><?= $row['total_price'] ?></td>
            <td><?= $row['status'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
