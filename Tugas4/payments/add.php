<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    $payment_method = $_POST['payment_method'];

    $order = $conn->query("SELECT total_price FROM orders WHERE id = '$order_id'")->fetch_assoc();
    $total_price = $order['total_price'];

    $conn->query("INSERT INTO payments (order_id, total_price, payment_method, payment_status, time) 
                  VALUES ('$order_id', '$total_price', '$payment_method', 'pending', NOW())");

    header("Location: index.php");
}

$orders = $conn->query("SELECT * FROM orders WHERE status = 'pending'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pembayaran</title>
</head>
<body>
    <h2>Tambah Pembayaran</h2>
    <form method="POST">
        <label>Order:</label>
        <select name="order_id">
            <?php while ($row = $orders->fetch_assoc()) { ?>
                <option value="<?= $row['id'] ?>">Order #<?= $row['id'] ?> - Total: Rp<?= $row['total_price'] ?></option>
            <?php } ?>
        </select><br>

        <label>Metode Pembayaran:</label>
        <select name="payment_method">
            <option value="cash">Cash</option>
            <option value="credit_card">Credit Card</option>
            <option value="e-wallet">E-Wallet</option>
        </select><br>

        <button type="submit">Tambah</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>
