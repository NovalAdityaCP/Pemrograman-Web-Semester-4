<?php
include '../config.php';

$orders = $conn->query("SELECT id FROM orders")->fetchAll(PDO::FETCH_ASSOC);
$menus = $conn->query("SELECT id, name FROM menu")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    $menu_id = $_POST['menu_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $total_price = $quantity * $price;

    $stmt = $conn->prepare("INSERT INTO order_details (order_id, menu_id, quantity, price, total_price) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$order_id, $menu_id, $quantity, $price, $total_price]);

    header('Location: index.php');
}
?>

<h2>Tambah Order Detail</h2>
<form method="POST">
    Order ID:<br>
    <select name="order_id" required>
        <?php foreach ($orders as $order): ?>
            <option value="<?= $order['id'] ?>"><?= $order['id'] ?></option>
        <?php endforeach; ?>
    </select><br><br>

    Menu:<br>
    <select name="menu_id" required>
        <?php foreach ($menus as $menu): ?>
            <option value="<?= $menu['id'] ?>"><?= htmlspecialchars($menu['name']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    Jumlah:<br>
    <input type="number" name="quantity" required><br><br>

    Harga Satuan:<br>
    <input type="number" name="price" required><br><br>

    <button type="submit">Simpan</button>
</form>
<br>
<a href="index.php">Kembali</a>
