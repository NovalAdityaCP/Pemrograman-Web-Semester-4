<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("INSERT INTO menu (name, description, price) VALUES (?, ?, ?)");
    $stmt->execute([$name, $description, $price]);

    header('Location: index.php');
}
?>

<h2>Tambah Menu</h2>
<form method="POST">
    Nama Menu:<br>
    <input type="text" name="name" required><br><br>

    Deskripsi:<br>
    <textarea name="description" required></textarea><br><br>

    Harga:<br>
    <input type="number" name="price" required><br><br>

    <button type="submit">Simpan</button>
</form>
<br>
<a href="index.php">Kembali ke Menu</a>
