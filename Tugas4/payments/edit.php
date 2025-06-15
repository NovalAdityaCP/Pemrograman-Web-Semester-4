<?php
include '../config.php';
$id = $_GET['id'];
$payment = $conn->query("SELECT * FROM payments WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['payment_status'];
    $conn->query("UPDATE payments SET payment_status='$status' WHERE id=$id");
    header("Location: index.php");
}
?>
<form method="POST">
    Status:
    <select name="payment_status">
        <option value="pending" <?= $payment['payment_status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
        <option value="paid" <?= $payment['payment_status'] == 'paid' ? 'selected' : '' ?>>Paid</option>
        <option value="failed" <?= $payment['payment_status'] == 'failed' ? 'selected' : '' ?>>Failed</option>
    </select><br>
    <button type="submit">Update</button>
    <a href="index.php">Kembali</a>
</form>
