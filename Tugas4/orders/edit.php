<?php
include '../config.php';

$id = $_GET['id'];
$order = $conn->query("SELECT * FROM orders WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];
    $conn->query("UPDATE orders SET status='$status' WHERE id=$id");
    header("Location: index.php");
}
?>
<form method="POST">
    <label>Status:</label>
    <select name="status">
        <option value="pending" <?= $order['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
        <option value="completed" <?= $order['status'] == 'completed' ? 'selected' : '' ?>>Completed</option>
        <option value="canceled" <?= $order['status'] == 'canceled' ? 'selected' : '' ?>>Canceled</option>
    </select><br>
    <button type="submit">Update</button>
    <a href="index.php">Kembali</a>
</form>
