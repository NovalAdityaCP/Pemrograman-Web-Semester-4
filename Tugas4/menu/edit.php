<?php
include '../config.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM menu WHERE id=$id");
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $conn->query("UPDATE menu SET name='$name', description='$desc', price='$price' WHERE id=$id");
    header("Location: index.php");
}
?>
<form method="POST">
    Nama: <input type="text" name="name" value="<?= $data['name'] ?>" required><br>
    Deskripsi: <textarea name="description"><?= $data['description'] ?></textarea><br>
    Harga: <input type="number" name="price" value="<?= $data['price'] ?>" required><br>
    <button type="submit">Update</button>
    <a href="index.php">Kembali</a>
</form>
