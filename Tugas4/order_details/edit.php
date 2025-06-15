<?php
include '../config.php';

$id = $_GET['id'];
$order_detail = $conn->query("SELECT * FROM order_details WHERE id = '$id'")->fetch_assoc();

if (!$order_detail) {
    echo "Data tidak ditemukan!";
    exit;
}

$orders = $conn->query("SELECT * FROM orders");
$menus = $conn->query("SELECT * FROM menu");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    $menu_id = $_POST['menu_id'];
    $quantity = $_POST['quantity'];

    $menu = $conn->query("SELECT price FROM menu WHERE id = '$menu_id'")->fetch_assoc();
    $price = $menu['price'];
    $total_price = $price * $quantity;

    $conn->query("UPDATE order_details SET order_id = '$order_id', menu_id = '$menu_id', quantity = '$quantity', price = '$price', total_price = '$total_price' WHERE id = '$id'");

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Order Detail</title>
</head>
<body>
    <h2>Edit Order Detail</h2>
    <form method="POST">
        <label>Order ID:</label>
        <select name="order_id">
            <?php while ($row = $orders->fetch_assoc()) { ?>
                <option value="<?= $row['id'] ?>" <?= $row['id'] == $order_detail['order_id'] ? 'selected' : '' ?>>
                    Order #<?= $row['id'] ?>
                </option>
            <?php } ?>
        </select><br>

        <label>Menu:</label>
        <select name="menu_id">
            <?php while ($row = $menus->fetch_assoc()) { ?>
                <option value="<?= $row['id'] ?>" <?= $row['id'] == $order_detail['menu_id'] ? 'selected' : '' ?>>
                    <?= $row['name'] ?> - Rp<?= $row['price'] ?>
                </option>
            <?php } ?>
        </select><br>

        <label>Quantity:</label>
        <input type="number" name="quantity" value="<?= $order_detail['quantity'] ?>" required><br>

        <button type="submit">Update</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>
