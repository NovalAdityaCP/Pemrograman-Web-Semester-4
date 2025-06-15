<?php
include '../config.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM payments WHERE id = ?");
$stmt->execute([$id]);
$payment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$payment) {
    echo "Data tidak ditemukan!";
    exit;
}


$orders = $conn->query("SELECT id FROM orders")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    $total_price = $_POST['total_price'];
    $payment_method = $_POST['payment_method'];
    $payment_status = $_POST['payment_status'];

    $stmt = $conn->prepare("UPDATE payments SET order_id = ?, total_price = ?, payment_method = ?, payment_status = ? WHERE id = ?");
    $stmt->execute([$order_id, $total_price, $payment_method, $payment_status, $id]);

    header('Location: index.php');
}
?>

<h2>Edit Payment</h2>
<form method="POST">
    Order ID:<br>
    <select name="order_id" required>
        <?php foreach ($orders as $order): ?>
            <option value="<?= $order['id'] ?>" <?= $payment['order_id'] == $order['id'] ? 'selected' : '' ?>>
                <?= $order['id'] ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    Total Harga:<br>
    <input type="number" name="total_price" value="<?= htmlspecialchars($payment['total_price']) ?>" required><br><br>

    Metode Pembayaran:<br>
    <select name="payment_method" required>
        <option value="cash" <?= $payment['payment_method'] == 'cash' ? 'selected' : '' ?>>Cash</option>
        <option value="credit_card" <?= $payment['payment_method'] == 'credit_card' ? 'selected' : '' ?>>Credit Card</option>
        <option value="e-wallet" <?= $payment['payment_method'] == 'e-wallet' ? 'selected' : '' ?>>E-Wallet</option>
    </select><br><br>

    Status Pembayaran:<br>
    <select name="payment_status" required>
        <option value="pending" <?= $payment['payment_status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
        <option value="paid" <?= $payment['payment_status'] == 'paid' ? 'selected' : '' ?>>Paid</option>
        <option value="failed" <?= $payment['payment_status'] == 'failed' ? 'selected' : '' ?>>Failed</option>
    </select><br><br>

    <button type="submit">Update</button>
</form>
<br>
<a href="index.php">Kembali</a>
