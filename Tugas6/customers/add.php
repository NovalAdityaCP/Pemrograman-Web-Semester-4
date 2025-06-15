<?php
include '../config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone_number'];

    $stmt = $conn->prepare("INSERT INTO customers (name, phone_number) VALUES (?, ?)");
    $stmt->execute([$name, $phone]);

    header("Location: index.php");
}
?>
<form method="POST">
    Nama: <input type="text" name="name" required><br>
    No Telepon: <input type="text" name="phone_number" required><br>
    <button type="submit">Tambah</button>
</form>
