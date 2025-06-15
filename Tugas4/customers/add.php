<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone_number'];

    $conn->query("INSERT INTO customers (name, phone_number) VALUES ('$name', '$phone')");
    header("Location: index.php");
}
?>

<form method="post">
    Nama: <input type="text" name="name" required><br>
    Nomor Telepon: <input type="text" name="phone_number" required><br>
    <button type="submit">Tambah</button>
</form>
