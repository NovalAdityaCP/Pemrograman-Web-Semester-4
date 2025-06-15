<?php
include '../config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM customers WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone_number'];
    $conn->query("UPDATE customers SET name='$name', phone_number='$phone' WHERE id=$id");
    header("Location: index.php");
}
?>

<form method="post">
    Nama: <input type="text" name="name" value="<?= $row['name'] ?>" required><br>
    Nomor Telepon: <input type="text" name="phone_number" value="<?= $row['phone_number'] ?>" required><br>
    <button type="submit">Update</button>
</form>
