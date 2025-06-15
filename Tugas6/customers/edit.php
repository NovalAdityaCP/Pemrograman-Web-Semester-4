<?php
include '../config.php';
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM customers WHERE id = ?");
$stmt->execute([$id]);
$customer = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone_number'];

    $update = $conn->prepare("UPDATE customers SET name = ?, phone_number = ? WHERE id = ?");
    $update->execute([$name, $phone, $id]);

    header("Location: index.php");
}
?>
<form method="POST">
    Nama: <input type="text" name="name" value="<?= htmlspecialchars($customer['name']) ?>" required><br>
    No Telepon: <input type="text" name="phone_number" value="<?= htmlspecialchars($customer['phone_number']) ?>" required><br>
    <button type="submit">Update</button>
</form>
