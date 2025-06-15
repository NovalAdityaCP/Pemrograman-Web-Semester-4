<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_id = $_POST['customer_id'];
    $total_price = $_POST['total_price']; 
    $conn->query("INSERT INTO orders (customer_id, total_price, status) VALUES ('$customer_id', '$total_price', 'pending')");
    header("Location: index.php");
}

$customers = $conn->query("SELECT * FROM customers");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Order</title>
</head>
<body>
    <h2>Tambah Order</h2>
    <form method="POST">
        <label>Pelanggan:</label>
        <select name="customer_id">
            <?php while ($row = $customers->fetch_assoc()) { ?>
                <option value="<?= $row['id'] ?>"><?= $row['id'] ?> - <?= $row['name'] ?></option>
            <?php } ?>
        </select><br>

        <label>Total Harga:</label>
        <input type="number" name="total_price" required><br>

        <button type="submit">Tambah</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>
