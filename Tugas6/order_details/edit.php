<?php
include '../config.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM order_details WHERE id = ?");
$stmt->execute([$id]);
$detail = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$detail) {
    echo "Data tidak ditemukan!";
    exit;
}

$orders = $conn->query("SELECT id FROM orders")->fetchAll(PDO::FETCH_ASSOC);
$menus = $conn->query("SELECT id, name FROM menu")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    $menu_id = $_POST['menu_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $total_price = $quantity * $price;

    $stmt = $conn->prepare("UPDATE order_details SET order_id = ?, menu_id = ?, quantity = ?, price = ?, total_price = ? WHERE id = ?");
    $stmt->execute([$order_id, $menu_id, $quantity, $price, $total_price, $id]);

    header('Location: index.php');
}
?>

<h2>Edit Order Detail</h2>
<form method="POST">
    Order ID:<br>
    <select name="order_id" required>
        <?php foreach ($orders as $order): ?>
            <option value="<?= $order['id'] ?>" <?= $detail['order_id'] == $order['id'] ? 'selected' : '' ?>>
                <?= $order['id'] ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    Menu:<br>
    <select name="menu_id" required>
        <?php foreach ($menus as $menu): ?>
            <option value="<?= $menu['id'] ?>" <?= $detail['menu_id'] == $menu['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($menu['name']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    Jumlah:<br>
    <input type="number" name="quantity" value="<?= htmlspecialchars($detail['quantity']) ?>" required><br><br>

    Harga Satuan:<br>
    <input type="number" name="price" value="<?= htmlspecialchars($detail['price']) ?>" required><br><br>

    <button type="submit">Update</button>
</form>
<br>
<a href="index.php">Kembali</a>
