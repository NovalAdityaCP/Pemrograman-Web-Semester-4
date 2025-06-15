<?php
include '../config.php';

$customers = $conn->query("SELECT * FROM customers")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_id = $_POST['customer_id'];
    $total_price = $_POST['total_price'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("INSERT INTO orders (customer_id, total_price, status) VALUES (?, ?, ?)");
    $stmt->execute([$customer_id, $total_price, $status]);

    header('Location: index.php');
}
?>

<h2>Tambah Order</h2>
<form method="POST">
    Customer:<br>
    <select name="customer_id" required>
        <?php foreach ($customers as $customer): ?>
            <option value="<?= $customer['id'] ?>"><?= htmlspecialchars($customer['name']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    Total Harga:<br>
    <input type="number" name="total_price" required><br><br>

    Status:<br>
    <select name="status" required>
        <option value="pending">Pending</option>
        <option value="completed">Completed</option>
        <option value="canceled">Canceled</option>
    </select><br><br>

    <button type="submit">Simpan</button>
</form>
<br>
<a href="index.php">Kembali</a>
