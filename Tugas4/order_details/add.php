<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    $menu_id = $_POST['menu_id'];
    $quantity = $_POST['quantity'];

    $menu = $conn->query("SELECT price FROM menu WHERE id = '$menu_id'")->fetch_assoc();
    $price = $menu['price'];
    $total_price = $price * $quantity;

    $conn->query("INSERT INTO order_details (order_id, menu_id, quantity, price, total_price) 
                  VALUES ('$order_id', '$menu_id', '$quantity', '$price', '$total_price')");

    $conn->query("UPDATE orders SET total_price = total_price + $total_price WHERE id = '$order_id'");

    header("Location: index.php");
}

$orders = $conn->query("SELECT * FROM orders");
$menus = $conn->query("SELECT * FROM menu");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Detail Pesanan</title>
</head>
<body>
    <h2>Tambah Order Detail</h2>
    <form method="POST">
        <label>Order ID:</label>
        <select name="order_id">
            <?php while ($row = $orders->fetch_assoc()) { ?>
                <option value="<?= $row['id'] ?>">Order #<?= $row['id'] ?></option>
            <?php } ?>
        </select><br>

        <label>Menu:</label>
        <select name="menu_id">
            <?php while ($row = $menus->fetch_assoc()) { ?>
                <option value="<?= $row['id'] ?>"><?= $row['name'] ?> - Rp<?= $row['price'] ?></option>
            <?php } ?>
        </select><br>

        <label>Quantity:</label>
        <input type="number" name="quantity" required><br>

        <button type="submit">Tambah</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>
