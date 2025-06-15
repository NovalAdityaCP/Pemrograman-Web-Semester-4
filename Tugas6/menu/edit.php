<?php
include '../config.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM menu WHERE id = ?");
$stmt->execute([$id]);
$menu = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$menu) {
    echo "Menu tidak ditemukan!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("UPDATE menu SET name = ?, description = ?, price = ? WHERE id = ?");
    $stmt->execute([$name, $description, $price, $id]);

    header('Location: index.php');
}
?>

<h2>Edit Menu</h2>
<form method="POST">
    Nama Menu:<br>
    <input type="text" name="name" value="<?= htmlspecialchars($menu['name']) ?>" required><br><br>

    Deskripsi:<br>
    <textarea name="description" required><?= htmlspecialchars($menu['description']) ?></textarea><br><br>

    Harga:<br>
    <input type="number" name="price" value="<?= htmlspecialchars($menu['price']) ?>" required><br><br>

    <button type="submit">Update</button>
</form>
<br>
<a href="index.php">Kembali ke Menu</a>
