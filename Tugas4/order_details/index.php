<?php
include '../config.php';
$result = $conn->query("SELECT order_details.*, menu.name AS menu_name FROM order_details JOIN menu ON order_details.menu_id = menu.id");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
</head>
<body>
    <h2>Detail Pesanan</h2>
    <a href="add.php">Tambah Detail</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Menu</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['menu_name'] ?></td>
            <td><?= $row['quantity'] ?></td>
            <td><?= $row['total_price'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
