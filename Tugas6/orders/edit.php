<?php
include '../config.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM orders WHERE id = ?");
$stmt->execute([$id]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$order) {
    echo "Order tidak ditemukan!";
    exit;
}

$customers = $conn->query("SELECT * FROM customers")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_id = $_POST['customer_id'];
    $total_price = $_POST['total_price'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE orders SET customer_id = ?, total_price = ?, status = ? WHERE id = ?");
    $stmt->execute([$customer_id, $total_price, $status, $id]);

    header('Location: index.php');
}
?>

<h2>Edit Order</h2>
<form method="POST">
    Customer:<br>
    <select name="customer_id" required>
        <?php foreach ($customers as $customer): ?>
            <option value="<?= $customer['id'] ?>" <?= $order['customer_id'] == $customer['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($customer['name']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    Total Harga:<br>
    <input type="number" name="total_price" value="<?= htmlspecialchars($order['total_price']) ?>" required><br><br>

    Status:<br>
    <select name="status" required>
        <option value="pending" <?= $order['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
        <option value="completed" <?= $order['status'] == 'completed' ? 'selected' : '' ?>>Completed</option>
        <option value="canceled" <?= $order['status'] == 'canceled' ? 'selected' : '' ?>>Canceled</option>
    </select><br><br>

    <button type="submit">Update</button>
</form>
<br>
<a href="index.php">Kembali</a>
