<?php
include '../config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $conn->query("INSERT INTO menu (name, description, price) VALUES ('$name', '$desc', '$price')");
    header("Location: index.php");
}
?>
<form method="POST">
    Nama: <input type="text" name="name" required><br>
    Deskripsi: <textarea name="description"></textarea><br>
    Harga: <input type="number" name="price" required><br>
    <button type="submit">Tambah</button>
    <a href="index.php">Kembali</a>
</form>
