<?php
include '../config.php';

$orders = $conn->query("SELECT id FROM orders")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    $total_price = $_POST['total_price'];
    $payment_method = $_POST['payment_method'];
    $payment_status = $_POST['payment_status'];

    $stmt = $conn->prepare("INSERT INTO payments (order_id, total_price, payment_method, payment_status) VALUES (?, ?, ?, ?)");
    $stmt->execute([$order_id, $total_price, $payment_method, $payment_status]);

    header('Location: index.php');
}
?>

<h2>Tambah Payment</h2>
<form method="POST">
    Order ID:<br>
    <select name="order_id" required>
        <?php foreach ($orders as $order): ?>
            <option value="<?= $order['id'] ?>"><?= $order['id'] ?></option>
        <?php endforeach; ?>
    </select><br><br>

    Total Harga:<br>
    <input type="number" name="total_price" required><br><br>

    Metode Pembayaran:<br>
    <select name="payment_method" required>
        <option value="cash">Cash</option>
        <option value="credit_card">Credit Card</option>
        <option value="e-wallet">E-Wallet</option>
    </select><br><br>

    Status Pembayaran:<br>
    <select name="payment_status" required>
        <option value="pending">Pending</option>
        <option value="paid">Paid</option>
        <option value="failed">Failed</option>
    </select><br><br>

    <button type="submit">Simpan</button>
</form>
<br>
<a href="index.php">Kembali</a>
